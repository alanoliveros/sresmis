<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;


use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function index()
    {
        // return view('auth.home');
        return view('backend.admin.dashboard.dashboard');
    }
    public function dashboard(){
    }

    public function performance_indicator(){
   
   
          /*return view('backend.admin.performance_indicator.performance_indicator');*/
        echo "Performance Indicator";
    }
}
