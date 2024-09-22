<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\BlogImages;  
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use Validator;
use Auth;


class BlogController extends Controller
{
    //
    public function index()
    {
        $status = 1;
        // Fetch blogs with pagination
        $blogs = Blog::with(['images'])
                    ->where('status', $status)
                    ->paginate(6); // Adjust the number per page as needed

        return view('users.blog', compact('blogs'));
    }


    public function show($id)
    {
        $blog = Blog::with('images')->find($id);
        $RelatedBlog = Blog::with(['images'])->take(3)->get();
    
        if (!$blog) {
            return response()->json([
                'status' => 'warning',
                'message' => 'Blog not found',
                'data' => null,
            ], 404);
        }
        return view('users.blog-details', compact('blog', 'RelatedBlog'));
    }
}

