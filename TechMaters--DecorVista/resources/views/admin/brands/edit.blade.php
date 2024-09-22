@extends('admin.layouts.main-file')

@section('main-section')
<div class="col-xl-12 col-lg-12 d-flex justify-content-between align-items-center">
    <h4 class="fw-bold topbar-button pe-none text-uppercase mb-2 mx-4">Edit Brand</h4>
    <a href="{{ route('brands.index') }}" class="btn btn-sm btn-primary mx-4 mb-2">Brands List</a>
</div>

<div class="container-xxl">
    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <form id="brandEditForm" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ $brand->id }}">
                <!-- Brand Information Section -->
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit Brand Information</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="brand-name" class="form-label">Brand Name</label>
                                    <input type="text" id="brand-name" name="name" class="form-control"
                                        value="{{ $brand->name }}" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="brand-description" class="form-label">Brand Description</label>
                                    <!-- Quill Editor Container -->
                                    <div id="snow-editor" style="height: 300px;">
                                        {!! $brand->description !!}
                                    </div>
                                    <!-- Hidden Textarea for Quill Data -->
                                    <textarea id="brand-description" name="description" class="d-none"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Brand Images Section -->
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit Brand Images</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <!-- Icon Image -->
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label for="icon-image" class="form-label">Icon Image</label>
                                    <input type="file" id="icon-image" name="icon_image" accept="image/*"
                                        class="form-control">
                                    <div id="icon-preview" class="d-flex flex-wrap mt-2">
                                        @if ($brand->icon_image)
                                            <img src="{{ env('ASSET2_URL') . $brand->icon_image }}" class="img-thumbnail"
                                                style="width: 150px;">
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <!-- Cover Image -->
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label for="cover-image" class="form-label">Cover Image</label>
                                    <input type="file" id="cover-image" name="cover_image" accept="image/*"
                                        class="form-control">
                                    <div id="cover-preview" class="d-flex flex-wrap mt-2">
                                        @if ($brand->cover_image)
                                            <img src="{{ env('ASSET2_URL') . $brand->cover_image }}" class="img-thumbnail"
                                                style="width: 250px;">
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <!-- Banner Image -->
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label for="banner-image" class="form-label">Banner Image</label>
                                    <input type="file" id="banner-image" name="banner_image" accept="image/*"
                                        class="form-control">
                                    <div id="banner-preview" class="d-flex flex-wrap mt-2">
                                        @if ($brand->banner_image)
                                            <img src="{{ env('ASSET2_URL') . $brand->banner_image }}" class="img-thumbnail"
                                                style="width: 250px;">
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="p-3 bg-light mb-3 rounded">
                    <div class="row justify-content-end g-2">
                        <div class="col-lg-2">
                            <button class="btn btn-outline-primary" type="submit" id="submit">Update Brand</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

    <script>
        $(document).ready(function () {

            var quill = new Quill('#snow-editor', {
                theme: 'snow',
                modules: {
                    'toolbar': [['bold', 'italic', 'underline'], ['link', 'image']]
                }
            });

            // Handle image preview for the updated images
            handleImagePreview('#icon-image', '#icon-preview');
            handleImagePreview('#cover-image', '#cover-preview');
            handleImagePreview('#banner-image', '#banner-preview');

            // Form submit handler
            $('#brandEditForm').on('submit', function (e) {
                e.preventDefault();
                $('#brand-description').val(quill.root.innerHTML); // Set Quill content to hidden textarea

                handleFormUploadForm(
                    'POST',
                    '#brandEditForm',
                    '#submit',
                    '{{ route('brands.update', $brand->id) }}',
                    '{{ route('brands.index') }}'
                );
            });

        });
    </script>
@endpush