@extends('layouts.app')

@section('content')
<div class="container my-5" style="min-height: 70vh;">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Partner Logos</h2>
        @include('admin.partials.nav-buttons')
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    {{-- Upload Form --}}
    <div class="card shadow-sm mb-4">
        <div class="card-header bg-primary text-white fw-bold">
            <i class="fas fa-upload me-2"></i>Upload New Logo
        </div>
        <div class="card-body">
            <form action="{{ route('admin.partner-logos.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row g-3 align-items-end">
                    <div class="col-md-4">
                        <label class="form-label fw-semibold">Partner / Platform Name</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                               placeholder="e.g. Cisco" value="{{ old('name') }}" required>
                        @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fw-semibold">Logo File <small class="text-muted">(PNG, JPG, SVG — max 2 MB)</small></label>
                        <input type="file" name="logo" class="form-control @error('logo') is-invalid @enderror"
                               accept=".png,.jpg,.jpeg,.svg" required>
                        @error('logo')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-2">
                        <label class="form-label fw-semibold">Order</label>
                        <input type="number" name="order" class="form-control" value="{{ old('order', 0) }}" min="0">
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary w-100">
                            <i class="fas fa-upload me-1"></i>Upload Logo
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    {{-- Logos Grid --}}
    <div class="card shadow-sm">
        <div class="card-header bg-dark text-white fw-bold">
            <i class="fas fa-images me-2"></i>All Partner Logos ({{ $logos->count() }})
        </div>
        <div class="card-body">
            @if($logos->isEmpty())
                <p class="text-center text-muted py-4">
                    <i class="fas fa-image fa-2x mb-2 d-block"></i>
                    No logos uploaded yet. Upload your first partner logo above.
                </p>
            @else
                <div class="row g-3">
                    @foreach($logos as $logo)
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <div class="card h-100 border {{ $logo->is_active ? 'border-success' : 'border-secondary' }}">

                            {{-- Logo Preview --}}
                            <div class="card-img-top d-flex align-items-center justify-content-center bg-light"
                                 style="height: 120px; padding: 16px; overflow: hidden;">
                                <img src="{{ asset('storage/' . $logo->logo_path) }}"
                                     alt="{{ $logo->name }}"
                                     style="max-height: 88px; max-width: 100%; object-fit: contain;">
                            </div>

                            <div class="card-body p-2">
                                <p class="fw-bold mb-1 text-center" style="font-size:0.9rem;">{{ $logo->name }}</p>
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <span class="badge {{ $logo->is_active ? 'bg-success' : 'bg-secondary' }}">
                                        {{ $logo->is_active ? 'Active' : 'Inactive' }}
                                    </span>
                                    {{-- Inline order edit --}}
                                    <div class="d-flex align-items-center gap-1">
                                        <label style="font-size:0.78rem;" class="text-muted mb-0">Order:</label>
                                        <input type="number" min="0"
                                               class="form-control form-control-sm order-input"
                                               style="width:60px;"
                                               data-id="{{ $logo->id }}"
                                               value="{{ $logo->order }}">
                                    </div>
                                </div>

                                {{-- Action Buttons --}}
                                <div class="d-flex gap-1">
                                    <form action="{{ route('admin.partner-logos.toggle', $logo->id) }}"
                                          method="POST" class="flex-fill">
                                        @csrf
                                        <button type="submit"
                                                class="btn btn-sm w-100 {{ $logo->is_active ? 'btn-warning' : 'btn-success' }}">
                                            {{ $logo->is_active ? 'Deactivate' : 'Activate' }}
                                        </button>
                                    </form>
                                    <form action="{{ route('admin.partner-logos.destroy', $logo->id) }}"
                                          method="POST"
                                          onsubmit="return confirm('Delete {{ addslashes($logo->name) }} logo?');"
                                          class="flex-fill">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger w-100">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    // Save order on blur/change via AJAX
    document.querySelectorAll('.order-input').forEach(function (input) {
        input.addEventListener('change', function () {
            const id    = this.dataset.id;
            const order = this.value;

            fetch('{{ route('admin.partner-logos.updateOrder') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ id, order })
            })
            .then(r => r.json())
            .then(data => {
                if (data.success) {
                    this.classList.add('border-success');
                    setTimeout(() => this.classList.remove('border-success'), 1200);
                }
            })
            .catch(() => alert('Failed to update order.'));
        });
    });
});
</script>
@endsection
