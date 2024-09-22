@extends('users.layout')

@section('title')

CheckOut

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
								<h2 class="fw-extra-bold heading-title separator lh-1">Checkout</h2>								
							</div>
						</div>
					</div>
					<!-- section-title-wrapper -->	
				</div>
				<!-- section-full-width -->	
			</section>
			<!--Banner Section ======================-->


			<!--checkout Section ======================-->
			<section class="section-checkout pb-3 pb-xl-4 position-relative">
				<div class="container">
					<div class="checkout-wrapper">
						<div class="row gy-40 gy-lg-0 gx-40 justify-content-between">
							<div class="col-lg-7 col-xxl-8">
								<div class="d-flex flex-column gap-30">
									<h4 class="mb-0">Checkout</h4>
									<div class="d-flex flex-column gap-10 mb-3">
										<p class="mb-0 d-flex flex-wrap gap-1">Returning customer? <a href="{{route('users.login')}}">Click Here To login</a></p>
										<p class="mb-0 d-flex flex-wrap gap-1">Have a coupon? <span class="show-coupon" >Click here to enter your code</span></p>
										<div class="checkout-form">
											<form class="row g-30 gy-md-0 needs-validation">
												<div class="col-md-6">
													<input type="text" class="form-control" id="inputCoupon" placeholder="Add a Coupon Code" required>
												</div>
												<div class="col-md-5">
													<button class="btn btn-primary btn-md" type="submit">Apply Now</button>
												</div>	
											</form>
										</div>
										<!-- checkout-form -->										
									</div>
									<form action="{{route('users.checkout.store')}}" method="POST" class="contact-form row g-30">
										@csrf
										<div class="col-md-6">
											<input type="text" class="form-control" id="InputName" name="name" placeholder="Name *" required="">
										</div>			
										<div class="col-md-6">
											<input type="email" class="form-control" id="InputEmail" name="email" placeholder="Email Address *" required="">
										</div>		
										<div class="col-md-6">
											<input type="number" class="form-control" id="InputNumber" name="phone" placeholder="Phone *" required="">
										</div>
										<div class="col-12">
											<input type="text" class="form-control" id="InputHouse" name="housenumberandstreet" placeholder="House Number & Street">
										</div>
										<div class="col-12">
											<input type="text" class="form-control" id="InputApartment" name="apartment" placeholder="Apartment, suit, unit, etc (optional)">
										</div>
										<div class="col-md-6">
											<input type="text" class="form-control" id="InputTown" name="city" placeholder="City *" required="">
										</div>
										<div class="col-md-6">
											<input type="text" class="form-control" id="InputPostCode" name="postalcode" placeholder="Postcode *" required="">
										</div>									
										
										<div class="col-12">
											<textarea class="form-control" id="InputMessage" name="notes" placeholder="Order Notes (Optional)" rows="4"></textarea>
										</div>	
																					  
									
									<!-- checkOutForm -->
								</div>
								
							</div>
							<!-- col-8 -->
							<div class="col-lg-5 col-xxl-4">
    <div class="sticky-elements order-details p-3">
        <h4 class="mb-20">Your Order</h4>

        <!-- Order Items -->
        <ul class="list-unstyled fw-bold headings-color mb-0 d-flex justify-content-between pb-10 border-bottom border-1">
            <li>Products</li>
            <li>Price 		</li>
        </ul>

        @php
            $subTotal = 0;
            $shippingCharges = 125.00;
        @endphp

        @foreach(session('cart', []) as $item)
            @php
                $subTotal += $item['price'] * $item['quantity'];
            @endphp
            <ul class="list-unstyled fw-bold headings-color mb-0 d-flex justify-content-between py-10 border-bottom border-1">
                <li>{{ $item['name'] }}</li>
                <li>${{ number_format($item['price'] * $item['quantity'], 2) }}</li>
            </ul>
        @endforeach

        <!-- Shipping Options -->
        <ul class="list-unstyled mb-0 d-flex flex-wrap flex-sm-nowrap gap-3 gap-md-4">
            <li>Shipping</li>
            <li>
                <ul class="list-unstyled mb-0 d-flex flex-column gap-10">
                    <li>
                        <div class="form-check">
                            <label class="form-check-label" for="check-input3">
                                Flat Rate: <span class="fw-semibold">$125.00</span>
                            </label>
                        </div>
                    </li>
                </ul>
            </li>
        </ul>

        <!-- Total Calculation -->
        @php
            $grandTotal = $subTotal + $shippingCharges;
        @endphp
        <ul class="list-unstyled fw-bold headings-color mb-0 d-flex justify-content-between py-10 border-top border-bottom border-1">
            <li>Total</li>
            <li>${{ number_format($grandTotal, 2) }}</li>
        </ul>

        <!-- Payment Methods -->
        <div class="form-check">
            <input class="form-check-input" type="radio" name="check-input-payments" id="check-input4" checked>
            <label class="form-check-label" for="check-input4">
                Check Payments
            </label>
        </div>

        <div class="form-check">
            <input class="form-check-input" type="radio" name="check-input-payments" id="check-input5">
            <label class="form-check-label" for="check-input5">
                <span class="d-inline-flex gap-3">
                    <span>Paypal</span>
                    <span class="mt-n1"><img src="{{ asset('user_assets/assets/images/payment-card.png') }}" alt="payment-card"></span>
                </span>
            </label>
        </div>

        <!-- Place Order Button -->
        <div>
            <button type="submit" id="orderbtn" class="btn btn-primary w-100">Place Order</button>
        </div>
</form>
    </div>
</div>

								</div>
								
							</div>
							<!-- col-4 -->
						</div>
						<!-- row -->
					</div>
					
				</div>
				<!-- container -->
			</section>
			<!--checkout Section ======================-->


			@endsection
			<script>

</script>