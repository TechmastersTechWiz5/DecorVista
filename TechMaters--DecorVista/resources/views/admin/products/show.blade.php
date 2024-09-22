@extends('admin.layouts.main-file')

@section('main-section')
<div class="col-xl-12 col-lg-12 d-flex justify-content-between align-items-center">
    <h4 class="fw-bold topbar-button pe-none text-uppercase mb-2 mx-4">Product Detail</h4>
    <a href="{{ route('admin.products.index') }}" class="btn btn-sm btn-primary mx-4 mb-2">Product List</a>
</div>
<!-- Start Container Fluid -->
<div class="container-xxl">

    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <!-- Custom Image Slider -->
                    <div class="image-slider-container position-relative">
                        <!-- Main Image Display -->
                        <div id="mainImage" class="main-image bg-light rounded">
                            <img src="{{ str_replace('storage/', 'storage/app/public/', asset($product->images[0]->image_path)) }}"
                                alt="" class="img-fluid" id="currentImage">
                        </div>

                        <!-- Left and Right Navigation Buttons -->
                        <a class="carousel-control-prev rounded" id="prevImage" role="button">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </a>
                        <a class="carousel-control-next rounded" id="nextImage" role="button">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </a>

                        <!-- Thumbnail Images -->
                        <div class="d-flex justify-content-center mt-3">
                            @foreach($product->images as $index => $image)
                                <div class="thumb" style="opacity: {{ $index === 0 ? '1' : '0.5' }};"
                                    data-index="{{ $index }}">
                                    <img src="{{env('ASSET2_URL')}}{{$image->image_path}}" class="img-thumbnail"
                                        style="width: 60px; cursor: pointer;">
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <!-- Removed the Add To Cart, Buy Now, and Wishlist buttons -->
            </div>
        </div>
        <div class="col-lg-8">
            <!-- Product details remain the same -->
            <div class="card">
                <div class="card-body">
                    <h4 class="badge bg-success text-light fs-14 py-1 px-2">New Arrival</h4>
                    <p class="mb-1">
                        <a href="#!" class="fs-24 text-dark fw-medium">{{ $product->name }}</a>
                    </p>
                    <div class="d-flex gap-2 align-items-center">
                        <ul class="d-flex text-warning m-0 fs-20 list-unstyled">
                            @for($i = 0; $i < 5; $i++)
                                <li>
                                    <i class="bx {{ $i < 4 ? 'bxs-star' : 'bxs-star-half' }}"></i>
                                </li>
                            @endfor
                        </ul>
                        <p class="mb-0 fw-medium fs-18 text-dark">4.5 <span class="text-muted fs-13">(55 Review)</span>
                        </p>
                    </div>
                    @if($product->price)
                        <h2 class="fw-medium my-3">
                            ${{ $product->price }}
                        </h2>
                    @else
                    @endif
                    <ul class="d-flex flex-column gap-2 list-unstyled fs-15 my-3">
                        <li><i class='bx bx-check text-success'></i> In Stock</li>
                        <li><i class='bx bx-check text-success'></i> Free delivery available</li>
                    </ul>
                    <h4 class="text-dark fw-medium">Description :</h4>
                    <p class="text-muted">{{ $product->description }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Reviews Section (unchanged) -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Top Reviews From Around the World</h4>
                </div>
                <div class="card-body">
                @if($product->reviews)
                    <div class="row">
                        @foreach($product->reviews as $review)
                            <div class="col-lg-4">
                                <div class="d-flex align-items-center gap-2">
                                    <img src="{{env('ASSET2_URL')}}{{ $review->user->profile_picture }}" alt=""
                                        class="avatar-md rounded-circle">
                                    <div>
                                        <h5 class="mb-0">{{ $review->user->name }}</h5>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center gap-2 mt-3 mb-1">
                                    <ul class="d-flex text-warning m-0 fs-20 list-unstyled">
                                        @for($i = 1; $i <= 5; $i++)
                                            <li>
                                                <i class="bx {{ $i <= $review->star_rating ? 'bxs-star' : 'bx-star' }}"></i>
                                            </li>
                                        @endfor
                                    </ul>
                                    <p class="fw-medium mb-0 text-dark fs-15">{{ $review->title }}</p>
                                </div>
                                <p class="mb-0 text-dark fw-medium fs-15">Reviewed on {{ $review->created_date }}</p>
                                <p class="text-muted">{{ $review->message }}</p>
                                <div class="mt-2">
                                    <a href="#!" class="fs-14 me-3 text-muted"><i class='bx bx-like'></i> Helpful</a>
                                    <a href="#!" class="fs-14 text-muted">Report</a>
                                </div>
                                <hr class="my-3">
                            </div>
                        @endforeach
                    </div>
                @endif
                    
                </div>
            </div>
        </div>
    </div>

</div>
<!-- End Container Fluid -->
@endsection

<!-- JavaScript for Image Slider -->
@push('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            let currentIndex = 0;
            const images = @json($product->images);
            const mainImage = document.getElementById("currentImage");
            const thumbs = document.querySelectorAll('.thumb');
            const nextButton = document.getElementById("nextImage");
            const prevButton = document.getElementById("prevImage");

            // Function to update the main image and thumbnails
            function updateImage(index) {
                mainImage.src = "{{ env('ASSET2_URL') }}" + images[index].image_path;
                thumbs.forEach((thumb, i) => {
                    thumb.style.opacity = i === index ? "1" : "0.5";
                });
            }

            // Auto-slide every few seconds
            setInterval(() => {
                currentIndex = (currentIndex + 1) % images.length;
                updateImage(currentIndex);
            }, 3000);

            // Navigation buttons
            nextButton.addEventListener("click", () => {
                currentIndex = (currentIndex + 1) % images.length;
                updateImage(currentIndex);
            });

            prevButton.addEventListener("click", () => {
                currentIndex = (currentIndex - 1 + images.length) % images.length;
                updateImage(currentIndex);
            });

            // Click on thumbnail to select image
            thumbs.forEach((thumb, index) => {
                thumb.addEventListener("click", () => {
                    currentIndex = index;
                    updateImage(currentIndex);
                });
            });
        });
    </script>
@endpush