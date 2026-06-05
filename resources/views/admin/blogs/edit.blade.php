@extends('layouts.app')

@section('content')
<div class="container my-5" style="min-height: 70vh;">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Edit Blog</h2>
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
            <form action="{{ route('admin.blogs.update', $blog->slug) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $blog->title) }}" required>
                </div>

                <div class="mb-3">
                    <label for="content" class="form-label">Content</label>
                    <textarea class="form-control" id="content" name="content" rows="10" required>{{ old('content', $blog->content) }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Featured Image</label>
                    @if($blog->image)
                        <div class="mb-2">
                            <img src="{{ Storage::url($blog->image) }}" alt="Current Image" style="width: 150px; border-radius: 5px;">
                        </div>
                    @endif
                    <input class="form-control" type="file" id="image" name="image" accept="image/*">
                    <small class="text-muted">Leave blank if you don't want to change the current image.</small>
                </div>

                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="is_published" name="is_published" {{ old('is_published', $blog->is_published) ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_published">Published</label>
                </div>
                
                <button type="submit" class="btn btn-primary">Update Blog</button>
            </form>
        </div>
    </div>
</div>
@endsection
