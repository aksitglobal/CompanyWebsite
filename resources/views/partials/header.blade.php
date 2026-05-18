<!-- ===== HEADER / NAVBAR ===== -->
<header class="header" id="header">
    <div class="container">
        <a href="{{ route('home') }}" class="logo">
            <img src="{{ asset('assets/logo.jpg') }}" alt="AKSIT GLOBAL Logo">
        </a>
        <nav class="nav-menu" id="navMenu">
            <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Home</a>
            <a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'active' : '' }}">About</a>
            <a href="{{ route('courses') }}" class="{{ request()->routeIs('courses') ? 'active' : '' }}">Courses</a>
            <a href="{{ route('services') }}" class="{{ request()->routeIs('services') ? 'active' : '' }}">Services</a>
            <a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'active' : '' }}">Contact</a>
        </nav>
        <div class="hamburger" id="hamburger">
            <span></span><span></span><span></span>
        </div>
    </div>
</header>
<div class="nav-overlay" id="navOverlay"></div>
