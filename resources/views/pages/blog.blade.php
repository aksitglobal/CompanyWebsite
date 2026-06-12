@extends('layouts.app')

@section('title', 'Blog — AKSIT GLOBAL')
@section('description', 'Read the latest insights and updates from AKSIT GLOBAL.')

@push('styles')
<style>
    .blog-section {
        padding: 80px 0;
        background: var(--off-white);
    }
    .blog-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 30px;
    }
    .blog-card {
        background: var(--white);
        border-radius: var(--radius-lg);
        overflow: hidden;
        box-shadow: var(--shadow);
        transition: var(--transition);
        display: flex;
        flex-direction: column;
    }
    .blog-card:hover {
        transform: translateY(-5px);
        box-shadow: var(--shadow-lg);
    }
    .blog-card-image {
        height: 220px;
        background: var(--primary-light);
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--white);
        font-size: 3rem;
        position: relative;
    }
    .blog-card-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    .blog-card-body {
        padding: 24px;
        flex: 1;
        display: flex;
        flex-direction: column;
    }
    .blog-card-body h3 {
        font-size: 1.25rem;
        font-weight: 700;
        color: var(--primary);
        margin-bottom: 12px;
        line-height: 1.4;
    }
    .blog-card-body p {
        color: var(--gray-600);
        font-size: 0.95rem;
        line-height: 1.6;
        margin-bottom: 24px;
        flex: 1;
    }
    
    @media (max-width: 1024px) {
        .blog-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }
    @media (max-width: 768px) {
        .blog-grid {
            grid-template-columns: 1fr;
        }
    }
</style>
@endpush

@section('content')
    <!-- PAGE HERO BANNER -->
    <section class="page-hero">
        <div class="page-hero-content">
            <h1>Our <span>Blog</span></h1>
            <p>Insights, updates, and latest trends in technology.</p>

        </div>
    </section>

    <!-- BLOG POSTS SECTION -->
    <section class="blog-section">
        <div class="container">
            @if($blogs->count() > 0)
                <div class="blog-grid">
                    @foreach($blogs as $blog)
                        <div class="blog-card reveal">
                            <a href="{{ route('blog.show', $blog->slug) }}" style="text-decoration: none; color: inherit; display: contents;">
                                <div class="blog-card-image">
                                    @if($blog->image)
                                        <img src="{{ Storage::url($blog->image) }}" alt="{{ $blog->title }}">
                                    @else
                                        <i class="fas fa-image"></i>
                                    @endif
                                </div>
                            </a>
                            <div class="blog-card-body">
                                <a href="{{ route('blog.show', $blog->slug) }}" style="text-decoration: none; color: inherit;">
                                    <h3>{{ $blog->title }}</h3>
                                </a>
                                <p>{{ Str::limit(strip_tags($blog->content), 120) }}</p>
                                <a href="{{ route('blog.show', $blog->slug) }}" class="btn btn-primary" style="align-self: flex-start; text-decoration: none;">Read More &rarr;</a>
                            </div>
                        </div>
                    @endforeach
                </div>
                
                <div style="margin-top: 40px;">
                    {{ $blogs->links() }}
                </div>
            @else
                <div class="text-center" style="text-align: center; padding: 50px 0;">
                    <h2>No posts found</h2>
                    <p style="color: var(--gray-600); margin-top: 15px;">Check back later for new insights.</p>
                </div>
            @endif
        </div>
    </section>
@endsection
