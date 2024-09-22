<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brands;
use App\Models\Inventory;
use Illuminate\Http\Request;
use App\Models\ProductCategories;
use App\Models\Product;
use App\Models\ProductImages;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Validator;
use Auth;
use DataTables;

class ProductController extends Controller
{
    //
    public function __construct(Request $request)
    {
        $this->page = 'admin.products.';
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $products = Product::with('images', 'productcategory' , 'inventory')->get();
            Log::info("product Dta = ".$products);

            return Datatables::of($products)
                ->addIndexColumn()
                ->addColumn('category_name', function ($row) {
                    return $row->productcategory ? $row->productcategory->name : '-';
                })
                ->addColumn('sku', function ($row) {
                    if ($row->inventory && $row->inventory->isNotEmpty()) {
                        return $row->inventory->pluck('sku')->implode(', ');
                    } else {
                        return '-';
                    }
                })                
                ->addColumn('product_image', function ($row) {
                    if ($row->images->first()) {
                        return $row->images->first()->image_path;
                    } else {
                        return "N/A";
                    }

                })
                ->addColumn('action', function ($model) {
                    $editRoute = route('admin.products.edit', $model->id);
                    $detailRoute = route('admin.products.show', $model->id);
                    return '<div class="d-flex gap-2">
                        <a href="' . $detailRoute . '" class="btn btn-light btn-sm"><iconify-icon icon="solar:eye-broken" class="align-middle fs-18"></iconify-icon></a>
                        <a href="' . $editRoute . '" class="btn btn-soft-primary btn-sm">
                            <iconify-icon icon="solar:pen-2-broken" class="align-middle fs-18"></iconify-icon>
                        </a>
                    </div>';
                })
                ->addColumn('status', function ($model) {
                    return view('admin.layouts.action.statustoggle', [
                        'status' => $model->status,
                        'id' => $model->id
                    ]);
                })
                ->rawColumns(['action', 'status', 'price'])
                ->make(true);
        }

        return view($this->page . 'index');

    }




    public function show($id)
    {
        $product = Product::with(['images'])
                ->where('id', $id)
                ->first();

            if (!$product) {
                return response()->json([
                    'status' => 'warning',
                    'message' => 'Product not found or inactive',
                    'data' => null,
                ], 404);
            }

            return view('admin.products.show', compact('product'));
    }


    public function create()
    {
        $subCategories = ProductCategories::where('status', 1)
            ->whereNotNull('parent_id')
            ->where('parent_id', '!=', 0)
            ->get();


        return view('admin.products.create', compact('subCategories'));
    }

    public function store(Request $request)
    {
        $input = $request->all();

        // Validation rules
        $validator = Validator::make($input, [
            'product_name' => 'required|string|max:255',
            'category_id' => 'required|exists:product_categories,id',
            'description' => 'required|string',
            'tags' => 'required|string',
            'price' => 'required|numeric',
            'sku' => 'required|numeric',
            'file.*' => 'required|mimes:jpg,jpeg,png,gif|max:2048',
        ]);


        if ($validator->fails()) {
            return response()->json([
                'status' => 'warning',
                'message' => $validator->errors()->first(),
            ]);
        }

        // Step 2: Save product
        $product = new Product();
        $product->name = $request->product_name;
        $product->category_id = $request->category_id;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->tags = $request->tags;
        $product->save();

        // Step 3: Handle image uploads
        if ($request->hasFile('file')) {
            foreach ($request->file('file') as $file) {
                $fileName = time() . '_' . $file->getClientOriginalName();
                $filePath = $file->storeAs('product_images', $fileName, 'public'); // Store the file

                // Save the image path to the database
                ProductImages::create([
                    'product_id' => $product->id,
                    'image_path' => $filePath,
                ]);
            }
        }

        $inventory = new Inventory();
        $inventory->product_id = $product->id;
        $inventory->sku = $request->sku;
        $inventory->save();
        // Step 6: Return success response
        return response()->json([
            'status' => 'success',
            'message' => 'Product created successfully!',
        ]);
    }

    public function edit($id)
    {
        $product = Product::with(['images','productcategory'])->findOrFail($id);

        $subCategories = ProductCategories::where('status', 1)
            ->whereNotNull('parent_id')
            ->where('parent_id', '!=', 0)
            ->get();

        return view('admin.products.edit', compact('product', 'subCategories'));
    }




    public function update(Request $request)
    {
        $input = $request->all();

        // Validation rules
        $validator = Validator::make($input, [
            'product_name' => 'required|string|max:255',
            'category_id' => 'required|exists:product_categories,id',
            'description' => 'required|string',
            'tags' => 'required|string',
            'price' => 'required|numeric',
            'file.*' => 'required|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'warning',
                'message' => $validator->errors()->first(),
            ]);
        }
        try {
            $product = Product::findOrFail($request->id);

            $product->name = $request->product_name;
            $product->category_id = $request->category_id;
            $product->description = $request->description;
            $product->price = $request->price;
            $product->tags = $request->tags;

            if ($request->hasFile('file')) {
                ProductImages::where('product_id', $product->id)->delete();

                foreach ($request->file('file') as $file) {
                    $fileName = time() . '_' . $file->getClientOriginalName();
                    $filePath = $file->storeAs('product_images', $fileName, 'public');

                    // Save the new image to the database
                    ProductImages::create([
                        'product_id' => $product->id,
                        'image_path' => $filePath,
                    ]);
                }
            }
            $product->save();


            // Step 7: Return success response
            return response()->json([
                'status' => 'success',
                'message' => 'Product updated successfully!',
            ]);

        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            // Handle product not found exception
            return response()->json([
                'status' => 'error',
                'message' => 'Product not found.',
            ], 404);

        } catch (\Exception $e) {
            // Handle other exceptions
            Log::info("error = " . $e->getMessage());
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
            ], 500);
        }
    }


















    public function status(Request $request): JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'id' => 'required',
            ]);
            if ($validator->fails()) {
                return response()->json([
                    'status' => 'warning',
                    'message' => $validator->errors()->first(),
                ]);
            }
            $category = Product::find($request->id);
            if ($category == null) {
                return response()->json([
                    'status' => 'warning',
                    'message' => 'Product Not Found',
                ]);
            }
            $status = $category->status == 1 ? 2 : 1;
            $category->status = $status;
            $category->save();
            return response()->json([
                'status' => 'success',
                'message' => 'Product Status Updated successfully',
                'data' => null,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
                'data' => null,
            ], 500);
        }
    }




}

