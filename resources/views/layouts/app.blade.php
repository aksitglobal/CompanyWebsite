<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'AKSIT GLOBAL — IT Solutions & Professional Training')</title>
    <meta name="description" content="@yield('description', 'AKSIT GLOBAL delivers world-class cybersecurity, cloud computing, networking, digital marketing, and professional IT training services in Pakistan.')">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}?v={{ file_exists(public_path('css/styles.css')) ? filemtime(public_path('css/styles.css')) : time() }}">
    
    <style>
        /* === CRITICAL PRODUCTION DROPDOWN GUARD === */
        /* Prevents browser/CDN cache or external styles from leaving dropdowns expanded on live site */
        .nav-dropdown-content,
        .nav-menu .nav-dropdown .nav-dropdown-content {
            display: none !important;
        }

        /* Desktop hover reveal */
        @media (min-width: 1025px) {
            .nav-dropdown:hover > .nav-dropdown-content,
            .nav-menu .nav-dropdown:hover > .nav-dropdown-content {
                display: block !important;
            }
        }

        /* Mobile accordion reveal when toggled via JS (.mobile-open) */
        @media (max-width: 1024px) {
            .nav-dropdown.mobile-open > .nav-dropdown-content,
            .nav-menu .nav-dropdown.mobile-open > .nav-dropdown-content {
                display: block !important;
                max-height: 500px !important;
            }
        }
    </style>

    @stack('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="shortcut icon" href="{{ asset('assets/logo.jpg') }}">
    <link rel="icon" type="image/jpeg" href="{{ asset('assets/logo.jpg') }}">
    <link rel="apple-touch-icon" href="{{ asset('assets/logo.jpg') }}">
</head>
<body>

    @include('partials.topbar')
    @include('partials.header')

    @yield('content')

    @include('partials.footer')
    @include('partials.email-picker')

    <a href="https://wa.me/923000311868" class="whatsapp-float" target="_blank" title="Chat on WhatsApp"><i class="fab fa-whatsapp"></i></a>
    <div class="scroll-top" id="scrollTop"><i class="fas fa-chevron-up"></i></div>

    <script src="{{ asset('js/script.js') }}?v={{ file_exists(public_path('js/script.js')) ? filemtime(public_path('js/script.js')) : time() }}"></script>
    @stack('scripts')
</body>
</html>
