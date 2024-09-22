@extends('admin.layouts.main-file')

@section('main-section')
<div class="col-xl-12 col-lg-12 d-flex justify-content-between align-items-center">
    <h4 class="fw-bold topbar-button pe-none text-uppercase mb-2 mx-4">Create Blog</h4>
    <a href="{{ route('admin.blogs.index') }}" class="btn btn-sm btn-primary mx-4 mb-2">Blog List</a>
</div>
<div class="container-xxl">
    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <form id="blogCreateForm" method="post" enctype="multipart/form-data">
                @csrf

                <!-- Blog Photo Section -->
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Add Blog Photo</h4>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="blog-images" class="form-label">Blog Images</label>
                            <input type="file" id="blog-images" name="images[]" multiple accept="image/*" class="form-control">
                        </div>
                        <div id="image-preview-container" class="d-flex flex-wrap">
                            <!-- Image previews will be appended here -->
                        </div>
                    </div>
                </div>

                <!-- Blog Information Section -->
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Blog Information</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="blog-title" class="form-label">Blog Title</label>
                                    <input type="text" id="blog-title" name="title" class="form-control" placeholder="Blog Title">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="body" class="form-label">Body</label>
                                    <!-- Quill Editor Container -->
                                    <div id="snow-editor" style="height: 300px;">
                                        <h3><span class="ql-size-large">Hello World!</span></h3>
                                        <p><br></p>
                                        <h3>This is a simple editable area.</h3>
                                        <p><br></p>
                                        <ul>
                                            <li>Select a text to reveal the toolbar.</li>
                                            <li>Edit rich document on-the-fly, so elastic!</li>
                                        </ul>
                                        <p><br></p>
                                        <p>End of simple area</p>
                                    </div>
                                    <!-- Hidden Textarea for Quill Data -->
                                    <textarea id="body" name="body" class="d-none"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="p-3 bg-light mb-3 rounded">
                    <div class="row justify-content-end g-2">
                        <div class="col-lg-2">
                            <button class="btn btn-outline-primary" type="submit" id="submit">Create Blog</button>
                        </div>
                        <div class="col-lg-2">
                            <button class="btn btn-primary" style="display: none;">Cancel</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<!-- Include Quill CSS -->
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
<script>
$(document).ready(function() {
    // Initialize Quill Editor
    var quill = new Quill('#snow-editor', {
        theme: 'snow',
        modules: {
            'toolbar': [['bold', 'italic', 'underline'], ['link', 'image']]
        }
    });

    // Handle image preview for new images
    $('#blog-images').on('change', function(event) {
        $('#image-preview-container').empty(); // Clear existing previews
        const files = event.target.files;
        
        // Convert FileList to Array
        const fileArray = Array.from(files);
        
        fileArray.forEach((file) => {
            if (file && file.type.startsWith('image/')) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const imgContainer = $('<div class="position-relative m-2" style="display: inline-block;">');
                    const img = $('<img>').attr('src', e.target.result).addClass('img-thumbnail').css('width', '150px').css('margin', '5px');
                    const cross = $('<button class="btn btn-danger btn-sm position-absolute top-0 end-0 m-1"><i class="bx bx-x"></i></button>').on('click', function() {
                        imgContainer.remove(); // Remove image preview
                        removeFileFromInput(file); // Remove file from input
                    });
                    imgContainer.append(img);
                    imgContainer.append(cross);
                    $('#image-preview-container').append(imgContainer);
                }
                reader.readAsDataURL(file);
            }
        });
    });

    // Function to remove file from input
    function removeFileFromInput(file) {
        const dataTransfer = new DataTransfer();
        const files = $('#blog-images')[0].files;
        for (let i = 0; i < files.length; i++) {
            if (files[i] !== file) {
                dataTransfer.items.add(files[i]);
            }
        }
        $('#blog-images')[0].files = dataTransfer.files;
    }

    // Handle form submission
    $('#blogCreateForm').on('submit', function(e) {
        e.preventDefault();
        // Set the value of the hidden textarea to the Quill editor content
        $('#body').val(quill.root.innerHTML);

        handleFormUploadForm(
            'POST',
            '#blogCreateForm',
            '#submit',
            "{{ route('admin.blogs.store') }}",
            "{{ route('admin.blogs.index') }}"
        );
    });
});
</script>
@endpush

