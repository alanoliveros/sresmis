<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Session;
use App\Models\Subject;
use App\Models\QuarterlyGrading;
use App\Models\Teacher;
use App\Models\Student;
use Illuminate\Http\Request;

class GradingComponentController extends Controller
{
    public function index()
    {

        $sessions = Session::orderBy('school_year','desc')->get();
        $subjects = Subject::orderBY('subjectName', 'asc')->get();
        $subjects = Subject::orderBY('subjectName', 'asc')->get();
        $quarters = QuarterlyGrading::orderBY('quarter_name', 'asc')->get();

        $teacher_detail = Teacher::where('teacherId', auth()->user()->id)->first();
        $students = Student::where([
            'teacherId' => auth()->user()->id,
            'sectionId' => $teacher_detail->sectionId,
            'gradeLevelId' => $teacher_detail->gradeLevelId,
            'adminId' => $teacher_detail->adminId,
        ])->get();

        return view('web.backend.teacher.grading-component.index',[
            'sessions' => $sessions,
            'subjects' => $subjects,
            'quarters' => $quarters,
            'students' => $students,
        ]);
    }
    public function create()
    {

        $sessions = Session::orderBy('school_year','desc')->get();
        $subjects = Subject::orderBY('subjectName', 'asc')->get();
        $subjects = Subject::orderBY('subjectName', 'asc')->get();
        $quarters = QuarterlyGrading::orderBY('quarter_name', 'asc')->get();

        $teacher_detail = Teacher::where('teacherId', auth()->user()->id)->first();
        $students = Student::where([
            'teacherId' => auth()->user()->id,
            'sectionId' => $teacher_detail->sectionId,
            'gradeLevelId' => $teacher_detail->gradeLevelId,
            'adminId' => $teacher_detail->adminId,
        ])
        ->join('users', 'students.studentId', 'users.id')
        ->orderBy('users.lastname', 'asc')
        ->get();

        return view('web.backend.teacher.grading-component.create',[
            'sessions' => $sessions,
            'subjects' => $subjects,
            'quarters' => $quarters,
            'students' => $students,
        ]);
    }
}
