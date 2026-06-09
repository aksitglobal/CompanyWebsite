<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MeetingBooking;

class MeetingBookingController extends Controller
{
    /**
     * Store a new meeting booking in the database.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'         => 'required|string|max:255',
            'email'        => 'required|email|max:255',
            'phone'        => 'required|string|max:50',
            'company_name' => 'nullable|string|max:255',
            'description'  => 'required|string',
        ]);

        MeetingBooking::create($validated);

        return response()->json(['success' => true, 'message' => 'Meeting booked successfully.']);
    }
}
