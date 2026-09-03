@extends('layouts.app')

@section('title', 'Network Solutions — AKSIT GLOBAL')
@section('description', 'AKSIT GLOBAL delivers end-to-end network solutions including enterprise networking, SD-WAN, wireless, cloud networking, security, data centre, and managed network solutions for modern businesses.')

@section('content')

<section class="page-hero">
    <div class="page-hero-glow"></div>
    <div class="container">
        <div class="page-hero-content">
            <h1>Network Solutions</h1>
            <p>Scalable, intelligent network solutions designed for today's connected enterprise.</p>
        </div>
    </div>
</section>

<section class="ns-section">
    <div class="container">
        <div class="ns-grid">

            <!-- 1. Enterprise Network Solutions -->
            <div class="ns-card">
                <div class="ns-icon">
                    <i class="fas fa-project-diagram"></i>
                </div>
                <h3>Enterprise Network Solutions</h3>
                <p>End-to-end enterprise network design and deployment using industry-leading switching, routing, and infrastructure platforms for maximum scalability.</p>
            </div>

            <!-- 2. SD-WAN Solutions -->
            <div class="ns-card">
                <div class="ns-icon">
                    <i class="fas fa-route"></i>
                </div>
                <h3>SD-WAN Solutions</h3>
                <p>Software-defined WAN deployments that reduce connectivity costs, boost application performance, and centralise policy management across all sites.</p>
            </div>

            <!-- 3. Wireless Solutions -->
            <div class="ns-card">
                <div class="ns-icon">
                    <i class="fas fa-wifi"></i>
                </div>
                <h3>Wireless Solutions</h3>
                <p>High-density, secure Wi-Fi 6/6E deployments for offices, campuses, warehouses, and public venues with seamless roaming and centralised control.</p>
            </div>

            <!-- 4. Cloud Networking Solutions -->
            <div class="ns-card">
                <div class="ns-icon">
                    <i class="fas fa-cloud"></i>
                </div>
                <h3>Cloud Networking Solutions</h3>
                <p>Hybrid and multi-cloud network architectures integrating AWS, Azure, and Google Cloud with on-premises infrastructure for unified connectivity.</p>
            </div>

            <!-- 5. Network Security Solutions -->
            <div class="ns-card">
                <div class="ns-icon">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <h3>Network Security Solutions</h3>
                <p>Comprehensive security frameworks including next-gen firewalls, zero-trust access, IPS/IDS, and network segmentation to protect your entire perimeter.</p>
            </div>

            <!-- 6. Data Center Solutions -->
            <div class="ns-card">
                <div class="ns-icon">
                    <i class="fas fa-server"></i>
                </div>
                <h3>Data Center Solutions</h3>
                <p>Spine-leaf fabric design, hyperconverged interconnects, and data centre networking solutions built for high throughput and low-latency workloads.</p>
            </div>

            <!-- 7. Network Virtualization -->
            <div class="ns-card">
                <div class="ns-icon">
                    <i class="fas fa-clone"></i>
                </div>
                <h3>Network Virtualization</h3>
                <p>Software-defined networking (SDN) and network function virtualisation (NFV) to decouple infrastructure from hardware and accelerate provisioning.</p>
            </div>

            <!-- 8. High Availability Solution -->
            <div class="ns-card">
                <div class="ns-icon">
                    <i class="fas fa-check-double"></i>
                </div>
                <h3>High Availability Solution</h3>
                <p>Redundant network topologies, automatic failover mechanisms, and link aggregation designed to deliver near-zero downtime across critical paths.</p>
            </div>

            <!-- 9. Internet Connectivity Solution -->
            <div class="ns-card">
                <div class="ns-icon">
                    <i class="fas fa-satellite-dish"></i>
                </div>
                <h3>Internet Connectivity Solution</h3>
                <p>Multi-ISP connectivity management, load balancing, failover, and BGP routing to ensure reliable, high-bandwidth internet access for your organisation.</p>
            </div>

            <!-- 10. Collaboration Solutions -->
            <div class="ns-card">
                <div class="ns-icon">
                    <i class="fas fa-users"></i>
                </div>
                <h3>Collaboration Solutions</h3>
                <p>Unified communications, video conferencing infrastructure, and IP telephony network integration to power seamless team collaboration anywhere.</p>
            </div>

            <!-- 11. Managed Network Solutions -->
            <div class="ns-card">
                <div class="ns-icon">
                    <i class="fas fa-cogs"></i>
                </div>
                <h3>Managed Network Solutions</h3>
                <p>Fully outsourced network operations — proactive monitoring, configuration management, and support delivered as a subscription-based managed service.</p>
            </div>

        </div>

        <div style="text-align: center; margin-top: 60px;">
            <a href="{{ route('contact') }}" class="btn btn-primary">Get in Touch</a>
        </div>
    </div>
</section>

@endsection
