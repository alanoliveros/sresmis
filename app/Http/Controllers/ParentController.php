<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ParentController extends Controller
{
    public function index(){
        return view('backend.parent.dashboard.dashboard');
      }
}
