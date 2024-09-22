@extends('users.layout')

@section('title')

Cart

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
								<h2 class="fw-extra-bold heading-title separator lh-1">Cart page</h2>								
							</div>
						</div>
					</div>
					<!-- section-title-wrapper -->	
				</div>
				<!-- section-full-width -->	
			</section>
			<!--Banner Section ======================-->


			<!--cart Section ======================-->
			<section class="section-cart position-relative pb-60 pb-lg-100 pb-xxl-120">
				<div class="container">
					<div class="row gy-40 gy-xl-0">
						<div class="col-xl-8">
							<div class="d-flex flex-column gap-30 sticky-elements">
								<h4 class="mb-0">Cart</h4>
								<div class="table-responsive product-table">
									<table class="table">
										<thead>
										  <tr>
										  <th class="cart-product-remove">
                                            &nbsp;
                                        	</th>
                                        	<th class="cart-product-thumbnail">
                                            &nbsp;
                                        	</th>
											<th scope="col">Product</th>
											<th scope="col">Quantity</th>
											<th scope="col">Price</th>
											<th scope="col">Subtotal</th>
										  </tr>
										</thead>
										<tbody>
										@php $total = 0; @endphp
                                @foreach(session('cart', []) as $id => $item)
                                @php $total += $item['price'] * $item['quantity']; @endphp

										  <tr>
										  <td class="cart-product-remove">
                                            <button data-product-id="{{$id}}" ><i class="fa-solid fa-xmark"></i></button>
                                        	</td>
											
											<td class="product-item-info d-flex flex-wrap flex-md-nowrap gap-10 gap-sm-20 align-items-center">
 											
												<!-- image wiill be shown but dont update this code -->
											</td>
											<td>
											{{$item['name']}}	
											</td>
											
											<td>{{$item['quantity']}}</td>
											<td>${{$item['price']}}</td>
											<td>    ${{$item['price'] * $item['quantity']}}</td>
										  </tr>										 
										  @endforeach
										</tbody>
									</table>
								</div>
								<!-- table-responsive -->
								<form class="row gy-10 gx-3 needs-validation">
									<div class="col-md-7">
										<input type="text" class="form-control" id="inputCoupon" placeholder="Add a Coupon Code" required>
									</div>
									<div class="col-md-5">
										<button class="btn btn-md btn-outline-primary" type="submit">Apply Now</button>
									</div>	
								</form>
							</div>
							<!-- d-flex -->
						</div>
						<!-- col-8 -->
						<div class="col-xl-4">
						<div class="order-details d-flex flex-column gap-30 p-4">
    <h4 class="mb-0">Order Summary</h4>
    <ul class="product-description-list list-unstyled mb-0 d-flex flex-column gap-20">
        <li class="d-flex justify-content-between">
            <span>Total</span>
            <span id="total-amount">$0.00</span>
        </li>
        <li class="d-flex justify-content-between">
            <span>Shipping Fee</span>
            <span id="shipping-amount">$125.00</span>
        </li>
        <li class="d-flex justify-content-between fw-semibold">
            <span>Grand Total</span>
            <span id="grand-total-amount">$0.00</span>
        </li>						
    </ul>
    <div>
        <a href="{{route('users.checkout.index')}}" class="btn btn-primary w-100">Proceed To Checkout</a>
    </div>
</div>

						</div>
						<!-- col-4 -->
					</div>
					<!-- row -->
				</div>
				<!-- container -->
			</section>
			@endsection
			
			@push('scripts')
			<script>
			$(document).ready(function() {
    // Update cart total and grand total
    function updateCartTotals() {
        $.get('/frontend/carts/calculate', (data) => {
            $("#total-amount").text(`$${data.total.toFixed(2)}`);
            $("#shipping-amount").text(`$${data.shippingFee.toFixed(2)}`);
            $("#grand-total-amount").text(`$${data.grandTotal.toFixed(2)}`);
        });
    }

    // Call the function to update totals on page load
    updateCartTotals();

    // Remove product from the cart
    $(".cart-product-remove button").click(function(e) {
        e.preventDefault();

        var productId = $(this).data("product-id");

        // Send an AJAX request to remove the product
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: `/frontend/carts/remove-from-cart/${productId}`,
            type: 'GET',
            success: function(response) {
                // Reload the page or update the cart table dynamically
                location.reload(); // You can also update the cart table without reloading
            },
            error: function(error) {
                console.error("Error removing product:", error);
            }
        });
    });
});
</script>
@endpush
