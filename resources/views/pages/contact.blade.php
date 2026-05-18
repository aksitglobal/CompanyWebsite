@extends('layouts.app')

@section('title', 'Contact Us — AKSIT GLOBAL')
@section('description', 'Get in touch with AKSIT GLOBAL for IT training, cybersecurity solutions, cloud computing, and professional services. Visit our office in Rawalpindi or contact us online.')

@section('content')
    <!-- PAGE HERO -->
    <section class="page-hero">
        <div class="page-hero-content">
            <h1>Contact <span>Us</span></h1>
            <p>We'd love to hear from you. Whether you have a question about our courses, services, or anything else — our team is ready to help.</p>
            <div class="breadcrumb"><a href="{{ route('home') }}">Home</a> <i class="fas fa-chevron-right"></i> <span>Contact</span></div>
        </div>
    </section>

    <!-- CONTACT INFO CARDS -->
    <section class="contact-cards">
        <div class="container">
            <div class="contact-cards-grid">
                <div class="contact-info-card reveal">
                    <div class="contact-card-icon"><i class="fas fa-map-marker-alt"></i></div>
                    <h4>Visit Our Office</h4>
                    <p>Shop# 16-17, 1st Floor, E1 Emporium, Paradise Boulevard, Main GT Rd, near Bahria Paradise Gate, Rawalpindi, Pakistan</p>
                </div>
                <div class="contact-info-card reveal">
                    <div class="contact-card-icon"><i class="fas fa-phone-alt"></i></div>
                    <h4>Call or WhatsApp</h4>
                    <p><a href="tel:+923000311868">+92-300-0311868</a></p>
                    <p style="margin-top: 8px;"><a href="https://wa.me/923000311868" target="_blank" style="color: #25d366;"><i class="fab fa-whatsapp"></i> Chat on WhatsApp</a></p>
                </div>
                <div class="contact-info-card reveal">
                    <div class="contact-card-icon"><i class="fas fa-envelope"></i></div>
                    <h4>Email Us</h4>
                    <p><a href="mailto:contact@aksitglobal.com">contact@aksitglobal.com</a></p>
                    <p style="margin-top: 8px;"><a href="https://www.aksitglobal.com" target="_blank">www.aksitglobal.com</a></p>
                </div>
                <div class="contact-info-card reveal">
                    <div class="contact-card-icon"><i class="fas fa-clock"></i></div>
                    <h4>Business Hours</h4>
                    <p>Monday – Saturday<br>9:00 AM – 7:00 PM</p>
                    <p style="margin-top: 8px; color: var(--gray-500);">Sunday: Closed</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CONTACT FORM + MAP -->
    <section class="contact-main">
        <div class="container">
            <div class="contact-main-grid">
                <!-- Form -->
                <div class="contact-form-section reveal">
                    <h2>Send Us a Message</h2>
                    <p>Fill out the form below and our team will get back to you within 24 hours.</p>

                    @if(session('success'))
                        <div style="background: #d4edda; color: #155724; padding: 14px 20px; border-radius: 8px; margin-bottom: 20px; font-weight: 600; border: 1px solid #c3e6cb;">
                            <i class="fas fa-check-circle"></i> {{ session('success') }}
                        </div>
                    @endif

                    @if($errors->any())
                        <div style="background: #f8d7da; color: #721c24; padding: 14px 20px; border-radius: 8px; margin-bottom: 20px; border: 1px solid #f5c6cb;">
                            <i class="fas fa-exclamation-circle"></i> Please fix the following errors:
                            <ul style="margin-top: 8px; margin-left: 20px; list-style: disc;">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form id="contactForm" class="contact-form" method="POST" action="{{ route('contact.submit') }}">
                        @csrf
                        <div class="form-row">
                            <div class="form-group">
                                <label for="contactName">Full Name *</label>
                                <input type="text" id="contactName" name="name" placeholder="Your full name" value="{{ old('name') }}" required>
                            </div>
                            <div class="form-group">
                                <label for="contactEmail">Email Address *</label>
                                <input type="email" id="contactEmail" name="email" placeholder="your@email.com" value="{{ old('email') }}" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="contactPhone">Phone / WhatsApp</label>
                                <input type="tel" id="contactPhone" name="phone" placeholder="+92-XXX-XXXXXXX" value="{{ old('phone') }}">
                            </div>
                            <div class="form-group">
                                <label for="contactSubject">Subject</label>
                                <select id="contactSubject" name="subject">
                                    <option value="">Select a topic</option>
                                    <option value="course-inquiry" {{ old('subject') == 'course-inquiry' ? 'selected' : '' }}>Course Enrollment</option>
                                    <option value="service-inquiry" {{ old('subject') == 'service-inquiry' ? 'selected' : '' }}>Service Inquiry</option>
                                    <option value="corporate-training" {{ old('subject') == 'corporate-training' ? 'selected' : '' }}>Corporate Training</option>
                                    <option value="partnership" {{ old('subject') == 'partnership' ? 'selected' : '' }}>Partnership / Collaboration</option>
                                    <option value="other" {{ old('subject') == 'other' ? 'selected' : '' }}>Other</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="contactMessage">Your Message *</label>
                            <textarea id="contactMessage" name="message" placeholder="Tell us how we can help you..." rows="6" required>{{ old('message') }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-paper-plane"></i> Send Message</button>
                    </form>
                </div>

                <!-- Map & Social -->
                <div class="contact-sidebar reveal">
                    <div class="contact-map-large">
                        <h3>Find Us on the Map</h3>
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3325.449767812984!2d73.11823247595309!3d33.541686444469614!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x38dfed006d7bb79b%3A0x21f86860e2b58386!2sAKSIT%20Global!5e0!3m2!1sen!2s!4v1746167824147!5m2!1sen!2s" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        <a href="https://maps.app.goo.gl/JkPQvQrzjK37LpRb7" target="_blank" class="map-link"><i class="fas fa-directions"></i> Get Directions</a>
                    </div>

                    <div class="contact-social-box">
                        <h3>Follow Us</h3>
                        <p>Stay connected with AKSIT GLOBAL on social media for updates, tips, and news.</p>
                        <div class="contact-socials">
                            <a href="https://www.linkedin.com/company/aksitglobalservices" target="_blank" class="social-btn linkedin"><i class="fab fa-linkedin-in"></i> LinkedIn</a>
                            <a href="https://www.facebook.com/Aksitglobalservices" target="_blank" class="social-btn facebook"><i class="fab fa-facebook-f"></i> Facebook</a>
                            <a href="https://www.instagram.com/aksitglobal" target="_blank" class="social-btn instagram"><i class="fab fa-instagram"></i> Instagram</a>
                            <a href="https://www.youtube.com/@aksitglobal" target="_blank" class="social-btn youtube"><i class="fab fa-youtube"></i> YouTube</a>
                            <a href="https://twitter.com/aksitglobal" target="_blank" class="social-btn twitter"><i class="fab fa-x-twitter"></i> X (Twitter)</a>
                            <a href="https://www.tiktok.com/@aksitglobal" target="_blank" class="social-btn tiktok"><i class="fab fa-tiktok"></i> TikTok</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
