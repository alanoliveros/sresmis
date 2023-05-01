<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Session;

class SchoolForm9 extends Controller
{
    public function sf9(){
        $sessions = Session::orderBy('school_year','desc')->get();
        


        return view('backend.teacher.school-forms.school-form-9.index')->with([
                'sessions' => $sessions,
        ]);
    }
}
