<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactMessage;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|max:255',
            'phone'   => 'nullable|string|max:50',
            'subject' => 'nullable|string|max:255',
            'message' => 'required|string',
        ]);

        // 1. Save to database (existing behaviour — unchanged)
        ContactMessage::create([
            'full_name' => $validated['name'],
            'email'     => $validated['email'],
            'phone'     => $validated['phone'] ?? null,
            'subject'   => $validated['subject'] ?? null,
            'message'   => $validated['message'],
        ]);

        // 2. Build the pre-filled WhatsApp message
        $whatsappNumber = '923000311868'; // +92 300 0311868

        $waMessage = implode("\n", [
            'Name: '    . $validated['name'],
            'Email: '   . $validated['email'],
            'Phone: '   . ($validated['phone'] ?? 'N/A'),
            'Subject: ' . ($validated['subject'] ?? 'N/A'),
            'Message: ' . $validated['message'],
        ]);

        $whatsappUrl = 'https://wa.me/' . $whatsappNumber . '?text=' . rawurlencode($waMessage);

        // 3. Return JSON with the WhatsApp redirect URL
        if ($request->expectsJson()) {
            return response()->json([
                'success'       => true,
                'message'       => 'Your message has been saved! Redirecting you to WhatsApp...',
                'whatsapp_url'  => $whatsappUrl,
            ]);
        }

        // Fallback for non-AJAX submissions
        return redirect($whatsappUrl);
    }
}
