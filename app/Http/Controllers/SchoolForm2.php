<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Session;

class SchoolForm2 extends Controller
{
    public function index(){
        $sessions = Session::orderBy('school_year','desc')->get();
        return view('web.backend.teacher.school-forms.sf2.index')->with([
                'sessions' => $sessions,
        ]);
    }
}
