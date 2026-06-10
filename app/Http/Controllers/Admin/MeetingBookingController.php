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
        $bookings = MeetingBooking::orderByRaw("FIELD(status, 'pending', 'confirmed')")
            ->orderBy('meeting_date', 'asc')
            ->get();
        return view('admin.meeting-bookings.index', compact('bookings'));
    }

    /**
     * Confirm a meeting booking (blocks the date).
     */
    public function confirm($id)
    {
        $booking = MeetingBooking::findOrFail($id);
        $booking->update(['status' => 'confirmed']);

        $dateFormatted = \Carbon\Carbon::parse($booking->meeting_date)->format('d M Y');
        return redirect()->back()->with('success', "Meeting on {$dateFormatted} confirmed and date is now blocked.");
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
