@extends('users.layout')

@section('title')

Product-Single

@endsection
@section('main')



<!--Shop-Tabs Section ======================-->
<section class="section-shop section-shop-tabs pt-130 pt-lg-200 position-relative">
    <div class="container">
        <div class="row justify-content-between gy-4">
            <div class="col-lg-6">
                <!-- Tabs-Contents -->
                <div class="tab-content" id="shops-tabContent">
                    @foreach($product->images as $index => $image)
                    <div class="tab-pane fade {{ $index === 0 ? 'show active' : '' }}" id="shop-{{ $index + 1 }}" role="tabpanel" aria-labelledby="shop-{{ $index + 1 }}-tab" tabindex="0">
                        <img src="{{ env('ASSET2_URL'). $image->image_path}}" class="img-fluid product-image" alt="{{ $product->name }}">
                    </div>
                    @endforeach
                </div>
                <!-- Tabs-Contents -->

                <!-- Tabs -->
                <ul class="shop-tabs nav nav-pills d-flex gap-20 mt-20" id="shops-tab" role="tablist">
                    @foreach($product->images as $index => $image)
                    <li class="nav-item" role="presentation">
                        <button class="shop-button {{ $index === 0 ? 'active' : '' }}" id="shop-{{ $index + 1 }}-tab" data-bs-toggle="pill" data-bs-target="#shop-{{ $index + 1 }}" type="button" role="tab" aria-controls="shop-{{ $index + 1 }}" aria-selected="{{ $index === 0 ? 'true' : 'false' }}">
                            <img src="{{ env('ASSET2_URL'). $image->image_path}}" alt="{{ $product->name }}" class="product-thumbnail">
                        </button>
                    </li>
                    @endforeach
                </ul>
                <!-- Tabs -->
            </div>
            <!-- col-6 -->
            <div class="col-lg-5">
                <div class="shop-product-descriptions sticky-elements">
                    <h5 class="display-5 lh-1">{{ $product->name }}</h5>
                    <div class="d-flex align-items-center justify-content-between">
                        <span class="fs-5 fw-bold">${{ number_format($product->price, 2) }}</span>
                        <div class="star_rating-wrap d-flex gap-2 align-items-start">
                            <div>
                                <span class="star-rating">
                                    <span class="star-fill" style="width: {{ $product->rating * 20 }}%;"></span>
                                </span>
                            </div>
                            <span class="small fw-semibold">({{ $product->reviews_count }} reviews)</span>
                        </div>
                    </div>
                    <p class="mb-0 mt-3 mt-lg-20">{{ $product->description }}</p>
                    <div class="d-flex flex-wrap gap-3 py-4 py-lg-40">
                        <div class="cart-btn d-flex align-items-center gap-3">
                            <span class="cart-icon dash-icon">
                                <svg width="11" height="4" viewBox="0 0 11 4" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0 3.38V0.619995H10.2V3.38H0Z" fill="black" />
                                </svg>
                            </span>
                            <span class="input-values"><input type="text" name="input-value" value="1" class="input-number"></span>
                            <span class="cart-icon plus-icon">
                                <svg width="13" height="12" viewBox="0 0 13 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M4.85522 12V7.344H0.199219V4.632H4.85522V0H7.56722V4.632H12.1992V7.344H7.56722V12H4.85522Z" />
                                </svg>
                            </span>
                        </div>
                        <div class="text-lg-end">
                            <a href="#" class="btn btn-md btn-primary">Add to cart</a>
                        </div>
                    </div>
                    <ul class="shop-product-list d-flex flex-column gap-10 list-unstyled mb-0">
                        <li class="d-flex align-items-center gap-10">
                            <span class="list-description">SKU</span> <span>{{ $product->inventory->sku }}</span>
                        </li>
                        <li class="d-flex align-items-center gap-10">
                            <span class="list-description">CATEGORY :</span><a href="# " class="shop-items-link link-hover-animation-1">{{ $product->productcategory->name }}</a>
                        </li>
                        <li class="d-flex align-items-center gap-10">
                            <span class="list-description">TAGS :</span>
                            <a href="#" class="shop-items-link link-hover-animation-1">{{$product->tags}}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- row -->
    </div>
    <!-- container -->
