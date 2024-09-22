<?php

namespace App\Http\Controllers\Admin;

use DB;

use Auth;
use DataTables;
use Illuminate\Http\Request;
use App\Helpers\CommonHelper;
use App\Models\GalleryCategories;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;

class GalleryCategoryController extends Controller
{

    public function index(Request $request)
    {
        $Parentcategories = GalleryCategories::where('parent_id', 0)->take(4)->get();
    
        if($request->ajax()) {    
            $categories = GalleryCategories::with('parentCategory')->get();

            return Datatables::of($categories)
                ->addIndexColumn()
                ->addColumn('parentCategory', function ($row) {
                    return $row->parentCategory ? $row->parentCategory->name : '-';
                })
                ->addColumn('action', function ($model) {
                    $editRoute = route('admin.gallery.categories.edit', $model->id);
                    return '<div class="d-flex gap-2">
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
                ->rawColumns(['action', 'status'])
                ->make(true);
        }

        return view('admin.gallerycategories.index', compact('Parentcategories'));
    }
    
    
    


    /**\
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = GalleryCategories::where('parent_id', 0)->get();
        return view('admin.gallerycategories.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        try {
            $input = $request->all();
    
            $validator = Validator::make($input, [
                'parent_id' => 'nullable|exists:gallery_categories,id',
                'name' => 'required|unique:gallery_categories,name,NULL,id,parent_id,' . $request->parent_id,
            ]);
            
            if ($validator->fails()) {
                return response()->json([
                    'status' => 'warning',
                    'message' => $validator->errors()->first(),
                ]);
            }
    
            // Handle parent category
            if ($request->parent_id && $request->parent_id != 'no_parent') {
                $parent = GalleryCategories::find($request->parent_id);

                $input['parent_id'] = $parent->id;
            } else {
                $input['parent_id'] = 0; // Handle no parent case
            }
            // Create the category
            $category = GalleryCategories::create(attributes: $input);
    
            return response()->json([
                'status' => 'success',
                'message' => 'Gallery Category added successfully',
                'data' => null,
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'error',
                'message' => $th->getMessage(),
                'data' => null,
            ], 500);
        }
    }
    

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        $categories = GalleryCategories::where('parent_id',$id)->get();
        if($categories->isEmpty()){
            return response()->json([
                'status' => 'warning',
                'message' => 'No Sub Categories found',
                'data' => null,
            ],404);
        }
        return response()->json([
            'status' => 'success',
            'message' => "Sub Categories retrieved successfully for category id: $id",
            'data' => $categories,
        ], 200);
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        
        $category = GalleryCategories::find($id);
        if (is_null($category)) {
            return response()->json([
                'status' => 'warning',
                'message' => 'Gallery Category Not Found',
            ]);
        }
        $categories = GalleryCategories::where('parent_id', 0)->where('id','!=',$id)->with('childCategories')->get();
        return view('admin.gallerycategories.edit',compact('category','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request): JsonResponse
    {
        try {
            // Find the category to update
            $category = GalleryCategories::findOrFail($request->id);
            
            // Retrieve all the input data
            $input = $request->all();
            
            // Validation
            $validator = Validator::make($input, [
                'parent_id' => 'nullable|exists:gallery_categories,id',
                'name' => 'required|unique:gallery_categories,name,' . $category->id . ',id,parent_id,' . $request->parent_id,
            ]);
    
            if ($validator->fails()) {
                return response()->json([
                    'status' => 'warning',
                    'message' => $validator->errors()->first(),
                ]);
            }
    
            if ($request->parent_id && $request->parent_id != 'no_parent') {
                $input['parent_id'] = $request->parent_id;
            } else {
                $input['parent_id'] = 0; 
            }
    
            // Update the category with the updated data
            $category->update($input);
    
            return response()->json([
                'status' => 'success',
                'message' => 'Gallery  Category updated successfully',
                'data' => null,
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'error',
                'message' => $th->getMessage(),
                'data' => null,
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
            $category = GalleryCategories::find($request->id);
            if ($category == null) {
                return response()->json([
                    'status' => 'warning',
                    'message' => ' Gallery  Category Not Found',
                ]);
            }
            $status = $category->status == 1 ? 2 : 1;
            $category->status  = $status;
            $category->save();
            return response()->json([
                'status' => 'success',
                'message' => 'Gallery  Category Status Updated successfully',
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

