@extends('layouts.app')

@section('title', 'AKSIT GLOBAL — IT Solutions, Networking, Cybersecurity & Digital Transformation')
@section('description', 'AKSIT GLOBAL is a leading IT Solutions company delivering cybersecurity, managed IT services, cloud infrastructure, network design, and digital transformation for businesses in Pakistan.')

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
            <p>AKSIT GLOBAL is your enterprise technology partner — delivering cybersecurity, cloud infrastructure,
                managed IT services, network design, and digital transformation for businesses that demand excellence.</p>
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

    <!-- ===== CORE SERVICES ===== -->
    <section class="home-core-services">
        <div class="container">
            <div class="section-title reveal">
                <h2>Our Core IT Services</h2>
                <p>End-to-end technology solutions designed to transform and secure your business</p>
            </div>
            <div class="core-services-grid">
                <div class="core-service-card reveal">
                    <div class="cs-icon-wrap" style="background: linear-gradient(135deg, #1e3a6e, #2563eb);">
                        <i class="fas fa-shield-halved"></i>
                    </div>
                    <h3>Cybersecurity Solutions</h3>
                    <p>Comprehensive security assessments, threat monitoring, firewall management, penetration testing,
                        and incident response to protect your business assets.</p>
                    <a href="{{ route('services') }}" class="cs-link">Explore Service <i class="fas fa-arrow-right"></i></a>
                </div>
                <div class="core-service-card reveal">
                    <div class="cs-icon-wrap" style="background: linear-gradient(135deg, #7c3aed, #a78bfa);">
                        <i class="fas fa-server"></i>
                    </div>
                    <h3>Managed IT Services</h3>
                    <p>Proactive monitoring, maintenance, and support for your entire IT environment — so your team
                        can focus on what matters most.</p>
                    <a href="{{ route('services') }}" class="cs-link">Explore Service <i class="fas fa-arrow-right"></i></a>
                </div>
                <div class="core-service-card reveal">
                    <div class="cs-icon-wrap" style="background: linear-gradient(135deg, #0369a1, #38bdf8);">
                        <i class="fas fa-cloud"></i>
                    </div>
                    <h3>Cloud Infrastructure & Migration</h3>
                    <p>Strategic cloud planning, migration to AWS, Azure & hybrid environments, with ongoing
                        optimization and cost management.</p>
                    <a href="{{ route('services') }}" class="cs-link">Explore Service <i class="fas fa-arrow-right"></i></a>
                </div>
                <div class="core-service-card reveal">
                    <div class="cs-icon-wrap" style="background: linear-gradient(135deg, #059669, #34d399);">
                        <i class="fas fa-network-wired"></i>
                    </div>
                    <h3>Network Infrastructure Design</h3>
                    <p>Enterprise LAN/WAN design, SD-WAN deployment, structured cabling, wireless solutions,
                        and network performance optimization.</p>
                    <a href="{{ route('services') }}" class="cs-link">Explore Service <i class="fas fa-arrow-right"></i></a>
                </div>
                <div class="core-service-card reveal">
                    <div class="cs-icon-wrap" style="background: linear-gradient(135deg, #b45309, #fbbf24);">
                        <i class="fas fa-cubes"></i>
                    </div>
                    <h3>Business Software & System Integration</h3>
                    <p>ERP, CRM, and custom software implementation with seamless integration across your existing
                        systems and workflows.</p>
                    <a href="{{ route('services') }}" class="cs-link">Explore Service <i class="fas fa-arrow-right"></i></a>
                </div>
                <div class="core-service-card reveal">
                    <div class="cs-icon-wrap" style="background: linear-gradient(135deg, #be185d, #f472b6);">
                        <i class="fas fa-bullhorn"></i>
                    </div>
                    <h3>Digital Marketing & Social Media</h3>
                    <p>Data-driven digital marketing, SEO, paid advertising, and social media management to grow
                        your brand and generate quality leads.</p>
                    <a href="{{ route('services') }}" class="cs-link">Explore Service <i class="fas fa-arrow-right"></i></a>
                </div>
                <div class="core-service-card reveal">
                    <div class="cs-icon-wrap" style="background: linear-gradient(135deg, #0f766e, #2dd4bf);">
                        <i class="fas fa-lightbulb"></i>
                    </div>
                    <h3>IT Consultancy & Digital Transformation</h3>
                    <p>Strategic advisory services to modernize your operations, adopt emerging technologies, and
                        achieve long-term digital competitiveness.</p>
                    <a href="{{ route('services') }}" class="cs-link">Explore Service <i class="fas fa-arrow-right"></i></a>
                </div>
                <div class="core-service-card reveal">
                    <div class="cs-icon-wrap" style="background: linear-gradient(135deg, #dc2626, #f87171);">
                        <i class="fas fa-graduation-cap"></i>
                    </div>
                    <h3>Professional IT Training</h3>
                    <p>Industry-recognized certifications in Cisco, Microsoft, AWS, cybersecurity and more — upskill
                        your workforce or individual talent.</p>
                    <a href="{{ route('courses') }}" class="cs-link">View Courses <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>
            <div style="text-align: center; margin-top: 48px;">
                <a href="{{ route('services') }}" class="btn btn-primary">View All Services <i class="fas fa-arrow-right"></i></a>
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

    <!-- ===== TECHNOLOGY PARTNERS ===== -->
    <section class="tech-partners">
        <div class="container">
            <div class="section-title reveal">
                <h2>Technology Partners & Platforms</h2>
                <p>We partner with the world's leading technology vendors to deliver best-in-class solutions</p>
            </div>
            <div class="partners-grid reveal">
                <div class="partner-badge">
                    <i class="fas fa-network-wired" style="color:#1ba0d8;"></i>
                    <span>Cisco</span>
                </div>
                <div class="partner-badge">
                    <i class="fas fa-briefcase" style="color:#008fd3;"></i>
                    <span>SAP Ariba</span>
                </div>
                <div class="partner-badge">
                    <i class="fas fa-graduation-cap" style="color:#1ba0d8;"></i>
                    <span>Cisco Networking Academy</span>
                </div>
            </div>
        </div>
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