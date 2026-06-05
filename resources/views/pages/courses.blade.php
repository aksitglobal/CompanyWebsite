@extends('layouts.app')

@section('title', 'Courses — AKSIT GLOBAL')
@section('description', 'Explore 50+ professional IT training courses at AKSIT GLOBAL — Cisco, cybersecurity, cloud computing, DevOps, web development, and digital marketing.')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/courses-modal.css') }}">
<style>
    /* === COURSE LEVEL SIGNAL BARS === */
    .level-indicator {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        font-weight: 600;
        font-size: 0.82rem;
        padding: 3px 10px 3px 8px;
        border-radius: 20px;
        transition: all 0.3s ease;
    }
    .level-indicator:hover {
        transform: scale(1.05);
    }
    .level-bars {
        display: inline-flex;
        align-items: flex-end;
        gap: 2px;
        height: 14px;
    }
    .level-bars span {
        display: inline-block;
        width: 3.5px;
        border-radius: 2px;
        transition: transform 0.3s ease, opacity 0.3s ease;
    }
    .level-indicator:hover .level-bars span {
        transform: scaleY(1.15);
    }

    /* Beginner — 2 bars, red */
    .level-beginner { color: #ef4444; background: rgba(239,68,68,0.1); }
    .level-beginner .level-bars span:nth-child(1) { height: 6px; background: #ef4444; }
    .level-beginner .level-bars span:nth-child(2) { height: 11px; background: #ef4444; }

    /* Beginner-Intermediate — 3 bars, orange */
    .level-beg-int { color: #f59e0b; background: rgba(245,158,11,0.1); }
    .level-beg-int .level-bars span:nth-child(1) { height: 5px; background: #f59e0b; }
    .level-beg-int .level-bars span:nth-child(2) { height: 9px; background: #f59e0b; }
    .level-beg-int .level-bars span:nth-child(3) { height: 13px; background: #f59e0b; }

    /* Intermediate — 3 bars, blue */
    .level-intermediate { color: #3b82f6; background: rgba(59,130,246,0.1); }
    .level-intermediate .level-bars span:nth-child(1) { height: 5px; background: #3b82f6; }
    .level-intermediate .level-bars span:nth-child(2) { height: 9px; background: #3b82f6; }
    .level-intermediate .level-bars span:nth-child(3) { height: 13px; background: #3b82f6; }

    /* Advanced — 4 bars, purple */
    .level-advanced { color: #8b5cf6; background: rgba(139,92,246,0.1); }
    .level-advanced .level-bars span:nth-child(1) { height: 4px; background: #8b5cf6; }
    .level-advanced .level-bars span:nth-child(2) { height: 7px; background: #8b5cf6; }
    .level-advanced .level-bars span:nth-child(3) { height: 10px; background: #8b5cf6; }
    .level-advanced .level-bars span:nth-child(4) { height: 14px; background: #8b5cf6; }

    /* Beginner-Advanced — 4 bars, purple */
    .level-beg-adv { color: #8b5cf6; background: rgba(139,92,246,0.1); }
    .level-beg-adv .level-bars span:nth-child(1) { height: 4px; background: #8b5cf6; }
    .level-beg-adv .level-bars span:nth-child(2) { height: 7px; background: #8b5cf6; }
    .level-beg-adv .level-bars span:nth-child(3) { height: 10px; background: #8b5cf6; }
    .level-beg-adv .level-bars span:nth-child(4) { height: 14px; background: #8b5cf6; }

    /* Expert — 5 bars, green */
    .level-expert { color: #22c55e; background: rgba(34,197,94,0.1); }
    .level-expert .level-bars span:nth-child(1) { height: 3px; background: #22c55e; }
    .level-expert .level-bars span:nth-child(2) { height: 6px; background: #22c55e; }
    .level-expert .level-bars span:nth-child(3) { height: 9px; background: #22c55e; }
    .level-expert .level-bars span:nth-child(4) { height: 12px; background: #22c55e; }
    .level-expert .level-bars span:nth-child(5) { height: 14px; background: #22c55e; }
</style>
@endpush

@section('content')
    <!-- PAGE HERO -->
    <section class="page-hero">
        <div class="page-hero-content">
            <h1>Our Training <span>Courses</span></h1>
            <p>Industry-recognized certifications and hands-on training programs to launch or advance your IT career.</p>
            <div class="breadcrumb"><a href="{{ route('home') }}">Home</a> <i class="fas fa-chevron-right"></i> <span>Courses</span></div>
        </div>
    </section>

    <!-- COURSES INTRO -->
    <section class="courses-intro">
        <div class="container">
            <div class="section-title reveal">
                <h2>Invest in Your Future</h2>
                <p>Choose from our comprehensive range of 50+ IT training programs designed by industry experts</p>
            </div>
            <div class="courses-features reveal">
                <div class="course-feature">
                    <i class="fas fa-chalkboard-teacher"></i>
                    <h4>Expert-Led Training</h4>
                    <p>All courses taught by certified industry professionals</p>
                </div>
                <div class="course-feature">
                    <i class="fas fa-laptop-code"></i>
                    <h4>Hands-On Labs</h4>
                    <p>Real-world projects and practical exercises included</p>
                </div>
                <div class="course-feature">
                    <i class="fas fa-certificate"></i>
                    <h4>Certified Programs</h4>
                    <p>Globally recognized certifications upon completion</p>
                </div>
                <div class="course-feature">
                    <i class="fas fa-video"></i>
                    <h4>Online & On-Campus</h4>
                    <p>Flexible learning options to suit your schedule</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ALL COURSES -->
    <section class="courses" id="courses">
        <div class="container">

            <!-- Category: Networking -->
            <div class="course-category reveal">
                <h3 class="category-title"><i class="fas fa-network-wired"></i> Networking & Cisco Certifications</h3>
            </div>
            <div class="courses-grid">
                <div class="course-card reveal" data-course="CCNA — Cisco Certified Network Associate" data-duration="8-12 Weeks" data-level="Beginner" data-overview="Master the fundamentals of networking including routing, switching, IP addressing, and network security. CCNA is the most popular entry-level Cisco certification and your gateway to a rewarding networking career." data-topics="Network Fundamentals &amp; OSI Model,IP Addressing &amp; Subnetting,Routing Protocols (OSPF, EIGRP),Switching &amp; VLANs,Network Security Basics,Wireless Networking,Automation &amp; Programmability,WAN Technologies" data-benefits="Entry into high-demand networking roles,Average salary of $65K–$85K globally,Foundation for advanced Cisco certs (CCNP/CCIE),Recognized by employers worldwide">
                    <div class="course-card-image"><div class="course-icon"><i class="fas fa-network-wired"></i></div><div class="course-badge cisco"><i class="fas fa-network-wired"></i></div></div>
                    <div class="course-card-body">
                        <h3>CCNA — Cisco Certified Network Associate</h3>
                        <p>Master the fundamentals of networking — routing, switching, IP addressing, and network security. The gateway to your Cisco career path.</p>
                        <div class="course-meta"><span><i class="fas fa-clock"></i> 8-12 Weeks</span><span class="level-indicator level-beginner"><span class="level-bars"><span></span><span></span></span> Beginner</span></div>
                        <div class="course-btn-group">
                            <button class="btn btn-primary btn-enroll" onclick="openEnrollModal(this)">Enroll Now</button>
                            <button class="btn-details" onclick="openDetailsModal(this)"><i class="fas fa-info-circle"></i> Details</button>
                        </div>
                    </div>
                </div>
                <div class="course-card reveal" data-course="CCNP — Cisco Certified Network Professional" data-duration="12-16 Weeks" data-level="Intermediate" data-overview="Advance your networking expertise with enterprise-grade routing, switching, wireless, and security. CCNP validates your ability to plan, implement, and troubleshoot complex enterprise networks." data-topics="Advanced Routing (BGP, OSPF, EIGRP),Enterprise Switching &amp; STP,Network Security &amp; VPNs,SD-WAN &amp; SD-Access,Wireless Enterprise Solutions,Network Automation with Python,QoS &amp; Traffic Management,Troubleshooting Methodologies" data-benefits="Senior network engineer positions,Average salary of $85K–$110K globally,Leadership roles in IT infrastructure,Pathway to CCIE expert certification">
                    <div class="course-card-image" style="background: linear-gradient(135deg, #1e3a6e, #4f83cc);"><div class="course-icon"><i class="fas fa-project-diagram"></i></div><div class="course-badge cisco"><i class="fas fa-project-diagram"></i></div></div>
                    <div class="course-card-body">
                        <h3>CCNP — Cisco Certified Network Professional</h3>
                        <p>Advance your networking expertise with deep dives into enterprise routing, switching, wireless, and security.</p>
                        <div class="course-meta"><span><i class="fas fa-clock"></i> 12-16 Weeks</span><span class="level-indicator level-intermediate"><span class="level-bars"><span></span><span></span><span></span></span> Intermediate</span></div>
                        <div class="course-btn-group">
                            <button class="btn btn-primary btn-enroll" onclick="openEnrollModal(this)">Enroll Now</button>
                            <button class="btn-details" onclick="openDetailsModal(this)"><i class="fas fa-info-circle"></i> Details</button>
                        </div>
                    </div>
                </div>
                <div class="course-card reveal" data-course="CCIE — Cisco Certified Internetwork Expert" data-duration="16-24 Weeks" data-level="Expert" data-overview="The gold standard of networking certifications. CCIE validates expert-level knowledge and skills in complex network infrastructure. One of the highest-paid and most respected IT credentials worldwide." data-topics="Expert Routing &amp; Switching,Complex Network Design,Advanced Troubleshooting,Lab-based Practical Exam Prep,Multi-protocol Integration,Network Optimization,Security Architecture,Automation at Scale" data-benefits="Top 1% of networking professionals,Average salary of $120K–$170K globally,Prestigious expert-level recognition,CTO/Senior Architect career paths">
                    <div class="course-card-image" style="background: linear-gradient(135deg, #0f1d3d, #1e3a6e);"><div class="course-icon"><i class="fas fa-trophy"></i></div><div class="course-badge cisco"><i class="fas fa-trophy"></i></div></div>
                    <div class="course-card-body">
                        <h3>CCIE — Cisco Certified Internetwork Expert</h3>
                        <p>The gold standard of networking certifications. Master expert-level routing, switching, and troubleshooting.</p>
                        <div class="course-meta"><span><i class="fas fa-clock"></i> 16-24 Weeks</span><span class="level-indicator level-expert"><span class="level-bars"><span></span><span></span><span></span><span></span><span></span></span> Expert</span></div>
                        <div class="course-btn-group">
                            <button class="btn btn-primary btn-enroll" onclick="openEnrollModal(this)">Enroll Now</button>
                            <button class="btn-details" onclick="openDetailsModal(this)"><i class="fas fa-info-circle"></i> Details</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Category: Cybersecurity -->
            <div class="course-category reveal">
                <h3 class="category-title"><i class="fas fa-shield-halved"></i> Cyber Security & Ethical Hacking</h3>
            </div>
            <div class="courses-grid">
                <div class="course-card reveal" data-course="Certified Ethical Hacker (CEH)" data-duration="10-14 Weeks" data-level="Intermediate" data-overview="Learn to think like a hacker to defend against cyber threats. CEH by EC-Council covers penetration testing, vulnerability assessment, and ethical hacking methodologies used by top security professionals worldwide." data-topics="Footprinting &amp; Reconnaissance,Scanning Networks,System Hacking,Malware Threats &amp; Analysis,Sniffing &amp; Social Engineering,SQL Injection &amp; Web App Hacking,Cryptography,Cloud Security &amp; IoT Hacking" data-benefits="High-demand cybersecurity career,Average salary of $80K–$110K,Globally recognized EC-Council cert,Roles in penetration testing &amp; SOC">
                    <div class="course-card-image" style="background: linear-gradient(135deg, #7c3aed, #a78bfa);"><div class="course-icon"><i class="fas fa-shield-halved"></i></div><div class="course-badge security"><i class="fas fa-shield-halved"></i></div></div>
                    <div class="course-card-body">
                        <h3>Certified Ethical Hacker (CEH)</h3>
                        <p>Learn to think like a hacker to defend against cyber threats. Master penetration testing and vulnerability assessment.</p>
                        <div class="course-meta"><span><i class="fas fa-clock"></i> 10-14 Weeks</span><span class="level-indicator level-intermediate"><span class="level-bars"><span></span><span></span><span></span></span> Intermediate</span></div>
                        <div class="course-btn-group">
                            <button class="btn btn-primary btn-enroll" onclick="openEnrollModal(this)">Enroll Now</button>
                            <button class="btn-details" onclick="openDetailsModal(this)"><i class="fas fa-info-circle"></i> Details</button>
                        </div>
                    </div>
                </div>
                <div class="course-card reveal" data-course="CISSP — Certified Information Systems Security" data-duration="12-16 Weeks" data-level="Advanced" data-overview="The world's premier cybersecurity certification by (ISC)². CISSP validates deep expertise in security architecture, risk management, cryptography, and security operations for senior cybersecurity leadership." data-topics="Security &amp; Risk Management,Asset Security,Security Architecture,Communication &amp; Network Security,Identity &amp; Access Management,Security Assessment &amp; Testing,Security Operations,Software Development Security" data-benefits="Senior cybersecurity leadership roles,Average salary of $110K–$150K,CISO and security architect career paths,Top-tier industry recognition">
                    <div class="course-card-image" style="background: linear-gradient(135deg, #6d28d9, #8b5cf6);"><div class="course-icon"><i class="fas fa-lock"></i></div><div class="course-badge security"><i class="fas fa-lock"></i></div></div>
                    <div class="course-card-body">
                        <h3>CISSP — Certified Information Systems Security</h3>
                        <p>The world's premier cybersecurity certification. Master security architecture, risk management, and cryptography.</p>
                        <div class="course-meta"><span><i class="fas fa-clock"></i> 12-16 Weeks</span><span class="level-indicator level-advanced"><span class="level-bars"><span></span><span></span><span></span><span></span></span> Advanced</span></div>
                        <div class="course-btn-group">
                            <button class="btn btn-primary btn-enroll" onclick="openEnrollModal(this)">Enroll Now</button>
                            <button class="btn-details" onclick="openDetailsModal(this)"><i class="fas fa-info-circle"></i> Details</button>
                        </div>
                    </div>
                </div>
                <div class="course-card reveal" data-course="Palo Alto / Fortinet Firewall" data-duration="6-8 Weeks" data-level="Intermediate" data-overview="Master next-generation firewall configuration, threat prevention, VPN setup, and advanced security policies with Palo Alto Networks and Fortinet enterprise-grade firewall solutions." data-topics="NGFW Architecture &amp; Deployment,Security Policies &amp; NAT,Threat Prevention &amp; URL Filtering,GlobalProtect VPN,Panorama Management,FortiGate Configuration,SSL Inspection,High Availability &amp; Clustering" data-benefits="Firewall specialist career path,Demand in enterprise security teams,Average salary of $75K–$100K,Vendor-specific certifications (PCNSA/NSE)">
                    <div class="course-card-image" style="background: linear-gradient(135deg, #4c1d95, #7c3aed);"><div class="course-icon"><i class="fas fa-fire-flame-curved"></i></div><div class="course-badge paloalto"><i class="fas fa-fire-flame-curved"></i></div></div>
                    <div class="course-card-body">
                        <h3>Palo Alto / Fortinet Firewall</h3>
                        <p>Master next-generation firewall configuration, threat prevention, VPN setup, and advanced security policies.</p>
                        <div class="course-meta"><span><i class="fas fa-clock"></i> 6-8 Weeks</span><span class="level-indicator level-intermediate"><span class="level-bars"><span></span><span></span><span></span></span> Intermediate</span></div>
                        <div class="course-btn-group">
                            <button class="btn btn-primary btn-enroll" onclick="openEnrollModal(this)">Enroll Now</button>
                            <button class="btn-details" onclick="openDetailsModal(this)"><i class="fas fa-info-circle"></i> Details</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Category: Cloud -->
            <div class="course-category reveal">
                <h3 class="category-title"><i class="fas fa-cloud"></i> Cloud Computing & DevOps</h3>
            </div>
            <div class="courses-grid">
                <div class="course-card reveal" data-course="AWS Cloud Practitioner / Solutions Architect" data-duration="8-12 Weeks" data-level="Beginner–Intermediate" data-overview="Build cloud infrastructure expertise on Amazon Web Services — the world's leading cloud platform. Learn to design, deploy, and manage scalable cloud solutions used by top enterprises globally." data-topics="AWS Core Services (EC2, S3, RDS),VPC &amp; Networking,IAM &amp; Security Best Practices,Lambda &amp; Serverless Architecture,CloudFormation &amp; Infrastructure as Code,Monitoring with CloudWatch,High Availability &amp; Fault Tolerance,Cost Optimization Strategies" data-benefits="Cloud architect career path,Average salary of $90K–$130K,Most in-demand cloud platform,Pathway to AWS Professional certifications">
                    <div class="course-card-image" style="background: linear-gradient(135deg, #059669, #34d399);"><div class="course-icon"><i class="fas fa-cloud"></i></div><div class="course-badge aws"><i class="fab fa-aws"></i></div></div>
                    <div class="course-card-body">
                        <h3>AWS Cloud Practitioner / Solutions Architect</h3>
                        <p>Build cloud infrastructure expertise on Amazon Web Services. Learn EC2, S3, RDS, Lambda, and architectural best practices.</p>
                        <div class="course-meta"><span><i class="fas fa-clock"></i> 8-12 Weeks</span><span><i class="fas fa-signal"></i> Beginner–Intermediate</span></div>
                        <div class="course-btn-group">
                            <button class="btn btn-primary btn-enroll" onclick="openEnrollModal(this)">Enroll Now</button>
                            <button class="btn-details" onclick="openDetailsModal(this)"><i class="fas fa-info-circle"></i> Details</button>
                        </div>
                    </div>
                </div>
                <div class="course-card reveal" data-course="Microsoft Azure Certification" data-duration="8-12 Weeks" data-level="Beginner–Intermediate" data-overview="Master Microsoft Azure cloud services for enterprise deployment. Azure powers millions of businesses and learning it opens doors to high-paying cloud engineering and architecture roles." data-topics="Azure Virtual Machines &amp; App Services,Azure Networking &amp; Load Balancing,Azure Active Directory &amp; IAM,Storage Solutions &amp; Databases,Azure DevOps &amp; CI/CD,Hybrid Cloud Strategies,Azure Monitor &amp; Security Center,ARM Templates &amp; Automation" data-benefits="Enterprise cloud engineering roles,Average salary of $85K–$125K,Microsoft ecosystem expertise,Strong demand in hybrid cloud setups">
                    <div class="course-card-image" style="background: linear-gradient(135deg, #0284c7, #38bdf8);"><div class="course-icon"><i class="fab fa-microsoft"></i></div><div class="course-badge azure"><i class="fab fa-microsoft"></i></div></div>
                    <div class="course-card-body">
                        <h3>Microsoft Azure Certification</h3>
                        <p>Master Azure services, virtual machines, networking, storage, identity management, and hybrid cloud strategies.</p>
                        <div class="course-meta"><span><i class="fas fa-clock"></i> 8-12 Weeks</span><span><i class="fas fa-signal"></i> Beginner–Intermediate</span></div>
                        <div class="course-btn-group">
                            <button class="btn btn-primary btn-enroll" onclick="openEnrollModal(this)">Enroll Now</button>
                            <button class="btn-details" onclick="openDetailsModal(this)"><i class="fas fa-info-circle"></i> Details</button>
                        </div>
                    </div>
                </div>
                <div class="course-card reveal" data-course="DevOps Engineering" data-duration="10-14 Weeks" data-level="Intermediate" data-overview="Learn modern DevOps practices to bridge the gap between development and operations. Master CI/CD pipelines, containerization, orchestration, and infrastructure automation tools used by leading tech companies." data-topics="Git &amp; Version Control,Docker Containerization,Kubernetes Orchestration,Jenkins CI/CD Pipelines,Terraform &amp; Infrastructure as Code,Ansible Configuration Management,Monitoring (Prometheus, Grafana),Cloud-native DevOps (AWS/Azure)" data-benefits="DevOps engineer career path,Average salary of $90K–$130K,Bridge dev and ops teams,Automation &amp; efficiency expertise">
                    <div class="course-card-image" style="background: linear-gradient(135deg, #047857, #10b981);"><div class="course-icon"><i class="fas fa-code-branch"></i></div><div class="course-badge devops"><i class="fas fa-code-branch"></i></div></div>
                    <div class="course-card-body">
                        <h3>DevOps Engineering</h3>
                        <p>Learn CI/CD pipelines, Docker, Kubernetes, Jenkins, Terraform, and Ansible. Bridge development and operations.</p>
                        <div class="course-meta"><span><i class="fas fa-clock"></i> 10-14 Weeks</span><span class="level-indicator level-intermediate"><span class="level-bars"><span></span><span></span><span></span></span> Intermediate</span></div>
                        <div class="course-btn-group">
                            <button class="btn btn-primary btn-enroll" onclick="openEnrollModal(this)">Enroll Now</button>
                            <button class="btn-details" onclick="openDetailsModal(this)"><i class="fas fa-info-circle"></i> Details</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Category: Development & Marketing -->
            <div class="course-category reveal">
                <h3 class="category-title"><i class="fas fa-code"></i> Development, Design & Marketing</h3>
            </div>
            <div class="courses-grid">
                <div class="course-card reveal" data-course="Full-Stack Web Development" data-duration="14-20 Weeks" data-level="Beginner–Advanced" data-overview="Master the complete web development stack from front-end to back-end. Build responsive, modern web applications using the latest technologies demanded by the industry." data-topics="HTML5, CSS3 &amp; JavaScript ES6+,React.js / Vue.js Frontend,Node.js &amp; Express Backend,MongoDB &amp; SQL Databases,REST APIs &amp; GraphQL,Git &amp; Version Control,Responsive &amp; Mobile-First Design,Deployment &amp; Hosting" data-benefits="Full-stack developer roles,Average salary of $70K–$110K,Freelance &amp; startup opportunities,Build your own web applications">
                    <div class="course-card-image" style="background: linear-gradient(135deg, #dc2626, #f87171);"><div class="course-icon"><i class="fas fa-code"></i></div><div class="course-badge webdev"><i class="fas fa-code"></i></div></div>
                    <div class="course-card-body">
                        <h3>Full-Stack Web Development</h3>
                        <p>Master HTML, CSS, JavaScript, React, Node.js, and databases. Build complete web applications from front-end to back-end.</p>
                        <div class="course-meta"><span><i class="fas fa-clock"></i> 14-20 Weeks</span><span><i class="fas fa-signal"></i> Beginner–Advanced</span></div>
                        <div class="course-btn-group">
                            <button class="btn btn-primary btn-enroll" onclick="openEnrollModal(this)">Enroll Now</button>
                            <button class="btn-details" onclick="openDetailsModal(this)"><i class="fas fa-info-circle"></i> Details</button>
                        </div>
                    </div>
                </div>
                <div class="course-card reveal" data-course="SEO &amp; Digital Marketing" data-duration="8-12 Weeks" data-level="Beginner" data-overview="Master digital marketing strategies to grow brands and generate leads online. Learn SEO, paid advertising, social media marketing, content strategy, and analytics to drive measurable results." data-topics="Search Engine Optimization (SEO),Google Ads &amp; PPC Campaigns,Social Media Marketing,Content Marketing Strategy,Email Marketing Automation,Google Analytics &amp; Data Analysis,Conversion Rate Optimization,Brand Building &amp; Online Reputation" data-benefits="Digital marketing specialist roles,Average salary of $50K–$80K,Freelance &amp; agency opportunities,Run your own marketing campaigns">
                    <div class="course-card-image" style="background: linear-gradient(135deg, #d97706, #fbbf24);"><div class="course-icon"><i class="fas fa-chart-line"></i></div><div class="course-badge marketing"><i class="fas fa-chart-line"></i></div></div>
                    <div class="course-card-body">
                        <h3>SEO &amp; Digital Marketing</h3>
                        <p>Master SEO, Google Ads, social media marketing, content strategy, email marketing, and analytics.</p>
                        <div class="course-meta"><span><i class="fas fa-clock"></i> 8-12 Weeks</span><span class="level-indicator level-beginner"><span class="level-bars"><span></span><span></span></span> Beginner</span></div>
                        <div class="course-btn-group">
                            <button class="btn btn-primary btn-enroll" onclick="openEnrollModal(this)">Enroll Now</button>
                            <button class="btn-details" onclick="openDetailsModal(this)"><i class="fas fa-info-circle"></i> Details</button>
                        </div>
                    </div>
                </div>
                <div class="course-card reveal" data-course="Graphic Design" data-duration="6-10 Weeks" data-level="Beginner" data-overview="Learn professional graphic design using Adobe Creative Suite and industry-standard tools. Create stunning logos, branding materials, social media graphics, and print-ready layouts." data-topics="Adobe Photoshop Mastery,Adobe Illustrator &amp; Vector Design,Logo &amp; Brand Identity Design,Social Media Graphics,Typography &amp; Color Theory,Print Design &amp; Layout,UI/UX Design Basics,Portfolio Development" data-benefits="Graphic designer career path,Average salary of $45K–$70K,Freelance design opportunities,Creative industry versatility">
                    <div class="course-card-image" style="background: linear-gradient(135deg, #0891b2, #22d3ee);"><div class="course-icon"><i class="fas fa-palette"></i></div><div class="course-badge design"><i class="fas fa-palette"></i></div></div>
                    <div class="course-card-body">
                        <h3>Graphic Design</h3>
                        <p>Learn Adobe Photoshop, Illustrator, and industry-standard design tools. Create logos, branding, and professional layouts.</p>
                        <div class="course-meta"><span><i class="fas fa-clock"></i> 6-10 Weeks</span><span class="level-indicator level-beginner"><span class="level-bars"><span></span><span></span></span> Beginner</span></div>
                        <div class="course-btn-group">
                            <button class="btn btn-primary btn-enroll" onclick="openEnrollModal(this)">Enroll Now</button>
                            <button class="btn-details" onclick="openDetailsModal(this)"><i class="fas fa-info-circle"></i> Details</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Category: Linux & Others -->
            <div class="course-category reveal">
                <h3 class="category-title"><i class="fab fa-linux"></i> Linux, Python & More</h3>
            </div>
            <div class="courses-grid">
                <div class="course-card reveal" data-course="RHCSA / RHCE — Red Hat Linux" data-duration="8-12 Weeks" data-level="Beginner–Intermediate" data-overview="Master Red Hat Enterprise Linux — the world's leading enterprise Linux platform. From system installation to advanced administration, this course prepares you for globally recognized Red Hat certifications." data-topics="Linux Installation &amp; Configuration,User &amp; Group Management,File Systems &amp; Storage,Shell Scripting &amp; Automation,SELinux Security,Networking &amp; Firewall Configuration,System Troubleshooting,Virtualization with KVM" data-benefits="Linux administrator career path,Average salary of $70K–$100K,Red Hat certified professional,Enterprise server management roles">
                    <div class="course-card-image" style="background: linear-gradient(135deg, #b91c1c, #ef4444);"><div class="course-icon"><i class="fab fa-redhat"></i></div><div class="course-badge redhat"><i class="fab fa-redhat"></i></div></div>
                    <div class="course-card-body">
                        <h3>RHCSA / RHCE — Red Hat Linux</h3>
                        <p>Master Red Hat Enterprise Linux administration — installation, configuration, shell scripting, and SELinux.</p>
                        <div class="course-meta"><span><i class="fas fa-clock"></i> 8-12 Weeks</span><span><i class="fas fa-signal"></i> Beginner–Intermediate</span></div>
                        <div class="course-btn-group">
                            <button class="btn btn-primary btn-enroll" onclick="openEnrollModal(this)">Enroll Now</button>
                            <button class="btn-details" onclick="openDetailsModal(this)"><i class="fas fa-info-circle"></i> Details</button>
                        </div>
                    </div>
                </div>
                <div class="course-card reveal" data-course="Advanced Python Programming" data-duration="8-12 Weeks" data-level="Intermediate" data-overview="Go beyond the basics with advanced Python programming. Master data structures, OOP, web scraping, API development, automation scripts, and an introduction to AI/ML libraries like TensorFlow and Pandas." data-topics="Advanced Data Structures,Object-Oriented Programming,Web Scraping &amp; BeautifulSoup,API Development with Flask/Django,Database Integration,Task Automation &amp; Scripting,Intro to Machine Learning,Testing &amp; Debugging" data-benefits="Python developer career path,Average salary of $75K–$115K,AI/ML career foundation,Automation &amp; data science roles">
                    <div class="course-card-image" style="background: linear-gradient(135deg, #1d4ed8, #60a5fa);"><div class="course-icon"><i class="fab fa-python"></i></div><div class="course-badge python"><i class="fab fa-python"></i></div></div>
                    <div class="course-card-body">
                        <h3>Advanced Python Programming</h3>
                        <p>Go beyond the basics — data structures, OOP, web scraping, API development, automation, and AI/ML intro.</p>
                        <div class="course-meta"><span><i class="fas fa-clock"></i> 8-12 Weeks</span><span class="level-indicator level-intermediate"><span class="level-bars"><span></span><span></span><span></span></span> Intermediate</span></div>
                        <div class="course-btn-group">
                            <button class="btn btn-primary btn-enroll" onclick="openEnrollModal(this)">Enroll Now</button>
                            <button class="btn-details" onclick="openDetailsModal(this)"><i class="fas fa-info-circle"></i> Details</button>
                        </div>
                    </div>
                </div>
                <div class="course-card reveal" data-course="Mobile App Development" data-duration="12-16 Weeks" data-level="Intermediate" data-overview="Build cross-platform mobile applications using React Native or Flutter. Learn UI/UX design for mobile, API integration, state management, deployment to app stores, and publishing best practices." data-topics="React Native / Flutter Framework,Mobile UI/UX Design Patterns,State Management,API Integration &amp; Data Fetching,Push Notifications,Device Features (Camera, GPS),App Store Deployment (iOS &amp; Android),Performance Optimization" data-benefits="Mobile developer career path,Average salary of $80K–$120K,Build apps for iOS &amp; Android,High demand in app development">
                    <div class="course-card-image" style="background: linear-gradient(135deg, #7e22ce, #c084fc);"><div class="course-icon"><i class="fas fa-mobile-screen-button"></i></div><div class="course-badge mobile"><i class="fas fa-mobile-screen-button"></i></div></div>
                    <div class="course-card-body">
                        <h3>Mobile App Development</h3>
                        <p>Build cross-platform mobile apps using React Native or Flutter. Learn UI/UX, API integration, and publishing.</p>
                        <div class="course-meta"><span><i class="fas fa-clock"></i> 12-16 Weeks</span><span class="level-indicator level-intermediate"><span class="level-bars"><span></span><span></span><span></span></span> Intermediate</span></div>
                        <div class="course-btn-group">
                            <button class="btn btn-primary btn-enroll" onclick="openEnrollModal(this)">Enroll Now</button>
                            <button class="btn-details" onclick="openDetailsModal(this)"><i class="fas fa-info-circle"></i> Details</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- CTA -->
    <section class="cta-banner">
        <div class="container">
            <div class="cta-content reveal">
                <h2>Can't Find the Right Course?</h2>
                <p>We offer 50+ programs including HCIA, HCIP, MCSA, VCP, F5 BIG-IP, Juniper, and more. Contact us for a personalized recommendation!</p>
                <div class="cta-buttons">
                    <a href="{{ route('contact') }}" class="btn btn-gold">Get a Free Consultation</a>
                    <a href="https://wa.me/923000311868" target="_blank" class="btn btn-outline"><i class="fab fa-whatsapp"></i> Chat on WhatsApp</a>
                </div>
            </div>
        </div>
    </section>

    <!-- ENROLLMENT MODAL -->
    <div class="modal-overlay" id="enrollOverlay">
        <div class="enroll-modal">
            <div class="enroll-modal-header">
                <h2><i class="fas fa-graduation-cap"></i> Enroll Now</h2>
                <p id="enrollCourseName">Course Name</p>
                <button class="modal-close" onclick="closeEnrollModal()"><i class="fas fa-times"></i></button>
            </div>
            <div class="enroll-modal-body">
                <form id="enrollForm" method="POST" action="{{ route('enrollment.submit') }}">
                    @csrf
                    <div class="form-group">
                        <label>Full Name <span class="required">*</span></label>
                        <input type="text" id="enrollName" name="name" placeholder="Enter your full name" required>
                    </div>
                    <div class="form-group">
                        <label>Email Address <span class="required">*</span></label>
                        <input type="email" id="enrollEmail" name="email" placeholder="Enter your email address" required>
                    </div>
                    <div class="form-group">
                        <label>Phone Number <span class="required">*</span></label>
                        <input type="tel" id="enrollPhone" name="phone" placeholder="e.g. +92-300-1234567" required>
                    </div>
                    <div class="form-group">
                        <label>Selected Course</label>
                        <input type="text" id="enrollCourse" name="course" class="readonly-field" readonly>
                    </div>
                    <div class="form-group">
                        <label>Message <span style="color:var(--gray-500);font-weight:400;">(Optional)</span></label>
                        <textarea id="enrollMessage" name="message" placeholder="Any questions or special requirements?"></textarea>
                    </div>
                    <button type="submit" class="enroll-submit-btn" id="enrollSubmitBtn">
                        <i class="fab fa-whatsapp"></i> Submit via WhatsApp
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- DETAILS MODAL -->
    <div class="modal-overlay" id="detailsOverlay">
        <div class="details-modal">
            <div class="details-modal-header">
                <div class="details-header-bg" id="detailsHeaderBg"></div>
                <div class="details-header-overlay"></div>
                <div class="details-header-content">
                    <div class="details-badge" id="detailsBadge"><i class="fas fa-certificate"></i> <span>Course</span></div>
                    <h2 id="detailsTitle">Course Title</h2>
                </div>
                <button class="modal-close" onclick="closeDetailsModal()"><i class="fas fa-times"></i></button>
            </div>
            <div class="details-modal-body">
                <div class="details-meta-bar" id="detailsMeta"></div>
                <div class="details-section">
                    <h3><i class="fas fa-info-circle"></i> Course Overview</h3>
                    <p id="detailsOverview"></p>
                </div>
                <div class="details-section">
                    <h3><i class="fas fa-list-check"></i> Key Topics / Syllabus</h3>
                    <ul id="detailsTopics"></ul>
                </div>
                <div class="details-section">
                    <h3><i class="fas fa-rocket"></i> Career Benefits</h3>
                    <div class="details-benefits" id="detailsBenefits"></div>
                </div>
            </div>
            <div class="details-modal-footer">
                <button class="btn btn-primary" onclick="detailsToEnroll()"><i class="fas fa-user-plus" style="margin-right:8px;"></i> Enroll in This Course</button>
                <button class="btn btn-outline" style="border-color:var(--gray-300);color:var(--gray-600);" onclick="closeDetailsModal()">Close</button>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
<script src="{{ asset('js/courses-modal.js') }}"></script>
@endpush