</section>
<!--Shop-Tabs Section ======================-->

<!--Shop-Description Section ======================-->
<div class="section-shop section-shop-description pt-60 pt-lg-100 position-relative">
    <div class="container">
        <!-- Tabs -->
        <ul class="shop-description-tabs nav nav-pills d-flex" id="shop-description-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <span class="shop-description-button active" id="description-1-tab" data-bs-toggle="pill" data-bs-target="#description-1" role="tab" aria-controls="description-1" aria-selected="true">
                    <span class="fs-4 fw-bold mb-0">Description</span>
                </span>
            </li>
            <li class="nav-item" role="presentation">
                <span class="shop-description-button" id="description-3-tab" data-bs-toggle="pill" data-bs-target="#description-3" role="tab" aria-controls="description-3" aria-selected="false">
                    <span class="fs-4 fw-bold mb-0">Reviews</span>
                </span>
            </li>
        </ul>
        <!-- Tabs -->

        <!-- Tabs-Contents -->
        <div class="tab-content" id="shop-description-tabContent">
            <!--description-1-tab  -->
            <div class="tab-pane fade show active" id="description-1" role="tabpanel" aria-labelledby="description-1-tab" tabindex="0">
                <div class="description-details">
                    <p class="mb-30">
                        {{ $product->description }}
                    </p>
                </div>
            </div>
            <!--description-1-tab  -->

            <!--description-3-tab  -->
            <div class="tab-pane fade" id="description-3" role="tabpanel" aria-labelledby="description-3-tab" tabindex="0">
                <div class="description-details">
                    <form id="reviewCreateForm" method="POST" class="contact-form row gy-3 gx-20">
                        @csrf
                        <!-- Hidden field to store product_id -->
                        <input type="hidden" name="product_id" value="{{ $product->id }}">

                        <!-- Star Rating Input -->
                        <div class="col-12">
                            <label for="star-rating" class="form-label">Rating:</label>
                            <div class="something">
                                <input type="radio" id="star5" name="star_rating" value="5">
                                <label for="star5" title="5 stars">&#9733;</label>
                                <input type="radio" id="star4" name="star_rating" value="4">
                                <label for="star4" title="4 stars">&#9733;</label>
                                <input type="radio" id="star3" name="star_rating" value="3">
                                <label for="star3" title="3 stars">&#9733;</label>
                                <input type="radio" id="star2" name="star_rating" value="2">
                                <label for="star2" title="2 stars">&#9733;</label>
                                <input type="radio" id="star1" name="star_rating" value="1">
                                <label for="star1" title="1 star">&#9733;</label>
                            </div>
                        </div>

                        <div class="col-12">
                            <input type="text" class="form-control" id="InputName" name="name" placeholder="Your Name*" required>
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="InputNumber" name="mobile_number" placeholder="Phone Number" required>
                        </div>
                        <div class="col-md-6">
                            <input type="email" class="form-control" id="InputEmail" name="email" placeholder="Email*" required>
                        </div>
                        <div class="col-12">
                            <textarea class="form-control" id="InputMessage" name="message" rows="5" placeholder="Type your message" required></textarea>
                        </div>
                        <div class="col-12">
                            <div class="text-lg-end">
                                <button type="submit" class="btn btn-outline-primary gap-10">Send message
                                    <svg width="35" height="22" viewBox="0 0 35 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M24 0.585815L34.4142 10.9999L24 21.4142L22.5858 20L30.5857 12L0 12L2.38419e-07 10L30.5858 10L22.5858 2.00003L24 0.585815Z"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <div class="response py-3"></div>
                    </form>

                </div>
            </div>
            <!--description-3-tab  -->
        </div>
        <!-- Tabs-Contents -->
    </div>
