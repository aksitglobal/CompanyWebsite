@extends('layouts.app')

@section('title', 'Apply Now - AKSIT GLOBAL')

@section('content')
<style>
    .apply-hero {
        background: linear-gradient(rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0.8)), url('{{ asset('assets/hero-bg.jpg') }}') center/cover;
        padding: 100px 0 60px;
        text-align: center;
        color: #fff;
    }
    .apply-hero h1 {
        font-size: 48px;
        font-weight: 800;
        margin-bottom: 20px;
    }
    .apply-hero h1 span {
        color: #facc15;
    }
</style>

<section class="apply-hero">
    <div class="container">
        <h1>Start Your <span>Journey</span></h1>
        <p style="font-size: 18px; color: #ccc;">Fill out the application form below to apply for the position.</p>
    </div>
</section>

<section style="padding: 60px 0; background: #fafafa; min-height: 50vh;">
    <div class="container">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10">
                <div class="card shadow-sm border-0" style="border-radius: 12px; padding: 20px;">
                    <div class="card-body">
                        <h2 class="mb-4 text-center">Application Form</h2>

                        @if(session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('apply.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="full_name" class="form-label fw-bold">Full Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="full_name" name="full_name" value="{{ old('full_name') }}" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="email" class="form-label fw-bold">Email Address <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="phone" class="form-label fw-bold">Phone Number <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="position" class="form-label fw-bold">Position Applied For <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="position" name="position" value="{{ old('position', $position ?? '') }}" required>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="cv" class="form-label fw-bold">Upload CV/Resume (PDF, DOC, DOCX) <span class="text-danger">*</span></label>
                                <input type="file" class="form-control" id="cv" name="cv" accept=".pdf,.doc,.docx" required>
                                <small class="text-muted">Maximum file size: 5MB</small>
                            </div>

                            <div class="mb-4">
                                <label for="cover_letter" class="form-label fw-bold">Cover Letter</label>
                                <textarea class="form-control" id="cover_letter" name="cover_letter" rows="5" placeholder="Tell us why you are a great fit for this role...">{{ old('cover_letter') }}</textarea>
                            </div>

                            <div class="d-grid mt-2">
                                <button type="submit" class="btn btn-dark btn-lg" style="border-radius: 30px; font-weight: 600;">Submit Application</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
