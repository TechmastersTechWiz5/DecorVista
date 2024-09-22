@extends('designer.layouts.layout')
@section('title')
Gallery
@endsection

@section('main-section')
<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="card-title">Create Gallery</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form id="galleryCreateForm" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row ">
                                    <div class="col-md-12">
                                        <label class="form-label" for="">Category</label>
                                        <select id="categorySelect" name="category_id" class="default-select form-control wide mt-3">
                                        <option value="">Select Category</option>
                                    @foreach($categories as $cRow)
                                        <option value="{{ $cRow->id }}">{{ $cRow->name }}</option>
                                    @endforeach

                                        </select>
                                    </div>
                                </div>

                                <!-- Main Image -->
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <label for="mainImage" class="form-label">Image</label>
                                        <input class="form-control" name="name" type="file" id="mainImage">
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-12">
                                        <label class="form-label">Image Preview</label>
                                        <div id="mainImagePreview" class="d-flex flex-wrap gap-3"></div>
                                    </div>
                                </div>


                                <button type="submit" class="btn btn-primary mt-4">Create Gallery</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@push('scripts')
<script>
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$(document).ready(function() {
var url = "/designer/get-categories";
    $.get(url,(data)=>{
        var categories = JSON.parse(data);
        
        var options = ``;
        options +=`<option selected disabled value="" >Select Category</option>`;
        for (const category of categories) {
            options += `
                <option value="${category.id}" >${category.name}</option>
            `;
        }
        $("#categorySelect").html(options);



    });

        function setupImagePreview(inputId, previewContainerId, maxImages = null) {
            $(`#${inputId}`).on('change', function(e) {
                const files = e.target.files;
                const previewContainer = $(`#${previewContainerId}`);
                previewContainer.empty(); // Clear previous previews

                // Limit file input based on maxImages, if applicable
                if (maxImages && files.length > maxImages) {
                    alert(`You can only upload a maximum of ${maxImages} images.`);
                    this.value = '';
                    return;
                }

                Array.from(files).forEach((file, index) => {
                    const reader = new FileReader();
                    reader.onload = function(event) {
                        const imgHtml = `
                            <div class="position-relative">
                                <img src="${event.target.result}" class="img-thumbnail" style="max-width: 150px;">
                                <button type="button" class="btn btn-danger btn-sm position-absolute top-0 end-0" onclick="removeImage('${inputId}', ${index})">&times;</button>
                            </div>
                        `;
                        previewContainer.append(imgHtml);
                    };
                    reader.readAsDataURL(file);
                });
            });
        }

        window.removeImage = function(inputId, index) {
            const input = document.getElementById(inputId);
            const dt = new DataTransfer();
            const {
                files
            } = input;

            // Loop through files and reassign to input except the removed one
            for (let i = 0; i < files.length; i++) {
                if (i !== index) {
                    dt.items.add(files[i]);
                }
            }
            input.files = dt.files; // Update input files

            // Trigger change event to refresh the preview
            $(`#${inputId}`).trigger('change');
        };

        setupImagePreview('mainImage', 'mainImagePreview');


        // Handle form submission
        $('#galleryCreateForm').on('submit', function(e) {
            e.preventDefault();

            handleFormUploadForm(
                'POST',
                '#galleryCreateForm',
                '#submit',
                "{{ route('designer.gallery.store') }}",
                "{{ route('designer.gallery.index') }}"
            );
        });
    });
</script>
@endpush