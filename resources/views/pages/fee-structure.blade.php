@extends('layouts.app')

@section('title', 'Fee Structure — AKSIT GLOBAL')
@section('description', 'View the latest course fee structure and pricing for all AKSIT GLOBAL training programs.')

@push('styles')
<style>
    .fee-hero {
        background: linear-gradient(135deg, #0f172a 0%, #1e3a5f 60%, #1a1a2e 100%);
        padding: 90px 0 60px;
        text-align: center;
        position: relative;
        overflow: hidden;
    }
    .fee-hero::before {
        content: '';
        position: absolute;
        inset: 0;
        background: radial-gradient(ellipse at 50% 0%, rgba(250,204,21,0.12) 0%, transparent 65%);
    }
    .fee-hero h1 {
        font-size: clamp(2rem, 5vw, 3rem);
        font-weight: 800;
        color: #fff;
        margin-bottom: 14px;
        position: relative;
    }
    .fee-hero h1 span { color: #facc15; }
    .fee-hero p {
        font-size: 1.1rem;
        color: rgba(255,255,255,0.75);
        max-width: 560px;
        margin: 0 auto;
        position: relative;
    }

    .fee-section {
        padding: 60px 0 80px;
        background: #f8fafc;
    }
    .fee-card {
        background: #fff;
        border-radius: 16px;
        box-shadow: 0 8px 40px rgba(0,0,0,0.10);
        overflow: hidden;
        max-width: 960px;
        margin: 0 auto;
    }
    .fee-card-header {
        background: linear-gradient(135deg, #1e3a5f, #0f172a);
        padding: 24px 32px;
        display: flex;
        align-items: center;
        gap: 14px;
    }
    .fee-card-header i { font-size: 1.8rem; color: #facc15; }
    .fee-card-header h2 {
        color: #fff;
        font-size: 1.3rem;
        font-weight: 700;
        margin: 0;
    }
    .fee-card-header p {
        color: rgba(255,255,255,0.6);
        font-size: 0.85rem;
        margin: 2px 0 0;
    }
    .pdf-embed-wrapper {
        width: 100%;
        min-height: 700px;
        background: #f1f5f9;
        position: relative;
    }
    .pdf-embed-wrapper iframe,
    .pdf-embed-wrapper embed {
        width: 100%;
        height: 750px;
        border: none;
        display: block;
    }
    .no-pdf {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        min-height: 400px;
        gap: 16px;
        color: #64748b;
    }
    .no-pdf i { font-size: 3.5rem; color: #cbd5e1; }
    .no-pdf h3 { font-size: 1.2rem; font-weight: 700; color: #475569; margin: 0; }
    .no-pdf p { font-size: 0.95rem; margin: 0; }

    .fee-download-bar {
        padding: 16px 32px;
        background: #f8fafc;
        border-top: 1px solid #e2e8f0;
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 12px;
    }
    .fee-download-bar p { margin: 0; font-size: 0.9rem; color: #64748b; }
    .btn-download {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: linear-gradient(135deg, #facc15, #eab308);
        color: #111;
        font-weight: 700;
        font-size: 0.9rem;
        padding: 10px 22px;
        border-radius: 8px;
        text-decoration: none;
        transition: transform 0.15s, box-shadow 0.15s;
        box-shadow: 0 4px 14px rgba(250,204,21,0.35);
    }
    .btn-download:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 24px rgba(250,204,21,0.45);
        color: #111;
        text-decoration: none;
    }
</style>
@endpush

@section('content')
<!-- PAGE HERO -->
<section class="fee-hero">
    <div class="container">
        <h1>Fee <span>Structure</span></h1>
        <p>View our current course fees and pricing for all training programs offered at AKSIT GLOBAL.</p>
    </div>
</section>

<!-- FEE PDF SECTION -->
<section class="fee-section">
    <div class="container">
        <div class="fee-card">
            <div class="fee-card-header">
                <i class="fas fa-file-pdf"></i>
                <div>
                    <h2>Course Fee Structure</h2>
                    <p>Latest pricing for all AKSIT GLOBAL programs</p>
                </div>
            </div>

            <div class="pdf-embed-wrapper">
                @if($pdfUrl)
                    <iframe
                        src="{{ $pdfUrl }}#toolbar=1&navpanes=0"
                        type="application/pdf"
                        title="AKSIT GLOBAL Fee Structure"
                    >
                        <p style="padding:24px;">
                            Your browser doesn't support embedded PDFs.
                            <a href="{{ $pdfUrl }}" target="_blank" class="btn-download" style="margin-top:12px; display:inline-flex;">
                                <i class="fas fa-download"></i> Download PDF
                            </a>
                        </p>
                    </iframe>
                @else
                    <div class="no-pdf">
                        <i class="fas fa-file-pdf"></i>
                        <h3>Fee Structure Not Available Yet</h3>
                        <p>The fee structure PDF has not been uploaded yet. Please check back later or contact us directly.</p>
                        <a href="{{ route('contact') }}" class="btn-download" style="margin-top:8px;">
                            <i class="fas fa-envelope"></i> Contact Us
                        </a>
                    </div>
                @endif
            </div>

            @if($pdfUrl)
            <div class="fee-download-bar">
                <p><i class="fas fa-info-circle" style="color:#facc15;margin-right:6px;"></i> Having trouble viewing? Download the PDF directly.</p>
                <a href="{{ $pdfUrl }}" download class="btn-download">
                    <i class="fas fa-download"></i> Download PDF
                </a>
            </div>
            @endif
        </div>
    </div>
</section>
@endsection
