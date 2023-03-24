<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
       if(auth()->user()->role == 'admin'){
            return redirect()->route('sresmis/admin/dashboard');
       }
       else if(auth()->user()->role == 'teacher'){
            return redirect()->route('sresmis/teacher/dashboard');
       }
       else{
        abort(404);
       }
    }
}
