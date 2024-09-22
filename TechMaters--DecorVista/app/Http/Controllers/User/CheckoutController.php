<?php

namespace App\Http\Controllers\User;

use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use App\Models\OrderBillingAddress;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class CheckoutController extends Controller
{
    //

    public function index(){
        return view("users.checkout");
    }

    public function store(Request $request)
    {
        // Validate input fields
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|digits_between:7,15',
            'housenumberandstreet' => 'required|string|max:255',
            'apartment' => 'nullable|string|max:255',
            'city' => 'required|string|max:255',
            'postalcode' => 'required|numeric',
            'notes' => 'nullable|string|max:500',
        ]);
    
        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()->first(),
                'data' => null,
            ], 422);
        }
    
        // Get cart items from session
        $cartItems = session('cart', []);
        if (empty($cartItems)) {
            return response()->json([
                'status' => 'error',
                'message' => 'Cart is empty.',
                'data' => null,
            ], 400);
        }
    
        $userid = auth()->user()->id;
    
        try {
            // Create a new Order Billing Address
            $billingAddress = OrderBillingAddress::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'housenumberandstreet' => $request->housenumberandstreet,
                'apartment' => $request->apartment,
                'city' => $request->city,
                'postalcode' => $request->postalcode,
                'notes' => $request->notes,
            ]);
    
            // Calculate order totals
            $subTotal = 0;
            foreach ($cartItems as $item) {
                $subTotal += $item['price'] * $item['quantity'];
            }
            $shippingCharges = 125; // Assuming flat rate shipping
            $grandTotal = $subTotal + $shippingCharges;
    
            // Create a new Order
            $order = Order::create([
                'user_id' => $userid,
                'order_number' => 'ORD-'.time(), // Generate unique order number
                'billing_id' => $billingAddress->id,
                'sub_total' => $subTotal,
                'shipping_charges' => $shippingCharges,
                'grand_total' => $grandTotal,
            ]);
    
            // Save order details
            foreach ($cartItems as $id => $item) {
                OrderDetail::create([
                    'order_id' => $order->id,
                    'product_id' => $id,
                    'quantity' => $item['quantity'],
                    'sub_total' => $item['price'] * $item['quantity'],
                ]);
            }
    
            // Clear the cart
            session()->forget('cart');
            return redirect()->route('home');
    
            return response()->json([
                'status' => 'success',
                'message' => 'Order placed successfully.',
                'data' => null,
            ]);
    
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'An error occurred while placing the order: ' . $e->getMessage(),
                'data' => null,
            ], 500);
        }
    }
    
}
