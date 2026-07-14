{{--
    Shared Admin Navigation Buttons Partial
    Included in all admin panel pages.
    Variables injected automatically by AdminStatsComposer:
      $unreadApplications, $unreadWhatsapp, $pendingMeetings
    Variable that should be set per-page:
      $unreadInbox (from InboxController / news index inline)
--}}
<div class="d-flex align-items-center flex-wrap gap-2">

    {{-- Manage News --}}
    <a href="{{ route('admin.news.index') }}" class="btn btn-primary">
        Manage News
    </a>

    {{-- Manage Blogs --}}
    <a href="{{ route('admin.blogs.index') }}" class="btn btn-secondary text-white">
        Manage Blogs
    </a>

    {{-- Manage Services --}}
    <a href="{{ route('admin.services.index') }}" class="btn btn-outline-warning text-dark">
        <i class="fas fa-cogs me-1"></i>Manage Services
    </a>


    {{-- Fee Structure --}}
    <a href="{{ route('admin.fee-structure.index') }}" class="btn btn-danger text-white">
        Fee Structure
    </a>

    {{-- Class Schedule --}}
    <a href="{{ route('admin.class-schedule.index') }}" class="btn btn-outline-info text-dark">
        <i class="fas fa-calendar-alt me-1"></i>Class Schedule
    </a>

    {{-- Manage Jobs --}}
    <a href="{{ route('admin.jobs.index') }}" class="btn btn-warning text-dark">
        Manage Jobs
    </a>

    {{-- View Applications — red badge when unread --}}
    <a href="{{ route('admin.applications.index') }}" class="btn btn-info text-white position-relative">
        View Applications
        @if(!empty($unreadApplications) && $unreadApplications > 0)
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="font-size:0.65rem;">
                {{ $unreadApplications }}
            </span>
        @endif
    </a>

    {{-- WhatsApp Queries — red badge when unread --}}
    <a href="{{ route('admin.whatsapp-queries.index') }}" class="btn btn-success text-white position-relative">
        WhatsApp Queries
        @if(!empty($unreadWhatsapp) && $unreadWhatsapp > 0)
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="font-size:0.65rem;">
                {{ $unreadWhatsapp }}
            </span>
        @endif
    </a>

    {{-- Meeting Bookings — red badge when pending --}}
    <a href="{{ route('admin.meeting-bookings.index') }}" class="btn btn-dark text-white position-relative">
        Meeting Bookings
        @if(!empty($pendingMeetings) && $pendingMeetings > 0)
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="font-size:0.65rem;">
                {{ $pendingMeetings }}
            </span>
        @endif
    </a>

    {{-- Inbox — green badge for unread contact messages --}}
    <a href="{{ route('admin.inbox.index') }}" class="btn btn-outline-success text-dark position-relative">
        <i class="fas fa-inbox me-1"></i> Inbox
        @php $unreadInbox = \App\Models\ContactMessage::where('is_read', false)->count(); @endphp
        @if($unreadInbox > 0)
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-success" style="font-size:0.65rem;">
                {{ $unreadInbox }}
            </span>
        @endif
    </a>

    {{-- Logout --}}
    <form action="{{ route('admin.logout') }}" method="POST" class="m-0">
        @csrf
        <button type="submit" class="btn btn-danger">Logout</button>
    </form>

</div>
