<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Enrollment;
use App\Models\ServiceInquiry;
use Illuminate\Http\Request;

class FormController extends Controller
{
    /**
     * Handle contact form submission.
     */
    public function submitContact(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:50',
            'subject' => 'nullable|string|max:100',
            'message' => 'required|string|max:5000',
        ]);

        Contact::create($validated);

        return redirect()->route('contact')->with('success', 'Thank you for your message! Our team will get back to you within 24 hours.');
    }

    /**
     * Handle course enrollment form submission.
     */
    public function submitEnrollment(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:50',
            'course' => 'required|string|max:255',
            'message' => 'nullable|string|max:5000',
        ]);

        Enrollment::create($validated);

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json(['success' => true, 'message' => 'Enrollment submitted successfully!']);
        }

        return redirect()->route('courses')->with('success', 'Your enrollment request has been submitted!');
    }

    /**
     * Handle service inquiry form submission.
     */
    public function submitServiceInquiry(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:50',
            'service' => 'nullable|string|max:255',
            'message' => 'required|string|max:5000',
        ]);

        ServiceInquiry::create($validated);

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json(['success' => true, 'message' => 'Your inquiry has been submitted!']);
        }

        return redirect()->route('services')->with('success', 'Your inquiry has been submitted!');
    }
}
