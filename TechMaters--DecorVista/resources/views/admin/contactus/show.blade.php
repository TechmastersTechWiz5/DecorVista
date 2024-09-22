@extends('admin.layouts.main-file')

@section('main-section')
<div class="col-xl-12 col-lg-12 d-flex justify-content-between align-items-center">
    <h4 class="fw-bold topbar-button pe-none text-uppercase mb-2 mx-4">Order Detail</h4>
    <a href="{{ route('admin.orders.index') }}" class="btn btn-sm btn-primary mx-4 mb-2">Order List</a>
</div>

<div class="container-xxl">
    <div class="row">
        <!-- Order Details Section -->
        <div class="col-xl-12 col-lg-12">
            <div class="card">
                <div class="card-header d-flex flex-column flex-md-row align-items-start">
                    <!-- Order Information Container -->
                    <div class="d-flex flex-column flex-grow-1">
                        <h1 class="card-title" style="font-size: 2rem;">Order #{{ $order->order_number }}</h1>
                        <p class="text-muted mb-2">Placed on {{ \Carbon\Carbon::parse($order->created_date)->format('F j, Y') }} by {{ $order->created_by }}</p>
                        <p class="text-muted">Status: 
                            @if($order->status == 1) 
                                <span class="badge bg-success">Completed</span>
                            @else 
                                <span class="badge bg-warning">Pending</span>
                            @endif
                        </p>
                    </div>
                </div>

                <div class="card-body">
                    <!-- Billing Information -->
                    <div class="mb-4">
                        <h5 class="mb-3">Billing Information</h5>
                        <ul class="list-unstyled">
                            <li><strong>Name:</strong> {{ $order->billings->name }}</li>
                            <li><strong>Email:</strong> {{ $order->billings->email }}</li>
                            <li><strong>Phone:</strong> {{ $order->billings->Phone }}</li>
                            <li><strong>Address:</strong> {{ $order->billings->housenumberandstreet }}, {{ $order->billings->apartment }}, {{ $order->billings->city }}</li>
                            <li><strong>Postal Code:</strong> {{ $order->billings->postalcode }}</li>
                        </ul>
                    </div>

                    <!-- Order Summary -->
                    <div class="mb-4">
                        <h5 class="mb-3">Order Summary</h5>
                        <ul class="list-unstyled">
                            <li><strong>Subtotal:</strong> ${{ $order->sub_total }}</li>
                            <li><strong>Shipping Charges:</strong> ${{ $order->shipping_charges }}</li>
                            <li><strong>Grand Total:</strong> ${{ $order->grand_total }}</li>
                        </ul>
                    </div>

                    <!-- Ordered Products -->
                    <div class="mb-4">
                        <h5 class="mb-3">Ordered Products</h5>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Product ID</th>
                                    <th>Quantity</th>
                                    <th>Sub Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($order->orderdetails as $index => $detail)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $detail->product_id }}</td>
                                        <td>{{ $detail->quantity }}</td>
                                        <td>${{ $detail->sub_total }}</td>
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

@endsection
