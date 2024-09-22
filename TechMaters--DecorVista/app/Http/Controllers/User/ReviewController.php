<?php

namespace App\Http\Controllers\User;

use Auth;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\ProductReviews;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;

class ReviewController extends Controller
{
    //

    public function store(Request $request)
    {
        try {
            $input = $request->all();
            $input['user_id'] = auth()->id();
            if (!$input['user_id']) {
                return response()->json([
                    'status' => 'warning',
                    'message' => 'Please Login to add review',
                ], 404);
            }
            LOG::INFO($input['user_id']);
            // Validate the incoming request
            $validator = Validator::make($input, [
                'product_id' => 'required|exists:products,id',
                'user_id' => 'required|exists:users,id', 
                'star_rating' => 'nullable|integer|between:1,5', 
                'name' => 'required|string|max:255', 
                'message' => 'required|string',
                'mobile_number' => 'required|string|max:20', 
            ]);
    
            if ($validator->fails()) {
                return response()->json([
                    'status' => 'warning',
                    'message' => $validator->errors()->first(),
                ]);
            }
    
            $product = Product::find($request->product_id);
            if (!$product) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Product not found',
                ], 404);
            }
            if($input['star_rating'] == null){
                $starrating = 5;
            }else{
                $starrating = $input['star_rating'];
            }
            // Create the review
            $review = ProductReviews::create([
                'product_id' => $input['product_id'],
                'user_id' => $input['user_id'],
                'star_rating' => $starrating,
                'title' => $input['name'],
                'message' => $input['message'],
                'mobile_number' => $input['mobile_number'], 
            ]);
            
            $productid = $input['product_id'];
            return response()->json([
                'status' => 'success',
                'message' => 'Review added successfully',
                'data' => null,
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'error',
                'message' => $th->getMessage(),
            ], 500);
        }
    }
}
