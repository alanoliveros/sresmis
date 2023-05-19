<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\ClassSchedule;
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
        $students = array();
        foreach ($request->outputs as $key => $student) {
            $data = [
                'sy' => $request->sy,
                'admin_id' => $teacher->adminId,
                'student_id' => $student['student_id'],
                'subject_id' => $request->subject_id,
                'quarter_id' => $request->quarter_id,
                'teacher_id' => auth()->user()->id,
            ];

            $grade = StudentAssessmentScore::updateOrCreate($data, $data);
            $grade->student_id = $student['student_id'];

            $grade->written_student_score = implode(',', $student['written_student_scores']);
            $grade->written_total_student_score =  $student['written_student_total_score'];
            $grade->written_possible_score = implode(',', $student['written_possible_scores']);
            $grade->written_total_possible_score = $student['written_possible_total_score'];
            $grade->written_student_percentage_score = $student['written_student_percentage_score'];
            $grade->written_student_weighted_average = $student['written_student_weighted_average'];


            $grade->performance_possible_score = implode(',', $request->performance_outputs[$key]['performance_possible_scores']);
            $grade->performance_student_score = implode(',', $request->performance_outputs[$key]['performance_student_scores']);
            $grade->performance_total_student_score = $request->performance_outputs[$key]['performance_student_total_score'];
            $grade->performance_total_possible_score = $request->performance_outputs[$key]['performance_possible_total_score'];
            $grade->performance_student_percentage_score = $request->performance_outputs[$key]['performance_student_percentage_score'];
            $grade->performance_student_weighted_average = $request->performance_outputs[$key]['performance_student_weighted_average'];


            $grade->quarterly_assessment_student_score = implode(',', $request->assessment_outputs[$key]['assessment_student_scores']);
            $grade->quarterly_total_assessment_student_score = $request->assessment_outputs[$key]['assessment_student_total_score'];
            $grade->quarterly_assessment_possible_score = implode(',', $request->assessment_outputs[$key]['assessment_possible_scores']);
            $grade->quarterly_total_assessment_possible_score = $request->assessment_outputs[$key]['assessment_possible_total_score'];
            $grade->quarterly_assessment_student_percentage_score = $request->assessment_outputs[$key]['assessment_student_percentage_score'];
            $grade->quarterly_assessment_student_weighted_average = $request->assessment_outputs[$key]['assessment_student_weighted_average'];

            $grade->initial_grade = $request->transmuted_grade[$key]['initial_grade'];
            $grade->quarterly_grade = $request->transmuted_grade[$key]['final_grade'];


            $grade->save();
        }

        // start
        // $teacher = Teacher::where('teacherId', auth()->user()->id)->first();
        // $inserted = 0;
        // $updated = 0;

        // foreach ($request->students as $student) {
        //     $scores = implode(',', $student['scores']);
        //     $possibleScores = implode(',', $student['possible_scores']);

        //     $data = [
        //         'sy' => $request->sy,
        //         'student_id' => $student['student_id'],
        //         'subject_id' => $request->subject_id,
        //         'quarter_id' => $request->quarter_id,
        //         'teacher_id' => auth()->user()->id,
        //     ];

        //     $grade = StudentAssessmentScore::updateOrCreate($data, $data);
        //     $grade->written_student_score = $scores;
        //     $grade->written_total_possible_score = $student['possible_total_score'];
        //     $grade->written_possible_score = $possibleScores;
        //     $grade->written_student_percentage_score = $student['student_percentage_score'];
        //     $grade->written_student_weighted_average = $student['student_weighted_average'];
        //     $grade->save();

        //     if ($grade->wasRecentlyCreated) {
        //         $inserted++;
        //     } else {
        //         $updated++;
        //     }
        // }

        // $message = '';
        // if ($inserted > 0) {
        //     $message .= $inserted . ' record(s) inserted. ';
        // }
        // if ($updated > 0) {
        //     $message .= $updated . ' record(s) updated.';
        // }

        // end





        return response()->json([
            'success' => true,
            'students' => $students
        ]);
    }
    public function display_subjects(Request $request)
    {
        $subjects = Subject::where('sy', $request->sy);
    }
    public function find_subjects(Request $request)
    {
        $sy = $request->sy;
        $subjects = ClassSchedule::where([
            'school_year' => $sy,
            'teacherId' => auth()->user()->id,
        ])
            ->orderBy('subjects.subjectName', 'asc')
            ->join('subjects', 'class_schedules.subjectId', 'subjects.id')->get();

        $subjectArr = array();

        foreach ($subjects as $subject) {
            $subjectArr[$subject->subjectId] = $subject->subjectName;
        }

        return response()->json([
            'subjects' => $subjectArr,
        ]);
    }
    public function filter_students(Request $request)
    {
        $sy = $request->sy;
        $subject = $request->subject;
        $section = $request->section;


        $students = Student::where([
            'school_year' => $sy,
            'teacherId' => auth()->user()->id,
            'sectionId' => $section,
        ])
            ->orderBy('users.lastname', 'asc')
            ->join('users', 'students.studentId', 'users.id')
            ->get();
        // subject where
        $subjectted = Subject::find($subject);

        return response()->json([
            'students' => $students,
            'subject' => $subjectted,
        ]);
    }
    public function find_sections(Request $request)
    {
        $sy = $request->sy;
        $subject = $request->subject;


        $sections = ClassSchedule::where([
            'school_year' => $sy,
            'subjectId' => $subject,
            'teacherId' => auth()->user()->id,
        ])
            ->orderBy('sections.sectionName', 'asc')
            ->join('sections', 'class_schedules.sectionId', 'sections.id')->get();

        $sectionArr = array();

        foreach ($sections as $section) {
            $sectionArr[$section->sectionId] = $section->sectionName;
        }

        return response()->json([
            'sections' => $sectionArr,
        ]);
    }
}
