@extends('admin.layouts.main-file')
@section('main-section')
<div class="col-xl-12 col-lg-12 d-flex justify-content-between align-items-center">
    <h4 class="fw-bold topbar-button pe-none text-uppercase mb-2 mx-4">Create Gallery Category</h4>
    <a href="{{ route('admin.gallery.categories.index') }}" class="btn btn-sm btn-primary mx-4 mb-2">
    Gallery Category List
    </a>
</div>
<div class="container-xxl">
    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <form id="categoryCreateForm" method="post" enctype="multipart/form-data">

                <!-- Product Information Section -->
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">General Information</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="product-name" class="form-label">Category Title</label>
                                    <input type="text" id="product-name" name="name" class="form-control"
                                        placeholder="Items Name" required>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <label for="product-categories" class="form-label">Parent Category</label>
                                <select class="form-control" id="product-categories" name="parent_id" data-choices
                                    data-choices-groups data-placeholder="Select Categories">
                                    <option value="">No Parent</option>
                                    @foreach($categories as $cRow)
                                        <option value="{{ $cRow->id }}">{{ $cRow->name }}</option>
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
                            <button class="btn btn-outline-primary" type="submit" id="submit">Create Category</button>
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
    <script>
        $(document).ready(function () {
            
            // Handle form submission using the handleFileUploadForm function
            $('#categoryCreateForm').on('submit', function (e) {
                e.preventDefault(); // Prevent default form submission

                // Define target URL and redirect URL
                let targetUrl = "{{ route('admin.gallery.categories.store') }}";
                let redirectUrl = "{{ route('admin.gallery.categories.index') }}";

                // Call the handleFileUploadForm function
                handleFormUploadForm('POST', '#categoryCreateForm', '#submit', targetUrl, redirectUrl);
            });
        });

    </script>
@endpush
