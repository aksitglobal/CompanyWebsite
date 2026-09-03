<!-- ===== HEADER / NAVBAR ===== -->
<header class="header" id="header">
    <div class="container">
        <a href="{{ route('home') }}" class="logo">
            <img src="{{ asset('assets/logo.jpg') }}" alt="AKSIT GLOBAL Logo">
        </a>
        <nav class="nav-menu" id="navMenu">
            <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Home</a>
            <a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'active' : '' }}">About</a>

            {{-- ===== Services Dropdown ===== --}}
            <div class="nav-dropdown">
                <a href="#"
                   class="nav-dropdown-toggle {{ request()->routeIs('services') || request()->routeIs('network-services') || request()->routeIs('system-services') ? 'active' : '' }}"
                   aria-haspopup="true">Services ▾</a>
                <div class="nav-dropdown-content">
                    <a href="/network-services">Network Services</a>
                    <a href="/system-services">System Services</a>
                </div>
            </div>

            {{-- ===== Solutions Dropdown ===== --}}
            <div class="nav-dropdown">
                <a href="#"
                   class="nav-dropdown-toggle {{ request()->routeIs('it-solutions') || request()->routeIs('network-solutions') || request()->routeIs('system-solutions') ? 'active' : '' }}"
                   aria-haspopup="true">Solutions ▾</a>
                <div class="nav-dropdown-content">
                    <a href="/network-solutions">Network Solutions</a>
                    <a href="/system-solutions">System Solutions</a>
                </div>
            </div>

            <div class="nav-dropdown">
                <a href="{{ route('career', ['type' => 'internship']) }}" class="nav-dropdown-toggle {{ request()->routeIs('career') ? 'active' : '' }}" style="cursor: pointer;">Career ▾</a>
                <div class="nav-dropdown-content">
                    <a href="{{ route('career', ['type' => 'internship']) }}">Internship</a>
                    <a href="{{ route('career', ['type' => 'job']) }}">Job</a>
                </div>
            </div>
            <div class="nav-dropdown">
                <a href="{{ route('courses') }}" class="nav-dropdown-toggle {{ request()->routeIs('courses') || request()->routeIs('fee-structure') || request()->routeIs('class-schedule') ? 'active' : '' }}" style="cursor: pointer;">Courses ▾</a>
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