</div>
<!--Shop-Description Section ======================-->






<!--Shop-Swiper Section ======================-->
<section class="section-shop section-shop-swiper pt-60 pt-lg-100 position-relative">
    <div class="container">
        <h4 class="mb-5 lh-1">Related Products</h4>
        <div class="swiper shop-2-swiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="shop-details">
                        <div class="shop-image-wrapper position-relative">
                            <div class="shop-image">
                                <img src="assets/images/shop-image-1.jpg" class="w-100 h-100 object-fit-cover" alt="img">
                            </div>
                            <div class="shop-image-hover">
                                <a class="btn btn-sm btn-outline-secondary  gap-10" href="">
                                    Add to Cart
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0_381_163)">
                                            <path d="M21 6.5H18C18 4.9087 17.3679 3.38258 16.2426 2.25736C15.1174 1.13214 13.5913 0.5 12 0.5C10.4087 0.5 8.88258 1.13214 7.75736 2.25736C6.63214 3.38258 6 4.9087 6 6.5H3C2.20435 6.5 1.44129 6.81607 0.87868 7.37868C0.31607 7.94129 0 8.70435 0 9.5L0 19.5C0.00158786 20.8256 0.528882 22.0964 1.46622 23.0338C2.40356 23.9711 3.67441 24.4984 5 24.5H19C20.3256 24.4984 21.5964 23.9711 22.5338 23.0338C23.4711 22.0964 23.9984 20.8256 24 19.5V9.5C24 8.70435 23.6839 7.94129 23.1213 7.37868C22.5587 6.81607 21.7956 6.5 21 6.5ZM12 2.5C13.0609 2.5 14.0783 2.92143 14.8284 3.67157C15.5786 4.42172 16 5.43913 16 6.5H8C8 5.43913 8.42143 4.42172 9.17157 3.67157C9.92172 2.92143 10.9391 2.5 12 2.5ZM22 19.5C22 20.2956 21.6839 21.0587 21.1213 21.6213C20.5587 22.1839 19.7956 22.5 19 22.5H5C4.20435 22.5 3.44129 22.1839 2.87868 21.6213C2.31607 21.0587 2 20.2956 2 19.5V9.5C2 9.23478 2.10536 8.98043 2.29289 8.79289C2.48043 8.60536 2.73478 8.5 3 8.5H6V10.5C6 10.7652 6.10536 11.0196 6.29289 11.2071C6.48043 11.3946 6.73478 11.5 7 11.5C7.26522 11.5 7.51957 11.3946 7.70711 11.2071C7.89464 11.0196 8 10.7652 8 10.5V8.5H16V10.5C16 10.7652 16.1054 11.0196 16.2929 11.2071C16.4804 11.3946 16.7348 11.5 17 11.5C17.2652 11.5 17.5196 11.3946 17.7071 11.2071C17.8946 11.0196 18 10.7652 18 10.5V8.5H21C21.2652 8.5 21.5196 8.60536 21.7071 8.79289C21.8946 8.98043 22 9.23478 22 9.5V19.5Z" />
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_381_163">
                                                <rect width="24" height="24" transform="translate(0 0.5)" />
                                            </clipPath>
                                        </defs>
                                    </svg>
                                </a>
                            </div>
                        </div>
                        <!-- shop-image-wrapper -->
                        <a href="" class="text-decoration-none">
                            <div class="shopping-info-wrapper mt-3 mt-lg-4 d-flex justify-content-between">
                                <div class="shopping-item-details">
                                    <h5 class="fw-semibold product-title">Memento 2.0</h5>
                                    <span class="product-price fs-5">$134.99</span>
                                </div>
                                <div>
                                    <span class="star-rating">
                                        <span class="star-fill" style="width: 80%;"></span>
                                    </span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <!-- swiper-slide-->
                <div class="swiper-slide">
                    <div class="shop-details">
                        <div class="shop-image-wrapper position-relative">
                            <div class="shop-image">
                                <img src="assets/images/shop-image-2.jpg" class="w-100 h-100 object-fit-cover" alt="img">
                            </div>
                            <div class="shop-image-hover">
                                <a class="btn btn-sm btn-outline-secondary  gap-10" href="">
                                    Add to Cart
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0_381_163)">
                                            <path d="M21 6.5H18C18 4.9087 17.3679 3.38258 16.2426 2.25736C15.1174 1.13214 13.5913 0.5 12 0.5C10.4087 0.5 8.88258 1.13214 7.75736 2.25736C6.63214 3.38258 6 4.9087 6 6.5H3C2.20435 6.5 1.44129 6.81607 0.87868 7.37868C0.31607 7.94129 0 8.70435 0 9.5L0 19.5C0.00158786 20.8256 0.528882 22.0964 1.46622 23.0338C2.40356 23.9711 3.67441 24.4984 5 24.5H19C20.3256 24.4984 21.5964 23.9711 22.5338 23.0338C23.4711 22.0964 23.9984 20.8256 24 19.5V9.5C24 8.70435 23.6839 7.94129 23.1213 7.37868C22.5587 6.81607 21.7956 6.5 21 6.5ZM12 2.5C13.0609 2.5 14.0783 2.92143 14.8284 3.67157C15.5786 4.42172 16 5.43913 16 6.5H8C8 5.43913 8.42143 4.42172 9.17157 3.67157C9.92172 2.92143 10.9391 2.5 12 2.5ZM22 19.5C22 20.2956 21.6839 21.0587 21.1213 21.6213C20.5587 22.1839 19.7956 22.5 19 22.5H5C4.20435 22.5 3.44129 22.1839 2.87868 21.6213C2.31607 21.0587 2 20.2956 2 19.5V9.5C2 9.23478 2.10536 8.98043 2.29289 8.79289C2.48043 8.60536 2.73478 8.5 3 8.5H6V10.5C6 10.7652 6.10536 11.0196 6.29289 11.2071C6.48043 11.3946 6.73478 11.5 7 11.5C7.26522 11.5 7.51957 11.3946 7.70711 11.2071C7.89464 11.0196 8 10.7652 8 10.5V8.5H16V10.5C16 10.7652 16.1054 11.0196 16.2929 11.2071C16.4804 11.3946 16.7348 11.5 17 11.5C17.2652 11.5 17.5196 11.3946 17.7071 11.2071C17.8946 11.0196 18 10.7652 18 10.5V8.5H21C21.2652 8.5 21.5196 8.60536 21.7071 8.79289C21.8946 8.98043 22 9.23478 22 9.5V19.5Z" />
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_381_163">
                                                <rect width="24" height="24" transform="translate(0 0.5)" />
                                            </clipPath>
                                        </defs>
                                    </svg>
                                </a>
                            </div>
                        </div>
                        <!-- shop-image-wrapper -->
                        <a href="" class="text-decoration-none">
                            <div class="shopping-info-wrapper mt-3 mt-lg-4 d-flex justify-content-between">
                                <div class="shopping-item-details">
                                    <h5 class="fw-semibold product-title">SX Bathtu bs</h5>
                                    <span class="product-price fs-5">$499.99</span>
                                </div>
                                <div>
                                    <span class="star-rating">
                                        <span class="star-fill" style="width: 100%;"></span>
                                    </span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <!-- swiper-slide-->
                <div class="swiper-slide">
                    <div class="shop-details">
                        <div class="shop-image-wrapper position-relative">
                            <div class="shop-image">
                                <img src="assets/images/shop-image-3.jpg" class="w-100 h-100 object-fit-cover" alt="img">
                            </div>
                            <div class="shop-image-hover">
                                <a class="btn btn-sm btn-outline-secondary  gap-10" href="">
                                    Add to Cart
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0_381_163)">
                                            <path d="M21 6.5H18C18 4.9087 17.3679 3.38258 16.2426 2.25736C15.1174 1.13214 13.5913 0.5 12 0.5C10.4087 0.5 8.88258 1.13214 7.75736 2.25736C6.63214 3.38258 6 4.9087 6 6.5H3C2.20435 6.5 1.44129 6.81607 0.87868 7.37868C0.31607 7.94129 0 8.70435 0 9.5L0 19.5C0.00158786 20.8256 0.528882 22.0964 1.46622 23.0338C2.40356 23.9711 3.67441 24.4984 5 24.5H19C20.3256 24.4984 21.5964 23.9711 22.5338 23.0338C23.4711 22.0964 23.9984 20.8256 24 19.5V9.5C24 8.70435 23.6839 7.94129 23.1213 7.37868C22.5587 6.81607 21.7956 6.5 21 6.5ZM12 2.5C13.0609 2.5 14.0783 2.92143 14.8284 3.67157C15.5786 4.42172 16 5.43913 16 6.5H8C8 5.43913 8.42143 4.42172 9.17157 3.67157C9.92172 2.92143 10.9391 2.5 12 2.5ZM22 19.5C22 20.2956 21.6839 21.0587 21.1213 21.6213C20.5587 22.1839 19.7956 22.5 19 22.5H5C4.20435 22.5 3.44129 22.1839 2.87868 21.6213C2.31607 21.0587 2 20.2956 2 19.5V9.5C2 9.23478 2.10536 8.98043 2.29289 8.79289C2.48043 8.60536 2.73478 8.5 3 8.5H6V10.5C6 10.7652 6.10536 11.0196 6.29289 11.2071C6.48043 11.3946 6.73478 11.5 7 11.5C7.26522 11.5 7.51957 11.3946 7.70711 11.2071C7.89464 11.0196 8 10.7652 8 10.5V8.5H16V10.5C16 10.7652 16.1054 11.0196 16.2929 11.2071C16.4804 11.3946 16.7348 11.5 17 11.5C17.2652 11.5 17.5196 11.3946 17.7071 11.2071C17.8946 11.0196 18 10.7652 18 10.5V8.5H21C21.2652 8.5 21.5196 8.60536 21.7071 8.79289C21.8946 8.98043 22 9.23478 22 9.5V19.5Z" />
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_381_163">
                                                <rect width="24" height="24" transform="translate(0 0.5)" />
                                            </clipPath>
                                        </defs>
                                    </svg>
                                </a>
                            </div>
                        </div>
                        <!-- shop-image-wrapper -->
                        <a href="" class="text-decoration-none">
                            <div class="shopping-info-wrapper mt-3 mt-lg-4 d-flex justify-content-between">
                                <div class="shopping-item-details">
                                    <h5 class="fw-semibold product-title">NOKEN - TONO</h5>
                                    <span class="product-price fs-5">$249.99</span>
                                </div>
                                <div>
                                    <span class="star-rating">
                                        <span class="star-fill" style="width: 100%;"></span>
                                    </span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <!-- swiper-slide-->
                <div class="swiper-slide">
                    <div class="shop-details">
                        <div class="shop-image-wrapper position-relative">
                            <div class="shop-image">
                                <img src="assets/images/shop-image-4.jpg" class="w-100 h-100 object-fit-cover" alt="img">
                            </div>
                            <div class="shop-image-hover">
                                <a class="btn btn-sm btn-outline-secondary  gap-10" href="">
                                    Add to Cart
                                    <svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0_381_163)">
                                            <path d="M21 6.5H18C18 4.9087 17.3679 3.38258 16.2426 2.25736C15.1174 1.13214 13.5913 0.5 12 0.5C10.4087 0.5 8.88258 1.13214 7.75736 2.25736C6.63214 3.38258 6 4.9087 6 6.5H3C2.20435 6.5 1.44129 6.81607 0.87868 7.37868C0.31607 7.94129 0 8.70435 0 9.5L0 19.5C0.00158786 20.8256 0.528882 22.0964 1.46622 23.0338C2.40356 23.9711 3.67441 24.4984 5 24.5H19C20.3256 24.4984 21.5964 23.9711 22.5338 23.0338C23.4711 22.0964 23.9984 20.8256 24 19.5V9.5C24 8.70435 23.6839 7.94129 23.1213 7.37868C22.5587 6.81607 21.7956 6.5 21 6.5ZM12 2.5C13.0609 2.5 14.0783 2.92143 14.8284 3.67157C15.5786 4.42172 16 5.43913 16 6.5H8C8 5.43913 8.42143 4.42172 9.17157 3.67157C9.92172 2.92143 10.9391 2.5 12 2.5ZM22 19.5C22 20.2956 21.6839 21.0587 21.1213 21.6213C20.5587 22.1839 19.7956 22.5 19 22.5H5C4.20435 22.5 3.44129 22.1839 2.87868 21.6213C2.31607 21.0587 2 20.2956 2 19.5V9.5C2 9.23478 2.10536 8.98043 2.29289 8.79289C2.48043 8.60536 2.73478 8.5 3 8.5H6V10.5C6 10.7652 6.10536 11.0196 6.29289 11.2071C6.48043 11.3946 6.73478 11.5 7 11.5C7.26522 11.5 7.51957 11.3946 7.70711 11.2071C7.89464 11.0196 8 10.7652 8 10.5V8.5H16V10.5C16 10.7652 16.1054 11.0196 16.2929 11.2071C16.4804 11.3946 16.7348 11.5 17 11.5C17.2652 11.5 17.5196 11.3946 17.7071 11.2071C17.8946 11.0196 18 10.7652 18 10.5V8.5H21C21.2652 8.5 21.5196 8.60536 21.7071 8.79289C21.8946 8.98043 22 9.23478 22 9.5V19.5Z" />
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_381_163">
                                                <rect width="24" height="24" transform="translate(0 0.5)" />
                                            </clipPath>
                                        </defs>
                                    </svg>
                                </a>
                            </div>
                        </div>
                        <!-- shop-image-wrapper -->
                        <a href="" class="text-decoration-none">
                            <div class="shopping-info-wrapper mt-3 mt-lg-4 d-flex justify-content-between">
                                <div class="shopping-item-details">
                                    <h5 class="fw-semibold product-title">Washbasins</h5>
                                    <span class="product-price fs-5">$499.99</span>
                                </div>
                                <div>
                                    <span class="star-rating">
                                        <span class="star-fill" style="width: 80%;"></span>
                                    </span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <!-- swiper-slide-->

            </div>
            <!-- swiper-wrapper -->
        </div>
        <!-- swiper -->
    </div>
    <!-- container -->
</section>

<!--Shop-Swiper Section ======================-->



@endsection

@push('scripts')
<script>
    $(document).ready(function() {

        $('#reviewCreateForm').on('submit', function(e) {
            e.preventDefault();
            handleFormUploadForm(
                'POST',
                '#reviewCreateForm',
                '#submit',
                "{{ route('users.review.store')}}",
                "{{ route('users.products.index')}}"
            );
        });
    });
</script>
@endpush
@push('styles')
<style>
    .product-image {
        max-width: 100%;
        max-height: 400px;
        object-fit: contain;
    }

    .product-thumbnail {
        max-width: 100px;
        max-height: 67px;
        object-fit: cover;
    }

    .something {
        direction: rtl;
        /* Right to left to make the highest value star on the left */
        display: inline-flex;
    }

    .something input {
        display: none;
        /* Hide radio buttons */
    }

    .something label {
        font-size: 2rem;
        /* Increase star size */
        color: lightgray;
        /* Unselected star color */
        cursor: pointer;
    }

    .something input:checked~label {
        color: rgb(50 57 62);
        /* Selected star color */
    }

    .something label:hover,
    .something label:hover~label {
        color: rgb(50 57 62);
        /* Hover state color for stars */
    }
</style>
@endpush