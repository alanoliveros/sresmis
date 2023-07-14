<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Session;

class SchoolForm2 extends Controller
{
    public function sf2(){
        $sessions = Session::orderBy('school_year','desc')->get();
        


        return view('backend.teacher.school-forms.school-form-2.index')->with([
                'sessions' => $sessions,
        ]);
    }
}
