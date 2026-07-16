@extends('layouts.app')

@section('content')
<div class="container my-5" style="min-height: 70vh;">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Breadcrumb / Header -->
    <div class="d-flex justify-content-between align-items-start mb-4 flex-wrap gap-2">
        <div>
            <a href="{{ route('admin.services.index') }}" class="btn btn-outline-secondary btn-sm mb-2">
                <i class="fas fa-arrow-left me-1"></i> Back to All Services
            </a>
            <h3 class="fw-bold mb-0">{{ $label }}</h3>
            <small class="text-muted">Slug: <code>{{ $slug }}</code></small>
        </div>
        <a href="{{ route('service.page', $slug) }}" target="_blank" class="btn btn-outline-primary btn-sm">
            <i class="fas fa-eye me-1"></i>View Public Page
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="row g-4">

        <!-- LEFT: Add Content Forms -->
        <div class="col-lg-5">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-primary text-white fw-semibold">
                    <i class="fas fa-plus-circle me-2"></i>Add New Content
                </div>
                <div class="card-body">

                    <!-- Tab pills -->
                    <ul class="nav nav-pills mb-3" id="addTabs">
                        <li class="nav-item">
                            <button class="nav-link active" onclick="showTab('text')" id="tab-text">
                                <i class="fas fa-align-left me-1"></i>Text
                            </button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link" onclick="showTab('image')" id="tab-image">
                                <i class="fas fa-image me-1"></i>Image
                            </button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link" onclick="showTab('video')" id="tab-video">
                                <i class="fas fa-video me-1"></i>Video
                            </button>
                        </li>
                    </ul>

                    <!-- Text Form -->
                    <div id="form-text">
                        <form id="textContentForm" action="{{ route('admin.services.store', $slug) }}" method="POST">
                            @csrf
                            <input type="hidden" name="content_type" value="text">
                            {{-- Hidden field that actually carries the POST value --}}
                            <input type="hidden" name="text_content" id="text_content_hidden" value="{{ old('text_content') }}">
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Text / Description</label>
                                {{-- No name/required on the textarea — CKEditor manages it --}}
                                <textarea class="form-control rich-editor" id="text_content_editor" rows="8"
                                    placeholder="Enter text content for this service page..."
                                >{{ old('text_content') }}</textarea>
                                <div class="form-text">You can bold, italicise, add headings, bullet points and links.</div>
                            </div>
                            <button type="submit" class="btn btn-primary w-100" id="saveTextBtn">
                                <i class="fas fa-save me-1"></i>Save Text
                            </button>
                        </form>
                    </div>

                    <!-- Image Form -->
                    <div id="form-image" style="display:none;">
                        <form action="{{ route('admin.services.store', $slug) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="content_type" value="image">
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Upload Image</label>
                                <input type="file" name="image_file" class="form-control" accept="image/*" required
                                       onchange="previewImg(this)">
                                <div class="form-text">Max 5MB. Supported: JPG, PNG, GIF, WebP.</div>
                            </div>
                            <div id="imgPreviewWrap" style="display:none; margin-bottom: 12px;">
                                <img id="imgPreview" style="max-width: 100%; border-radius: 8px; border: 1px solid #dee2e6;">
                            </div>
                            <button type="submit" class="btn btn-success w-100">
                                <i class="fas fa-upload me-1"></i>Upload Image
                            </button>
                        </form>
                    </div>

                    <!-- Video Form -->
                    <div id="form-video" style="display:none;">
                        <form action="{{ route('admin.services.store', $slug) }}" method="POST">
                            @csrf
                            <input type="hidden" name="content_type" value="video">
                            <div class="mb-3">
                                <label class="form-label fw-semibold">YouTube Video URL</label>
                                <input type="url" name="video_url" class="form-control"
                                    placeholder="https://www.youtube.com/watch?v=..."
                                    value="{{ old('video_url') }}" required>
                                <div class="form-text">Paste the full YouTube video URL.</div>
                            </div>
                            <button type="submit" class="btn btn-danger w-100">
                                <i class="fab fa-youtube me-1"></i>Embed Video
                            </button>
                        </form>
                    </div>

                    @if($errors->any())
                        <div class="alert alert-danger mt-3">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                </div>
            </div>
        </div>

        <!-- RIGHT: Existing Content List -->
        <div class="col-lg-7">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
                    <span><i class="fas fa-list me-2"></i>Current Content</span>
                    <span class="badge bg-secondary">{{ $contents->count() }} item(s)</span>
                </div>
                <div class="card-body p-0">
                    @if($contents->isEmpty())
                        <div class="text-center p-5 text-muted">
                            <i class="fas fa-inbox fa-3x mb-3"></i>
                            <p>No content added yet. Use the form on the left to add content.</p>
                        </div>
                    @else
                        <ul class="list-group list-group-flush" id="sortableList">
                            @foreach($contents as $item)
                                <li class="list-group-item d-flex align-items-start gap-3 py-3"
                                    data-id="{{ $item->id }}">
                                    <!-- Drag handle -->
                                    <span class="drag-handle text-muted mt-1" style="cursor: grab;" title="Drag to reorder">
                                        <i class="fas fa-grip-vertical"></i>
                                    </span>

                                    <!-- Content preview -->
                                    <div class="flex-grow-1">
                                        @if($item->content_type === 'text')
                                            <span class="badge bg-primary mb-1">Text</span>
                                            <p class="mb-0 text-truncate" style="max-width: 300px; font-size: 0.9rem;">
                                                {{ Str::limit($item->content, 80) }}
                                            </p>
                                        @elseif($item->content_type === 'image')
                                            <span class="badge bg-success mb-1">Image</span><br>
                                            <img src="{{ asset('storage/' . $item->content) }}"
                                                 alt="Service image"
                                                 style="max-width: 120px; max-height: 80px; border-radius: 6px; object-fit: cover; border: 1px solid #dee2e6;">
                                        @elseif($item->content_type === 'video')
                                            <span class="badge bg-danger mb-1">Video</span>
                                            <p class="mb-0 text-truncate" style="max-width: 300px; font-size: 0.85rem;">
                                                <i class="fab fa-youtube text-danger me-1"></i>
                                                {{ $item->content }}
                                            </p>
                                        @endif
                                    </div>

                                    <!-- Delete button -->
                                    <form action="{{ route('admin.services.destroy', [$slug, $item->id]) }}"
                                          method="POST"
                                          onsubmit="return confirm('Delete this content item?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger btn-sm" title="Delete">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        </div>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"></script>
