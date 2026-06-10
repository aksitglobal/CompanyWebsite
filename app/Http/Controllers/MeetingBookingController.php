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
            'meeting_date' => 'required|date|after_or_equal:today',
            'description'  => 'required|string',
        ]);

        // Double-check date availability (in case of race condition)
        $alreadyBooked = MeetingBooking::where('meeting_date', $validated['meeting_date'])
            ->where('status', 'confirmed')
            ->exists();

        if ($alreadyBooked) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, this date is fully booked. Please select another date.',
            ], 422);
        }

        MeetingBooking::create($validated);

        return response()->json([
            'success'      => true,
            'message'      => 'Meeting booked successfully! We will confirm shortly.',
            'name'         => $validated['name'],
            'email'        => $validated['email'],
            'phone'        => $validated['phone'],
            'meeting_date' => $validated['meeting_date'],
            'description'  => $validated['description'],
        ]);
    }

    /**
     * Check if a date is available (not confirmed).
     */
    public function checkDate(Request $request)
    {
        $date = $request->input('date');

        if (!$date) {
            return response()->json(['available' => false]);
        }

        $booked = MeetingBooking::where('meeting_date', $date)
            ->where('status', 'confirmed')
            ->exists();

        return response()->json(['available' => !$booked]);
    }

    /**
     * Return all confirmed (blocked) dates for the date picker.
     */
    public function bookedDates()
    {
        $dates = MeetingBooking::where('status', 'confirmed')
            ->pluck('meeting_date')
            ->map(fn($d) => $d instanceof \Carbon\Carbon ? $d->format('Y-m-d') : $d)
            ->values();

        return response()->json($dates);
    }
}
