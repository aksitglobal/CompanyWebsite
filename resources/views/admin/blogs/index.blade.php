@extends('layouts.app')

@section('content')
<div class="container my-5" style="min-height: 70vh;">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Manage Blogs</h2>
        @include('admin.partials.nav-buttons')
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">
            <div class="d-flex justify-content-end mb-2">
                <a href="{{ route('admin.blogs.create') }}" class="btn btn-primary">Add New Blog</a>
            </div>
            <table class="table table-bordered table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Status</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($blogs as $blog)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            @if($blog->image)
                                <img src="{{ Storage::url($blog->image) }}" alt="Blog Image" style="width: 50px; height: 50px; object-fit: cover; border-radius: 4px;">
                            @else
                                <span class="text-muted">No Image</span>
                            @endif
                        </td>
                        <td>{{ $blog->title }}</td>
                        <td>
                            @if($blog->is_published)
                                <span class="badge bg-success">Published</span>
                            @else
                                <span class="badge bg-secondary">Draft</span>
                            @endif
                        </td>
                        <td>{{ $blog->created_at ? $blog->created_at->format('Y-m-d H:i') : 'N/A' }}</td>
                        <td>
                            <div class="d-flex gap-2">
                                <form action="{{ route('admin.blogs.toggle', $blog->slug) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-sm {{ $blog->is_published ? 'btn-warning' : 'btn-success' }}">
                                        {{ $blog->is_published ? 'Unpublish' : 'Publish' }}
                                    </button>
                                </form>
                                <a href="{{ route('admin.blogs.edit', $blog->slug) }}" class="btn btn-info btn-sm text-white">Edit</a>
                                <form action="{{ route('admin.blogs.destroy', $blog->slug) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this blog post?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted">No blogs found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
