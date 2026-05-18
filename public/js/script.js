/* ========================================
   AKSIT GLOBAL — Main JavaScript
   Multi-page version
   ======================================== */

document.addEventListener('DOMContentLoaded', () => {

    // --- Mobile Menu Toggle ---
    const hamburger = document.getElementById('hamburger');
    const navMenu = document.getElementById('navMenu');
    const navOverlay = document.getElementById('navOverlay');

    if (hamburger && navMenu && navOverlay) {
        function toggleMenu() {
            hamburger.classList.toggle('active');
            navMenu.classList.toggle('open');
            navOverlay.classList.toggle('active');
            document.body.style.overflow = navMenu.classList.contains('open') ? 'hidden' : '';
        }

        hamburger.addEventListener('click', toggleMenu);
        navOverlay.addEventListener('click', toggleMenu);

        navMenu.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', () => {
                if (navMenu.classList.contains('open')) toggleMenu();
            });
        });
    }

    // --- Sticky Header Shadow ---
    const header = document.getElementById('header');
    function updateHeader() {
        if (!header) return;
        if (window.scrollY > 50) {
            header.style.boxShadow = '0 4px 30px rgba(0,0,0,0.1)';
        } else {
            header.style.boxShadow = '0 2px 20px rgba(0,0,0,0.08)';
        }
    }

    // --- Scroll-to-Top Button ---
    const scrollTopBtn = document.getElementById('scrollTop');
    function updateScrollTop() {
        if (!scrollTopBtn) return;
        scrollTopBtn.classList.toggle('visible', window.scrollY > 600);
    }

    if (scrollTopBtn) {
        scrollTopBtn.addEventListener('click', () => {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    }

    // --- Scroll Reveal Animations ---
    const reveals = document.querySelectorAll('.reveal');
    function revealOnScroll() {
        reveals.forEach(el => {
            if (el.getBoundingClientRect().top < window.innerHeight - 80) {
                el.classList.add('active');
            }
        });
    }

    // --- Combined Scroll Handler ---
    function onScroll() {
        updateHeader();
        updateScrollTop();
        revealOnScroll();
        animateCounters();
    }

    window.addEventListener('scroll', onScroll, { passive: true });
    onScroll();

    // --- Counter Animation for Stats ---
    let counterAnimated = false;
    function animateCounters() {
        if (counterAnimated) return;

        // Works for both .about-stats and .stats-grid
        const statsContainer = document.querySelector('.about-stats') || document.querySelector('.stats-grid');
        if (!statsContainer) return;

        const rect = statsContainer.getBoundingClientRect();
        if (rect.top < window.innerHeight && rect.bottom > 0) {
            counterAnimated = true;

            const counters = statsContainer.querySelectorAll('.number');
            counters.forEach(counter => {
                const text = counter.textContent;
                const match = text.match(/(\d+)/);
                if (!match) return;

                const target = parseInt(match[1]);
                const suffix = text.replace(match[1], '');
                let current = 0;
                const step = Math.max(1, Math.floor(target / 50));
                const interval = setInterval(() => {
                    current += step;
                    if (current >= target) {
                        current = target;
                        clearInterval(interval);
                    }
                    counter.textContent = current + suffix;
                }, 30);
            });
        }
    }

    // --- Contact Form (contact.html) ---
    const contactForm = document.getElementById('contactForm');
    if (contactForm) {
        contactForm.addEventListener('submit', (e) => {
            e.preventDefault();
            const name = document.getElementById('contactName').value.trim();
            const email = document.getElementById('contactEmail').value.trim();
            const phone = (document.getElementById('contactPhone')?.value || '').trim();
            const subject = (document.getElementById('contactSubject')?.value || '');
            const message = document.getElementById('contactMessage').value.trim();

            if (!name || !email || !message) {
                alert('Please fill in all required fields.');
                return;
            }

            let waMsg = `Hello AKSIT GLOBAL!%0A%0A`;
            waMsg += `*Name:* ${encodeURIComponent(name)}%0A`;
            waMsg += `*Email:* ${encodeURIComponent(email)}%0A`;
            if (phone) waMsg += `*Phone:* ${encodeURIComponent(phone)}%0A`;
            if (subject) waMsg += `*Subject:* ${encodeURIComponent(subject)}%0A`;
            waMsg += `*Message:* ${encodeURIComponent(message)}%0A`;

            window.open(`https://wa.me/923000311868?text=${waMsg}`, '_blank');

            const btn = contactForm.querySelector('button[type="submit"]');
            const originalHTML = btn.innerHTML;
            btn.innerHTML = '<i class="fas fa-check"></i> Sent via WhatsApp!';
            btn.style.background = '#25d366';
            setTimeout(() => {
                btn.innerHTML = originalHTML;
                btn.style.background = '';
                contactForm.reset();
            }, 3000);
        });
    }

    // --- Inquiry Form (index.html — if present) ---
    const inquiryForm = document.getElementById('inquiryForm');
    if (inquiryForm) {
        inquiryForm.addEventListener('submit', (e) => {
            e.preventDefault();
            const name = document.getElementById('inquiryName').value.trim();
            const email = document.getElementById('inquiryEmail').value.trim();
            const phone = (document.getElementById('inquiryPhone')?.value || '').trim();
            const course = (document.getElementById('inquiryCourse')?.value || '');
            const message = (document.getElementById('inquiryMessage')?.value || '').trim();

            if (!name || !email) {
                alert('Please fill in your name and email.');
                return;
            }

            let waMsg = `Hello AKSIT GLOBAL!%0A%0A`;
            waMsg += `*Name:* ${encodeURIComponent(name)}%0A`;
            waMsg += `*Email:* ${encodeURIComponent(email)}%0A`;
            if (phone) waMsg += `*Phone:* ${encodeURIComponent(phone)}%0A`;
            if (course) waMsg += `*Interested In:* ${encodeURIComponent(course)}%0A`;
            if (message) waMsg += `*Message:* ${encodeURIComponent(message)}%0A`;

            window.open(`https://wa.me/923000311868?text=${waMsg}`, '_blank');

            const btn = inquiryForm.querySelector('button[type="submit"]');
            const originalText = btn.textContent;
            btn.textContent = '✓ Sent via WhatsApp!';
            btn.style.background = '#25d366';
            setTimeout(() => {
                btn.textContent = originalText;
                btn.style.background = '';
                inquiryForm.reset();
            }, 3000);
        });
    }

    // --- Service Contact Modal (services.html) ---
    // Using event delegation for maximum reliability
    function openServiceModal(serviceName) {
        var overlay = document.getElementById('serviceModalOverlay');
        var serviceInput = document.getElementById('modalService');
        if (!overlay) return;
        if (serviceInput) serviceInput.value = serviceName || '';
        overlay.classList.add('active');
        document.body.style.overflow = 'hidden';
        setTimeout(function() {
            var nameInput = document.getElementById('modalFullName');
            if (nameInput) nameInput.focus();
        }, 400);
    }

    function closeServiceModal() {
        var overlay = document.getElementById('serviceModalOverlay');
        if (!overlay) return;
        overlay.classList.remove('active');
        document.body.style.overflow = '';
    }

    function getModalFormData() {
        return {
            name: (document.getElementById('modalFullName') ? document.getElementById('modalFullName').value : '').trim(),
            email: (document.getElementById('modalEmail') ? document.getElementById('modalEmail').value : '').trim(),
            phone: (document.getElementById('modalPhone') ? document.getElementById('modalPhone').value : '').trim(),
            service: (document.getElementById('modalService') ? document.getElementById('modalService').value : '').trim(),
            message: (document.getElementById('modalMessage') ? document.getElementById('modalMessage').value : '').trim()
        };
    }

    function buildWhatsAppUrl(data) {
        var msg = 'Hello AKSIT GLOBAL!%0A%0A';
        msg += '*Name:* ' + encodeURIComponent(data.name) + '%0A';
        msg += '*Email:* ' + encodeURIComponent(data.email) + '%0A';
        if (data.phone) msg += '*Phone:* ' + encodeURIComponent(data.phone) + '%0A';
        if (data.service) msg += '*Service:* ' + encodeURIComponent(data.service) + '%0A';
        if (data.message) msg += '*Message:* ' + encodeURIComponent(data.message) + '%0A';
        return 'https://wa.me/923000311868?text=' + msg;
    }

    // Event delegation: handle ALL clicks on the page
    document.addEventListener('click', function(e) {
        // "Get in Touch" button clicked
        var touchBtn = e.target.closest('.btn-get-in-touch');
        if (touchBtn) {
            e.preventDefault();
            e.stopPropagation();
            var serviceName = touchBtn.getAttribute('data-service') || '';
            openServiceModal(serviceName);
            return;
        }

        // Close button clicked
        if (e.target.closest('.service-modal-close')) {
            closeServiceModal();
            return;
        }

        // Overlay clicked (not the modal itself)
        if (e.target.id === 'serviceModalOverlay') {
            closeServiceModal();
            return;
        }

        // WhatsApp button clicked
        if (e.target.closest('#modalWhatsAppBtn')) {
            var data = getModalFormData();
            if (!data.name || !data.email) {
                alert('Please fill in at least your name and email.');
                return;
            }
            window.open(buildWhatsAppUrl(data), '_blank');
            var waBtn = document.getElementById('modalWhatsAppBtn');
            if (waBtn) {
                var origHTML = waBtn.innerHTML;
                waBtn.innerHTML = '<i class="fas fa-check"></i> Sent!';
                setTimeout(function() {
                    waBtn.innerHTML = origHTML;
                    var form = document.getElementById('serviceContactForm');
                    if (form) form.reset();
                    closeServiceModal();
                }, 2000);
            }
            return;
        }
    });

    // Escape key to close
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            var overlay = document.getElementById('serviceModalOverlay');
            if (overlay && overlay.classList.contains('active')) {
                closeServiceModal();
            }
        }
    });

    // Form submit handler
    var svcForm = document.getElementById('serviceContactForm');
    if (svcForm) {
        svcForm.addEventListener('submit', function(e) {
            e.preventDefault();
            var data = getModalFormData();
            if (!data.name || !data.email || !data.message) {
                alert('Please fill in all required fields.');
                return;
            }
            window.open(buildWhatsAppUrl(data), '_blank');
            var submitBtn = svcForm.querySelector('.modal-submit-btn');
            if (submitBtn) {
                var origHTML = submitBtn.innerHTML;
                submitBtn.innerHTML = '<i class="fas fa-check-circle"></i> Message Sent!';
                submitBtn.style.background = '#25d366';
                setTimeout(function() {
                    submitBtn.innerHTML = origHTML;
                    submitBtn.style.background = '';
                    svcForm.reset();
                    closeServiceModal();
                }, 2500);
            }
        });
    }

    // --- Smooth scroll for anchor links on same page ---
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                e.preventDefault();
                const offset = 80;
                window.scrollTo({
                    top: target.getBoundingClientRect().top + window.scrollY - offset,
                    behavior: 'smooth'
                });
            }
        });
    });
});
