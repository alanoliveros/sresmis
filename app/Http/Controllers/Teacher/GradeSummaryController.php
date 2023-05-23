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
use Illuminate\Support\Facades\DB;

class GradeSummaryController extends Controller
{
    public function index()
    {
        $sessions = Session::orderBy('school_year', 'desc')->get();
        $quarters = QuarterlyGrading::orderBY('quarter_name', 'asc')->get();

        $teacher_detail = Teacher::where('teacherId', auth()->user()->id)->first();
        $students = Student::where([
            'teacherId' => auth()->user()->id,
            'sectionId' => $teacher_detail->sectionId,
            'gradeLevelId' => $teacher_detail->gradeLevelId,
            'adminId' => $teacher_detail->adminId,
        ])->get();


        // get subject by advisory


        $subjects = Subject::where('gradeLevelId', $teacher_detail->gradeLevelId)
            ->get();

        // $class_schedule = ClassSchedule::where([
        //     'teacher_id' => auth()->user()->id,
        //     'teacher_id' => auth()->user()->id,
        // ])

        return view('web.backend.teacher.grade-summary.index', [
            'sessions' => $sessions,
            // 'subjects' => $subjects,
            'quarters' => $quarters,
            'students' => $students,
            'subjects' => $subjects,
        ]);
    }
    public function filter_student(Request $request)
    {


        $teacher = Teacher::where('teacherId', auth()->user()->id)->first();


        $subjects = DB::table('grade_level_subjects')
            ->where('grade_level_subjects.grade_level_id', $teacher->gradeLevelId)
            ->where('grade_level_subjects.school_year', $request->sy)
            ->join('subjects', 'grade_level_subjects.subject_id', 'subjects.id')
            ->get();

        // $students = Student::where([
        //     'students.adminId' => $teacher->adminId,
        //     'students.teacherId' => auth()->user()->id,
        //     'students.sectionId' => $teacher->sectionId,
        //     'students.school_year' => $request->sy,
        // ])
        // ->join('users', 'students.studentId', 'users.id')
        // ->orderBy('users.lastname', 'asc')
        // ->get();

        $studentGrade = DB::table('quarterly_summary_grades')->where([
            'quarterly_summary_grades.school_year' => $request->sy,
            'quarterly_summary_grades.admin_id' => $teacher->adminId,
            // 'quarterly_summary_grades.section_id' => $teacher->sectionId,
        ])
        ->join('subjects', 'quarterly_summary_grades.subject_id', 'subjects.id')
        ->join('users', 'quarterly_summary_grades.student_id', 'users.id')
        ->get();

        return response()->json([
            'students' => $studentGrade,
            'subjects' => $subjects,
        ]);
    }
}
