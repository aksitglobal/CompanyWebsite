@extends('layouts.app')

@section('title', $blog->title . ' — AKSIT GLOBAL Blog')
@section('description', Str::limit(strip_tags($blog->content), 150))

@push('styles')
    <!-- Bootstrap 5 loaded exclusively for the single blog post layout -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .blog-single-container {
            padding: 60px 0 100px 0;
            background-color: #ffffff;
            color: #212529;
        }
        .blog-content-area {
            font-size: 1.1rem;
            line-height: 1.8;
            margin-top: 30px;
        }
        .blog-content-area img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
            margin: 20px 0;
        }
        /* Overriding specific bootstrap link colors to match the brand if needed */
        .blog-single-container a:not(.btn) {
            color: #d97706; /* brand accent */
        }
    </style>
@endpush

@section('content')
<div class="blog-single-container">
    <div class="container"> <!-- Bootstrap 5 container -->
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10">
                
                <!-- Back to Blog button -->
                <div class="mb-4">
                    <a href="{{ route('blog') }}" class="btn btn-outline-secondary">
                        &larr; Back to Blog
                    </a>
                </div>

                <!-- Blog Title -->
                <h1 class="fw-bold mb-3 text-dark">{{ $blog->title }}</h1>
                
                <!-- Date -->
                <p class="text-muted mb-4">
                    Published on {{ $blog->created_at->format('F d, Y') }}
                </p>

                <!-- Featured Image -->
                @if($blog->image)
                    <div class="mb-5 text-center">
                        <img src="{{ Storage::url($blog->image) }}" class="img-fluid rounded shadow-sm w-100" alt="{{ $blog->title }}">
                    </div>
                @endif

                <!-- Full Content -->
                <div class="blog-content-area text-dark">
                    {!! $blog->content !!}
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
