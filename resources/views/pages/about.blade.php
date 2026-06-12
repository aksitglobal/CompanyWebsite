@extends('layouts.app')

@section('title', 'About Us — AKSIT GLOBAL (Private) Limited')
@section('description', 'Learn about AKSIT GLOBAL (Private) Limited — a Pakistan-based IT services company delivering end-to-end IT solutions, digital transformation, cybersecurity, cloud computing, and professional training.')

@push('styles')
<style>
    /* === ABOUT PAGE EXTENDED STYLES === */
    .about-section {
        padding: 80px 0;
    }
    .about-section:nth-child(even) {
        background: var(--off-white);
    }
    .about-section:nth-child(odd) {
        background: var(--white);
    }

    .about-intro-text {
        max-width: 900px;
        margin: 0 auto;
        text-align: center;
    }
    .about-intro-text p {
        font-size: 1.05rem;
        color: var(--gray-600);
        line-height: 1.9;
        margin-bottom: 16px;
    }

    .services-icon-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 24px;
        margin-top: 40px;
    }
    .service-icon-card {
        padding: 30px 24px;
        background: var(--white);
        border-radius: var(--radius-lg);
        box-shadow: var(--shadow);
        transition: var(--transition);
        border-left: 4px solid var(--accent);
    }
    .service-icon-card:hover {
        transform: translateY(-5px);
        box-shadow: var(--shadow-lg);
    }
    .service-icon-card h4 {
        font-size: 1.05rem;
        font-weight: 700;
        color: var(--primary);
        margin-bottom: 10px;
        display: flex;
        align-items: center;
        gap: 10px;
    }
    .service-icon-card h4 i {
        color: var(--accent);
        font-size: 1.1rem;
    }
    .service-icon-card p {
        font-size: 0.88rem;
        color: var(--gray-600);
        line-height: 1.7;
    }

    .solutions-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 20px;
        margin-top: 40px;
    }
    .solution-item {
        display: flex;
        align-items: flex-start;
        gap: 16px;
        padding: 24px;
        background: var(--off-white);
        border-radius: var(--radius);
        transition: var(--transition);
    }
    .solution-item:hover {
        background: var(--white);
        box-shadow: var(--shadow);
        transform: translateY(-3px);
    }
    .solution-icon {
        width: 50px;
        height: 50px;
        min-width: 50px;
        border-radius: 12px;
        background: linear-gradient(135deg, var(--accent), var(--primary-light));
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--white);
        font-size: 1.2rem;
    }
    .solution-item h4 {
        font-size: 0.95rem;
        font-weight: 700;
        color: var(--primary);
        margin-bottom: 6px;
    }
    .solution-item p {
        font-size: 0.85rem;
        color: var(--gray-600);
        line-height: 1.6;
    }

    .target-sectors {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 20px;
        margin-top: 40px;
    }
    .sector-card {
        text-align: center;
        padding: 30px 20px;
        background: var(--white);
        border-radius: var(--radius-lg);
        box-shadow: var(--shadow);
        transition: var(--transition);
    }
    .sector-card:hover {
        transform: translateY(-5px);
        box-shadow: var(--shadow-lg);
    }
    .sector-card i {
        font-size: 2rem;
        color: var(--accent);
        margin-bottom: 14px;
    }
    .sector-card h4 {
        font-size: 0.95rem;
        font-weight: 700;
        color: var(--primary);
        margin-bottom: 8px;
    }
    .sector-card p {
        font-size: 0.82rem;
        color: var(--gray-500);
        line-height: 1.6;
    }

    .usp-list {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 18px;
        margin-top: 40px;
    }
    .usp-item {
        display: flex;
        align-items: center;
        gap: 14px;
        padding: 20px 24px;
        background: var(--off-white);
        border-radius: var(--radius);
        transition: var(--transition);
    }
    .usp-item:hover {
        background: var(--white);
        box-shadow: var(--shadow);
        transform: translateY(-3px);
    }
    .usp-item i {
        font-size: 1.3rem;
        color: var(--accent);
        min-width: 24px;
    }
    .usp-item div h4 {
        font-size: 0.92rem;
        font-weight: 700;
        color: var(--primary);
        margin-bottom: 4px;
    }
    .usp-item div p {
        font-size: 0.82rem;
        color: var(--gray-500);
        line-height: 1.5;
    }

    .team-roles {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 20px;
        margin-top: 40px;
    }
    .team-role-card {
        padding: 28px 24px;
        background: var(--white);
        border-radius: var(--radius-lg);
        box-shadow: var(--shadow);
        border-top: 4px solid var(--accent);
        transition: var(--transition);
    }
    .team-role-card:hover {
        transform: translateY(-4px);
        box-shadow: var(--shadow-lg);
    }
    .team-role-card h4 {
        font-size: 1rem;
        font-weight: 700;
        color: var(--primary);
        margin-bottom: 8px;
        display: flex;
        align-items: center;
        gap: 10px;
    }
    .team-role-card h4 i {
        color: var(--accent);
    }
    .team-role-card p {
        font-size: 0.88rem;
        color: var(--gray-600);
        line-height: 1.7;
    }

    .training-features {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 20px;
        margin-top: 40px;
    }
    .training-feature-card {
        text-align: center;
        padding: 30px 20px;
        background: var(--off-white);
        border-radius: var(--radius-lg);
        transition: var(--transition);
    }
    .training-feature-card:hover {
        background: var(--white);
        box-shadow: var(--shadow);
        transform: translateY(-4px);
    }
    .training-feature-card i {
        font-size: 2rem;
        color: var(--accent);
        margin-bottom: 14px;
    }
    .training-feature-card h4 {
        font-size: 0.95rem;
        font-weight: 700;
        color: var(--primary);
        margin-bottom: 8px;
    }
    .training-feature-card p {
        font-size: 0.82rem;
        color: var(--gray-500);
        line-height: 1.6;
    }


    .future-goals-list {
        list-style: none;
        margin-top: 30px;
    }
    .future-goals-list li {
        display: flex;
        align-items: flex-start;
        gap: 14px;
        padding: 16px 0;
        border-bottom: 1px solid var(--gray-100);
    }
    .future-goals-list li:last-child {
        border-bottom: none;
    }
    .future-goals-list li i {
        color: var(--gold);
        font-size: 1.1rem;
        margin-top: 3px;
        min-width: 20px;
    }
    .future-goals-list li div h4 {
        font-size: 0.95rem;
        font-weight: 700;
        color: var(--primary);
        margin-bottom: 4px;
    }
    .future-goals-list li div p {
        font-size: 0.88rem;
        color: var(--gray-600);
        line-height: 1.7;
    }

    /* Responsive */
    @media (max-width: 1024px) {
        .services-icon-grid { grid-template-columns: repeat(2, 1fr); }
        .target-sectors { grid-template-columns: repeat(2, 1fr); }
        .training-features { grid-template-columns: repeat(2, 1fr); }
    }
    @media (max-width: 768px) {
        .services-icon-grid { grid-template-columns: 1fr; }
        .solutions-grid { grid-template-columns: 1fr; }
        .target-sectors { grid-template-columns: 1fr; }
        .usp-list { grid-template-columns: 1fr; }
        .team-roles { grid-template-columns: 1fr; }
        .training-features { grid-template-columns: 1fr; }
    }
