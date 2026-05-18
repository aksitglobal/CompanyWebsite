/* ========================================
   AKSIT GLOBAL — Courses Modal Logic
   ======================================== */

let currentCourseCard = null;

// --- ENROLLMENT MODAL ---
function openEnrollModal(btn) {
    const card = btn.closest('.course-card');
    currentCourseCard = card;
    const courseName = card.dataset.course || card.querySelector('h3').textContent;

    document.getElementById('enrollCourseName').textContent = courseName;
    document.getElementById('enrollCourse').value = courseName;
    document.getElementById('enrollOverlay').classList.add('active');
    document.body.style.overflow = 'hidden';
}

function closeEnrollModal() {
    document.getElementById('enrollOverlay').classList.remove('active');
    document.body.style.overflow = '';
}

// --- DETAILS MODAL ---
function openDetailsModal(btn) {
    const card = btn.closest('.course-card');
    currentCourseCard = card;
    const d = card.dataset;
    const courseName = d.course || card.querySelector('h3').textContent;
    const duration = d.duration || 'TBD';
    const level = d.level || 'All Levels';
    const overview = d.overview || '';
    const topics = d.topics ? d.topics.split(',') : [];
    const benefits = d.benefits ? d.benefits.split(',') : [];

    // Get gradient from the card image
    const cardImage = card.querySelector('.course-card-image');
    const bg = cardImage.style.background || 'linear-gradient(135deg, #1e3a6e, #2563eb)';
    document.getElementById('detailsHeaderBg').style.background = bg;

    // Badge
    const badge = document.getElementById('detailsBadge');
    badge.querySelector('span').textContent = level;

    // Title
    document.getElementById('detailsTitle').textContent = courseName;

    // Meta bar
    const metaBar = document.getElementById('detailsMeta');
    metaBar.innerHTML = `
        <div class="details-meta-item">
            <i class="fas fa-clock"></i>
            <div><strong>${duration}</strong><br><small>Duration</small></div>
        </div>
        <div class="details-meta-item">
            <i class="fas fa-signal"></i>
            <div><strong>${level}</strong><br><small>Level</small></div>
        </div>
        <div class="details-meta-item">
            <i class="fas fa-chalkboard-teacher"></i>
            <div><strong>Expert-Led</strong><br><small>Training</small></div>
        </div>
        <div class="details-meta-item">
            <i class="fas fa-certificate"></i>
            <div><strong>Certified</strong><br><small>Program</small></div>
        </div>
    `;

    // Overview
    document.getElementById('detailsOverview').textContent = overview;

    // Topics
    const topicsList = document.getElementById('detailsTopics');
    topicsList.innerHTML = topics.map(t =>
        `<li><i class="fas fa-check-circle"></i> ${t.trim()}</li>`
    ).join('');

    // Benefits
    const benefitsDiv = document.getElementById('detailsBenefits');
    const benefitIcons = ['fa-briefcase', 'fa-dollar-sign', 'fa-award', 'fa-chart-line'];
    benefitsDiv.innerHTML = benefits.map((b, i) =>
        `<div class="benefit-item">
            <i class="fas ${benefitIcons[i % benefitIcons.length]}"></i>
            <span>${b.trim()}</span>
        </div>`
    ).join('');

    document.getElementById('detailsOverlay').classList.add('active');
    document.body.style.overflow = 'hidden';
}

function closeDetailsModal() {
    document.getElementById('detailsOverlay').classList.remove('active');
    document.body.style.overflow = '';
}

// Switch from details to enroll
function detailsToEnroll() {
    const courseName = document.getElementById('detailsTitle').textContent;
    closeDetailsModal();
    setTimeout(() => {
        document.getElementById('enrollCourseName').textContent = courseName;
        document.getElementById('enrollCourse').value = courseName;
        document.getElementById('enrollOverlay').classList.add('active');
        document.body.style.overflow = 'hidden';
    }, 300);
}

// --- CLOSE ON OVERLAY CLICK ---
document.getElementById('enrollOverlay').addEventListener('click', function(e) {
    if (e.target === this) closeEnrollModal();
});
document.getElementById('detailsOverlay').addEventListener('click', function(e) {
    if (e.target === this) closeDetailsModal();
});

// --- CLOSE ON ESCAPE ---
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        closeEnrollModal();
        closeDetailsModal();
    }
});

// --- ENROLLMENT FORM SUBMIT ---
document.getElementById('enrollForm').addEventListener('submit', function(e) {
    e.preventDefault();

    const name = document.getElementById('enrollName').value.trim();
    const email = document.getElementById('enrollEmail').value.trim();
    const phone = document.getElementById('enrollPhone').value.trim();
    const course = document.getElementById('enrollCourse').value;
    const message = document.getElementById('enrollMessage').value.trim();

    if (!name || !email || !phone) {
        alert('Please fill in all required fields.');
        return;
    }

    let waMsg = `Hello AKSIT GLOBAL!%0A%0A`;
    waMsg += `*📋 Enrollment Request*%0A`;
    waMsg += `*Name:* ${encodeURIComponent(name)}%0A`;
    waMsg += `*Email:* ${encodeURIComponent(email)}%0A`;
    waMsg += `*Phone:* ${encodeURIComponent(phone)}%0A`;
    waMsg += `*Course:* ${encodeURIComponent(course)}%0A`;
    if (message) waMsg += `*Message:* ${encodeURIComponent(message)}%0A`;

    window.open(`https://wa.me/923000311868?text=${waMsg}`, '_blank');

    // Success feedback
    const btn = document.getElementById('enrollSubmitBtn');
    btn.innerHTML = '<i class="fas fa-check"></i> Sent via WhatsApp!';
    btn.classList.add('sent');
    setTimeout(() => {
        btn.innerHTML = '<i class="fab fa-whatsapp"></i> Submit via WhatsApp';
        btn.classList.remove('sent');
        document.getElementById('enrollForm').reset();
        closeEnrollModal();
    }, 2500);
});
