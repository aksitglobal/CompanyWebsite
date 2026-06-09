@extends('layouts.app')

@section('content')
<div class="container my-5" style="min-height: 70vh;">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Meeting Bookings</h2>
        <div class="d-flex align-items-center">
            <a href="{{ route('admin.news.index') }}" class="btn btn-primary me-2">Manage News</a>
            <a href="{{ route('admin.blogs.index') }}" class="btn btn-secondary me-2 text-white">Manage Blogs</a>
            <a href="{{ route('admin.jobs.index') }}" class="btn btn-warning me-2 text-dark">Manage Jobs</a>
            <a href="{{ route('admin.applications.index') }}" class="btn btn-info me-2 text-white">View Applications</a>
            <a href="{{ route('admin.whatsapp-queries.index') }}" class="btn btn-success me-2 text-white">WhatsApp Queries</a>

            <form action="{{ route('admin.logout') }}" method="POST" class="m-0">
                @csrf
                <button type="submit" class="btn btn-danger font-weight-bold">Logout</button>
            </form>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">
            <table class="table table-bordered table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Company</th>
                        <th>Query</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($bookings as $booking)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $booking->name }}</td>
                        <td><a href="mailto:{{ $booking->email }}">{{ $booking->email }}</a></td>
                        <td>{{ $booking->phone }}</td>
                        <td>{{ $booking->company_name ?? '—' }}</td>
                        <td style="max-width: 250px;">{{ Str::limit($booking->description, 100) }}</td>
                        <td>{{ $booking->created_at ? $booking->created_at->format('Y-m-d H:i') : 'N/A' }}</td>
                        <td>
                            <form action="{{ route('admin.meeting-bookings.destroy', $booking->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this booking?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center text-muted">No meeting bookings found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