</style>
@endpush

@section('content')
    <!-- PAGE HERO BANNER -->
    <section class="page-hero">
        <div class="page-hero-content">
            <h1>About <span>AKSIT GLOBAL</span></h1>
            <p>AKSIT GLOBAL (Private) Limited — Your trusted partner for end‑to‑end IT solutions and digital transformation.</p>

        </div>
    </section>

    <!-- 1. COMPANY OVERVIEW -->
    <section class="about-section" id="about">
        <div class="container">
            <div class="about-grid">
                <div class="about-image reveal">
                    <img src="{{ asset('assets/about-office.png') }}" alt="AKSIT GLOBAL Office">
                    <div class="about-image-overlay">
                        <h3>AKSIT GLOBAL</h3>
                        <p>Building Pakistan's IT Future</p>
                    </div>
                </div>
                <div class="about-text reveal">
                    <h2>Who We <span>Are</span></h2>
                    <p>AKSIT GLOBAL (Private) Limited is a Pakistan‑based information technology services company that delivers end‑to‑end IT solutions and digital transformation services. Founded as a startup, the company is built on the belief that modern businesses need reliable, secure and scalable technology to compete in an increasingly digital world.</p>
                    <p>From network infrastructure and managed services to cloud solutions, cybersecurity and professional training, AKSIT Global acts as a single point of contact for organizations looking to modernize their operations and strengthen their IT capabilities.</p>
                    <p>Although early in its journey, the firm has assembled a highly skilled technical team and is actively engaging with clients and partners across Pakistan to deliver tailored solutions. We focus on building strategic relationships, adopting best practices and investing in the professional development of our people to ensure we can scale quickly as our client base grows.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- STATS BAR -->
    <section class="stats-bar">
        <div class="container">
            <div class="stats-grid">
                <div class="stat-item reveal">
                    <span class="number">500+</span>
                    <span class="label">Students Trained</span>
                </div>
                <div class="stat-item reveal">
                    <span class="number">50+</span>
                    <span class="label">IT Courses Offered</span>
                </div>
                <div class="stat-item reveal">
                    <span class="number">20+</span>
                    <span class="label">Expert Trainers</span>
                </div>
                <div class="stat-item reveal">
                    <span class="number">95%</span>
                    <span class="label">Client Satisfaction</span>
                </div>
            </div>
        </div>
    </section>

    <!-- 2. VISION & MISSION -->
    <section class="about-section">
        <div class="container">
            <div class="section-title reveal">
                <h2>Our Vision & Mission</h2>
                <p>Driving innovation and building talent for the digital future</p>
            </div>
            <div class="mv-grid">
                <div class="mv-card reveal">
                    <div class="icon"><i class="fas fa-eye"></i></div>
                    <h3>Our Vision</h3>
                    <p>To be a global leader in IT consulting and managed services, delivering innovative and secure digital solutions that empower businesses to reach their full potential.</p>
                </div>
                <div class="mv-card reveal">
                    <div class="icon"><i class="fas fa-bullseye"></i></div>
                    <h3>Our Mission</h3>
                    <p>To serve as a trusted technology partner, driving digital resilience and sustainable success through secure, scalable and high‑performance IT solutions tailored to each client.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- 3. CORE SERVICES -->
    <section class="about-section">
        <div class="container">
            <div class="section-title reveal">
                <h2>Core Services</h2>
                <p>Comprehensive IT solutions designed to protect, grow, and transform your business</p>
            </div>
            <div class="services-icon-grid">
                <div class="service-icon-card reveal">
                    <h4><i class="fas fa-server"></i> Managed IT Services</h4>
                    <p>End‑to‑end management of clients' IT systems, covering network monitoring, system maintenance, patch management, helpdesk support and optimization. We reduce downtime, improve performance and allow businesses to focus on their core activities.</p>
                </div>
                <div class="service-icon-card reveal">
                    <h4><i class="fas fa-cogs"></i> IT Solutions</h4>
                    <p>Design, implementation and lifecycle management of technology solutions including network infrastructure, cybersecurity, cloud migrations, virtualization, backup & disaster recovery, unified communications, AI and automation — tailored for long‑term scalability.</p>
                </div>
                <div class="service-icon-card reveal">
                    <h4><i class="fas fa-network-wired"></i> Network Infrastructure Design</h4>
                    <p>Architecture and deployment of resilient networks (LAN/WAN, SD‑WAN, Wi‑Fi), structured cabling, server and data‑center configurations, and network optimization — planned for redundancy, high availability and future growth.</p>
                </div>
                <div class="service-icon-card reveal">
                    <h4><i class="fas fa-headset"></i> IT Support & Maintenance</h4>
                    <p>24/7 helpdesk and on‑site technical support, system upgrades, troubleshooting, firewall management, cloud administration (Azure, AWS, M365), server virtualization, user access management, and IT asset management.</p>
                </div>
                <div class="service-icon-card reveal">
                    <h4><i class="fas fa-graduation-cap"></i> IT Training & Internship Programs</h4>
                    <p>Professionally structured courses for certifications such as CCNA, CCNP, CCIE, AWS, Azure, DevOps and security qualifications. Hands‑on lab sessions and internship programs under guidance of senior engineers and instructors.</p>
                </div>
                <div class="service-icon-card reveal">
                    <h4><i class="fas fa-file-contract"></i> Tender Participation & Project Execution</h4>
                    <p>Support for public and private sector tendering processes, including proposal preparation, compliance with technical specifications, and project management in line with government procurement guidelines and corporate governance frameworks.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- 4. SOLUTIONS / OFFERINGS -->
    <section class="about-section">
        <div class="container">
            <div class="section-title reveal">
                <h2>Solutions & Offerings</h2>
                <p>Outcome‑focused solutions that integrate technology, expert design and seamless implementation</p>
            </div>
            <div class="solutions-grid">
                <div class="solution-item reveal">
                    <div class="solution-icon"><i class="fas fa-network-wired"></i></div>
                    <div>
                        <h4>Enterprise Network Infrastructure</h4>
                        <p>Secure LAN/WAN architectures, SD‑WAN, wireless network design and end‑to‑end communications systems.</p>
                    </div>
                </div>
                <div class="solution-item reveal">
                    <div class="solution-icon"><i class="fas fa-shield-halved"></i></div>
                    <div>
                        <h4>Cybersecurity & Threat Protection</h4>
                        <p>Multilayer defense with firewalls, zero‑trust architecture, IAM, endpoint protection, SIEM and 24×7 threat monitoring.</p>
                    </div>
                </div>
                <div class="solution-item reveal">
                    <div class="solution-icon"><i class="fas fa-cloud"></i></div>
                    <div>
                        <h4>Cloud & Data Center Solutions</h4>
                        <p>Migration to public or hybrid clouds, virtualization, infrastructure upgrades and managed data‑center services for high availability.</p>
                    </div>
                </div>
                <div class="solution-item reveal">
                    <div class="solution-icon"><i class="fas fa-robot"></i></div>
                    <div>
                        <h4>AI, Automation & Intelligent Operations</h4>
                        <p>AI‑driven analytics, chatbots, workflow automation and AIOps to improve decision‑making and operational efficiency.</p>
                    </div>
                </div>
                <div class="solution-item reveal">
                    <div class="solution-icon"><i class="fas fa-database"></i></div>
                    <div>
                        <h4>Backup, Storage & Disaster Recovery</h4>
                        <p>Secure backups, replication, storage management and structured DR plans to protect critical data and minimize downtime.</p>
                    </div>
                </div>
                <div class="solution-item reveal">
                    <div class="solution-icon"><i class="fas fa-code"></i></div>
                    <div>
                        <h4>Digital Transformation & Software Development</h4>
                        <p>Cloud adoption program management, legacy application modernization and custom web/mobile app development.</p>
                    </div>
                </div>
                <div class="solution-item reveal">
                    <div class="solution-icon"><i class="fas fa-shopping-cart"></i></div>
                    <div>
                        <h4>E‑Commerce & Digital Business Solutions</h4>
                        <p>Store development, payment integration, CRM, SEO and digital branding for online business growth.</p>
                    </div>
                </div>
                <div class="solution-item reveal">
                    <div class="solution-icon"><i class="fas fa-users-cog"></i></div>
                    <div>
                        <h4>IT Outsourcing & Managed Solutions</h4>
                        <p>Dedicated IT resources and managed environments that scale with clients' growth and evolving requirements.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 5. TARGET MARKET / INDUSTRIES -->
    <section class="about-section">
        <div class="container">
            <div class="section-title reveal">
                <h2>Industries We Serve</h2>
                <p>Serving organizations across Pakistan with flexibility to support clients abroad</p>
            </div>
            <div class="target-sectors">
                <div class="sector-card reveal">
                    <i class="fas fa-building"></i>
                    <h4>SMEs</h4>
                    <p>Small and medium enterprises seeking to outsource IT functions or modernize operations.</p>
                </div>
                <div class="sector-card reveal">
                    <i class="fas fa-landmark"></i>
                    <h4>Government & Public Sector</h4>
                    <p>Agencies requiring secure, scalable and compliant IT solutions for digital governance.</p>
                </div>
                <div class="sector-card reveal">
                    <i class="fas fa-school"></i>
                    <h4>Education & Training</h4>
                    <p>Institutions needing robust networks, e‑learning platforms and instructor‑led courses.</p>
                </div>
                <div class="sector-card reveal">
                    <i class="fas fa-hospital"></i>
                    <h4>Healthcare</h4>
                    <p>Organizations demanding high security, data protection and regulatory compliance.</p>
                </div>
                <div class="sector-card reveal">
                    <i class="fas fa-chart-pie"></i>
                    <h4>Financial Services</h4>
                    <p>Firms requiring secure transactions, compliance frameworks and risk management solutions.</p>
                </div>
                <div class="sector-card reveal">
                    <i class="fas fa-industry"></i>
                    <h4>Manufacturing, Retail & Hospitality</h4>
                    <p>Companies investing in digital transformation and smart technologies for competitive advantage.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- 6. USP -->
    <section class="about-section">
        <div class="container">
            <div class="section-title reveal">
                <h2>What Sets Us Apart</h2>
                <p>Our unique selling propositions that differentiate AKSIT Global</p>
            </div>
            <div class="usp-list">
                <div class="usp-item reveal">
                    <i class="fas fa-layer-group"></i>
                    <div>
                        <h4>Comprehensive Service Portfolio</h4>
                        <p>Managed services, solutions, training and consultancy under one roof.</p>
                    </div>
                </div>
                <div class="usp-item reveal">
                    <i class="fas fa-certificate"></i>
                    <div>
                        <h4>Certified Expertise</h4>
                        <p>Engineers and consultants with internationally recognized certifications in networking, cloud and cybersecurity.</p>
                    </div>
                </div>
                <div class="usp-item reveal">
                    <i class="fas fa-drafting-compass"></i>
                    <div>
                        <h4>Custom‑Designed Solutions</h4>
                        <p>Tailored architectures and strategies aligned with each client's goals and budgets.</p>
                    </div>
                </div>
                <div class="usp-item reveal">
                    <i class="fas fa-clock"></i>
                    <div>
                        <h4>24/7 Technical Support</h4>
                        <p>Around‑the‑clock assistance ensuring uptime and prompt issue resolution.</p>
                    </div>
                </div>
                <div class="usp-item reveal">
                    <i class="fas fa-lock"></i>
                    <div>
                        <h4>Security & Compliance Focus</h4>
                        <p>Strong focus on data privacy and adherence to global information security standards.</p>
                    </div>
                </div>
                <div class="usp-item reveal">
                    <i class="fas fa-book-open"></i>
                    <div>
                        <h4>Learning & Development Culture</h4>
                        <p>Continuous training and internship programs ensuring a pipeline of skilled professionals.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 7. TEAM & EXPERTISE -->
    <section class="about-section">
        <div class="container">
            <div class="section-title reveal">
                <h2>Team & Expertise</h2>
                <p>Led by seasoned professionals with international experience in network architecture, cybersecurity, cloud and enterprise infrastructure</p>
            </div>
            <div class="about-intro-text reveal" style="margin-bottom: 30px;">
                <p>The leadership team fosters a culture of innovation, collaboration and continuous improvement. Our wider organization comprises specialists across multiple domains.</p>
            </div>
            <div class="team-roles">
                <div class="team-role-card reveal">
                    <h4><i class="fas fa-network-wired"></i> Network Engineers & Architects</h4>
                    <p>Experienced in designing and deploying complex, multi‑vendor environments for enterprise-grade performance and reliability.</p>
                </div>
                <div class="team-role-card reveal">
                    <h4><i class="fas fa-user-shield"></i> Security Professionals</h4>
                    <p>Certified in ethical hacking, penetration testing, SIEM and zero‑trust frameworks to protect your digital assets.</p>
                </div>
                <div class="team-role-card reveal">
                    <h4><i class="fas fa-laptop-code"></i> Software Developers & Data Engineers</h4>
                    <p>Proficient in modern programming languages, frameworks and databases for custom application development.</p>
                </div>
                <div class="team-role-card reveal">
                    <h4><i class="fas fa-chalkboard-teacher"></i> Training Instructors</h4>
                    <p>Certified in Cisco, Microsoft, Linux and emerging technologies, providing both classroom and virtual training sessions.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- 8. PROJECTS / EXPERIENCE -->
    <section class="about-section">
        <div class="container">
            <div class="section-title reveal">
                <h2>Projects & Experience</h2>
                <p>Building our portfolio through innovation, research and community engagement</p>
            </div>
            <div class="solutions-grid">
                <div class="solution-item reveal">
                    <div class="solution-icon" style="background: linear-gradient(135deg, #059669, #34d399);"><i class="fas fa-flask"></i></div>
                    <div>
                        <h4>Proof‑of‑Concept Deployments</h4>
                        <p>Implementing pilot projects for SMEs to demonstrate solution value and scalability before full deployment.</p>
                    </div>
                </div>
                <div class="solution-item reveal">
                    <div class="solution-icon" style="background: linear-gradient(135deg, #7c3aed, #a78bfa);"><i class="fas fa-microscope"></i></div>
                    <div>
                        <h4>Internal R&D and Lab Environments</h4>
                        <p>Designing and testing network configurations, cloud architectures and security solutions in controlled settings.</p>
                    </div>
                </div>
                <div class="solution-item reveal">
                    <div class="solution-icon" style="background: linear-gradient(135deg, #d97706, #fbbf24);"><i class="fas fa-users"></i></div>
                    <div>
                        <h4>Community & Industry Workshops</h4>
                        <p>Organizing free or low‑cost workshops on cybersecurity, networking and cloud best practices for the IT community.</p>
                    </div>
                </div>
                <div class="solution-item reveal">
                    <div class="solution-icon" style="background: linear-gradient(135deg, #dc2626, #f87171);"><i class="fas fa-university"></i></div>
                    <div>
                        <h4>Academic Collaborations</h4>
                        <p>Partnering with educational institutions to provide lab resources and guest lectures with enterprise‑grade technologies.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 9. TRAINING & INTERNSHIP PROGRAMS -->
    <section class="about-section">
        <div class="container">
            <div class="section-title reveal">
                <h2>Training & Internship Programs</h2>
                <p>Nurturing local talent and building a skilled workforce for Pakistan's IT future</p>
            </div>
            <div class="training-features">
                <div class="training-feature-card reveal">
                    <i class="fas fa-certificate"></i>
                    <h4>Certification Courses</h4>
                    <p>CCNA, CCNP, CCIE, AWS, Azure, DevOps, Linux, cybersecurity and other industry‑recognized credentials.</p>
                </div>
                <div class="training-feature-card reveal">
                    <i class="fas fa-laptop-code"></i>
                    <h4>Practical Lab Sessions</h4>
                    <p>Hands‑on labs simulating enterprise networks, server environments and cloud platforms.</p>
                </div>
                <div class="training-feature-card reveal">
                    <i class="fas fa-chalkboard-teacher"></i>
                    <h4>Instructor‑Led Workshops</h4>
                    <p>Live classes with experienced trainers covering theory, best practices and real‑world case studies.</p>
                </div>
                <div class="training-feature-card reveal">
                    <i class="fas fa-briefcase"></i>
                    <h4>Internship Placements</h4>
                    <p>8–12‑week programs where students and fresh graduates gain valuable experience in network design, system administration and support.</p>
                </div>
                <div class="training-feature-card reveal">
                    <i class="fas fa-compass"></i>
                    <h4>Career Mentoring</h4>
                    <p>Guidance on career paths, interview preparation and soft‑skills development to transition into professional roles.</p>
                </div>
                <div class="training-feature-card reveal">
                    <i class="fas fa-video"></i>
                    <h4>Online & On‑Campus</h4>
                    <p>Flexible learning options with virtual classrooms and in‑person sessions to suit every schedule.</p>
                </div>
            </div>
            <div style="text-align: center; margin-top: 36px;">
                <a href="{{ route('courses') }}" class="btn btn-primary">Browse All Courses <i class="fas fa-arrow-right" style="margin-left: 8px;"></i></a>
            </div>
        </div>
    </section>

    <!-- 11. FUTURE GOALS -->
    <section class="about-section">
        <div class="container">
            <div class="section-title reveal">
                <h2>Future Goals & Growth Strategy</h2>
                <p>Our roadmap for becoming a key player in Pakistan's IT sector</p>
            </div>
            <ul class="future-goals-list reveal">
                <li>
                    <i class="fas fa-rocket"></i>
                    <div>
                        <h4>Expanding Client Base</h4>
                        <p>Actively engaging with private enterprises, public sector organizations and international companies seeking reliable IT partners in Pakistan.</p>
                    </div>
                </li>
                <li>
                    <i class="fas fa-handshake"></i>
                    <div>
                        <h4>Strengthening Vendor Partnerships</h4>
                        <p>Securing reseller and service provider agreements with leading technology vendors to broaden service offerings and deepen expertise.</p>
                    </div>
                </li>
                <li>
                    <i class="fas fa-microchip"></i>
                    <div>
                        <h4>Developing Niche Solutions</h4>
                        <p>Investing in R&D for AI, automation, Internet of Things (IoT) and intelligent operations to address emerging market demands.</p>
                    </div>
                </li>
                <li>
                    <i class="fas fa-globe-asia"></i>
                    <div>
                        <h4>Geographic Expansion</h4>
                        <p>Exploring opportunities to serve clients in the Middle East, Central Asia and beyond by leveraging Pakistan's growing IT talent pool.</p>
                    </div>
                </li>
                <li>
                    <i class="fas fa-award"></i>
                    <div>
                        <h4>Continuous Learning & Certification</h4>
                        <p>Encouraging team members to pursue advanced certifications and participate in ongoing professional development.</p>
                    </div>
                </li>
                <li>
                    <i class="fas fa-building"></i>
                    <div>
                        <h4>State‑of‑the‑Art Training Centre</h4>
                        <p>Establishing a dedicated facility with labs, classrooms and online platforms to scale training programs and meet growing demand for IT skills.</p>
                    </div>
                </li>
            </ul>
        </div>
    </section>


    <!-- CTA -->
    <section class="cta-banner">
        <div class="container">
            <div class="cta-content reveal">
                <h2>Ready to Partner with AKSIT Global?</h2>
                <p>We invite prospective partners and clients to engage with us, explore joint opportunities and build a secure, intelligent and sustainable digital future together.</p>
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
                Ready to partner with AKSIT Global?<br>We're available on WhatsApp!
            </p>
            <p style="font-size:17px; font-weight:700; color:#128c7e; margin-bottom:24px; letter-spacing:0.5px;">+92 300 031 1868</p>

            <a href="https://wa.me/923000311868?text=Hi%2C%20I%20would%20like%20to%20discuss%20a%20partnership%20with%20AKSIT%20Global." target="_blank" style="
                display:inline-flex; align-items:center; gap:10px;
                background:linear-gradient(135deg,#25d366,#128c7e);
                color:#fff; text-decoration:none; font-weight:700; font-size:16px;
                padding:14px 32px; border-radius:50px;
                box-shadow:0 6px 20px rgba(37,211,102,0.4);
                transition:transform 0.2s, box-shadow 0.2s;
                width:100%; justify-content:center;
            " onmouseover="this.style.transform='translateY(-2px)';this.style.boxShadow='0 10px 28px rgba(37,211,102,0.5)';"
               onmouseout="this.style.transform='translateY(0)';this.style.boxShadow='0 6px 20px rgba(37,211,102,0.4)';">
                <i class="fab fa-whatsapp" style="font-size:20px;"></i>
                Start WhatsApp Chat
            </a>

            <p style="margin-top:16px; font-size:13px; color:#aaa;">We typically reply within a few minutes.</p>
        </div>
    </div>

    <style>
        @keyframes popupIn {
            from { opacity:0; transform:scale(0.8) translateY(20px); }
            to   { opacity:1; transform:scale(1) translateY(0); }
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
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') closeContactPopup();
        });
    </script>
@endsection
