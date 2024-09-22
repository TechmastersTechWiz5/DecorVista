@extends('admin.layouts.main-file')

@section('main-section')
<div class="col-xl-12 col-lg-12 d-flex justify-content-between align-items-center">
    <h4 class="fw-bold topbar-button pe-none text-uppercase mb-2 mx-4">Edit Blog</h4>
    <a href="{{ route('admin.blogs.index') }}" class="btn btn-sm btn-primary mx-4 mb-2">Blog List</a>
</div>
<div class="container-xxl">
    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <form id="blogEditForm" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ $blog->id }}">
                <input type="hidden" id="removed-images" name="removed_images" value="">

                <!-- Blog Photo Section -->
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit Blog Photo</h4>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="blog-images" class="form-label">Blog Images</label>
                            <input type="file" id="blog-images" name="images[]" multiple accept="image/*"
                                class="form-control">
                        </div>
                        <div id="image-preview-container" class="d-flex flex-wrap">
                            <!-- Display additional images if exist -->
                            @foreach($blog->images as $image)
                                <div class="position-relative">
                                    <img src="{{env('ASSET2_URL') . $image->image_path}}" class="img-thumbnail"
                                        style="width: 150px; margin: 5px;">
                                    <button type="button"
                                        class="btn btn-danger btn-sm position-absolute top-0 end-0 m-1 remove-image"
                                        data-image-id="{{ $image->id }}"><i class="bx bx-x"></i></button>
                                </div>
                            @endforeach
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
                                    <input type="text" id="blog-title" name="title" class="form-control"
                                        value="{{ $blog->title }}" placeholder="Blog Title">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="body" class="form-label">Body</label>
                                    <div id="snow-editor" style="height: 300px;">
                                        {!! $blog->body !!}
                                    </div>
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
                            <button class="btn btn-outline-primary" type="submit" id="submit">Update Blog</button>
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
    <!-- Include Quill CSS and JS -->
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

    <script>
        $(document).ready(function () {
            // Initialize Quill Editor
            var quill = new Quill('#snow-editor', {
                theme: 'snow',
                modules: {
                    'toolbar': [['bold', 'italic', 'underline'], ['link', 'image']]
                }
            });

            // Handle image preview for new images
            $('#blog-images').on('change', function (event) {
                $('#image-preview-container').empty(); // Clear existing previews
                const files = event.target.files;
                const fileArray = Array.from(files); // Convert FileList to an Array

                fileArray.forEach((file, index) => {
                    if (file && file.type.startsWith('image/')) {
                        const reader = new FileReader();
                        reader.onload = function (e) {
                            // Create the wrapper div with the image and delete button
                            const imgContainer = $('<div>').addClass('position-relative').css('display', 'inline-block');
                            const img = $('<img>').attr('src', e.target.result)
                                .addClass('img-thumbnail')
                                .css('width', '150px')
                                .css('margin', '5px');

                            // Add a remove button with data-index to identify the image
                            const removeButton = $('<button>')
                                .addClass('btn btn-danger btn-sm position-absolute top-0 end-0 m-1 remove-image')
                                .html('<i class="bx bx-x"></i>')
                                .attr('data-file-index', index)  // Track the index of the image
                                .click(function () {
                                    // Remove the preview
                                    imgContainer.remove();
                                    // Remove the file from the input field
                                    removeFileFromInput(index);
                                });

                            // Append image and remove button to the container
                            imgContainer.append(img).append(removeButton);

                            // Append the container to the preview area
                            $('#image-preview-container').append(imgContainer);
                        };
                        reader.readAsDataURL(file);
                    }
                });
            });

            // Function to remove file from input
            function removeFileFromInput(index) {
                const dataTransfer = new DataTransfer();  // Create a DataTransfer object
                const files = $('#blog-images')[0].files;

                // Loop through files and add all except the removed one
                for (let i = 0; i < files.length; i++) {
                    if (i !== index) {  // Skip the file at the removed index
                        dataTransfer.items.add(files[i]);
                    }
                }

                // Update the input field with the new FileList
                $('#blog-images')[0].files = dataTransfer.files;
            }

            // Handle removing existing images from the server (if any)
            $('.remove-image').on('click', function () {
                const imageId = $(this).data('image-id');
                $(this).closest('.position-relative').remove();  // Remove from the DOM

                let removedImages = $('#removed-images').val();
                if (imageId === 'primary') {
                    removedImages += 'primary,';
                } else {
                    removedImages += imageId + ',';
                }
                $('#removed-images').val(removedImages);
            });

            // Handle form submission
            $('#blogEditForm').on('submit', function (e) {
                e.preventDefault();
                // Set the value of the hidden textarea to the Quill editor content
                $('#body').val(quill.root.innerHTML);

                handleFormUploadForm(
                    'POST',
                    '#blogEditForm',
                    '#submit',
                    '{{ route('admin.blogs.update', $blog->id) }}',
                    '{{ route('admin.blogs.index') }}'
                );
            });
        });
    </script>
@endpush