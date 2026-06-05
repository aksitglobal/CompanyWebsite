@extends('layouts.app')

@section('content')
<div class="container my-5" style="min-height: 70vh;">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Add New Blog</h2>
        <a href="{{ route('admin.blogs.index') }}" class="btn btn-secondary">Back to List</a>
    </div>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('admin.blogs.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" required placeholder="e.g. 10 Tips for Cybersecurity">
                </div>
                
                <div class="mb-3">
                    <label for="content" class="form-label">Content</label>
                    <textarea class="form-control" id="content" name="content" rows="10" required placeholder="Write your blog content here...">{{ old('content') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Featured Image</label>
                    <input class="form-control" type="file" id="image" name="image" accept="image/*">
                </div>

                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="is_published" name="is_published" checked>
                    <label class="form-check-label" for="is_published">Publish immediately</label>
                </div>
                
                <button type="submit" class="btn btn-primary">Save Blog</button>
            </form>
        </div>
    </div>
</div>
@endsection
