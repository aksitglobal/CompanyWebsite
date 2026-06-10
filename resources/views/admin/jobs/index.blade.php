@extends('layouts.app')

@section('content')
<div class="container my-5" style="min-height: 70vh;">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Manage Job Listings</h2>
        @include('admin.partials.nav-buttons')
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">
            <div class="d-flex justify-content-end mb-2">
                <a href="{{ route('admin.jobs.create') }}" class="btn btn-primary">Add New Job</a>
            </div>
            <table class="table table-bordered table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Type</th>
                        <th>Badge</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($jobs as $job)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $job->title }}</td>
                        <td>
                            <span class="badge bg-{{ $job->type === 'internship' ? 'info' : 'primary' }}">
                                {{ ucfirst($job->type) }}
                            </span>
                        </td>
                        <td>{{ $job->badge ?: 'N/A' }}</td>
                        <td>
                            @if($job->is_active)
                                <span class="badge bg-success">Active</span>
                            @else
                                <span class="badge bg-secondary">Inactive</span>
                            @endif
                        </td>
                        <td>
                            <div class="d-flex gap-2">
                                <form action="{{ route('admin.jobs.toggle', $job->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-sm {{ $job->is_active ? 'btn-warning' : 'btn-success' }}">
                                        {{ $job->is_active ? 'Deactivate' : 'Activate' }}
                                    </button>
                                </form>
                                <a href="{{ route('admin.jobs.edit', $job->id) }}" class="btn btn-info btn-sm text-white">Edit</a>
                                <form action="{{ route('admin.jobs.destroy', $job->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this job?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted">No jobs found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
