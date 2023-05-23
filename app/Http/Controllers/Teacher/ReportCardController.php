<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\GradeLevelSubject;
use Illuminate\Http\Request;

use App\Models\Session;
use App\Models\Teacher;
use App\Models\Student;
use App\Models\QuarterlySummaryGrade;

class ReportCardController extends Controller
{
    public function index()
    {
        $sessions = Session::orderBy('school_year', 'desc')->get();
        return view('web.backend.teacher.report-card.index', [
            'sessions' => $sessions
        ]);
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
    public function create(Request $request)
    {
        // $student_grades = $request->data;

        foreach ($request->data['subject_ids'] as $key => $id) {
            $teacher = Teacher::where('teacherId', auth()->user()->id)->first();
            $student_card = QuarterlySummaryGrade::firstOrNew([
                'school_year' => $request->data['sy'],
                'student_id' => $request->data['student_id'],
                'subject_id' => $id['id'],
                'admin_id' => $teacher->adminId,
                'teacher_id' => auth()->user()->id,
            ]);
            $student_card->school_year = $request->data['sy'];
            $student_card->admin_id = $teacher->adminId;
            $student_card->subject_id = $id['id'];
            $student_card->teacher_id = auth()->user()->id;
            $student_card->student_id = $request->data['student_id'];
            $student_card->section_id = $teacher->sectionId;
            $student_card->grade_level_id = $teacher->gradeLevelId;
            $student_card->quarter_1 = $id['grades'][0];
            $student_card->quarter_2 = $id['grades'][1];
            $student_card->quarter_3 = $id['grades'][2];
            $student_card->quarter_4 = $id['grades'][3];
            $student_card->final_grade = $id['finalGrading'];
            $student_card->remarks = $id['remarks'];
            $student_card->save();

        }

        
        return response()->json([
            'status' => 'success'
        ]);
    }
    public function show(Request $request)
    {

        $teacher = Teacher::where('teacherId', auth()->user()->id)->first();
        $student_card = QuarterlySummaryGrade::where([
            'school_year' => $request->sy,
            'school_year' => $request->sy,
        ])
        ->get();
        
        return response()->json([
            'students' => $student_card,
        ]);
    }
}
