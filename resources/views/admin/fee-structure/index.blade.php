@extends('layouts.app')

@section('title', 'Fee Structure Management — Admin')

@section('content')
<div class="container my-5" style="min-height: 70vh;">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2><i class="fas fa-file-pdf text-danger me-2"></i> Fee Structure Management</h2>
        @include('admin.partials.nav-buttons')
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="fas fa-exclamation-circle me-2"></i>{{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="row g-4">
        <!-- Upload Card -->
        <div class="col-lg-5">
            <div class="card shadow-sm h-100">
                <div class="card-header bg-dark text-white">
                    <h5 class="mb-0"><i class="fas fa-upload me-2"></i>Upload New Fee Structure PDF</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.fee-structure.upload') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="pdf_file" class="form-label fw-semibold">
                                Select PDF File <span class="text-danger">*</span>
                            </label>
                            <input
                                type="file"
                                class="form-control @error('pdf_file') is-invalid @enderror"
                                id="pdf_file"
                                name="pdf_file"
                                accept=".pdf"
                                required
                            >
                            @error('pdf_file')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="form-text text-muted">
                                <i class="fas fa-info-circle"></i>
                                Only PDF files accepted. Maximum size: 20MB.
                            </div>
                        </div>

                        <div id="filePreview" class="mb-3 d-none">
                            <div class="alert alert-info py-2 px-3 mb-0">
                                <i class="fas fa-file-pdf text-danger me-2"></i>
                                <span id="fileName" class="fw-semibold"></span>
                                <small class="text-muted ms-2" id="fileSize"></small>
                            </div>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-warning fw-bold text-dark">
                                <i class="fas fa-upload me-2"></i>Upload PDF
                            </button>
                        </div>
                    </form>
                </div>
                <div class="card-footer text-muted small">
                    <i class="fas fa-exclamation-triangle text-warning me-1"></i>
                    Uploading a new PDF will <strong>replace</strong> the existing one automatically.
                </div>
            </div>
        </div>

        <!-- Current PDF Card -->
        <div class="col-lg-7">
            <div class="card shadow-sm h-100">
                <div class="card-header bg-dark text-white d-flex align-items-center justify-content-between">
                    <h5 class="mb-0"><i class="fas fa-eye me-2"></i>Currently Uploaded PDF</h5>
                    @if($currentPdf)
                        <a href="{{ asset('storage/' . $currentPdf) }}" target="_blank" class="btn btn-sm btn-outline-light">
                            <i class="fas fa-external-link-alt me-1"></i>Open Full Screen
                        </a>
                    @endif
                </div>
                <div class="card-body p-0">
                    @if($currentPdf)
                        <div class="p-3 bg-light border-bottom">
                            <div class="d-flex align-items-center gap-2">
                                <i class="fas fa-file-pdf text-danger fs-5"></i>
                                <div>
                                    <div class="fw-semibold text-truncate" style="max-width: 320px;">
                                        {{ basename($currentPdf) }}
                                    </div>
                                    <small class="text-muted">
                                        Stored at: <code>{{ $currentPdf }}</code>
                                    </small>
                                </div>
                            </div>
                        </div>
                        <iframe
                            src="{{ asset('storage/' . $currentPdf) }}#toolbar=0&navpanes=0"
                            style="width: 100%; height: 420px; border: none;"
                            title="Current Fee Structure PDF"
                        ></iframe>
                        <div class="p-3 border-top bg-light d-flex gap-2">
                            <a href="{{ asset('storage/' . $currentPdf) }}" download class="btn btn-sm btn-primary">
                                <i class="fas fa-download me-1"></i>Download
                            </a>
                            <a href="{{ route('fee-structure') }}" target="_blank" class="btn btn-sm btn-outline-secondary">
                                <i class="fas fa-globe me-1"></i>View Public Page
                            </a>
                        </div>
                    @else
                        <div class="d-flex flex-column align-items-center justify-content-center py-5 text-center text-muted">
                            <i class="fas fa-file-pdf" style="font-size: 4rem; color: #e2e8f0;"></i>
                            <h5 class="mt-3 text-secondary">No PDF Uploaded Yet</h5>
                            <p class="mb-0">Upload a PDF using the form on the left to display it on the public fee structure page.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.getElementById('pdf_file').addEventListener('change', function() {
    var file = this.files[0];
    var preview = document.getElementById('filePreview');
    var fileName = document.getElementById('fileName');
    var fileSize = document.getElementById('fileSize');

    if (file) {
        fileName.textContent = file.name;
        var size = file.size;
        var sizeStr = size > 1048576
            ? (size / 1048576).toFixed(1) + ' MB'
            : (size / 1024).toFixed(0) + ' KB';
        fileSize.textContent = '(' + sizeStr + ')';
        preview.classList.remove('d-none');
    } else {
        preview.classList.add('d-none');
    }
});
</script>
@endsection
