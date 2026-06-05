@extends('layouts.app')

@section('content')
<div class="container my-5" style="min-height: 70vh;">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <div class="card shadow-sm mx-auto" style="max-width: 600px;">
        <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Change Admin Password</h4>
            <a href="{{ route('admin.news.index') }}" class="btn btn-sm btn-secondary">Back to Dashboard</a>
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

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <form action="{{ route('admin.change-password.submit') }}" method="POST">
                @csrf
                
                <div class="mb-3">
                    <label for="current_password" class="form-label fw-bold">Current Password <span class="text-danger">*</span></label>
                    <input type="password" name="current_password" id="current_password" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="new_password" class="form-label fw-bold">New Password <span class="text-danger">*</span></label>
                    <input type="password" name="new_password" id="new_password" class="form-control" required minlength="8">
                </div>

                <div class="mb-4">
                    <label for="new_password_confirmation" class="form-label fw-bold">Confirm New Password <span class="text-danger">*</span></label>
                    <input type="password" name="new_password_confirmation" id="new_password_confirmation" class="form-control" required minlength="8">
                </div>

                <button type="submit" class="btn btn-success w-100 fw-bold">Update Password</button>
            </form>
        </div>
    </div>
</div>
@endsection
