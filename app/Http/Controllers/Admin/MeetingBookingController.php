<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MeetingBooking;

class MeetingBookingController extends Controller
{
    /**
     * Display all meeting bookings.
     */
    public function index()
    {
        $bookings = MeetingBooking::orderBy('created_at', 'desc')->get();
        return view('admin.meeting-bookings.index', compact('bookings'));
    }

    /**
     * Delete a meeting booking.
     */
    public function destroy($id)
    {
        $booking = MeetingBooking::findOrFail($id);
        $booking->delete();

        return redirect()->back()->with('success', 'Meeting booking deleted successfully.');
    }
}
