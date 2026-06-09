<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WhatsappQuery;

class WhatsappQueryController extends Controller
{
    /**
     * Store the WhatsApp project query in the database.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'         => 'required|string|max:255',
            'email'        => 'required|email|max:255',
            'phone'        => 'required|string|max:50',
            'project_type' => 'required|string|max:255',
            'description'  => 'required|string',
        ]);

        WhatsappQuery::create($validated);

        return response()->json(['success' => true, 'message' => 'Query saved successfully.']);
    }
}
