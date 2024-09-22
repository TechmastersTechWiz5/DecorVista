@extends('admin.layouts.main-file')

@section('main-section')
<div class="col-xl-12 col-lg-12 d-flex justify-content-between align-items-center">
    <h4 class="fw-bold topbar-button pe-none text-uppercase mb-2 mx-4">Brand Detail</h4>
    <a href="{{ route('brands.index') }}" class="btn btn-sm btn-primary mx-4 mb-2">Brand List</a>
</div>
<div class="container-xxl">
    <div class="row">
        <!-- Brand Details Section -->
        <div class="col-xl-12 col-lg-12">
            <div class="card">
                <div class="card-header d-flex flex-column flex-md-row align-items-start">
                    <!-- Title and Metadata Container -->
                    <div class="d-flex flex-column flex-grow-1">
                        <h1 class="card-title" style="font-size: 2rem;">{{ $brand->name }}</h1>
                        <!-- Brand Status Badge -->
                        <span class="badge bg-{{ $brand->status == 1 ? 'success' : 'danger' }} my-2 d-inline-block"
                            style="padding: 0.35em 0.65em; font-size: 0.875em;">
                            {{ $brand->status == 1 ? 'Active' : 'Inactive' }}
                        </span>
                        <p class="text-muted mb-2">Created on
                            {{ \Carbon\Carbon::parse($brand->created_date)->format('F j, Y') }} by
                            {{ $brand->created_by }}</p>
                    </div>
                    <!-- Display Icon Image -->
                    @if ($brand->icon_image)
                        <img src="{{ env('ASSET2_URL') . $brand->icon_image }}" class="img-thumbnail"
                            style="width: 150px; height: auto; margin-left: 20px;">
                    @endif
                </div>
                <div class="card-body">
                    <!-- Brand Description -->
                    <div id="snow-editor-detail" style="height: auto;">
                        {!! $brand->description !!}
                    </div>

                    <!-- Brand Images (Cover and Banner) -->
                    <div class="mt-4">
                        <h5 class="mb-3">Brand Images</h5>
                        <div class="d-flex flex-wrap">
                            <!-- Cover Image -->
                            @if ($brand->cover_image)
                                <div class="position-relative m-2">
                                    <h6>Cover Image</h6>
                                    <img src="{{ env('ASSET2_URL') . $brand->cover_image }}" class="img-thumbnail"
                                        style="width: 250px; height: auto; margin: 5px;">
                                </div>
                            @endif

                            <!-- Banner Image -->
                            @if ($brand->banner_image)
                                <div class="position-relative m-2">
                                    <h6>Banner Image</h6>
                                    <img src="{{ env('ASSET2_URL') . $brand->banner_image }}" class="img-thumbnail"
                                        style="width: 250px; height: auto; margin: 5px;">
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- Products Table -->
                    <div class="mt-4">
                        <h5 class="mb-3">Product List</h5>
                        <table class="table table-hover table-centered">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Rating</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td>{{$loop->index + 1 }}</td>
                                        <td>
                                            <div class="d-flex align-items-center gap-2">
                                                <div
                                                    class="rounded bg-light avatar-md d-flex align-items-center justify-content-center">
                                                    @if (isset($product->images[0]['image_path']))
                                                        <img src="{{ env('ASSET2_URL') . $product->images[0]['image_path'] }}"
                                                            alt="" class="avatar-md">
                                                    @endif
                                                </div>
                                            </div>

                                        </td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->description }}</td>
                                        <td>{{ $product->category }}</td>
                                        <td>{!! $product->price_display !!}</td>
                                        <td>
                                            <ul class="d-flex text-warning m-0 fs-20 list-unstyled">
                                                @for($i = 1; $i <= 5; $i++)
                                                    <li>
                                                        <i
                                                            class="bx {{ $i <= $product->average_rating ? 'bxs-star' : 'bx-star' }}"></i>
                                                    </li>
                                                @endfor
                                            </ul>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <!-- Include Quill CSS -->
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <script>
        // Initialize Quill Editor
        var quill = new Quill('#snow-editor-detail', {
            theme: 'snow',
            readOnly: true,
        });
    </script>
@endpush
@endsection