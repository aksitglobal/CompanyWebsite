@extends('layouts.app')

@section('title', $label . ' — AKSIT GLOBAL')
@section('description', 'Learn about our ' . $label . ' services at AKSIT GLOBAL — professional IT solutions for your business.')

@section('content')
    <!-- PAGE HERO -->
    <section class="page-hero">
        <div class="page-hero-content">
            <h1><span>{{ $label }}</span></h1>
            <p>Professional IT solutions tailored for your enterprise needs.</p>
        </div>
    </section>

    <!-- CONTENT SECTION -->
    <section class="services-detailed" style="padding: 60px 0;">
        <div class="container">
        <style>
            .rich-content p { margin-bottom: 1rem; }
            .rich-content ul, .rich-content ol { margin-bottom: 1rem; padding-left: 1.5rem; }
            .rich-content li { margin-bottom: 0.3rem; }
            .rich-content h2,.rich-content h3,.rich-content h4 { color: #facc15; margin-top: 1.2rem; margin-bottom: 0.6rem; font-weight: 700; }
            .rich-content a { color: #facc15; text-decoration: underline; }
            .rich-content strong { color: #f1f5f9; }
        </style>

            @if($contents->isEmpty())
                <!-- No content yet placeholder -->
                <div style="
                    text-align: center;
                    padding: 80px 20px;
                    background: linear-gradient(135deg, #0f172a, #1e293b);
                    border-radius: 16px;
                    border: 1px solid #334155;
                    max-width: 600px;
                    margin: 0 auto;
                ">
                    <div style="
                        width: 80px; height: 80px;
                        background: linear-gradient(135deg, #facc15, #f59e0b);
                        border-radius: 50%;
                        display: flex; align-items: center; justify-content: center;
                        margin: 0 auto 24px;
                    ">
                        <i class="fas fa-tools" style="font-size: 32px; color: #111;"></i>
                    </div>
                    <h3 style="color: #facc15; font-size: 1.5rem; margin-bottom: 12px;">Content Coming Soon</h3>
                    <p style="color: #94a3b8; font-size: 1rem; line-height: 1.7;">
                        We're currently preparing detailed information about <strong style="color: #e2e8f0;">{{ $label }}</strong>.
                        Please check back soon or <a href="{{ route('contact') }}" style="color: #facc15;">contact us</a> for more information.
                    </p>
                    <div style="margin-top: 28px;">
                        <a href="{{ route('contact') }}" class="btn btn-gold" style="
                            display: inline-block;
                            background: linear-gradient(135deg, #facc15, #f59e0b);
                            color: #111;
                            padding: 12px 32px;
                            border-radius: 50px;
                            font-weight: 700;
                            text-decoration: none;
                            transition: transform 0.2s;
                        " onmouseover="this.style.transform='translateY(-2px)'"
                           onmouseout="this.style.transform='translateY(0)'">
                            <i class="fas fa-envelope me-2"></i>Get in Touch
                        </a>
                    </div>
                </div>
            @else
                @foreach($contents as $item)
                    @if($item->content_type === 'text')
                        <div class="service-detail-row reveal" style="margin-bottom: 40px; padding: 36px; background: #0f172a; border-radius: 12px; border: 1px solid #1e293b;">
                            <div class="service-detail-content" style="max-width: 100%;">
                                <div style="color: #cbd5e1; font-size: 1.05rem; line-height: 1.9;" class="rich-content">{!! $item->content !!}</div>
                            </div>
                        </div>

                    @elseif($item->content_type === 'image')
                        <div class="reveal" style="margin-bottom: 32px; text-align: center;">
                            <img src="{{ asset('storage/' . $item->content) }}"
                                 alt="{{ $label }}"
                                 style="max-width: 100%; border-radius: 12px; box-shadow: 0 8px 32px rgba(0,0,0,0.4);">
                        </div>

                    @elseif($item->content_type === 'video')
                        @php
                            // Convert YouTube watch URL to embed URL
                            $videoUrl = $item->content;
                            if (preg_match('/(?:youtube\.com\/watch\?v=|youtu\.be\/)([a-zA-Z0-9_-]+)/', $videoUrl, $matches)) {
                                $videoUrl = 'https://www.youtube.com/embed/' . $matches[1];
                            }
                        @endphp
                        <div class="reveal" style="margin-bottom: 32px; text-align: center;">
                            <div style="position: relative; width: 100%; max-width: 800px; margin: 0 auto; padding-bottom: 56.25%; height: 0; border-radius: 12px; overflow: hidden; box-shadow: 0 8px 32px rgba(0,0,0,0.4);">
                                <iframe src="{{ $videoUrl }}"
                                        style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; border: none;"
                                        allowfullscreen
                                        loading="lazy">
                                </iframe>
                            </div>
                        </div>
                    @endif
                @endforeach
            @endif

        </div>
    </section>

    <!-- CTA -->
    <section class="cta-banner">
        <div class="container">
            <div class="cta-content reveal">
                <h2>Need a Custom IT Solution?</h2>
                <p>Let's discuss how AKSIT GLOBAL can design a solution tailored to your requirements.</p>
                <div class="cta-buttons" style="justify-content: center;">
                    <button class="btn btn-gold" onclick="openContactPopup()">Contact Us</button>
                </div>
            </div>
        </div>
    </section>

    <!-- CONTACT POPUP -->
    <div id="contactPopupOverlay" style="
        display:none; position:fixed; inset:0; background:rgba(0,0,0,0.55);
        z-index:9999; align-items:center; justify-content:center;
        backdrop-filter:blur(4px);" onclick="closeContactPopup(event)">
        <div id="contactPopupBox" style="
            background:#fff; border-radius:20px; padding:40px 36px 32px;
            max-width:420px; width:90%; text-align:center;
            box-shadow:0 25px 60px rgba(0,0,0,0.25);
            animation: popupIn 0.35s cubic-bezier(0.34,1.56,0.64,1) both;
            position:relative;">
            <button onclick="closeContactPopup()" style="position:absolute; top:14px; right:16px; background:none; border:none; font-size:20px; cursor:pointer; color:#999;">&times;</button>
            <div style="width:72px;height:72px;background:linear-gradient(135deg,#25d366,#128c7e);border-radius:50%;display:flex;align-items:center;justify-content:center;margin:0 auto 18px;box-shadow:0 8px 24px rgba(37,211,102,0.35);">
                <i class="fab fa-whatsapp" style="font-size:36px;color:#fff;"></i>
            </div>
            <h3 style="font-size:22px;font-weight:700;color:#1a1a1a;margin-bottom:8px;">Chat with Us</h3>
            <p style="color:#666;font-size:15px;margin-bottom:6px;line-height:1.5;">Need a custom IT solution?<br>We're available on WhatsApp!</p>
            <p style="font-size:17px;font-weight:700;color:#128c7e;margin-bottom:24px;">+92 300 031 1868</p>
            <a href="https://wa.me/923000311868?text=Hi%2C%20I%20would%20like%20to%20discuss%20{{ urlencode($label) }}%20with%20AKSIT%20Global." target="_blank" style="display:inline-flex;align-items:center;gap:10px;background:linear-gradient(135deg,#25d366,#128c7e);color:#fff;text-decoration:none;font-weight:700;font-size:16px;padding:14px 32px;border-radius:50px;box-shadow:0 6px 20px rgba(37,211,102,0.4);width:100%;justify-content:center;">
                <i class="fab fa-whatsapp" style="font-size:20px;"></i>Start WhatsApp Chat
            </a>
            <p style="margin-top:16px;font-size:13px;color:#aaa;">We typically reply within a few minutes.</p>
        </div>
    </div>
    <style>
        @keyframes popupIn { from { opacity:0; transform:scale(0.8) translateY(20px); } to { opacity:1; transform:scale(1) translateY(0); } }
    </style>
    <script>
        function openContactPopup() { document.getElementById('contactPopupOverlay').style.display = 'flex'; document.body.style.overflow = 'hidden'; }
        function closeContactPopup(event) {
            if (event && event.target !== document.getElementById('contactPopupOverlay') && event.type === 'click') return;
            document.getElementById('contactPopupOverlay').style.display = 'none';
            document.body.style.overflow = '';
        }
        document.addEventListener('keydown', function(e) { if (e.key === 'Escape') closeContactPopup(); });
    </script>
@endsection
