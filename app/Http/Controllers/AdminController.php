<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function dashboard(){
          return view('backend.admin.dashboard.dashboard');
    }

    public function performance_indicator(){
          /*return view('backend.admin.performance_indicator.performance_indicator');*/
        echo "Performance Indicator";
    }
}
