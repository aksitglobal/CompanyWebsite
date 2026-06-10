<?php

namespace App\View\Composers;

use Illuminate\View\View;
use App\Models\Application;
use App\Models\WhatsappQuery;
use App\Models\MeetingBooking;

class AdminStatsComposer
{
    public function compose(View $view): void
    {
        $view->with([
            'unreadApplications' => Application::where('is_read', false)->count(),
            'unreadWhatsapp'     => WhatsappQuery::where('is_read', false)->count(),
            'pendingMeetings'    => MeetingBooking::where('status', 'pending')->count(),
        ]);
    }
}
