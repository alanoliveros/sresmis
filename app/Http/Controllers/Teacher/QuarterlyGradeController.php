<?php

namespace App\Http\Controllers\Teacher;


use App\Models\Session;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class QuarterlyGradeController extends Controller
{
    public function index()
    {

        $sessions = Session::orderBy('school_year', 'desc')->get();
       return view('web.backend.teacher.quarterly-grade.index', [
        'sessions' => $sessions,
       ]); 
    }
}
