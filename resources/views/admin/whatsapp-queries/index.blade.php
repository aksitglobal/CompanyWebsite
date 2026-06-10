@extends('layouts.app')

@section('content')
<div class="container my-5" style="min-height: 70vh;">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>
            WhatsApp Queries
            @if($unreadWhatsapp > 0)
                <span class="badge bg-danger ms-2" style="font-size:0.75rem;">{{ $unreadWhatsapp }} New</span>
            @endif
        </h2>
        @include('admin.partials.nav-buttons')
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body p-0">
            <table class="table table-bordered table-hover align-middle mb-0">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Project Type</th>
                        <th>Description</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($queries as $query)
                    <tr class="{{ !$query->is_read ? 'table-warning fw-semibold' : '' }}">
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            @if(!$query->is_read)
                                <i class="fas fa-circle text-danger me-1" style="font-size:8px;vertical-align:middle;"></i>
                            @endif
                            {{ $query->name }}
                        </td>
                        <td><a href="mailto:{{ $query->email }}">{{ $query->email }}</a></td>
                        <td>{{ $query->phone }}</td>
                        <td><span class="badge bg-primary">{{ $query->project_type }}</span></td>
                        <td style="max-width: 250px;">{{ Str::limit($query->description, 100) }}</td>
                        <td>{{ $query->created_at ? $query->created_at->format('Y-m-d H:i') : 'N/A' }}</td>
                        <td>
                            <div class="d-flex gap-2">
                                @if(!$query->is_read)
                                <form action="{{ route('admin.whatsapp-queries.markRead', $query->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-success btn-sm"><i class="fas fa-check"></i> Mark Read</button>
                                </form>
                                @endif
                                <form action="{{ route('admin.whatsapp-queries.destroy', $query->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this query?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center text-muted py-4">No WhatsApp queries found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
