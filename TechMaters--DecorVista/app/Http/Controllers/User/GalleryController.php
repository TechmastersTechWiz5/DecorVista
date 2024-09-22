<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gallery;
use App\Models\GalleryCategories;
use Illuminate\Support\Facades\Log;
class GalleryController extends Controller
{
    //
    public function  index(){
        
        $galleries = Gallery::with('gallerycategory')->get()->groupBy('category_id');
        $categories = GalleryCategories::whereNotNull('parent_id')->get();
        
        Log::info('galleries data', ['galleries data' => $galleries]);
        Log::info('categories data', ['categories data' => $categories]);
        return view('users.gallery' , data: compact('galleries','categories'));
    }

    public function category()
{
    return $this->belongsTo(Gallery::class, 'category_id');
}
}
