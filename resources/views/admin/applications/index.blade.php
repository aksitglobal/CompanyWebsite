@extends('layouts.app')

@section('content')
<div class="container my-5" style="min-height: 70vh;">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>
            Job Applications
            @if($unreadApplications > 0)
                <span class="badge bg-danger ms-2" style="font-size:0.75rem;">{{ $unreadApplications }} New</span>
            @endif
        </h2>
        @include('admin.partials.nav-buttons')
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow-sm border-0">
        <div class="card-body">
            <table class="table table-bordered table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Position</th>
                        <th>Applied On</th>
                        <th>CV</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($applications as $app)
                    <tr class="{{ !$app->is_read ? 'table-warning fw-semibold' : '' }}">
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            @if(!$app->is_read)
                                <i class="fas fa-circle text-danger me-1" style="font-size:8px;vertical-align:middle;"></i>
                            @endif
                            {{ $app->full_name }}
                        </td>
                        <td><a href="mailto:{{ $app->email }}" class="text-decoration-none">{{ $app->email }}</a></td>
                        <td>{{ $app->phone }}</td>
                        <td><span class="badge bg-info text-dark">{{ $app->position }}</span></td>
                        <td>{{ $app->created_at ? $app->created_at->format('M d, Y H:i') : 'N/A' }}</td>
                        <td>
                            @if($app->cv_path)
                                <a href="{{ asset('storage/' . $app->cv_path) }}" target="_blank" class="btn btn-sm btn-outline-primary">Download CV</a>
                            @else
                                <span class="text-muted text-sm">No Document</span>
                            @endif
                        </td>
                        <td>
                            <div class="d-flex gap-2">
                                @if(!$app->is_read)
                                <form action="{{ route('admin.applications.markRead', $app->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-success btn-sm"><i class="fas fa-check"></i> Mark Read</button>
                                </form>
                                @endif
                                <form action="{{ route('admin.applications.destroy', $app->id) }}" method="POST" onsubmit="return confirm('WARNING: Delete this application and its CV permanently?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @if($app->cover_letter)
                    <tr>
                        <td colspan="8" class="bg-light p-3 border-bottom">
                            <strong class="text-dark">Cover Letter:</strong>
                            <p class="mb-0 mt-2 text-muted" style="white-space: pre-wrap; font-size: 14px;">{{ $app->cover_letter }}</p>
                        </td>
                    </tr>
                    @endif
                    @empty
                    <tr>
                        <td colspan="8" class="text-center text-muted py-4">No applications have been received yet.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
