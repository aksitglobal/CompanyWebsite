<!-- ===== HEADER / NAVBAR ===== -->
<header class="header" id="header">
    <div class="container">
        <a href="{{ route('home') }}" class="logo">
            <img src="{{ asset('assets/logo.jpg') }}" alt="AKSIT GLOBAL Logo">
        </a>
        <nav class="nav-menu" id="navMenu">
            <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Home</a>
            <a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'active' : '' }}">About</a>

            {{-- Services & Solutions dropdown --}}
            <style>
                .nav-dropdown { position: relative; display: inline-block; }
                .nav-dropdown-content { display: none; position: absolute; background-color: #1a1a1a; min-width: 300px; box-shadow: 0px 8px 16px rgba(0,0,0,0.5); z-index: 1000; border-radius: 6px; top: 100%; left: 0; overflow: visible; border: 1px solid #333; }
                .nav-dropdown-content a { color: #fff !important; padding: 10px 16px !important; text-decoration: none; display: block; font-size: 13px; margin: 0 !important; white-space: nowrap; }
                .nav-dropdown-content a:hover { background-color: #facc15 !important; color: #111 !important; }
                .nav-dropdown:hover > .nav-dropdown-content { display: block; }
                /* Sub-dropdown */
                .nav-sub-dropdown { position: relative; }
                .nav-sub-dropdown > a { display: flex !important; justify-content: space-between; align-items: center; }
                .nav-sub-dropdown > a::after { content: '▶'; font-size: 10px; margin-left: 8px; flex-shrink: 0; }
                .nav-sub-content { display: none; position: absolute; left: 100%; top: 0; background-color: #222; min-width: 280px; border: 1px solid #444; border-radius: 6px; box-shadow: 4px 8px 20px rgba(0,0,0,0.5); z-index: 1001; }
                .nav-sub-content a { color: #fff !important; padding: 10px 16px !important; display: block; font-size: 13px; white-space: nowrap; }
                .nav-sub-content a:hover { background-color: #facc15 !important; color: #111 !important; }
                .nav-sub-dropdown:hover .nav-sub-content { display: block; }
                /* Blinking red background for featured item */
                @keyframes blinkBackground {
                    0%, 100% { background-color: #cc0000; }
                    50% { background-color: transparent; }
                }
                .blink-red {
                    animation: blinkBackground 1s infinite;
                    color: white !important;
                    font-weight: bold;
                }
            </style>

            <div class="nav-dropdown">
                <a href="#"
                   class="{{ request()->routeIs('services') || request()->routeIs('it-solutions') || request()->routeIs('service.page') ? 'active' : '' }}"
                   style="cursor: pointer;">Services &amp; Solutions ▾</a>
                <div class="nav-dropdown-content">
                    <a href="{{ route('service.page', 'complete-it-infrastructure-transformation') }}" class="blink-red">Complete IT Infrastructure Transformation</a>

                    {{-- SLAs sub-dropdown --}}
                    <div class="nav-sub-dropdown">
                        <a href="#">Service Level Agreements (SLAs)</a>
                        <div class="nav-sub-content">
                            <a href="{{ route('service.page', 'corporate-ict-service-maintenance') }}">Corporate IT / ICT Service &amp; Maintenance</a>
                            <a href="{{ route('service.page', 'infrastructure-as-a-service') }}">Complete Maintenance of Infrastructure as a Service (IaaS)</a>
                            <a href="{{ route('service.page', 'network-as-a-service') }}">Complete Maintenance of Network as a Service (NaaS)</a>
                        </div>
                    </div>

                    <a href="{{ route('service.page', 'data-centre-solutions') }}">Data Centre Solutions</a>
                    <a href="{{ route('service.page', 'network-operations-centre') }}">Network Operations Centre / NOC</a>
                    <a href="{{ route('service.page', 'enterprise-cyber-security') }}">Enterprise Cyber Security &amp; Threat Protection</a>
                    <a href="{{ route('service.page', 'enterprise-wireless-solutions') }}">Enterprise Wireless Solutions</a>
                    <a href="{{ route('service.page', 'enterprise-video-surveillance') }}">Enterprise Video Surveillance Systems (VSS)</a>
                    <a href="{{ route('service.page', 'enterprise-voice-solutions') }}">Enterprise Voice Solutions</a>
                    <a href="{{ route('service.page', 'it-training-internship') }}">IT Training &amp; Internship Programs</a>
                    <a href="{{ route('service.page', 'tender-project-execution') }}">Tender Participation &amp; Project Execution</a>
                    <a href="{{ route('service.page', 'cloud-data-center-solutions') }}">Cloud &amp; Data Center Solutions</a>
                    <a href="{{ route('service.page', 'backup-storage-disaster-recovery') }}">Backup, Storage &amp; Disaster Recovery</a>
                    <a href="{{ route('service.page', 'ai-automation-intelligent-operations') }}">AI, Automation &amp; Intelligent Operations</a>
                    <a href="{{ route('service.page', 'it-outsourcing-managed-solutions') }}">IT Outsourcing &amp; Managed Solutions</a>
                    <a href="{{ route('service.page', 'network-infrastructure-design') }}">Network Infrastructure Design</a>
                </div>
            </div>

            <div class="nav-dropdown">
                <a href="{{ route('career', ['type' => 'internship']) }}" class="{{ request()->routeIs('career') ? 'active' : '' }}" style="cursor: pointer;">Career ▾</a>
                <div class="nav-dropdown-content">
                    <a href="{{ route('career', ['type' => 'internship']) }}">Internship</a>
                    <a href="{{ route('career', ['type' => 'job']) }}">Job</a>
                </div>
            </div>
            <div class="nav-dropdown">
                <a href="{{ route('courses') }}" class="{{ request()->routeIs('courses') || request()->routeIs('fee-structure') || request()->routeIs('class-schedule') ? 'active' : '' }}" style="cursor: pointer;">Courses ▾</a>
                <div class="nav-dropdown-content">
                    <a href="{{ route('courses') }}">Our Courses</a>
                    <a href="{{ route('fee-structure') }}">Fee Structure</a>
                    <a href="{{ route('class-schedule') }}">Class Schedule</a>
                </div>
            </div>
            <a href="{{ route('blog') }}" class="{{ request()->routeIs('blog') || request()->routeIs('blog.show') ? 'active' : '' }}">Blog</a>
            <a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'active' : '' }}">Contact</a>
        </nav>
        <div class="hamburger" id="hamburger">
            <span></span><span></span><span></span>
        </div>
    </div>
</header>
<div class="nav-overlay" id="navOverlay"></div>
