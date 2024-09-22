@extends('users.layout')

@section('title')

Product

@endsection
@section('main')

<!--Banner Section ======================-->
<section class="section-banner position-relative pt-60">
	<div class="section-full-width">
		<div class="section-title-wrapper position-relative">
			<div class="scroll-move">
				<span class="scrolling-text display-1 fw-extra-bold stroke-title text-stroke stroke-opacity-20 stroke-width-1 stroke-primary lh-1">Shop</span>
			</div>

			<div class="container">
				<div class="section-title section-separator">
					<h2 class="fw-extra-bold heading-title separator lh-1">Design Elegance Emporium</h2>
					<div class="d-flex flex-column flex-lg-row gap-4 align-items-lg-end justify-content-lg-between">
						<p class="fs-4 fw-semibold mb-0 subtitle subtitle-width">Discover Unparalleled Luxury for Your Space</p>
					</div>
				</div>
			</div>
		</div>
		<!-- section-title-wrapper -->
	</div>
	<!-- section-full-width -->
</section>
<!--Banner Section ======================-->



<!-- Shop Section ====================== -->
<section class="section-shop position-relative">
	<div class="container">
		<div class="row gx-4 gy-5 gy-lg-70 section-padding-lg">
			@foreach($products as $product)
			<div class="col-md-6 col-lg-4">
				<div class="shop-details">
					<div class="shop-image-wrapper position-relative">
						<div class="shop-image">
							@if($product->images->isNotEmpty())
							<img src="{{ env('ASSET2_URL') . $product->images->first()->image_path }}" class="w-100 h-100 object-fit-cover" alt="Product Image">
							@else
							<img src="{{ asset('user_assets/assets/images/default-product-image.jpg') }}" class="w-100 h-100 object-fit-cover" alt="No Image Available">
							@endif
						</div>
						<div class="shop-image-hover">
							<a href="javascript:void(0)" onclick="addtocart()" data-product-id="{{$product->id}}" class="cart-btn btn btn-sm btn-outline-secondary gap-10">
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
					<a href="{{ route('users.products.show', $product->id) }}" class="text-decoration-none">
						<div class="shopping-info-wrapper mt-3 mt-lg-4 d-flex justify-content-between">
							<div class="shopping-item-details">
								<h5 class="fw-semibold product-title">{{ $product->name }}</h5>
								<span class="product-price fs-5">${{ $product->price }}</span>
							</div>
							<div class="star-rating-wrap pt-1">
								<span class="star-rating">
									<span class="star-fill" style="width: 80%;"></span>
								</span>
							</div>
						</div>
					</a>
				</div>
			</div>
			@endforeach
		</div>
		<!-- row -->

		<!-- Pagination -->
		<nav aria-label="Page navigation">
			{{ $products->links('pagination::bootstrap-4') }}
		</nav>
	</div>
</section>
<!-- Shop Section ====================== -->

<!-- 
			@foreach($products as $p)
                          <div class="col-lg-4 col-sm-6">
                                <div class="product-item">
                                    <div class="pi-pic">
                                        <img src="img/{{$p->img}}" alt="">
                                        <div class="sale pp-sale">Sale</div>
                                        <div class="icon">
                                            <i class="icon_heart_alt"></i>
                                        </div>
                                        <ul>
                                            <li class="w-icon active"><a href="/addtocart/{{$p->id}}"><i class="icon_bag_alt"></i></a></li>
                                            <li class="quick-view"><a href="#">+ Quick View</a></li>
                                            <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="pi-text">
                                        <div class="catagory-name">{{$p->PdtDesc}}</div>
                                        <a href="#">
                                            <h5>{{$p->PdtName}}</h5>
                                        </a>
                                        <div class="product-price">
                                            ${{$p->PdtPrice}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                           @endforeach -->





@endsection
@push('scripts')
<script>
	$(document).ready(function() {

		// Event listener for 'Add to Cart' button clicks
		$(".cart-btn").click(function(e) {
			e.preventDefault(); // Prevent default anchor action

			// Get the product ID from the data attribute
			var ProductId = $(this).data("product-id");
			console.log("Adding product to cart:", ProductId);

			// Setup the CSRF token for the AJAX request
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});

			// Define the URL for adding the product to the cart
			var url = "/frontend/carts/add-to-cart/" + ProductId;

			// Send the AJAX request
			$.get(url, (data) => {
				// Log or process the response
				console.log("Response from server:", data);
				// You can add further logic here, e.g., show a success message
			}).fail((error) => {
				console.error("Error adding product to cart:", error);
				// You can add error handling here
			});
		});
	});
</script>
@endpush
