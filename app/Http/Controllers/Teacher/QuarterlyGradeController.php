<?php

namespace App\Http\Controllers\Teacher;


use App\Models\Session;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Subject;
use App\Http\Controllers\Controller;
use App\Models\QuarterlyGrading;
use Illuminate\Http\Request;

class QuarterlyGradeController extends Controller
{
    public function index()
    {

        $sessions = Session::orderBy('school_year', 'desc')->get();
        $teacher_detail = Teacher::where('teacherId', auth()->user()->id)->first();


        $students = Student::where([
            'students.school_year' => $teacher_detail->school_year,
            'students.teacherId' => auth()->user()->id,
            'students.sectionId' => $teacher_detail->sectionId,
        ])->join('users', 'students.studentId', 'users.id')
            ->orderBy('users.lastname', 'asc')
            ->get();

            $subjects = Subject::where('gradeLevelId', $teacher_detail->gradeLevelId)->get();


        // $subjects = 
        return view('web.backend.teacher.quarterly-grade.advisory.index', [
            'sessions' => $sessions,
            'students' => $students,
            'subjects' => $subjects,
        ]);
    }
    public function getStudents(Request $request)
    {

        $teacher_detail = Teacher::where([
            'teacherId' => auth()->user()->id,
            'school_year' => $request->sy,
        ])->first();

        $subjects = [];

        if ($teacher_detail) {
            $subjects = Subject::where('gradeLevelId', $teacher_detail->gradeLevelId)->get();
        }

        $students = Student::where([
            'school_year' => $request->sy,
            'teacherId' => auth()->user()->id,
        ])
            ->join('users', 'students.studentId', 'users.id')
            ->get();

        return response()->json([
            'students' => $students,
            'subjects' => $subjects,
        ]);
    }
    public function createGrade(Request $request)
    {
        $sessions = Session::orderBy('school_year', 'desc')->get();
        $teacher_detail = Teacher::where('teacherId', auth()->user()->id)->first();


        $students = Student::where([
            'students.school_year' => $teacher_detail->school_year,
            'students.teacherId' => auth()->user()->id,
            'students.sectionId' => $teacher_detail->sectionId,
        ])->join('users', 'students.studentId', 'users.id')
            ->orderBy('users.lastname', 'asc')
            ->get();

            $subjects = Subject::get();

            $quarterly_gradings = QuarterlyGrading::all();

            // web\backend\teacher\students\student-grades\create.blade.php
        // $subjects = 
        return view('web.backend.teacher.students.student-grades.index', [
            'sessions' => $sessions,
            'students' => $students,
            'subjects' => $subjects,
            'quarterlygrading' => $quarterly_gradings,
            
        ]);
    }
}
