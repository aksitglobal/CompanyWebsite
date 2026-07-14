@extends('layouts.app')

@section('content')
<div class="container my-5" style="min-height: 70vh;">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <div class="card shadow-sm mx-auto" style="max-width: 800px;">
        <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Edit Job Listing</h4>
            <a href="{{ route('admin.jobs.index') }}" class="btn btn-sm btn-secondary">Back to Jobs</a>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.jobs.update', $job->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="title" class="form-label fw-bold">Title <span class="text-danger">*</span></label>
                    <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $job->title) }}" required>
                </div>
                
                <div class="mb-3">
                    <label for="type" class="form-label fw-bold">Type <span class="text-danger">*</span></label>
                    <select name="type" id="type" class="form-select" required>
                        <option value="internship" {{ old('type', $job->type) == 'internship' ? 'selected' : '' }}>Internship</option>
                        <option value="job" {{ old('type', $job->type) == 'job' ? 'selected' : '' }}>Job</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="badge" class="form-label fw-bold">Badge</label>
                    <input type="text" name="badge" id="badge" class="form-control" value="{{ old('badge', $job->badge) }}" placeholder="e.g. 3 Months Program or Full Time - Onsite">
                    <div class="form-text">Optional highlight pill for the job card.</div>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label fw-bold">Description <span class="text-danger">*</span></label>
                    <textarea name="description" id="description" class="form-control rich-editor" rows="5" required>{{ old('description', $job->description) }}</textarea>
                </div>

                <div class="mb-4 form-check">
                    <input type="checkbox" name="is_active" id="is_active" class="form-check-input" value="1" {{ old('is_active', $job->is_active) ? 'checked' : '' }}>
                    <label class="form-check-label fw-bold" for="is_active">Active (Visible on website)</label>
                </div>

                <button type="submit" class="btn btn-success w-100 fw-bold">Update Job Listing</button>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
<script>
ClassicEditor
    .create(document.querySelector('.rich-editor'))
    .then(function(editor) {
        document.querySelector('form').addEventListener('submit', function() {
            document.querySelector('.rich-editor').value = editor.getData();
        });
    })
    .catch(console.error);
</script>
@endpush
