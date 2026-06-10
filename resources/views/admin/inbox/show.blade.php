@extends('layouts.app')

@section('content')
<div class="container my-5" style="min-height: 70vh; max-width: 800px;">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>
            Message Details
            @if(!$message->is_read)
                <span class="badge bg-success ms-2" style="font-size: 0.75rem;">New</span>
            @endif
        </h2>
        <a href="{{ route('admin.inbox.index') }}" class="btn btn-secondary text-white">
            <i class="fas fa-arrow-left me-1"></i> Back to Inbox
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow-sm">
        <div class="card-header bg-dark text-white">
            <h5 class="mb-0"><i class="fas fa-envelope-open me-2"></i>{{ $message->subject ?: '(No Subject)' }}</h5>
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-sm-3 text-muted fw-semibold">Full Name</div>
                <div class="col-sm-9">{{ $message->full_name }}</div>
            </div>
            <hr class="my-2">
            <div class="row mb-3">
                <div class="col-sm-3 text-muted fw-semibold">Email</div>
                <div class="col-sm-9">
                    <a href="mailto:{{ $message->email }}">{{ $message->email }}</a>
                </div>
            </div>
            <hr class="my-2">
            <div class="row mb-3">
                <div class="col-sm-3 text-muted fw-semibold">Phone</div>
                <div class="col-sm-9">{{ $message->phone ?: '—' }}</div>
            </div>
            <hr class="my-2">
            <div class="row mb-3">
                <div class="col-sm-3 text-muted fw-semibold">Subject</div>
                <div class="col-sm-9">{{ $message->subject ?: '(No Subject)' }}</div>
            </div>
            <hr class="my-2">
            <div class="row mb-3">
                <div class="col-sm-3 text-muted fw-semibold">Received</div>
                <div class="col-sm-9">{{ $message->created_at ? $message->created_at->format('d M Y, h:i A') : 'N/A' }}</div>
            </div>
            <hr class="my-2">
            <div class="row mb-3">
                <div class="col-sm-3 text-muted fw-semibold">Status</div>
                <div class="col-sm-9">
                    @if(!$message->is_read)
                        <span class="badge bg-success">New Message</span>
                    @else
                        <span class="badge bg-secondary">Read</span>
                    @endif
                </div>
            </div>
            <hr class="my-2">
            <div class="row mb-2">
                <div class="col-sm-3 text-muted fw-semibold">Message</div>
                <div class="col-sm-9">
                    <div class="bg-light p-3 rounded border" style="white-space: pre-wrap; line-height: 1.7;">{{ $message->message }}</div>
                </div>
            </div>
        </div>
        <div class="card-footer d-flex gap-2 flex-wrap">
            @if(!$message->is_read)
                <form action="{{ route('admin.inbox.markAsRead', $message->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-check me-1"></i> Mark as Read
                    </button>
                </form>
            @endif

            <form action="{{ route('admin.inbox.destroy', $message->id) }}" method="POST"
                  onsubmit="return confirm('Are you sure you want to delete this message?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">
                    <i class="fas fa-trash me-1"></i> Delete
                </button>
            </form>

            <a href="{{ route('admin.inbox.index') }}" class="btn btn-outline-secondary ms-auto">
                <i class="fas fa-arrow-left me-1"></i> Back to Inbox
            </a>
        </div>
    </div>
</div>
@endsection