<script>
    // Tab switching
    function showTab(type) {
        ['text','image','video'].forEach(function(t) {
            document.getElementById('form-' + t).style.display = (t === type) ? 'block' : 'none';
            var tab = document.getElementById('tab-' + t);
            tab.classList.toggle('active', t === type);
        });
    }

    // Image preview
    function previewImg(input) {
        var wrap = document.getElementById('imgPreviewWrap');
        var img = document.getElementById('imgPreview');
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                img.src = e.target.result;
                wrap.style.display = 'block';
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

    // Sortable drag-and-drop reorder
    var sortableList = document.getElementById('sortableList');
    if (sortableList) {
        Sortable.create(sortableList, {
            handle: '.drag-handle',
            animation: 150,
            onEnd: function() {
                var ids = Array.from(sortableList.querySelectorAll('li[data-id]'))
                              .map(function(li) { return li.getAttribute('data-id'); });
                fetch('{{ route('admin.services.reorder', $slug) }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({ ids: ids })
                });
            }
        });
    }
</script>

<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
<script>
(function() {
    var editorTextarea = document.querySelector('#text_content_editor');
    var hiddenInput    = document.querySelector('#text_content_hidden');
    var form           = document.querySelector('#textContentForm');
    var saveBtn        = document.querySelector('#saveTextBtn');

    if (!editorTextarea || !form) { return; }

    ClassicEditor
        .create(editorTextarea)
        .then(function(editor) {

            // When Save Text is clicked, populate the hidden input then submit
            saveBtn.addEventListener('click', function(e) {
                e.preventDefault();

                var data = editor.getData();
                var stripped = data.replace(/<[^>]*>/g, '').trim();

                if (!stripped) {
                    alert('Please enter some text content before saving.');
                    return;
                }

                // Write editor HTML into the hidden POST field
                hiddenInput.value = data;

                // Submit without triggering click listeners again
                form.submit();
            });
        })
        .catch(function(err) {
            console.error('CKEditor error:', err);
        });
})();
</script>
@endsection
