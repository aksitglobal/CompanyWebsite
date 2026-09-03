@extends('layouts.app')

@section('title', 'System Services — AKSIT GLOBAL')
@section('description', 'AKSIT GLOBAL provides complete system services including server consulting, deployment, virtualisation, cloud infrastructure, backup, security, and managed server solutions.')

@section('content')

<section class="page-hero">
    <div class="page-hero-glow"></div>
    <div class="container">
        <div class="page-hero-content">
            <h1>System Services</h1>
            <p>End-to-end IT system management, server administration, and infrastructure support.</p>
        </div>
    </div>
</section>

<section class="ns-section">
    <div class="container">
        <div class="ns-grid">

            <!-- 1. Server Consulting and Assessment -->
            <div class="ns-card">
                <div class="ns-icon">
                    <i class="fas fa-comments"></i>
                </div>
                <h3>Server Consulting and Assessment</h3>
                <p>In-depth evaluation of your existing server infrastructure with expert recommendations to optimise performance, cost, and reliability.</p>
            </div>

            <!-- 2. Server Infrastructure Design -->
            <div class="ns-card">
                <div class="ns-icon">
                    <i class="fas fa-drafting-compass"></i>
                </div>
                <h3>Server Infrastructure Design</h3>
                <p>Custom server architecture design covering compute, memory, storage, and networking requirements aligned to your workloads.</p>
            </div>

            <!-- 3. Physical Server Deployment -->
            <div class="ns-card">
                <div class="ns-icon">
                    <i class="fas fa-server"></i>
                </div>
                <h3>Physical Server Deployment</h3>
                <p>Professional rack-and-stack installation, cabling, BIOS configuration, and OS provisioning for bare-metal server environments.</p>
            </div>

            <!-- 4. Windows Servers -->
            <div class="ns-card">
                <div class="ns-icon">
                    <i class="fab fa-windows"></i>
                </div>
                <h3>Windows Servers</h3>
                <p>Deployment, configuration, and ongoing administration of Windows Server environments including roles, features, and group policies.</p>
            </div>

            <!-- 5. Linux Servers -->
            <div class="ns-card">
                <div class="ns-icon">
                    <i class="fab fa-linux"></i>
                </div>
                <h3>Linux Servers</h3>
                <p>Installation, hardening, and management of Linux distributions (RHEL, Ubuntu, CentOS) for enterprise workloads and open-source stacks.</p>
            </div>

            <!-- 6. Active Directory and Identity -->
            <div class="ns-card">
                <div class="ns-icon">
                    <i class="fas fa-id-badge"></i>
                </div>
                <h3>Active Directory and Identity</h3>
                <p>Design and deployment of Active Directory, LDAP, and identity management solutions for centralised user authentication and access control.</p>
            </div>

            <!-- 7. Core Infrastructure -->
            <div class="ns-card">
                <div class="ns-icon">
                    <i class="fas fa-layer-group"></i>
                </div>
                <h3>Core Infrastructure</h3>
                <p>DNS, DHCP, NTP, and other foundational services configured for maximum reliability and seamless integration with your server estate.</p>
            </div>

            <!-- 8. Virtualization Service -->
            <div class="ns-card">
                <div class="ns-icon">
                    <i class="fas fa-clone"></i>
                </div>
                <h3>Virtualization Service</h3>
                <p>VMware vSphere, Microsoft Hyper-V, and KVM virtualisation design and deployment to consolidate workloads and maximise hardware utilisation.</p>
            </div>

            <!-- 9. High Availability and Clustering -->
            <div class="ns-card">
                <div class="ns-icon">
                    <i class="fas fa-network-wired"></i>
                </div>
                <h3>High Availability and Clustering</h3>
                <p>Failover clustering, load balancing, and redundant server configurations to eliminate downtime and ensure continuous service delivery.</p>
            </div>

            <!-- 10. Storage Service -->
            <div class="ns-card">
                <div class="ns-icon">
                    <i class="fas fa-hdd"></i>
                </div>
                <h3>Storage Service</h3>
                <p>SAN, NAS, and software-defined storage design, deployment, and management for scalable, high-performance data storage environments.</p>
            </div>

            <!-- 11. Backup and Disaster Recovery Service -->
            <div class="ns-card">
                <div class="ns-icon">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <h3>Backup and Disaster Recovery Service</h3>
                <p>Automated backup strategies, offsite replication, and tested DR plans to protect your critical data and minimise recovery time objectives.</p>
            </div>

            <!-- 12. Email and Collaboration Servers -->
            <div class="ns-card">
                <div class="ns-icon">
                    <i class="fas fa-envelope-open-text"></i>
                </div>
                <h3>Email and Collaboration Servers</h3>
                <p>Deployment and administration of Microsoft Exchange, Microsoft 365, and collaboration platforms for secure and productive business communication.</p>
            </div>

            <!-- 13. Application Servers -->
            <div class="ns-card">
                <div class="ns-icon">
                    <i class="fas fa-cubes"></i>
                </div>
                <h3>Application Servers</h3>
                <p>Configuration and management of web, middleware, and enterprise application servers to support your business-critical software deployments.</p>
            </div>

            <!-- 14. Database Servers -->
            <div class="ns-card">
                <div class="ns-icon">
                    <i class="fas fa-database"></i>
                </div>
                <h3>Database Servers</h3>
                <p>Installation, tuning, and administration of SQL Server, MySQL, PostgreSQL, and Oracle database platforms for optimal query performance.</p>
            </div>

            <!-- 15. Cloud and Hybrid Infrastructure -->
            <div class="ns-card">
                <div class="ns-icon">
                    <i class="fas fa-cloud"></i>
                </div>
                <h3>Cloud and Hybrid Infrastructure</h3>
                <p>Integration of on-premises servers with AWS, Azure, and Google Cloud to build flexible, scalable hybrid cloud environments.</p>
            </div>

            <!-- 16. Server Security -->
            <div class="ns-card">
                <div class="ns-icon">
                    <i class="fas fa-lock"></i>
                </div>
                <h3>Server Security</h3>
                <p>OS hardening, patch management, endpoint protection, and vulnerability assessments to safeguard your server estate from threats.</p>
            </div>

            <!-- 17. Server Monitoring and Management -->
            <div class="ns-card">
                <div class="ns-icon">
                    <i class="fas fa-tachometer-alt"></i>
                </div>
                <h3>Server Monitoring and Management</h3>
                <p>24/7 proactive monitoring of server health, resource utilisation, and event logs with rapid alerting and incident response.</p>
            </div>

            <!-- 18. Performance Optimization -->
            <div class="ns-card">
                <div class="ns-icon">
                    <i class="fas fa-chart-line"></i>
                </div>
                <h3>Performance Optimization</h3>
                <p>Capacity analysis, resource right-sizing, kernel tuning, and workload profiling to ensure your servers deliver peak efficiency.</p>
            </div>

            <!-- 19. Server Migration Service -->
            <div class="ns-card">
                <div class="ns-icon">
                    <i class="fas fa-exchange-alt"></i>
                </div>
                <h3>Server Migration Service</h3>
                <p>Seamless physical-to-virtual, cross-platform, and data centre migration with minimal disruption and a fully tested rollback plan.</p>
            </div>

            <!-- 20. Automation and DevOps -->
            <div class="ns-card">
                <div class="ns-icon">
                    <i class="fas fa-cogs"></i>
                </div>
                <h3>Automation and DevOps</h3>
                <p>Infrastructure-as-Code, CI/CD pipeline integration, and Ansible/Terraform automation to accelerate deployments and reduce manual effort.</p>
            </div>

            <!-- 21. Documentation Service -->
            <div class="ns-card">
                <div class="ns-icon">
                    <i class="fas fa-file-alt"></i>
                </div>
                <h3>Documentation Service</h3>
                <p>Comprehensive as-built documentation, SOPs, and runbooks for your server environment to support operations and compliance requirements.</p>
            </div>

            <!-- 22. Managed Servers -->
            <div class="ns-card">
                <div class="ns-icon">
                    <i class="fas fa-headset"></i>
                </div>
                <h3>Managed Servers</h3>
                <p>Fully outsourced server management — monitoring, patching, backups, and support delivered as a predictable monthly service.</p>
            </div>

        </div>

        <div style="text-align: center; margin-top: 60px;">
            <a href="{{ route('contact') }}" class="btn btn-primary">Get in Touch</a>
        </div>
    </div>
</section>

@endsection
