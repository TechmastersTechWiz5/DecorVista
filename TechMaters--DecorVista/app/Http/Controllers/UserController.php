<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        return view("users.home-2");
    }

    public function about(){
        return view("users.about-us");
    }

    public function account(){
        return view("user.account");
    }

    public function addListing(){
        return view("user.add-listing");
    }

    public function blogDetail(){
        return view("user.blog-details");
    }

    public function blogGrid(){
        return view("user.blog-grid");
    }

    public function cart(){
        return view("user.cart");
    }



    
    public function checkout(){
        return view("user.checkout");
    }

    public function contact(){
        return view("user.contact");
    }

    public function faq(){
        return view("user.faq");
    }

    public function history(){
        return view("user.history");
    }

    public function location(){
        return view("user.locations");
    }


    public function order(){
        return view("user.order-tracking");
    }

    public function portfolio(){
        return view("user.portfolio-2");
    }

    public function portfolioDetails(){
        return view("user.portfolio-details");
    }

    public function productDetail(){
        return view("user.product-details");
    }



    public function serviceDetails(){
        return view("user.service-details");
    }

    public function service(){
        return view("user.service");
    }

    public function shop(){
        return view("user.shop");
    }

    public function shopList(){
        return view("user.shop-list");
    }
    
    public function team(){
        return view("user.team");
    }
    
    public function teamDetails(){
        return view("user.team-details");
    }
    
    public function wishlist(){
        return view("user.wishlist");
    }
}
