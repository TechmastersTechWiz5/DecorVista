<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Brands;
use App\Models\ProductCategories;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductImages;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    public function index(Request $request){
        $products = Product::with('images','productcategory')->paginate(9); 
        return view('users.product-archive', compact('products'));
    }
    
    



    public function show($id){
        $product = Product::with(['images', 'productcategory','reviews.user' ,'inventory'])
            ->where('id', $id)
            ->first();
    
            // Check if product exists
        if (!$product) {
            return response()->json([
                'status' => 'warning',
                'message' => 'Product not found or inactive',
                'data' => null,                ], 404);
        }

        return view('users.product-details',compact('product'));
        
    }


    public function getProductsByCategory(Request $request, $categoryId)
    {
        try {
            // Check if the category is a main category
            $category = ProductCategories::findOrFail($categoryId);
            if ($category->parent_id !== 0) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'The provided category ID does not belong to a main category.',
                ], 400);
            }

            // Get suProductCategories and main category IDs
            $subCategoryIds = ProductCategories::where('parent_id', $categoryId)->pluck('id')->toArray();
            $allCategoryIds = array_merge([$categoryId], $subCategoryIds);

            // Pagination setup
            $perPage = $request->input('per_page', 15);
            $paginatedProducts = Product::whereIn('category_id', $allCategoryIds)
                ->where('status', 1)
                ->with(['variants', 'images']) // Load variants and images
                ->paginate($perPage);

            // Format the products
            $products = $paginatedProducts->getCollection()->map(function ($product) {
                return [
                    'id' => $product->id,
                    'name' => $product->name,
                    'description' => $product->description,
                    'category_id' => $product->category_id,
                    'status' => $product->status,
                    'created_by' => $product->created_by,
                    'created_date' => $product->created_date,
                    'image_paths' => $product->images->pluck('image_path'),
                    'variants' => $product->variants->map(function ($variant) {
                        return [
                            'weight' => $variant->weight,
                            'price' => $variant->price,
                            'sku' => $variant->sku,
                        ];
                    }),
                ];
            });

            // Return paginated response
            return response()->json([
                'status' => 'success',
               'message' => "Product Related to Category Id : $categoryId Retrieved successfully",
                'data' => $products,
                'pagination' => [
                    'total' => $paginatedProducts->total(),
                    'current_page' => $paginatedProducts->currentPage(),
                    'per_page' => $paginatedProducts->perPage(),
                    'last_page' => $paginatedProducts->lastPage(),
                    'from' => $paginatedProducts->firstItem(),
                    'to' => $paginatedProducts->lastItem(),
                    'prev_page_url' => $paginatedProducts->previousPageUrl(),
                    'next_page_url' => $paginatedProducts->nextPageUrl(),
                    'first_page_url' => $paginatedProducts->url(1),
                    'last_page_url' => $paginatedProducts->url($paginatedProducts->lastPage()),
                ]
            ], 200);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'error',
                'message' => $th->getMessage(),
                'data' => null,
            ], 500);
        }
    }

    public function getProductsBySubCategory(Request $request, $subCategoryId)
    {
        try {
            // Check if the subcategory exists and is valid
            $subCategory = ProductCategories::findOrFail($subCategoryId);
            if ($subCategory->parent_id === 0) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'The provided subcategory ID is not valid.',
                ], 400);
            }

            // Pagination setup
            $perPage = $request->input('per_page', 15);
            $paginatedProducts = Product::where('category_id', $subCategoryId)
                ->where('status', 1)
                ->with(['variants', 'images']) // Load variants and images
                ->paginate($perPage);

            // Format the products
            $products = $paginatedProducts->getCollection()->map(function ($product) {
                return [
                    'id' => $product->id,
                    'name' => $product->name,
                    'description' => $product->description,
                    'category_id' => $product->category_id,
                    'status' => $product->status,
                    'created_by' => $product->created_by,
                    'created_date' => $product->created_date,
                    'image_paths' => $product->images->pluck('image_path'),
                    'variants' => $product->variants->map(function ($variant) {
                        return [
                            'weight' => $variant->weight,
                            'price' => $variant->price,
                            'sku' => $variant->sku,
                        ];
                    }),
                ];
            });

            // Return paginated response
            return response()->json([
                'status' => 'success',
                'message' => "Product Related to Sub Caategory Id : $subCategoryId Retrieved successfully",
                'data' => $products,
                'pagination' => [
                    'total' => $paginatedProducts->total(),
                    'current_page' => $paginatedProducts->currentPage(),
                    'per_page' => $paginatedProducts->perPage(),
                    'last_page' => $paginatedProducts->lastPage(),
                    'from' => $paginatedProducts->firstItem(),
                    'to' => $paginatedProducts->lastItem(),
                    'prev_page_url' => $paginatedProducts->previousPageUrl(),
                    'next_page_url' => $paginatedProducts->nextPageUrl(),
                    'first_page_url' => $paginatedProducts->url(1),
                    'last_page_url' => $paginatedProducts->url($paginatedProducts->lastPage()),
                ]
            ], 200);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'error',
                'message' => $th->getMessage(),
                'data' => null,
            ], 500);
        }
    }

}

