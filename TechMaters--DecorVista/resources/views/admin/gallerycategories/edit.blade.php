@extends('admin.layouts.main-file')

@section('main-section')
<div class="col-xl-12 col-lg-12 d-flex justify-content-between align-items-center">
    <h4 class="fw-bold topbar-button pe-none text-uppercase mb-2 mx-4">Edit Gallery Category</h4>
    <a href="{{ route('admin.gallery.categories.index') }}" class="btn btn-sm btn-primary mx-4 mb-2">
    Gallery Category List
    </a>
</div>
<div class="container-xxl">
    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <form id="categoryEditForm" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" id="id" name="id" class="form-control" value="{{ $category->id }}">


                <!-- Category Information Section -->
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">General Information</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="category-name" class="form-label">Category Title</label>
                                    <input type="text" id="category-name" name="name" class="form-control"
                                        value="{{ $category->name }}" placeholder="Category Name" required>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <label for="parent-category" class="form-label">Parent Category</label>
                                <select class="form-control" id="parent-category" name="parent_id" data-choices
                                    data-choices-groups data-placeholder="Select Parent Category">
                                    <option value="" {{ is_null($category->parent_id) ? 'selected' : '' }}>No
                                        Parent</option>
                                    @foreach($categories as $cRow)
                                        <option value="{{ $cRow->id }}" {{ $category->parent_id == $cRow->id ? 'selected' : '' }}>
                                            {{ $cRow->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="p-3 bg-light mb-3 rounded">
                    <div class="row justify-content-end g-2">
                        <div class="col-lg-2">
                            <button class="btn btn-outline-primary" type="submit" id="submit">Update Category</button>
                        </div>
                        <div class="col-lg-2">
                            <button class="btn btn-primary" type="reset">Cancel</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function () {

            $('#categoryEditForm').on('submit', function (e) {
                e.preventDefault(); // Prevent default form submission

                // Create FormData object
                let formData = new FormData(this);
                let redirectUrl = "{{ route('admin.gallery.categories.index') }}";

                // Make AJAX request to update category
                $.ajax({
                    url: '{{ route("admin.gallery.categories.update", $category->id) }}', // The route for updating
                    type: 'POST', // HTTP method
                    data: formData, // The form data
                    processData: false, // Prevent jQuery from processing data
                    contentType: false, // Prevent jQuery from setting the content type
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                    },
                    beforeSend: function () {
                        $('#submit').attr('disabled', true); // Disable submit button while processing
                    },
                    success: function (data) {
                        var response = JSON.parse(JSON.stringify(data));
                        if (response.status === "success") {
                            Toastify({
                                text: response.message,
                                duration: 3000,
                                gravity: "top",
                                position: 'right',
                                backgroundColor: "linear-gradient(to right,#00b09b, #96c93d)",
                            }).showToast();

                            setTimeout(() => {
                                location.replace(redirectUrl); // Replace with actual redirect URL after update
                            }, 3000);
                        } else if (response.status === "warning" || response.status === "error") {
                            Toastify({
                                text: response.message,
                                duration: 3000,
                                gravity: "top",
                                position: 'right',
                                backgroundColor: "linear-gradient(to right, #ff5f6d,#ffc371)",
                            }).showToast();
                        }
                    },
                    error: function (jqXHR) {
                        Toastify({
                            text: "An error occurred. Please try again later.",
                            duration: 3000,
                            gravity: "top",
                            position: 'right',
                            backgroundColor: "linear-gradient(to right, #ff5f6d,#ffc371)",
                        }).showToast();
                    },
                    complete: function () {
                        $('#submit').attr('disabled', false); // Re-enable the submit button after completion
                    }
                });
            });
        });
    </script>
@endpush