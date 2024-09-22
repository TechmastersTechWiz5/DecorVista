<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    //
    public function addtocart($id)
    {
        $product = Product::findOrFail($id);
        
        // Assuming you have a Cart implementation, this could vary depending on how your cart works.
        $cart = session()->get('cart', []);

        // Check if the product already exists in the cart
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            // If product doesn't exist in cart, add it with a quantity of 1
            $cart[$id] = [
                'name' => $product->name,
                'quantity' => 1,
                'price' => $product->price,
                'image' => $product->images->first()->image_path ?? 'default-product-image.jpg'
            ];
        }

        // Save the cart back to the session
        session()->put('cart', $cart);

        // You can return a JSON response or a redirect, depending on your needs
        return response()->json(['message' => 'Product added to cart successfully!', 'cart' => $cart]);
    }
    


    // // for delete cart items from session Function

    public function deletefromsession(Request $req)
    {
        $id = $req->id;

        $cart = session()->get("cart");
        if(isset($cart[$id]))
        {
            unset($cart[$id]);
        }
        session()->put("cart",$cart);
        return json_encode("Your item has been delete successfully");

    }


    public function cart2()
    {
        $cart = session('cart', []);
        return view('users.cart2', compact('cart'));
    }


    public function removeFromCart($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return response()->json(['message' => 'Product removed successfully!', 'cart' => $cart]);
    }


    public function calculateCart()
    {
        $cart = session()->get('cart', []);
        $total = 0;
        $shippingFee = 125.00;  // Shipping fee (can be dynamic or fixed)

        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        $grandTotal = $total + $shippingFee;

        return response()->json([
            'total' => $total,
            'shippingFee' => $shippingFee,
            'grandTotal' => $grandTotal
        ]);
    }

}
