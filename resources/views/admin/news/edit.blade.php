@extends('layouts.app')

@section('content')
<div class="container my-5" style="min-height: 70vh;">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Edit News</h2>
        <a href="{{ route('admin.news.index') }}" class="btn btn-secondary">Back to List</a>
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
            <form action="{{ route('admin.news.update', $news->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="news_text" class="form-label">News Text</label>
                    <input type="text" class="form-control" id="news_text" name="news_text" value="{{ old('news_text', $news->news_text) }}" required>
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="is_active" name="is_active" {{ $news->is_active ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_active">Active Status</label>
                </div>
                <button type="submit" class="btn btn-primary">Update News</button>
            </form>
        </div>
    </div>
</div>
@endsection
