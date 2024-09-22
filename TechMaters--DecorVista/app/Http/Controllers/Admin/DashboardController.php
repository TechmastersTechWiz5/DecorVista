<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index(){
        return view('admin.dashbord.adminDashboard');        
    }


    public function login_two(){
        return view('admin.auth.login');
    }
}
