@extends('layouts.app')

@section('title', 'Career - AKSIT GLOBAL')

@section('content')
<style>
    .career-hero {
        background: linear-gradient(rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0.8)), url('{{ asset('assets/hero-bg.jpg') }}') center/cover;
        padding: 120px 0 80px;
        text-align: center;
        color: #fff;
    }
    .career-hero h1 {
        font-size: 52px;
        font-weight: 800;
        margin-bottom: 20px;
    }
    .career-hero h1 span {
        color: #facc15; /* gold */
    }
    .section-heading {
        text-align: center;
        margin-bottom: 50px;
    }
    .section-heading h2 {
        font-size: 32px;
        font-weight: 700;
        color: #1a1a1a;
    }
    .section-heading h2 span {
        color: #b45309;
    }
    .section-heading hr {
        width: 60px;
        border: 3px solid #facc15;
        margin: 15px auto 0;
        border-radius: 2px;
    }
    .job-card {
        background: #fff;
        border-radius: 12px;
        padding: 35px;
        box-shadow: 0 8px 25px rgba(0,0,0,0.06);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        margin-bottom: 30px;
        border: 1px solid #eee;
    }
    .job-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 35px rgba(0,0,0,0.1);
        border-color: #facc15;
    }
    .job-card h3 {
        color: #1a1a1a;
        font-size: 24px;
        font-weight: 700;
        margin-bottom: 15px;
    }
    .job-type {
        display: inline-block;
        padding: 6px 16px;
        background: rgba(250, 204, 21, 0.15);
        color: #b45309;
        border-radius: 20px;
        font-size: 14px;
        font-weight: 700;
        margin-bottom: 15px;
    }
    .job-desc {
        color: #555;
        font-size: 16px;
        line-height: 1.6;
        margin-bottom: 20px;
    }
    .apply-btn {
        border-radius: 30px;
        font-weight: 600;
        padding: 10px 25px;
        border: 2px solid #1a1a1a;
        color: #1a1a1a;
        background: transparent;
        transition: all 0.3s;
        text-decoration: none;
        display: inline-block;
    }
    .apply-btn:hover {
        background: #1a1a1a;
        color: #fff;
    }
</style>

<section class="career-hero">
    <div class="container">
        <h1>Building the <span>Future</span> Together</h1>
        <p style="font-size: 18px; max-width: 650px; margin: 0 auto; color: #ccc;">Discover exciting opportunities to grow and make a direct impact at AKSIT GLOBAL. Whether you're a seasoned expert or a passionate learner, we have a place for you.</p>
    </div>
</section>

<section style="padding: 80px 0; background: #fafafa; min-height: 60vh;">
    <div class="container">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        
        <!-- Section Heading -->
        <div class="section-heading">
            <h2>
                @if($type === 'internship')
                    Open <span>Internship</span> Positions
                @else
                    Full-Time <span>Job</span> Openings
                @endif
            </h2>
            <hr>
        </div>

        <!-- Listings -->
        <div class="row justify-content-center">
            <div class="col-lg-9 col-md-11">
                @if($listings->isEmpty())
                    <div class="text-center py-5">
                        <h4 style="color: #555;">No openings available right now</h4>
                        <p style="color: #777;">Please check back later.</p>
                    </div>
                @else
                    @foreach($listings as $listing)
                        <div class="job-card">
                            @if($listing->badge)
                                <div class="job-type">{{ $listing->badge }}</div>
                            @endif
                            <h3>{{ $listing->title }}</h3>
                            <p class="job-desc">{{ $listing->description }}</p>
                            <a href="{{ route('apply.create', ['position' => $listing->title]) }}" class="apply-btn">Apply Now &rarr;</a>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</section>
@endsection
