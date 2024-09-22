<?php

namespace App\Http\Controllers\User;

use App\Models\Gallery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function addToWishlist($id)
    {
        $gallery = Gallery::findOrFail($id);
        
        // Retrieve the wishlist from the session, or create an empty array if it doesn't exist
        $wish = session()->get('wish', []);

        // Check if the gallery item is already in the wishlist
        if (!isset($wish[$id])) {
            // Add the gallery item to the wishlist
            $wish[$id] = [
                'name' => $gallery->name,
                'category_id' => $gallery->category_id,
                'image' => $gallery->image_path ?? 'default-image.jpg', // Adjust this if your model has a specific image attribute
                'user_id' => Auth::user()->id, // Store the user ID for wishlist tracking
            ];
        }

        // Save the wishlist back to the session
        session()->put('wish', $wish);

        // Return a JSON response
        return response()->json(['message' => 'Gallery item added to wishlist!', 'wishlist' => $wish]);
    }

    public function deleteFromWishlist(Request $request)
    {
        $id = $request->id;

        // Retrieve the wishlist from the session
        $wish = session()->get('wish');

        // Check if the gallery item is in the wishlist
        if (isset($wish[$id])) {
            // Remove the gallery item from the wishlist
            unset($wish[$id]);

            // Save the updated wishlist back to the session
            session()->put('wish', $wish);
        }

        // Return a JSON response
        return response()->json(['message' => 'Gallery item removed from wishlist!', 'wishlist' => $wish]);
    }
}
