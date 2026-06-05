@extends('layouts.app')

@section('content')
<div class="container my-5" style="min-height: 70vh;">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Job Applications</h2>
        <div class="d-flex align-items-center">
            <a href="{{ route('admin.news.index') }}" class="btn btn-secondary me-3">Back to News Admin</a>
            
            <form action="{{ route('admin.logout') }}" method="POST" class="m-0">
                @csrf
                <button type="submit" class="btn btn-danger font-weight-bold">Logout</button>
            </form>
        </div>
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
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td class="fw-bold">{{ $app->full_name }}</td>
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
                            <form action="{{ route('admin.applications.destroy', $app->id) }}" method="POST" onsubmit="return confirm('WARNING: Are you sure you want to delete this application? It will permanently delete the associated CV from the server.');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
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
