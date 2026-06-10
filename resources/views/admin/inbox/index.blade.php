@extends('layouts.app')

@section('content')
<div class="container my-5" style="min-height: 70vh;">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>
            Inbox
            @if($unreadCount > 0)
                <span class="badge bg-success ms-2" style="font-size: 0.75rem;">{{ $unreadCount }} New</span>
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
                        <th style="width:40px;">#</th>
                        <th>Sender</th>
                        <th>Email</th>
                        <th>Subject</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th style="width:100px;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($messages as $msg)
                    <tr class="{{ $msg->is_read ? '' : 'table-light fw-semibold' }}">
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            @if(!$msg->is_read)
                                <i class="fas fa-envelope text-success me-1"></i>
                            @else
                                <i class="fas fa-envelope-open text-muted me-1"></i>
                            @endif
                            {{ $msg->full_name }}
                        </td>
                        <td>{{ $msg->email }}</td>
                        <td>{{ $msg->subject ?: '(No Subject)' }}</td>
                        <td>{{ $msg->created_at ? $msg->created_at->format('d M Y, h:i A') : 'N/A' }}</td>
                        <td>
                            @if(!$msg->is_read)
                                <span class="badge bg-success">New Message</span>
                            @else
                                <span class="badge bg-secondary">Read</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.inbox.show', $msg->id) }}" class="btn btn-primary btn-sm">
                                <i class="fas fa-eye"></i> View
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center text-muted py-4">
                            <i class="fas fa-inbox fa-2x mb-2 d-block"></i>
                            No messages yet.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
