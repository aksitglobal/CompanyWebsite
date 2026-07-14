@extends('layouts.app')

@section('content')
<div class="container my-5" style="min-height: 70vh;">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.css" rel="stylesheet">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold"><i class="fas fa-cogs me-2 text-primary"></i>Manage Services Content</h2>
        @include('admin.partials.nav-buttons')
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="row g-3">
        @foreach($services as $slug => $label)
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 shadow-sm border-0" style="border-left: 4px solid #0d6efd !important;">
                    <div class="card-body d-flex flex-column">
                        <h6 class="card-title fw-semibold mb-1" style="font-size: 0.9rem;">{{ $label }}</h6>
                        <p class="text-muted mb-3" style="font-size: 0.78rem;">
                            <code>{{ $slug }}</code>
                        </p>
                        <div class="mt-auto d-flex gap-2 align-items-center">
                            <a href="{{ route('admin.services.show', $slug) }}" class="btn btn-primary btn-sm">
                                <i class="fas fa-edit me-1"></i>Manage
                            </a>
                            @if(isset($counts[$slug]) && $counts[$slug] > 0)
                                <span class="badge bg-success">{{ $counts[$slug] }} item(s)</span>
                            @else
                                <span class="badge bg-secondary">No content</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
