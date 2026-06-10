@extends('layouts.app')

@section('content')
<div class="container my-5" style="min-height: 70vh;">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>
            Meeting Bookings
            @if($pendingMeetings > 0)
                <span class="badge bg-warning text-dark ms-2" style="font-size:0.75rem;">{{ $pendingMeetings }} Pending</span>
            @endif
        </h2>
        @include('admin.partials.nav-buttons')
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body p-0">
            <table class="table table-bordered table-hover align-middle mb-0">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Meeting Date</th>
                        <th>Status</th>
                        <th style="max-width:220px;">Query</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($bookings as $booking)
                    <tr class="{{ $booking->status === 'pending' ? 'table-warning' : '' }}">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $booking->name }}</td>
                        <td><a href="mailto:{{ $booking->email }}">{{ $booking->email }}</a></td>
                        <td>{{ $booking->phone }}</td>
                        <td>
                            @if($booking->meeting_date)
                                {{ \Carbon\Carbon::parse($booking->meeting_date)->format('d M Y') }}
                            @else
                                <span class="text-muted">—</span>
                            @endif
                        </td>
                        <td>
                            @if($booking->status === 'confirmed')
                                <span class="badge bg-success">Confirmed</span>
                            @else
                                <span class="badge bg-warning text-dark">Pending</span>
                            @endif
                        </td>
                        <td style="max-width:220px; white-space:nowrap; overflow:hidden; text-overflow:ellipsis;">
                            {{ Str::limit($booking->description, 80) }}
                        </td>
                        <td>
                            <div class="d-flex gap-2 flex-wrap">
                                @if($booking->status === 'pending')
                                <form action="{{ route('admin.meeting-bookings.confirm', $booking->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-success btn-sm"
                                            onclick="return confirm('Confirm this meeting? The date will be blocked for new bookings.')">
                                        <i class="fas fa-check"></i> Confirm
                                    </button>
                                </form>
                                @endif
                                <form action="{{ route('admin.meeting-bookings.destroy', $booking->id) }}" method="POST"
                                      onsubmit="return confirm('Delete this booking?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash"></i> Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center text-muted py-4">
                            <i class="fas fa-calendar-times fa-2x mb-2 d-block"></i>
                            No meeting bookings found.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
