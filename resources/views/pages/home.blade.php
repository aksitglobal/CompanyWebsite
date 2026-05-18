@extends('layouts.app')

@section('title', 'AKSIT GLOBAL — IT Solutions & Professional Training')
@section('description', 'AKSIT GLOBAL delivers world-class cybersecurity, cloud computing, networking, digital marketing, and professional IT training services in Pakistan.')

@section('content')
    <!-- ===== HERO SECTION ===== -->
    <section class="hero" id="home">
        <div class="hero-particles">
            <span></span><span></span><span></span>
            <span></span><span></span><span></span>
        </div>
        <div class="hero-content">
            <div class="hero-badge">🌐 Trusted IT Partner Since Day One</div>
            <h1>Empowering Your Business with <span>Global IT Solutions</span></h1>
            <p>AKSIT GLOBAL delivers cutting-edge cybersecurity, cloud computing, networking, digital marketing, and professional IT training — helping individuals and organizations thrive in the digital era.</p>
            <div class="hero-buttons">
                <a href="{{ route('courses') }}" class="btn btn-gold">Explore Courses</a>
                <a href="{{ route('contact') }}" class="btn btn-outline">Get in Touch</a>
            </div>
        </div>
    </section>

    <!-- ===== HIGHLIGHTS / INTRO ===== -->
    <section class="highlights">
        <div class="container">
            <div class="highlights-grid">
                <div class="highlight-card reveal">
                    <div class="highlight-icon"><i class="fas fa-shield-halved"></i></div>
                    <h3>Cyber Security</h3>
                    <p>Protect your digital assets with our industry-leading cybersecurity training and solutions.</p>
                    <a href="{{ route('services') }}" class="highlight-link">Learn More <i class="fas fa-arrow-right"></i></a>
                </div>
                <div class="highlight-card reveal">
                    <div class="highlight-icon"><i class="fas fa-cloud"></i></div>
                    <h3>Cloud Computing</h3>
                    <p>Master AWS, Azure, and Google Cloud with hands-on training from certified professionals.</p>
                    <a href="{{ route('courses') }}" class="highlight-link">Learn More <i class="fas fa-arrow-right"></i></a>
                </div>
                <div class="highlight-card reveal">
                    <div class="highlight-icon"><i class="fas fa-network-wired"></i></div>
                    <h3>Networking</h3>
                    <p>Cisco, Huawei & Juniper certifications — CCNA, CCNP, CCIE and more from expert trainers.</p>
                    <a href="{{ route('courses') }}" class="highlight-link">Learn More <i class="fas fa-arrow-right"></i></a>
                </div>
                <div class="highlight-card reveal">
                    <div class="highlight-icon"><i class="fas fa-bullhorn"></i></div>
                    <h3>Digital Marketing</h3>
                    <p>Grow your online presence with SEO, social media marketing, and paid advertising strategies.</p>
                    <a href="{{ route('services') }}" class="highlight-link">Learn More <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== WELCOME / ABOUT PREVIEW ===== -->
    <section class="home-about">
        <div class="container">
            <div class="about-grid">
                <div class="about-image reveal">
                    <img src="{{ asset('assets/hero-bg.jpg') }}" alt="AKSIT GLOBAL Office">
                    <div class="about-image-overlay">
                        <h3>AKSIT GLOBAL</h3>
                        <p>Your Trusted IT Solutions Partner</p>
                    </div>
                </div>
                <div class="about-text reveal">
                    <h2>Welcome to <span>AKSIT GLOBAL</span></h2>
                    <p>We are a leading IT training institute and technology solutions provider based in Rawalpindi, Pakistan. Our team of certified industry experts delivers world-class training in Cisco, Microsoft, Red Hat, AWS, and more.</p>
                    <p>Whether you're an individual looking to upskill, or a corporation seeking tailored training programs, AKSIT GLOBAL is your trusted partner for technology excellence and professional growth.</p>
                    <div class="about-stats">
                        <div class="about-stat">
                            <span class="number">500+</span>
                            <span class="label">Students Trained</span>
                        </div>
                        <div class="about-stat">
                            <span class="number">50+</span>
                            <span class="label">IT Courses</span>
                        </div>
                        <div class="about-stat">
                            <span class="number">20+</span>
                            <span class="label">Expert Trainers</span>
                        </div>
                    </div>
                    <a href="{{ route('about') }}" class="btn btn-primary" style="margin-top: 24px;">Discover Our Story</a>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== FEATURED COURSES PREVIEW ===== -->
    <section class="home-courses">
        <div class="container">
            <div class="section-title reveal">
                <h2>Popular Training Programs</h2>
                <p>Industry-recognized certifications to accelerate your IT career</p>
            </div>
            <div class="courses-grid">
                <div class="course-card reveal">
                    <div class="course-card-image">
                        <div class="course-icon"><i class="fas fa-shield-halved"></i></div>
                    </div>
                    <div class="course-card-body">
                        <h3>Cyber Security & Ethical Hacking</h3>
                        <p>Master penetration testing, vulnerability assessment, and security frameworks with real-world labs.</p>
                        <a href="{{ route('courses') }}" class="btn btn-primary">Learn More</a>
                    </div>
                </div>
                <div class="course-card reveal">
                    <div class="course-card-image">
                        <div class="course-icon"><i class="fas fa-cloud"></i></div>
                    </div>
                    <div class="course-card-body">
                        <h3>Network & Cloud Computing</h3>
                        <p>Build expertise in AWS, Azure, GCP, and master scalable cloud infrastructure management.</p>
                        <a href="{{ route('courses') }}" class="btn btn-primary">Learn More</a>
                    </div>
                </div>
                <div class="course-card reveal">
                    <div class="course-card-image">
                        <div class="course-icon"><i class="fas fa-network-wired"></i></div>
                    </div>
                    <div class="course-card-body">
                        <h3>CCNA / CCNP / CCIE</h3>
                        <p>Official Cisco training from associate to expert level — routing, switching, security, and data center.</p>
                        <a href="{{ route('courses') }}" class="btn btn-primary">Learn More</a>
                    </div>
                </div>
            </div>
            <div style="text-align: center; margin-top: 40px;">
                <a href="{{ route('courses') }}" class="btn btn-gold">View All Courses <i class="fas fa-arrow-right"></i></a>
            </div>
        </div>
    </section>

    <!-- ===== CTA BANNER ===== -->
    <section class="cta-banner">
        <div class="container">
            <div class="cta-content reveal">
                <h2>Ready to Launch Your IT Career?</h2>
                <p>Join hundreds of professionals who have transformed their careers with AKSIT GLOBAL's industry-recognized training programs.</p>
                <div class="cta-buttons">
                    <a href="{{ route('courses') }}" class="btn btn-gold">Enroll Now</a>
                    <a href="{{ route('contact') }}" class="btn btn-outline">Get a Free Consultation</a>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== WHY CHOOSE US (condensed) ===== -->
    <section class="home-why-us">
        <div class="container">
            <div class="section-title reveal">
                <h2>Why Choose AKSIT GLOBAL?</h2>
                <p>What sets us apart from the rest</p>
            </div>
            <div class="why-us-compact reveal">
                <div class="why-compact-item">
                    <i class="fas fa-user-tie"></i>
                    <h4>Industry Expert Trainers</h4>
                </div>
                <div class="why-compact-item">
                    <i class="fas fa-certificate"></i>
                    <h4>International Accreditations</h4>
                </div>
                <div class="why-compact-item">
                    <i class="fas fa-laptop-code"></i>
                    <h4>Hands-On Learning</h4>
                </div>
                <div class="why-compact-item">
                    <i class="fas fa-building"></i>
                    <h4>Corporate Programs</h4>
                </div>
                <div class="why-compact-item">
                    <i class="fas fa-clock"></i>
                    <h4>Flexible Scheduling</h4>
                </div>
                <div class="why-compact-item">
                    <i class="fas fa-star"></i>
                    <h4>Excellent Feedback</h4>
                </div>
            </div>
            <div style="text-align: center; margin-top: 30px;">
                <a href="{{ route('about') }}" class="btn btn-primary">Read More About Us</a>
            </div>
        </div>
    </section>
@endsection
