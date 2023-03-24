<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeacherController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function dashboard(){
          return view('backend.teacher.dashboard.dashboard');
    }public function attendance(){
          return view('backend.teacher.attendance.attendance');
    }
}
