@extends('layouts.app')

@section('content')
<div class="container my-5" style="min-height: 70vh;">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Manage News Tickers</h2>
        @include('admin.partials.nav-buttons')
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">
            <div class="d-flex justify-content-end mb-2">
                <a href="{{ route('admin.news.create') }}" class="btn btn-primary">Add New News</a>
            </div>
            <table class="table table-bordered table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>News Text</th>
                        <th>Status</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($newsItems as $news)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $news->news_text }}</td>
                        <td>
                            @if($news->is_active)
                                <span class="badge bg-success">Active</span>
                            @else
                                <span class="badge bg-secondary">Inactive</span>
                            @endif
                        </td>
                        <td>{{ $news->created_at ? $news->created_at->format('Y-m-d H:i') : 'N/A' }}</td>
                        <td>
                            <div class="d-flex gap-2">
                                <form action="{{ route('admin.news.toggle', $news->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-sm {{ $news->is_active ? 'btn-warning' : 'btn-success' }}">
                                        {{ $news->is_active ? 'Deactivate' : 'Activate' }}
                                    </button>
                                </form>
                                <a href="{{ route('admin.news.edit', $news->id) }}" class="btn btn-info btn-sm text-white">Edit</a>
                                <form action="{{ route('admin.news.destroy', $news->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this news item?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted">No news items found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
