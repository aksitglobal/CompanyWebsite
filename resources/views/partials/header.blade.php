<!-- ===== HEADER / NAVBAR ===== -->
<header class="header" id="header">
    <div class="container">
        <a href="{{ route('home') }}" class="logo">
            <img src="{{ asset('assets/logo.jpg') }}" alt="AKSIT GLOBAL Logo">
        </a>
        <nav class="nav-menu" id="navMenu">
            <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Home</a>
            <a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'active' : '' }}">About</a>
            <a href="{{ route('services') }}" class="{{ request()->routeIs('services') ? 'active' : '' }}">Services</a>
            <a href="{{ route('it-solutions') }}" class="{{ request()->routeIs('it-solutions') ? 'active' : '' }}">IT Solutions</a>
            <style>
                .nav-dropdown { position: relative; display: inline-block; }
                .nav-dropdown-content { display: none; position: absolute; background-color: #1a1a1a; min-width: 160px; box-shadow: 0px 8px 16px rgba(0,0,0,0.5); z-index: 1000; border-radius: 6px; top: 100%; left: 0; overflow: hidden; border: 1px solid #333; }
                .nav-dropdown-content a { color: #fff !important; padding: 12px 16px !important; text-decoration: none; display: block; font-size: 14px; margin: 0 !important; }
                .nav-dropdown-content a:hover { background-color: #facc15 !important; color: #111 !important; }
                .nav-dropdown:hover .nav-dropdown-content { display: block; }
            </style>
            <div class="nav-dropdown">
                <a href="{{ route('career', ['type' => 'internship']) }}" class="{{ request()->routeIs('career') ? 'active' : '' }}" style="cursor: pointer;">Career ▾</a>
                <div class="nav-dropdown-content">
                    <a href="{{ route('career', ['type' => 'internship']) }}">Internship</a>
                    <a href="{{ route('career', ['type' => 'job']) }}">Job</a>
                </div>
            </div>
            <a href="{{ route('courses') }}" class="{{ request()->routeIs('courses') ? 'active' : '' }}">Courses</a>
            <a href="{{ route('blog') }}" class="{{ request()->routeIs('blog') || request()->routeIs('blog.show') ? 'active' : '' }}">Blog</a>
            <a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'active' : '' }}">Contact</a>
        </nav>
        <div class="hamburger" id="hamburger">
            <span></span><span></span><span></span>
        </div>
    </div>
</header>
<div class="nav-overlay" id="navOverlay"></div>
