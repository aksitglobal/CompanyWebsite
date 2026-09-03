@extends('layouts.app')

@section('title', 'System Solutions — AKSIT GLOBAL')
@section('description', 'AKSIT GLOBAL offers comprehensive system solutions including infrastructure, storage, cloud modernisation, database, security, collaboration, and specialised enterprise platforms.')

@section('content')

<section class="page-hero">
    <div class="page-hero-glow"></div>
    <div class="container">
        <div class="page-hero-content">
            <h1>System Solutions</h1>
            <p>Comprehensive IT system solutions to modernise and secure your enterprise infrastructure.</p>
        </div>
    </div>
</section>

<section class="ns-section">
    <div class="container">
        <div class="ns-grid">

            <!-- 1. Infrastructure -->
            <div class="ns-card">
                <div class="ns-icon">
                    <i class="fas fa-server"></i>
                </div>
                <h3>Infrastructure</h3>
                <p>End-to-end enterprise infrastructure solutions covering compute, networking, and physical plant to build a resilient and scalable IT foundation.</p>
            </div>

            <!-- 2. Storage and Data Protection -->
            <div class="ns-card">
                <div class="ns-icon">
                    <i class="fas fa-hdd"></i>
                </div>
                <h3>Storage and Data Protection</h3>
                <p>SAN, NAS, and object storage solutions combined with robust data protection strategies to safeguard your critical business information.</p>
            </div>

            <!-- 3. Collaboration and Business Platform Solutions -->
            <div class="ns-card">
                <div class="ns-icon">
                    <i class="fas fa-users"></i>
                </div>
                <h3>Collaboration and Business Platform Solutions</h3>
                <p>Unified communications, productivity suites, and business platform integrations that empower teams to work efficiently from anywhere.</p>
            </div>

            <!-- 4. Data Base and Application -->
            <div class="ns-card">
                <div class="ns-icon">
                    <i class="fas fa-database"></i>
                </div>
                <h3>Data Base and Application</h3>
                <p>Database administration and enterprise application hosting solutions designed for high performance, availability, and seamless scalability.</p>
            </div>

            <!-- 5. Cloud and Modernization -->
            <div class="ns-card">
                <div class="ns-icon">
                    <i class="fas fa-cloud-upload-alt"></i>
                </div>
                <h3>Cloud and Modernization</h3>
                <p>Public, private, and hybrid cloud adoption alongside legacy modernisation to accelerate digital transformation and reduce operational overhead.</p>
            </div>

            <!-- 6. Security -->
            <div class="ns-card">
                <div class="ns-icon">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <h3>Security</h3>
                <p>Comprehensive IT security solutions — endpoint protection, identity management, SIEM, and compliance frameworks — to defend your enterprise at every layer.</p>
            </div>

            <!-- 7. Business Continuity and Availability -->
            <div class="ns-card">
                <div class="ns-icon">
                    <i class="fas fa-sync-alt"></i>
                </div>
                <h3>Business Continuity and Availability</h3>
                <p>Disaster recovery planning, high-availability architectures, and failover solutions that keep your operations running through any disruption.</p>
            </div>

            <!-- 8. Specialized Enterprise -->
            <div class="ns-card">
                <div class="ns-icon">
                    <i class="fas fa-building"></i>
                </div>
                <h3>Specialized Enterprise</h3>
                <p>Tailored enterprise IT solutions for vertical-specific requirements — including ERP integration, mission-critical platforms, and custom infrastructure deployments.</p>
            </div>

        </div>

        <div style="text-align: center; margin-top: 60px;">
            <a href="{{ route('contact') }}" class="btn btn-primary">Get in Touch</a>
        </div>
    </div>
</section>

@endsection
