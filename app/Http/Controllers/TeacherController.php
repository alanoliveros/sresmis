<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\Section;
use App\Models\Session;
use App\Models\GradeLevel;
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
    public function advisory(){

      $teacherId = auth()->user()->id;
    
      $sectionName = Teacher::join('sections','teachers.sectionId', '=', 'sections.id')
                              ->where('teachers.teacherId', '=', $teacherId)->first();


      $grades = GradeLevel::where('id','=', $sectionName->gradeLevelId)->first();
      return view('backend.teacher.advisory.index')->with([
            'section' =>$sectionName,
            'grades' =>$grades,
      ]);

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
