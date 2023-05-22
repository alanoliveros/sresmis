<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\GradeLevelSubject;
use Illuminate\Http\Request;

use App\Models\Session;
use App\Models\Teacher;
use App\Models\Student;

class ReportCardController extends Controller
{
    public function index()
    {
        $sessions = Session::orderBy('school_year', 'desc')->get();
        return view(
            'web.backend.teacher.report-card.index',
            [
                'sessions' => $sessions
            ]
        );
    }
    public function filter_students(Request $request)
    {

        $teacher = Teacher::where('teacherId', auth()->user()->id)->first();
        $students = Student::where([
            'teacherId' => auth()->user()->id,
            'adminId' => $teacher->adminId,
            'school_year' => $request->sy,
            'gradeLevelId' => $teacher->gradeLevelId,
        ])
            ->join('users', 'students.studentId', 'users.id')
            ->orderBy('users.lastname', 'asc')
            ->get();

        $subjects = GradeLevelSubject::where([
            'grade_level_subjects.admin_id' => $teacher->adminId,
            'grade_level_subjects.grade_level_id' => $teacher->gradeLevelId,
            'grade_level_subjects.school_year' => $request->sy,
        ])
        ->join('subjects', 'grade_level_subjects.subject_id', 'subjects.id')
        ->orderBy('subjects.id', 'asc')
        ->get();

        return response()->json([
            'students' => $students,
            'subjects' => $subjects,
        ]);
    }
}
