<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'AKSIT GLOBAL — IT Solutions & Professional Training')</title>
    <meta name="description" content="@yield('description', 'AKSIT GLOBAL delivers world-class cybersecurity, cloud computing, networking, digital marketing, and professional IT training services in Pakistan.')">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    @stack('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="icon" type="image/jpeg" href="{{ asset('assets/logo.jpg') }}">
</head>
<body>

    @include('partials.topbar')
    @include('partials.header')

    @yield('content')

    @include('partials.footer')

    <a href="https://wa.me/923000311868" class="whatsapp-float" target="_blank" title="Chat on WhatsApp"><i class="fab fa-whatsapp"></i></a>
    <div class="scroll-top" id="scrollTop"><i class="fas fa-chevron-up"></i></div>

    <script src="{{ asset('js/script.js') }}"></script>
    @stack('scripts')
</body>
</html>
