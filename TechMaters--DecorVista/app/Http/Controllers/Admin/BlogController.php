<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\Models\Blog;
use App\Models\BlogImages;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
{


    public function index(Request $request)
    { 
        $ParentBlogs = Blog::with(['images'])->take(4)->get();
    
        if ($request->ajax()) {    
            $blogs = Blog::with(['images'])->get();    
            log::info($blogs);
    
            return DataTables::of($blogs)
                ->addIndexColumn()
                ->addColumn('image', function ($model) {
                    if ($model->images->isNotEmpty()) {
                        return $model->images->first()->image_path;
                    } else {
                        return 'No Image';
                    }
                })
                ->addColumn('action', function ($model) {
                    $editRoute = route('admin.blogs.edit', $model->id);
                    $detailRoute = route('admin.blogs.show', $model->id);
                    return '<div class="d-flex gap-2">
                        <a href="' . $detailRoute . '" class="btn btn-light btn-sm">
                            <iconify-icon icon="solar:eye-broken" class="align-middle fs-18"></iconify-icon>
                        </a>
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
                ->rawColumns(['image', 'action', 'status'])
                ->make(true);
        }
    
        return view('admin.blogs.index', compact('ParentBlogs'));
    }
    

    public function create()
    {
        return view('admin.blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
     
     public function store(Request $request)
     {
         $validator = Validator::make($request->all(), [
             'title' => 'required|string|max:255',
             'body' => 'nullable|string',
             'images.*' => 'nullable|mimes:jpg,jpeg,png,gif|max:2048',
         ]);
     
         if ($validator->fails()) {
             return response()->json([
                 'status' => 'warning',
                 'message' => $validator->errors()->first(),
             ]);
         }
     
         $blog = new Blog();
         $blog->title = $request->title;
         $blog->date = now()->toDateString();
         $blog->body = $request->body;
         $blog->save();
     
     
         if ($request->hasFile('images')) {
            $files = $request->file('images');

             foreach ($files as $file) {
                 $fileName = time() . '_' . $file->getClientOriginalName();
                 $filePath = $file->storeAs('blog_images', $fileName, 'public');
     
                 BlogImages::create([
                     'blog_id' => $blog->id,
                     'image_path' => $filePath,
                 ]);
             }
         }
     
         return response()->json([
             'status' => 'success',
             'message' => 'Blog created successfully!',
         ]);
     }


     public function edit($id)
     {
         $blog = Blog::with('images')->find($id);
     
         if (!$blog) {
             return redirect()->route('blogs.index')->with('error', 'Blog not found');
         }
     
         return view('admin.blogs.edit', compact( 'blog'));
     }


     public function update(Request $request)
{
    $input = $request->all();

    $validator = Validator::make($input, [
        'title' => 'required|string|max:255', 
        'body' => 'required|string', 
        'images.*' => 'nullable|mimes:jpg,jpeg,png,gif|max:2048', // Optional: Set a max size limit, e.g., 2MB
    ]);

    if ($validator->fails()) {
        return response()->json([
            'status' => 'warning',
            'message' => $validator->errors()->first(),
        ], 422);
    }

    try {
        $blog = Blog::findOrFail($request->id);

        $blog->title = $request->title;
        $blog->body = $request->body;

        if ($request->hasFile('images')) {
            $files = $request->file('images');
            foreach ($files as $file) {
                $fileName = time() . '_' . $file->getClientOriginalName();
                $filePath = $file->storeAs('blog_images', $fileName, 'public');

                // Use relationship to create new BlogImages
                $blog->images()->create([
                    'image_path' => $filePath,
                ]);
            }
        }

        // Handle removed images
        if ($request->has('removed_images')) {
            $removedImageIds = array_filter(explode(',', rtrim($request->removed_images, ',')), 'is_numeric');

            if (!empty($removedImageIds)) {
                $imagesToDelete = BlogImages::whereIn('id', $removedImageIds)->get();

                foreach ($imagesToDelete as $image) {
                    // Delete image file from storage
                    Storage::disk('public')->delete($image->image_path);
                }

                // Delete records from the database
                BlogImages::whereIn('id', $removedImageIds)->delete();
            }
        }

        // Check if at least one image exists after update
        $imagesCount = BlogImages::where('blog_id', $blog->id)->count();
        if ($imagesCount == 0) {
            return response()->json([
                'status' => 'error',
                'message' => 'At least one image must be present for the blog.',
            ], 400);
        }

        // Save the blog with updated information
        $blog->save();

        // Return success response
        return response()->json([
            'status' => 'success',
            'message' => 'Blog updated successfully!',
        ], 200);

    } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
        return response()->json([
            'status' => 'error',
            'message' => 'Blog not found.',
        ], 404);

    } catch (\Exception $e) {
        Log::error("Error: " . $e->getMessage());
        return response()->json([
            'status' => 'error',
            'message' => 'An error occurred while updating the blog.',
        ], 500);
    }
}

     
     
 



     public function show($id)
    {

        // Fetch the blog by ID
        $blog = Blog::with('images')->find($id);
    
        // Check if the blog was found
        if (!$blog) {
            return response()->json([
                'status' => 'warning',
                'message' => 'Blog not found',
                'data' => null,
            ], 404);
        }
        return view(  'admin.blogs.show', compact('blog'));
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
            $Blog = Blog::find($request->id);
            if ($Blog == null) {
                return response()->json([
                    'status' => 'warning',
                    'message' => 'Blog Not Found',
                ]);
            }
            $status = $Blog->status == 1 ? 2 : 1;
            $Blog->status  = $status;
            $Blog->save();
            return response()->json([
                'status' => 'success',
                'message' => 'Blog Status Updated successfully',
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
