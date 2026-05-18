@extends('layouts.app')

@section('title', 'About Us — AKSIT GLOBAL')
@section('description', 'Learn about AKSIT GLOBAL — our mission, vision, and commitment to delivering world-class IT training and technology solutions in Pakistan.')

@section('content')
    <!-- PAGE HERO BANNER -->
    <section class="page-hero">
        <div class="page-hero-content">
            <h1>About <span>AKSIT GLOBAL</span></h1>
            <p>Empowering individuals and organizations with the knowledge and skills to excel in the digital world.</p>
            <div class="breadcrumb"><a href="{{ route('home') }}">Home</a> <i class="fas fa-chevron-right"></i> <span>About Us</span></div>
        </div>
    </section>

    <!-- ABOUT COMPANY -->
    <section class="about" id="about">
        <div class="container">
            <div class="about-grid">
                <div class="about-image reveal">
                    <img src="{{ asset('assets/hero-bg.jpg') }}" alt="AKSIT GLOBAL">
                    <div class="about-image-overlay">
                        <h3>AKSIT GLOBAL</h3>
                        <p>Building Pakistan's IT Future</p>
                    </div>
                </div>
                <div class="about-text reveal">
                    <h2>Who We <span>Are</span></h2>
                    <p>AKSIT GLOBAL is a premier IT training institute and technology solutions provider headquartered in Rawalpindi, Pakistan. We specialize in professional certifications and corporate IT training for some of the world's most in-demand technologies — including Cisco, Microsoft, Red Hat, AWS, Huawei, Juniper, and VMware.</p>
                    <p>Our approach combines theoretical knowledge with intensive hands-on labs, real-world projects, and mentorship from industry veterans. Whether you're launching your IT career, advancing to the next level, or seeking customized corporate training, AKSIT GLOBAL is the partner you can trust.</p>
                    <p>We pride ourselves on creating a supportive, inclusive learning environment where every student receives the attention they need to succeed. Our commitment to excellence has made us a top choice for IT education in Pakistan and beyond.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- STATS BAR -->
    <section class="stats-bar">
        <div class="container">
            <div class="stats-grid">
                <div class="stat-item reveal">
                    <span class="number">500+</span>
                    <span class="label">Students Trained</span>
                </div>
                <div class="stat-item reveal">
                    <span class="number">50+</span>
                    <span class="label">IT Courses Offered</span>
                </div>
                <div class="stat-item reveal">
                    <span class="number">20+</span>
                    <span class="label">Expert Trainers</span>
                </div>
                <div class="stat-item reveal">
                    <span class="number">95%</span>
                    <span class="label">Student Satisfaction</span>
                </div>
            </div>
        </div>
    </section>

    <!-- MISSION & VISION -->
    <section class="mission-vision">
        <div class="container">
            <div class="section-title reveal">
                <h2>Our Mission & Vision</h2>
                <p>Driving innovation and building talent for the digital future</p>
            </div>
            <div class="mv-grid">
                <div class="mv-card reveal">
                    <div class="icon"><i class="fas fa-bullseye"></i></div>
                    <h3>Our Mission</h3>
                    <p>To empower individuals and organizations with the knowledge and skills needed to excel in the rapidly evolving field of Information Technology. We are committed to providing high-quality, comprehensive, and practical IT training programs that equip our students with the latest industry-relevant skills, tools, and technologies.</p>
                    <p style="margin-top: 12px;">Our mission is to enable our students to unlock their full potential, enhance their career prospects, and contribute to the growth of the IT industry in Pakistan and beyond. We strive to deliver exceptional training experiences through experienced instructors, state-of-the-art facilities, and hands-on learning approaches.</p>
                </div>
                <div class="mv-card reveal">
                    <div class="icon"><i class="fas fa-eye"></i></div>
                    <h3>Our Vision</h3>
                    <p>To become a globally recognized leader in IT education and technology solutions, shaping the next generation of IT professionals through world-class training aligned with the latest industry trends and market demands.</p>
                    <p style="margin-top: 12px;">We envision a future where every aspiring IT professional in Pakistan has access to the same quality of education and certification that the world's best institutions offer — delivered locally with global standards, by trainers who have walked the path themselves.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- WHY CHOOSE US (FULL) -->
    <section class="why-us">
        <div class="container">
            <div class="section-title reveal">
                <h2>Why Choose AKSIT GLOBAL</h2>
                <p>10 reasons that set us apart from the rest</p>
            </div>
            <div class="why-us-grid">
                @php
                    $reasons = [
                        ['num' => 1, 'title' => 'Excellent Feedback', 'desc' => 'Consistently rated highly by our students and corporate clients for quality and impact.'],
                        ['num' => 2, 'title' => 'Industry Expert Trainers', 'desc' => 'Learn from certified professionals with years of real-world industry experience.'],
                        ['num' => 3, 'title' => 'Strong Knowledgebase', 'desc' => 'Comprehensive learning resources, documentation, and lab environments for every course.'],
                        ['num' => 4, 'title' => 'Superior Course Designs', 'desc' => 'Curricula designed to match the latest industry standards and job market demands.'],
                        ['num' => 5, 'title' => 'Comprehensive Training Choices', 'desc' => '50+ courses spanning networking, security, cloud, development, DevOps, and more.'],
                        ['num' => 6, 'title' => 'Experience Tells All', 'desc' => 'Years of proven expertise delivering high-quality IT education and corporate solutions.'],
                        ['num' => 7, 'title' => 'International Accreditations', 'desc' => 'Globally recognized certifications from Cisco, Microsoft, Red Hat, AWS, and more.'],
                        ['num' => 8, 'title' => 'Higher Availability', 'desc' => 'Flexible scheduling with online and on-campus options to fit your busy lifestyle.'],
                        ['num' => 9, 'title' => 'Client-Specific Programs', 'desc' => "Tailored corporate training solutions designed to meet your organization's unique needs."],
                        ['num' => 10, 'title' => 'Continuing Education Credits', 'desc' => 'Earn professional development credits recognized across the IT industry.'],
                    ];
                @endphp
                @foreach($reasons as $reason)
                <div class="why-us-item reveal">
                    <div class="num">{{ $reason['num'] }}</div>
                    <div>
                        <h4>{{ $reason['title'] }}</h4>
                        <p>{{ $reason['desc'] }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- CTA -->
    <section class="cta-banner">
        <div class="container">
            <div class="cta-content reveal">
                <h2>Ready to Transform Your IT Career?</h2>
                <p>Join a community of successful IT professionals who started their journey with AKSIT GLOBAL.</p>
                <div class="cta-buttons">
                    <a href="{{ route('courses') }}" class="btn btn-gold">Browse Courses</a>
                    <a href="{{ route('contact') }}" class="btn btn-outline">Contact Us Today</a>
                </div>
            </div>
        </div>
    </section>
@endsection
