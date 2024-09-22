@extends('admin.layouts.main-file')

@section('main-section')
<div class="col-xl-12 col-lg-12 d-flex justify-content-between align-items-center">
    <h4 class="fw-bold topbar-button pe-none text-uppercase mb-2 mx-4">Edit Product</h4>
    <a href="{{ route('admin.products.index') }}" class="btn btn-sm btn-primary mx-4 mb-2">Product List</a>
</div>
<div class="container-xxl">
    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <form id="productEditForm" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ $product->id }}">
                <input type="hidden" id="removed-images" name="removed_images" value="">

                <!-- Product Photo Section -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h4 class="card-title">Edit Product Photo</h4>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="product-images" class="form-label">Product Images</label>
                            <input type="file" id="product-images" name="file[]" multiple accept="image/*"
                                class="form-control">
                        </div>
                        <div id="image-preview-container" class="d-flex flex-wrap">
                            @foreach($product->images as $image)
                                <div class="position-relative m-2">
                                    <img src="{{ env('ASSET2_URL') }}{{ $image->image_path }}" class="img-thumbnail"
                                        style="width: 150px;">
                                    <button type="button"
                                        class="btn btn-danger btn-sm position-absolute top-0 end-0 m-1 remove-image"
                                        data-image-id="{{ $image->id }}">
                                        <i class="bx bx-x"></i>
                                    </button>
                                </div>
                            @endforeach
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
                                        value="{{ $product->name }}" placeholder="Item Name">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="product-categories" class="form-label">Product Categories</label>
                                    <select class="form-control" id="product-categories" name="category_id" data-choices
                                        data-choices-groups data-placeholder="Select Categories">
                                        <option value="">Choose a category</option>
                                        @foreach($subCategories as $cRow)
                                            <option value="{{ $cRow->id }}" {{ $product->category_id == $cRow->id ? 'selected' : '' }}>
                                                {{ $cRow->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="product-Price" class="form-label">Price</label>
                                    <input type="number" id="product-Price" name="price"  value="{{ $product->price }}" class="form-control"
                                    placeholder="Item Price">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="product-tags" class="form-label">Tags</label>
                                    <input type="string" id="product-tags" name="tags" value="{{ $product->tags }}"  class="form-control"
                                    placeholder="Item Tags">

                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea class="form-control bg-light-subtle" id="description" name="description"
                                        rows="7"
                                        placeholder="Short description about the product">{{ $product->description }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Submit Button -->
                <div class="p-3 bg-light mb-3 rounded">
                    <div class="row justify-content-end g-2">
                        <div class="col-lg-2">
                            <button class="btn btn-outline-primary" type="submit" id="submit">Update Product</button>
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
            $('#productEditForm').on('submit', function (e) {
                e.preventDefault();
                handleFormUploadForm(
                    'POST',
                    '#productEditForm',
                    '#submit',
                    "{{ route('admin.products.update', $product->id) }}",
                    "{{ route('admin.products.index') }}"
                );
            });
        });
    </script>
@endpush