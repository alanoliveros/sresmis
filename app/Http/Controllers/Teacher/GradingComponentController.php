<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Session;
use App\Models\Subject;
use App\Models\QuarterlyGrading;
use App\Models\StudentAssessmentScore;
use App\Models\Teacher;
use App\Models\Student;
use Illuminate\Http\Request;

class GradingComponentController extends Controller
{
    public function index()
    {

        $sessions = Session::orderBy('school_year', 'desc')->get();
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

        return view('web.backend.teacher.grading-component.index', [
            'sessions' => $sessions,
            'subjects' => $subjects,
            'quarters' => $quarters,
            'students' => $students,
        ]);
    }
    public function create()
    {

        $sessions = Session::orderBy('school_year', 'desc')->get();
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

        return view('web.backend.teacher.grading-component.create', [
            'sessions' => $sessions,
            'subjects' => $subjects,
            'quarters' => $quarters,
            'students' => $students,
        ]);
    }
    public function filter_subject(Request $request)
    {

        $subject = Subject::where('id', $request->subject)->first();
        return response()->json([
            'subject' => $subject
        ]);
    }
    public function save(Request $request)
    {
        $teacher = Teacher::where('teacherId', auth()->user()->id)->first();
        foreach ($request->students as $student) {
            $scores = implode(',', $student['scores']);
            $possibleScores = implode(',', $student['possible_scores']);

            $data = [
                'sy' => $request->sy,
                'student_id' => $student['student_id'],
                'subject_id' => $request->subject_id,
                'quarter_id' => $request->quarter_id,
                'teacher_id' => auth()->user()->id,
            ];

            $grade = StudentAssessmentScore::updateOrCreate($data, $data);
            $grade->written_student_score = $scores;
            $grade->written_total_possible_score = $student['possible_total_score'];
            $grade->written_possible_score = $possibleScores;
            $grade->written_student_percentage_score = $student['student_percentage_score'];
            $grade->written_student_weighted_average = $student['student_weighted_average'];
            $grade->save();
        }

        return response()->json(['success' => true]);
    }
}
