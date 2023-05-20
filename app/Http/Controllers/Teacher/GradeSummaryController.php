<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Session;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\QuarterlyGrading;
use App\Models\Student;
use App\Models\ClassSchedule;

class GradeSummaryController extends Controller
{
    public function index(){
        $sessions = Session::orderBy('school_year', 'desc')->get();
        $quarters = QuarterlyGrading::orderBY('quarter_name', 'asc')->get();

        $teacher_detail = Teacher::where('teacherId', auth()->user()->id)->first();
        $students = Student::where([
            'teacherId' => auth()->user()->id,
            'sectionId' => $teacher_detail->sectionId,
            'gradeLevelId' => $teacher_detail->gradeLevelId,
            'adminId' => $teacher_detail->adminId,
        ])->get();

        // $class_schedule = ClassSchedule::where([
        //     'teacher_id' => auth()->user()->id,
        //     'teacher_id' => auth()->user()->id,
        // ])

        return view('web.backend.teacher.grade-summary.index', [
            'sessions' => $sessions,
            // 'subjects' => $subjects,
            'quarters' => $quarters,
            'students' => $students,
        ]);
    }
    public function filter_student(Request $request)
    {
        return response()->json([
            ''
        ]);
    }
}
