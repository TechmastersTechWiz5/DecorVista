<?php

namespace App\Http\Controllers\Designer;

use App\Models\Portfolio;
use Illuminate\Http\Request;
use App\Models\GalleryCategories;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class GeneralController extends Controller
{
    //
    public function index(){
        $portfolios =  Portfolio::with(['images' , 'designer','consultants'])
        ->where('designer_id', Auth::user()->id)
        ->get();
        return view('designer.dashboard.dashboard', compact('portfolios'));
    }
    public function gallerycategories(){
        $categories = GalleryCategories::all();
        return json_encode($categories);
    }
    public function login(){
        return view('designer.auth.login');
    }

    public function verifyOTP(){
        return view('designer.auth.verifyOtp');
    }
}
