@extends('layouts.app')

@section('title', 'Services — AKSIT GLOBAL')
@section('description', 'Professional IT services by AKSIT GLOBAL — cybersecurity solutions, cloud infrastructure, corporate training, web development, digital marketing, and IT consulting.')

@section('content')
    <!-- PAGE HERO -->
    <section class="page-hero">
        <div class="page-hero-content">
            <h1>Our <span>Services</span></h1>
            <p>End-to-end IT solutions designed to protect, grow, and transform your business.</p>

        </div>
    </section>

    <!-- SERVICES INTRO -->
    <section class="services-intro">
        <div class="container">
            <div class="section-title reveal">
                <h2>What We Offer</h2>
                <p>Comprehensive technology solutions tailored to meet the unique needs of individuals and businesses</p>
            </div>
        </div>
    </section>

    <!-- DETAILED SERVICES -->
    <section class="services-detailed">
        <div class="container">

            <!-- Service 1 -->
            <div class="service-detail-row reveal">
                <div class="service-detail-icon">
                    <div class="sd-icon-wrap"><i class="fas fa-lock"></i></div>
                </div>
                <div class="service-detail-content">
                    <h3>Cybersecurity Solutions</h3>
                    <p>In today's threat landscape, security isn't optional — it's essential. AKSIT GLOBAL provides
                        comprehensive cybersecurity services to protect your digital assets and ensure business continuity.
                    </p>
                    <ul class="service-features">
                        <li><i class="fas fa-check"></i> Vulnerability Assessment & Penetration Testing (VAPT)</li>
                        <li><i class="fas fa-check"></i> Security Operations Center (SOC) Setup</li>
                        <li><i class="fas fa-check"></i> Incident Response & Digital Forensics</li>
                        <li><i class="fas fa-check"></i> Security Awareness Training for Staff</li>
                        <li><i class="fas fa-check"></i> Compliance & Risk Assessment (ISO 27001, PCI DSS)</li>
                    </ul>
                    <button class="btn btn-primary btn-get-in-touch" data-service="Cybersecurity Solutions"><i
                            class="fas fa-envelope"></i> Get in Touch</button>
                </div>
            </div>

            <!-- Service 2 -->
            <div class="service-detail-row reverse reveal">
                <div class="service-detail-icon">
                    <div class="sd-icon-wrap cloud"><i class="fas fa-cloud-arrow-up"></i></div>
                </div>
                <div class="service-detail-content">
                    <h3>Cloud Infrastructure & Migration</h3>
                    <p>Move to the cloud with confidence. Our certified cloud architects design, deploy, and manage scalable
                        cloud solutions across AWS, Microsoft Azure, and Google Cloud Platform.</p>
                    <ul class="service-features">
                        <li><i class="fas fa-check"></i> Cloud Architecture Design & Planning</li>
                        <li><i class="fas fa-check"></i> Cloud Migration (On-premise to Cloud)</li>
                        <li><i class="fas fa-check"></i> Hybrid & Multi-Cloud Deployments</li>
                        <li><i class="fas fa-check"></i> Cloud Security & Monitoring</li>
                        <li><i class="fas fa-check"></i> Cost Optimization & Performance Tuning</li>
                    </ul>
                    <button class="btn btn-primary btn-get-in-touch" data-service="Cloud Infrastructure & Migration"><i
                            class="fas fa-envelope"></i> Get in Touch</button>
                </div>
            </div>

            <!-- Service 3 -->
            <div class="service-detail-row reveal">
                <div class="service-detail-icon">
                    <div class="sd-icon-wrap training"><i class="fas fa-building"></i></div>
                </div>
                <div class="service-detail-content">
                    <h3>Corporate IT Training</h3>
                    <p>Upskill your workforce with customized IT training programs. We work closely with HR departments and
                        technical teams to design capacity-building programs that deliver measurable results.</p>
                    <ul class="service-features">
                        <li><i class="fas fa-check"></i> Customized Curriculum for Your Industry</li>
                        <li><i class="fas fa-check"></i> Online & On-site Training Options</li>
                        <li><i class="fas fa-check"></i> Post-training Assessment & Certification</li>
                        <li><i class="fas fa-check"></i> Team-based Workshops & Hands-on Labs</li>
                        <li><i class="fas fa-check"></i> Continuing Education Credits</li>
                    </ul>
                    <button class="btn btn-primary btn-get-in-touch" data-service="Corporate IT Training"><i
                            class="fas fa-envelope"></i> Get in Touch</button>
                </div>
            </div>

            <!-- Service 4 -->
            <div class="service-detail-row reverse reveal">
                <div class="service-detail-icon">
                    <div class="sd-icon-wrap web"><i class="fas fa-laptop-code"></i></div>
                </div>
                <div class="service-detail-content">
                    <h3>Web & Application Development</h3>
                    <p>From stunning websites to complex web applications, our development team builds digital products that
                        drive results. We deliver modern, responsive, and SEO-optimized solutions.</p>
                    <ul class="service-features">
                        <li><i class="fas fa-check"></i> Custom Website Design & Development</li>
                        <li><i class="fas fa-check"></i> E-commerce Solutions</li>
                        <li><i class="fas fa-check"></i> Mobile App Development (iOS & Android)</li>
                        <li><i class="fas fa-check"></i> API Development & Integration</li>
                        <li><i class="fas fa-check"></i> UI/UX Design & Prototyping</li>
                    </ul>
                    <button class="btn btn-primary btn-get-in-touch" data-service="Web & Application Development"><i
                            class="fas fa-envelope"></i> Get in Touch</button>
                </div>
            </div>

            <!-- Service 5 -->
            <div class="service-detail-row reveal">
                <div class="service-detail-icon">
                    <div class="sd-icon-wrap marketing"><i class="fas fa-bullhorn"></i></div>
                </div>
                <div class="service-detail-content">
                    <h3>Digital Marketing</h3>
                    <p>Grow your online presence and attract more customers. Our marketing experts craft data-driven
                        strategies that deliver measurable growth through organic and paid channels.</p>
                    <ul class="service-features">
                        <li><i class="fas fa-check"></i> Search Engine Optimization (SEO)</li>
                        <li><i class="fas fa-check"></i> Social Media Management & Advertising</li>
                        <li><i class="fas fa-check"></i> Google Ads & PPC Campaign Management</li>
                        <li><i class="fas fa-check"></i> Content Marketing & Copywriting</li>
                        <li><i class="fas fa-check"></i> Analytics, Reporting & ROI Tracking</li>
                    </ul>
                    <button class="btn btn-primary btn-get-in-touch" data-service="Digital Marketing"><i
                            class="fas fa-envelope"></i> Get in Touch</button>
                </div>
            </div>

            <!-- Service 6 -->
            <div class="service-detail-row reverse reveal">
                <div class="service-detail-icon">
                    <div class="sd-icon-wrap consulting"><i class="fas fa-diagram-project"></i></div>
                </div>
                <div class="service-detail-content">
                    <h3>IT Consulting & Network Solutions</h3>
                    <p>Leverage our expertise to make smarter technology decisions. Our consultants help you optimize
                        infrastructure, streamline operations, and align IT strategy with business objectives.</p>
                    <ul class="service-features">
                        <li><i class="fas fa-check"></i> IT Infrastructure Assessment & Planning</li>
                        <li><i class="fas fa-check"></i> Network Design, Setup & Optimization</li>
                        <li><i class="fas fa-check"></i> Structured Cabling & Data Center Solutions</li>
                        <li><i class="fas fa-check"></i> Technology Stack Selection & Integration</li>
                        <li><i class="fas fa-check"></i> Managed IT Support & Maintenance</li>
                    </ul>
                    <button class="btn btn-primary btn-get-in-touch" data-service="IT Consulting & Network Solutions"><i
                            class="fas fa-envelope"></i> Get in Touch</button>
                </div>
            </div>

            <!-- Service 7: Managed IT Services -->
            <div class="service-detail-row reveal">
                <div class="service-detail-icon">
                    <div class="sd-icon-wrap" style="background: linear-gradient(135deg, #0ea5e9, #0284c7);"><i
                            class="fas fa-server"></i></div>
                </div>
                <div class="service-detail-content">
                    <h3>Managed IT Services</h3>
                    <p>End‑to‑end management of your IT systems so you can focus on your core business. From infrastructure
                        monitoring to 24/7 helpdesk support, we keep your technology running at peak performance.</p>
                    <ul class="service-features">
                        <li><i class="fas fa-check"></i> IT Infrastructure Management</li>
                        <li><i class="fas fa-check"></i> Help Desk & IT Support</li>
                        <li><i class="fas fa-check"></i> Backup & Disaster Recovery</li>
                        <li><i class="fas fa-check"></i> Network & Security Management</li>
                        <li><i class="fas fa-check"></i> IT Consultancy & Strategy</li>
                        <li><i class="fas fa-check"></i> User & Access Management</li>
                    </ul>
                    <button class="btn btn-primary btn-get-in-touch" data-service="Managed IT Services"><i
                            class="fas fa-envelope"></i> Get in Touch</button>
                </div>
            </div>

            <!-- Service 8: Business Software & System Integration -->
            <div class="service-detail-row reverse reveal">
                <div class="service-detail-icon">
                    <div class="sd-icon-wrap" style="background: linear-gradient(135deg, #8b5cf6, #7c3aed);"><i
                            class="fas fa-cubes"></i></div>
                </div>
                <div class="service-detail-content">
                    <h3>Business Software & System Integration</h3>
                    <p>Streamline your operations with tailored business software solutions. We design, develop, and
                        integrate enterprise systems that unify your workflows and drive productivity.</p>
                    <ul class="service-features">
                        <li><i class="fas fa-check"></i> ERP Systems</li>
                        <li><i class="fas fa-check"></i> CRM Systems</li>
                        <li><i class="fas fa-check"></i> LMS Platforms</li>
                        <li><i class="fas fa-check"></i> CMS & DMS</li>
                        <li><i class="fas fa-check"></i> System Integration</li>
                        <li><i class="fas fa-check"></i> Automation Workflows</li>
                    </ul>
                    <button class="btn btn-primary btn-get-in-touch"
                        data-service="Business Software & System Integration"><i class="fas fa-envelope"></i> Get in
                        Touch</button>
                </div>
            </div>

            <!-- Service 9: Network Infrastructure Design -->
            <div class="service-detail-row reveal">
                <div class="service-detail-icon">
                    <div class="sd-icon-wrap" style="background: linear-gradient(135deg, #059669, #047857);"><i
                            class="fas fa-network-wired"></i></div>
                </div>
                <div class="service-detail-content">
                    <h3>Network Infrastructure Design</h3>
                    <p>Planning, architecture, and implementation of secure, scalable, and high‑performance network
                        environments tailored to support your organization's operational and business needs.</p>
                    <ul class="service-features">
                        <li><i class="fas fa-check"></i> Network Planning & Assessment</li>
                        <li><i class="fas fa-check"></i> Network Architecture Design</li>
                        <li><i class="fas fa-check"></i> Structured Cabling</li>
                        <li><i class="fas fa-check"></i> Wireless Network Design (WiFi)</li>
                        <li><i class="fas fa-check"></i> Network Security Architecture</li>
                        <li><i class="fas fa-check"></i> Hardware & Technology Selection</li>
                        <li><i class="fas fa-check"></i> Monitoring & Performance Design</li>
                        <li><i class="fas fa-check"></i> Documentation & Roadmap</li>
                    </ul>
                    <button class="btn btn-primary btn-get-in-touch" data-service="Network Infrastructure Design"><i
                            class="fas fa-envelope"></i> Get in Touch</button>
                </div>
            </div>

            <!-- Service 10: Social Media Management -->
            <div class="service-detail-row reverse reveal">
                <div class="service-detail-icon">
                    <div class="sd-icon-wrap" style="background: linear-gradient(135deg, #e11d48, #be123c);"><i
                            class="fas fa-share-nodes"></i></div>
                </div>
                <div class="service-detail-content">
                    <h3>Social Media Management</h3>
                    <p>Strategic planning, creation, execution, and optimization of content across digital platforms to
                        enhance brand visibility, engage audiences, and drive measurable business results.</p>
                    <ul class="service-features">
                        <li><i class="fas fa-check"></i> Strategy & Planning</li>
                        <li><i class="fas fa-check"></i> Content Creation & Design</li>
                        <li><i class="fas fa-check"></i> Scheduling & Publishing</li>
                        <li><i class="fas fa-check"></i> Community Management</li>
                        <li><i class="fas fa-check"></i> Analytics & Performance</li>
                        <li><i class="fas fa-check"></i> Paid Advertising</li>
                        <li><i class="fas fa-check"></i> Brand Development</li>
                        <li><i class="fas fa-check"></i> Campaign Management</li>
                    </ul>
                    <button class="btn btn-primary btn-get-in-touch" data-service="Social Media Management"><i
                            class="fas fa-envelope"></i> Get in Touch</button>
                </div>
            </div>

        </div>
    </section>

    <!-- CTA -->
    <section class="cta-banner">
        <div class="container">
            <div class="cta-content reveal">
                <h2>Need a Custom IT Solution?</h2>
                <p>Every business is unique. Let's discuss how AKSIT GLOBAL can design a solution tailored to your specific
                    requirements.</p>
                <div class="cta-buttons" style="justify-content: center;">
                    <button class="btn btn-gold" onclick="openContactPopup()">Contact Us</button>
                </div>
            </div>
        </div>
    </section>

    <!-- CONTACT POPUP MODAL -->
    <div id="contactPopupOverlay" style="
            display:none; position:fixed; inset:0; background:rgba(0,0,0,0.55);
            z-index:9999; align-items:center; justify-content:center;
            backdrop-filter:blur(4px); -webkit-backdrop-filter:blur(4px);
        " onclick="closeContactPopup(event)">
        <div id="contactPopupBox" style="
                background:#fff; border-radius:20px; padding:40px 36px 32px;
                max-width:420px; width:90%; text-align:center;
                box-shadow:0 25px 60px rgba(0,0,0,0.25);
                animation: popupIn 0.35s cubic-bezier(0.34,1.56,0.64,1) both;
                position:relative;
            ">
            <button onclick="closeContactPopup()" style="
                    position:absolute; top:14px; right:16px; background:none;
                    border:none; font-size:20px; cursor:pointer; color:#999;
                    line-height:1; padding:4px 8px; border-radius:50%;
                    transition:background 0.2s, color 0.2s;
                " onmouseover="this.style.background='#f3f4f6';this.style.color='#333';"
                onmouseout="this.style.background='none';this.style.color='#999';">&times;</button>

            <div style="
                    width:72px; height:72px; background:linear-gradient(135deg,#25d366,#128c7e);
                    border-radius:50%; display:flex; align-items:center; justify-content:center;
                    margin:0 auto 18px; box-shadow:0 8px 24px rgba(37,211,102,0.35);
                ">
                <i class="fab fa-whatsapp" style="font-size:36px; color:#fff;"></i>
            </div>

            <h3 style="font-size:22px; font-weight:700; color:#1a1a1a; margin-bottom:8px;">Chat with Us</h3>
            <p style="color:#666; font-size:15px; margin-bottom:6px; line-height:1.5;">
                Need a custom IT solution?<br>We're available on WhatsApp!
            </p>
            <p style="font-size:17px; font-weight:700; color:#128c7e; margin-bottom:24px; letter-spacing:0.5px;">+92 300 031
                1868</p>

            <a href="https://wa.me/923000311868?text=Hi%2C%20I%20would%20like%20to%20discuss%20a%20custom%20IT%20solution%20with%20AKSIT%20Global."
                target="_blank" style="
                    display:inline-flex; align-items:center; gap:10px;
                    background:linear-gradient(135deg,#25d366,#128c7e);
                    color:#fff; text-decoration:none; font-weight:700; font-size:16px;
                    padding:14px 32px; border-radius:50px;
                    box-shadow:0 6px 20px rgba(37,211,102,0.4);
                    transition:transform 0.2s, box-shadow 0.2s;
                    width:100%; justify-content:center;
                "
                onmouseover="this.style.transform='translateY(-2px)';this.style.boxShadow='0 10px 28px rgba(37,211,102,0.5)';"
                onmouseout="this.style.transform='translateY(0)';this.style.boxShadow='0 6px 20px rgba(37,211,102,0.4)';">
                <i class="fab fa-whatsapp" style="font-size:20px;"></i>
                Start WhatsApp Chat
            </a>

            <p style="margin-top:16px; font-size:13px; color:#aaa;">We typically reply within a few minutes.</p>
        </div>
    </div>

    <style>
        @keyframes popupIn {
            from {
                opacity: 0;
                transform: scale(0.8) translateY(20px);
            }

            to {
                opacity: 1;
                transform: scale(1) translateY(0);
            }
        }
    </style>
    <script>
        function openContactPopup() {
            document.getElementById('contactPopupOverlay').style.display = 'flex';
            document.body.style.overflow = 'hidden';
        }
        function closeContactPopup(event) {
            if (event && event.target !== document.getElementById('contactPopupOverlay') && event.type === 'click') return;
            document.getElementById('contactPopupOverlay').style.display = 'none';
            document.body.style.overflow = '';
        }
        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape') closeContactPopup();
        });
    </script>

    <!-- SERVICE CONTACT MODAL -->
    <div class="service-modal-overlay" id="serviceModalOverlay">
        <div class="service-modal" id="serviceModal">
            <button class="service-modal-close" id="serviceModalClose" aria-label="Close modal">
                <i class="fas fa-times"></i>
            </button>
            <div class="service-modal-header">
                <div class="service-modal-icon">
                    <i class="fas fa-headset"></i>
                </div>
                <h3>Get in Touch</h3>
                <p>Share your requirements and we'll get back to you within 24 hours.</p>
            </div>
            <form id="serviceContactForm" class="service-modal-form" method="POST" action="{{ route('service.inquiry') }}">
                @csrf
                <div class="modal-form-row">
                    <div class="modal-form-group">
                        <label for="modalFullName"><i class="fas fa-user"></i> Full Name</label>
                        <input type="text" id="modalFullName" name="name" placeholder="Enter your full name" required>
                    </div>
                    <div class="modal-form-group">
                        <label for="modalEmail"><i class="fas fa-envelope"></i> Email Address</label>
                        <input type="email" id="modalEmail" name="email" placeholder="Enter your email" required>
                    </div>
                </div>
                <div class="modal-form-row">
                    <div class="modal-form-group">
                        <label for="modalPhone"><i class="fas fa-phone-alt"></i> Phone Number</label>
                        <input type="tel" id="modalPhone" name="phone" placeholder="e.g. +92-300-1234567">
                    </div>
                    <div class="modal-form-group">
                        <label for="modalService"><i class="fas fa-concierge-bell"></i> Selected Service</label>
                        <input type="text" id="modalService" name="service" readonly>
                    </div>
                </div>
                <div class="modal-form-group">
                    <label for="modalMessage"><i class="fas fa-comment-dots"></i> Message / Description</label>
                    <textarea id="modalMessage" name="message" rows="4" placeholder="Tell us about your requirements..."
                        required></textarea>
                </div>
                <div class="modal-form-actions">
                    <button type="submit" class="btn btn-primary modal-submit-btn">
                        <i class="fas fa-paper-plane"></i> Send Message
                    </button>
                    <button type="button" class="btn modal-whatsapp-btn" id="modalWhatsAppBtn">
                        <i class="fab fa-whatsapp"></i> Send via WhatsApp
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        (function () {
            // ===== MODAL ELEMENTS =====
            var overlay = document.getElementById('serviceModalOverlay');
            var modal = document.getElementById('serviceModal');
            var closeBtn = document.getElementById('serviceModalClose');
            var form = document.getElementById('serviceContactForm');
            var waBtn = document.getElementById('modalWhatsAppBtn');

            // ===== OPEN MODAL =====
            function openModal(serviceName) {
                if (!overlay) return;
                var serviceInput = document.getElementById('modalService');
                if (serviceInput) serviceInput.value = serviceName || '';
                overlay.classList.add('active');
                document.body.style.overflow = 'hidden';
                setTimeout(function () {
                    var nameInput = document.getElementById('modalFullName');
                    if (nameInput) nameInput.focus();
                }, 400);
            }

            // ===== CLOSE MODAL =====
            function closeModal() {
                if (!overlay) return;
                overlay.classList.remove('active');
                document.body.style.overflow = '';
            }

            // ===== ATTACH CLICK HANDLERS TO ALL BUTTONS =====
            var buttons = document.querySelectorAll('.btn-get-in-touch');
            for (var i = 0; i < buttons.length; i++) {
                (function (btn) {
                    btn.addEventListener('click', function (e) {
                        e.preventDefault();
                        e.stopPropagation();
                        var serviceName = btn.getAttribute('data-service') || '';
                        openModal(serviceName);
                    });
                })(buttons[i]);
            }

            // ===== CLOSE BUTTON =====
            if (closeBtn) {
                closeBtn.addEventListener('click', function (e) {
                    e.preventDefault();
                    e.stopPropagation();
                    closeModal();
                });
            }

            // ===== CLICK OUTSIDE MODAL TO CLOSE =====
            if (overlay) {
                overlay.addEventListener('click', function (e) {
                    if (e.target === overlay) closeModal();
                });
            }

            // ===== ESCAPE KEY TO CLOSE =====
            document.addEventListener('keydown', function (e) {
                if (e.key === 'Escape' && overlay && overlay.classList.contains('active')) {
                    closeModal();
                }
            });

            // ===== GET FORM DATA =====
            function getFormData() {
                return {
                    name: (document.getElementById('modalFullName') || {}).value || '',
                    email: (document.getElementById('modalEmail') || {}).value || '',
                    phone: (document.getElementById('modalPhone') || {}).value || '',
                    service: (document.getElementById('modalService') || {}).value || '',
                    message: (document.getElementById('modalMessage') || {}).value || ''
                };
            }

            // ===== BUILD WHATSAPP URL =====
            function buildWAUrl(data) {
                var msg = 'Hello AKSIT GLOBAL!%0A%0A';
                msg += '*Name:* ' + encodeURIComponent(data.name.trim()) + '%0A';
                msg += '*Email:* ' + encodeURIComponent(data.email.trim()) + '%0A';
                if (data.phone.trim()) msg += '*Phone:* ' + encodeURIComponent(data.phone.trim()) + '%0A';
                if (data.service.trim()) msg += '*Service:* ' + encodeURIComponent(data.service.trim()) + '%0A';
                if (data.message.trim()) msg += '*Message:* ' + encodeURIComponent(data.message.trim()) + '%0A';
                return 'https://wa.me/923000311868?text=' + msg;
            }

            // ===== WHATSAPP BUTTON =====
            if (waBtn) {
                waBtn.addEventListener('click', function (e) {
                    e.preventDefault();
                    var data = getFormData();
                    if (!data.name.trim() || !data.email.trim()) {
                        alert('Please fill in at least your name and email.');
                        return;
                    }
                    window.open(buildWAUrl(data), '_blank');
                    var origHTML = waBtn.innerHTML;
                    waBtn.innerHTML = '<i class="fas fa-check"></i> Sent!';
                    setTimeout(function () {
                        waBtn.innerHTML = origHTML;
                        if (form) form.reset();
                        closeModal();
                    }, 2000);
                });
            }

            // ===== FORM SUBMIT (Laravel backend + WhatsApp) =====
            if (form) {
                form.addEventListener('submit', function (e) {
                    e.preventDefault();
                    var data = getFormData();
                    if (!data.name.trim() || !data.email.trim() || !data.message.trim()) {
                        alert('Please fill in all required fields.');
                        return;
                    }

                    // Submit to Laravel backend via AJAX
                    var formData = new FormData(form);
                    fetch(form.action, {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest',
                            'Accept': 'application/json'
                        }
                    }).then(function (response) {
                        return response.json();
                    }).then(function (result) {
                        // Also open WhatsApp
                        window.open(buildWAUrl(data), '_blank');
                        var submitBtn = form.querySelector('.modal-submit-btn');
                        if (submitBtn) {
                            var origHTML = submitBtn.innerHTML;
                            submitBtn.innerHTML = '<i class="fas fa-check-circle"></i> Message Sent!';
                            submitBtn.style.background = '#25d366';
                            setTimeout(function () {
                                submitBtn.innerHTML = origHTML;
                                submitBtn.style.background = '';
                                form.reset();
                                closeModal();
                            }, 2500);
                        }
                    }).catch(function (err) {
                        // Fallback: open WhatsApp anyway
                        window.open(buildWAUrl(data), '_blank');
                        var submitBtn = form.querySelector('.modal-submit-btn');
                        if (submitBtn) {
                            var origHTML = submitBtn.innerHTML;
                            submitBtn.innerHTML = '<i class="fas fa-check-circle"></i> Sent via WhatsApp!';
                            submitBtn.style.background = '#25d366';
                            setTimeout(function () {
                                submitBtn.innerHTML = origHTML;
                                submitBtn.style.background = '';
                                form.reset();
                                closeModal();
                            }, 2500);
                        }
                    });
                });
            }
        })();
    </script>
@endpush