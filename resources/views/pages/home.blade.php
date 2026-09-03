@extends('layouts.app')

@section('title', 'AKSIT GLOBAL — IT Solutions, Networking, Cybersecurity & Digital Transformation')
@section('description', 'AKSIT GLOBAL is a leading IT Solutions company delivering cybersecurity, managed IT services, cloud infrastructure, network design, and digital transformation for businesses in Pakistan.')

@push('styles')
<style>
/* ============================================================
   HOME PAGE — Self-contained styles (travels with this file)
   ============================================================ */

/* === TRUST BAR === */
.trust-bar {
    background: var(--primary, #1a2d5a);
    padding: 22px 0;
    border-bottom: 3px solid rgba(201,168,76,0.4);
}
.trust-bar-grid {
    display: flex !important;
    flex-direction: row !important;
    align-items: center;
    justify-content: center;
    flex-wrap: wrap;
    gap: 0;
    list-style: none;
    margin: 0;
    padding: 0;
}
.trust-item {
    display: flex !important;
    flex-direction: row !important;
    align-items: center;
    gap: 10px;
    color: rgba(255,255,255,0.9);
    font-size: 0.875rem;
    font-weight: 600;
    padding: 8px 28px;
    letter-spacing: 0.3px;
    white-space: nowrap;
}
.trust-item i {
    color: #e0c96e;
    font-size: 1.1rem;
}
.trust-divider {
    display: block;
    width: 1px;
    height: 28px;
    background: rgba(255,255,255,0.2);
    flex-shrink: 0;
}

/* === CAROUSEL (Technology Partners) === */
@keyframes scroll {
    0%   { transform: translateX(0); }
    100% { transform: translateX(-50%); }
}
.partners-carousel-wrap {
    overflow: hidden;
    position: relative;
    /* fade left/right edges */
    mask-image: linear-gradient(to right, transparent 0%, black 10%, black 90%, transparent 100%);
    -webkit-mask-image: linear-gradient(to right, transparent 0%, black 10%, black 90%, transparent 100%);
}
.carousel-track {
    display: flex;
    align-items: center;
    gap: 48px;
    width: max-content;
    animation: scroll 10s linear infinite;
}
.carousel-track:hover {
    animation-play-state: paused;
}
.carousel-logo {
    height: 162px;
    width: auto;
    display: block;
    flex-shrink: 0;
    object-fit: contain;
    filter: grayscale(30%);
    opacity: 0.85;
    transition: filter 0.3s, opacity 0.3s;
}
.carousel-logo:hover {
    filter: grayscale(0%);
    opacity: 1;
}

/* === WHY BUSINESSES CHOOSE US === */
.home-why-us {
    padding: 90px 0;
    background: #0f1d3d;
    position: relative;
    overflow: hidden;
}
.home-why-us::before {
    content: '';
    position: absolute; inset: 0;
    background: url('../assets/hero-bg.jpg') center center / cover no-repeat;
    opacity: 0.08;
}
.home-why-us .container { position: relative; z-index: 1; }
.home-why-us .section-title h2 { color: #ffffff; }
.home-why-us .section-title p { color: rgba(255,255,255,0.6); }
.why-biz-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 24px;
}
.why-biz-card {
    background: rgba(255,255,255,0.06);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255,255,255,0.1);
    border-radius: 16px;
    padding: 32px 28px;
    transition: all 0.3s cubic-bezier(0.4,0,0.2,1);
    color: #ffffff;
}
.why-biz-card:hover {
    background: rgba(255,255,255,0.11);
    transform: translateY(-6px);
    border-color: rgba(201,168,76,0.4);
    box-shadow: 0 12px 40px rgba(0,0,0,0.3);
}
.why-biz-icon {
    width: 60px; height: 60px;
    border-radius: 14px;
    background: linear-gradient(135deg, rgba(37,99,235,0.25), rgba(201,168,76,0.15));
    display: flex; align-items: center; justify-content: center;
    font-size: 1.5rem; color: #e0c96e;
    margin-bottom: 18px;
    transition: all 0.3s cubic-bezier(0.4,0,0.2,1);
}
.why-biz-card:hover .why-biz-icon {
    background: linear-gradient(135deg, #2563eb, #c9a84c);
    transform: scale(1.1);
}
.why-biz-card h4 {
    font-size: 1.05rem; font-weight: 700;
    margin-bottom: 10px; color: #ffffff;
}
.why-biz-card p {
    font-size: 0.88rem;
    color: rgba(255,255,255,0.65);
    line-height: 1.7;
}

/* === TECHNOLOGY PARTNERS === */
.tech-partners {
    padding: 80px 0;
    background: #ffffff;
}

/* === TRAINING SECONDARY === */
.training-secondary {
    padding: 60px 0;
    background: #f4f6fa;
    border-top: 1px solid #e5e7eb;
}
.training-sec-inner {
    display: flex;
    align-items: center;
    gap: 30px;
    background: #ffffff;
    border-radius: 16px;
    padding: 36px 40px;
    box-shadow: 0 4px 20px rgba(0,0,0,0.1);
    border-left: 5px solid #2563eb;
}
.training-sec-icon {
    width: 70px; height: 70px;
    border-radius: 16px;
    background: linear-gradient(135deg, rgba(37,99,235,0.1), rgba(37,99,235,0.04));
    display: flex; align-items: center; justify-content: center;
    font-size: 2rem; color: #2563eb;
    flex-shrink: 0;
}
.training-sec-text { flex: 1; }
.training-sec-text h3 {
    font-size: 1.2rem; font-weight: 800;
    color: #1a2d5a; margin-bottom: 8px;
}
.training-sec-text p {
    font-size: 0.92rem; color: #6b7280; line-height: 1.7;
}
.training-sec-btn { flex-shrink: 0; white-space: nowrap; }

/* === RESPONSIVE === */
@media (max-width: 1024px) {
    .why-biz-grid { grid-template-columns: repeat(2, 1fr); }
    .trust-divider { display: none !important; }
    .trust-item { padding: 8px 18px; }
}
@media (max-width: 768px) {
    .why-biz-grid { grid-template-columns: 1fr; }
    .trust-bar-grid { justify-content: flex-start; }
    .trust-item { font-size: 0.8rem; padding: 6px 12px; }
    .carousel-track { gap: 28px; }
    .carousel-logo { height: 119px; }
    .training-sec-inner { flex-direction: column; text-align: center; }
    .training-sec-icon { margin: 0 auto; }
}
</style>
@endpush

@section('content')
    <!-- ===== HERO SECTION ===== -->
    <section class="hero" id="home">
        <div class="hero-particles">
            <span></span><span></span><span></span>
            <span></span><span></span><span></span>
        </div>
        <div class="hero-content">
            @if(isset($activeNews) && $activeNews->count() > 0)
                <marquee behavior="scroll" direction="left"
                    style="color: white; background: rgba(0,0,0,0.4); padding: 8px 15px; margin-bottom: 15px; border-radius: 20px; font-size: 15px; font-weight: 500; max-width: 600px; margin-left: auto; margin-right: auto; backdrop-filter: blur(5px);">
                    @foreach($activeNews as $news)
                        {{ $news->news_text }} @if(!$loop->last) &nbsp;&nbsp;⭐&nbsp;&nbsp; @endif
                    @endforeach
                </marquee>
            @endif
            <div class="hero-badge">🔒 Trusted IT Solutions Partner</div>
            <h1>Empowering Businesses Through <span>Secure, Scalable & Innovative</span> IT Solutions</h1>
            <p>AKSIT GLOBAL is your enterprise technology partner — delivering managed IT services, network design,
                digital transformation, cybersecurity, and cloud infrastructure for businesses that demand excellence.</p>
            <div class="hero-buttons">
                <a href="{{ route('services') }}" class="btn btn-gold">Our IT Services</a>
            </div>
        </div>
    </section>

    <!-- ===== TRUST BAR ===== -->
    <section class="trust-bar">
        <div class="container">
            <div class="trust-bar-grid">
                <div class="trust-item">
                    <i class="fas fa-shield-halved"></i>
                    <span>Certified Cybersecurity Experts</span>
                </div>
                <div class="trust-divider"></div>
                <div class="trust-item">
                    <i class="fas fa-network-wired"></i>
                    <span>Enterprise Networking Specialists</span>
                </div>
                <div class="trust-divider"></div>
                <div class="trust-item">
                    <i class="fas fa-cloud"></i>
                    <span>Multi-Cloud Solutions</span>
                </div>
                <div class="trust-divider"></div>
                <div class="trust-item">
                    <i class="fas fa-headset"></i>
                    <span>24/7 Technical Support</span>
                </div>
                <div class="trust-divider"></div>
                <div class="trust-item">
                    <i class="fas fa-handshake"></i>
                    <span>100+ Business Clients</span>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== ABOUT PREVIEW ===== -->
    <section class="home-about">
        <div class="container">
            <div class="about-grid">
                <div class="about-image reveal">
                    <img src="{{ asset('assets/hero-bg.jpg') }}" alt="AKSIT GLOBAL IT Operations Center">
                    <div class="about-image-overlay">
                        <h3>AKSIT GLOBAL</h3>
                        <p>Your Trusted Enterprise IT Partner</p>
                    </div>
                </div>
                <div class="about-text reveal">
                    <h2>A Trusted Name in <span>Enterprise IT Solutions</span></h2>
                    <p>Based in Rawalpindi, Pakistan, AKSIT GLOBAL is a professional IT Solutions and Technology
                        Services company serving businesses across industries. Our team of certified engineers and
                        technology specialists design, deploy, and manage complex IT infrastructures that drive
                        real business results.</p>
                    <p>From securing enterprise networks to migrating workloads to the cloud, we bring deep
                        expertise and proven methodologies to every engagement — ensuring your technology investments
                        deliver maximum value.</p>
                    <div class="about-stats">
                        <div class="about-stat">
                            <span class="number">100+</span>
                            <span class="label">Business Clients</span>
                        </div>
                        <div class="about-stat">
                            <span class="number">10+</span>
                            <span class="label">Years Experience</span>
                        </div>
                        <div class="about-stat">
                            <span class="number">99%</span>
                            <span class="label">Client Retention</span>
                        </div>
                    </div>
                    <a href="{{ route('about') }}" class="btn btn-primary" style="margin-top: 24px;">Discover Our Story</a>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== WHY BUSINESSES CHOOSE US ===== -->
    <section class="home-why-us">
        <div class="container">
            <div class="section-title reveal">
                <h2>Why Businesses Choose AKSIT GLOBAL</h2>
                <p>We deliver measurable results through certified expertise and enterprise-grade methodologies</p>
            </div>
            <div class="why-biz-grid">
                <div class="why-biz-card reveal">
                    <div class="why-biz-icon">
                        <i class="fas fa-user-shield"></i>
                    </div>
                    <h4>Certified Engineers</h4>
                    <p>Our team holds industry certifications from Cisco, Microsoft, AWS, CompTIA, and more — ensuring
                        best-practice delivery on every project.</p>
                </div>
                <div class="why-biz-card reveal">
                    <div class="why-biz-icon">
                        <i class="fas fa-network-wired"></i>
                    </div>
                    <h4>Enterprise Networking Expertise</h4>
                    <p>Deep experience in designing and managing complex networks for enterprises, data centers,
                        and multi-site organizations.</p>
                </div>
                <div class="why-biz-card reveal">
                    <div class="why-biz-icon">
                        <i class="fas fa-lock"></i>
                    </div>
                    <h4>Cybersecurity Specialists</h4>
                    <p>Dedicated security professionals who protect your business with proactive threat intelligence,
                        vulnerability management, and compliance support.</p>
                </div>
                <div class="why-biz-card reveal">
                    <div class="why-biz-icon">
                        <i class="fas fa-cloud-upload-alt"></i>
                    </div>
                    <h4>Cloud Solutions</h4>
                    <p>Proven expertise in multi-cloud and hybrid cloud deployments across AWS, Microsoft Azure,
                        and Google Cloud Platform.</p>
                </div>
                <div class="why-biz-card reveal">
                    <div class="why-biz-icon">
                        <i class="fas fa-headset"></i>
                    </div>
                    <h4>24/7 Technical Support</h4>
                    <p>Round-the-clock monitoring and rapid-response support to keep your systems running with
                        minimal downtime and maximum efficiency.</p>
                </div>
                <div class="why-biz-card reveal">
                    <div class="why-biz-icon">
                        <i class="fas fa-cogs"></i>
                    </div>
                    <h4>Customized Business Solutions</h4>
                    <p>We don't believe in one-size-fits-all. Every solution we deliver is tailored to your unique
                        business goals, scale, and budget.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== TECHNOLOGY PARTNERS (auto-scroll carousel) ===== -->
    <section class="tech-partners">
        <div class="container">
            <div class="section-title reveal">
                <h2>Technology Partners &amp; Platforms</h2>
                <p>We partner with the world's leading technology vendors to deliver best-in-class solutions</p>
            </div>
        </div>

        @if(isset($partnerLogos) && $partnerLogos->count() > 0)
            {{-- Duplicate the list so the -50% loop lands on an identical frame --}}
            @php $items = $partnerLogos->values(); @endphp
            <div class="partners-carousel-wrap mt-4">
                <div class="carousel-track">
                    @foreach($items as $logo)
                        <img src="{{ asset('storage/' . $logo->logo_path) }}"
                             alt="{{ $logo->name }}"
                             class="carousel-logo"
                             title="{{ $logo->name }}">
                    @endforeach
                    {{-- Duplicate set for seamless loop --}}
                    @foreach($items as $logo)
                        <img src="{{ asset('storage/' . $logo->logo_path) }}"
                             alt="{{ $logo->name }}"
                             class="carousel-logo"
                             title="{{ $logo->name }}">
                    @endforeach
                </div>
            </div>
        @else
            <div class="text-center py-4 text-muted">
                <i class="fas fa-handshake fa-2x mb-2"></i>
                <p class="mb-0">Partners logos coming soon</p>
            </div>
        @endif
    </section>

    <!-- ===== CTA BANNER ===== -->
    <section class="cta-banner">
        <div class="container">
            <div class="cta-content reveal">
                <h2>Ready to Transform Your Business Technology?</h2>
                <p>Talk to our certified IT experts and discover how AKSIT GLOBAL can secure, optimize, and scale
                    your IT infrastructure — starting with a free consultation.</p>
                <div class="cta-buttons">
                    <a href="{{ route('contact') }}" class="btn btn-gold">Get Free Consultation</a>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== TRAINING AS SECONDARY CTA ===== -->
    <section class="training-secondary">
        <div class="container">
            <div class="training-sec-inner reveal">
                <div class="training-sec-icon">
                    <i class="fas fa-graduation-cap"></i>
                </div>
                <div class="training-sec-text">
                    <h3>Also Offering Professional IT Training & Certifications</h3>
                    <p>Empower your team or advance your own IT career with industry-recognized training programs
                        in Cisco, Microsoft, AWS, Cybersecurity, Cloud Computing, and Digital Marketing.</p>
                </div>
                <a href="{{ route('courses') }}" class="btn btn-primary training-sec-btn">View Training Programs</a>
            </div>
        </div>
    </section>

    <!-- ===== JOBS SECTION ===== -->
    <section id="jobs"></section>
@endsection