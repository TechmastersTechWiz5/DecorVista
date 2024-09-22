@extends('admin.layouts.main-file')

@section('main-section')
<div class="col-xl-12 col-lg-12 d-flex justify-content-between align-items-center">
    <h4 class="fw-bold topbar-button pe-none text-uppercase mb-2 mx-4">Create Product</h4>
    <a href="{{ route('admin.products.index') }}" class="btn btn-sm btn-primary mx-4 mb-2">Product List</a>
</div>
<div class="container-xxl">
    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <form id="productCreateForm" method="post" enctype="multipart/form-data">
                @csrf

                <!-- Product Photo Section -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h4 class="card-title">Add Product Photo</h4>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="product-images" class="form-label">Product Images</label>
                            <input type="file" id="product-images" name="file[]" multiple accept="image/*"
                                class="form-control" required>
                        </div>
                        <div id="image-preview-container" class="d-flex flex-wrap">
                            <!-- Image previews will be appended here -->
                        </div>
                    </div>
                </div>

                <!-- Product Information Section -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h4 class="card-title">Product Information</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="product-name" class="form-label">Product Name</label>
                                    <input type="text" id="product-name" name="product_name" class="form-control"
                                        placeholder="Item Name">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="product-categories" class="form-label">Product Categories</label>
                                    <select class="form-control" id="product-categories" name="category_id" data-choices
                                        data-choices-groups data-placeholder="Select Categories">
                                        <option value="">Choose a category</option>
                                        @foreach($subCategories as $cRow)
                                            <option value="{{$cRow->id}}">{{$cRow->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label for="product-Price" class="form-label">Price</label>
                                    <input type="number" id="product-Price" name="price" class="form-control"
                                    placeholder="Item Price">
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label for="product-Price" class="form-label">SKU(Stock Kepping Unit)</label>
                                    <input type="number" id="product-sku" name="sku" class="form-control"
                                    placeholder="Item Quantity">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label for="product-tags" class="form-label">Tags</label>
                                    <input type="strng" id="product-tags" name="tags" class="form-control"
                                    placeholder="Item Tags">

                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea class="form-control bg-light-subtle" id="description" name="description"
                                        rows="7" placeholder="Short description about the product"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="p-3 bg-light mb-3 rounded">
                    <div class="row justify-content-end g-2">
                        <div class="col-lg-2">
                            <button class="btn btn-outline-primary" type="submit" id="submit">Create Product</button>
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
            handleImagePreview('#product-images', '#image-preview-container');
            $('#productCreateForm').on('submit', function (e) {
                e.preventDefault();
                handleFormUploadForm(
                    'POST',
                    '#productCreateForm',
                    '#submit',
                    "{{ route('admin.products.store') }}",
                    "{{ route('admin.products.index') }}"
                );
            });
        });
    </script>
@endpush