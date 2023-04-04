<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Session;
class TeacherController extends Controller
{

    public function index(){
      return view('backend.teacher.dashboard.dashboard');
    }
    public function attendance(){
          return view('backend.teacher.attendance.attendance');
    }
    public function grades(){
          return view('backend.teacher.grades.grades');
    }
    public function students_information(){
          return view('backend.teacher.students_information.students_information');
    }
    public function sf9()
    {

            $session = Session::orderBy('school_year', 'desc')->get();
            $first_session = Session::orderBy('school_year', 'desc')->first();

            
          return view('backend.teacher.school-forms.school-form-9.school-form-9')
                 ->with([
                        'sessions' => $session,
                        'first_session' => $first_session,

                       ]);
    }
}
