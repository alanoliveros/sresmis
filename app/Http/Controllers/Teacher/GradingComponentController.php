<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\ClassSchedule;
use App\Models\Session;
use App\Models\Subject;
use App\Models\QuarterlyGrading;
use App\Models\StudentAssessmentScore;
use App\Models\Teacher;
use App\Models\QuarterlySummaryGrade;
use App\Models\Student;
use App\Models\Section;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Reader\Xls\RC4;

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
        $grade_level_id = Section::find($request->section_id);
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
            $grade->section_id = $request->section_id;

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

            $finalGrade = $request->transmuted_grade[$key]['final_grade'];

            if ($finalGrade <= 74) {
                $grade->remarks = 'Failed';
            } else if ($finalGrade >= 75 && $finalGrade <= 100) {
                $grade->remarks = 'Passed';
            }
            $grade->save();

            $gradeSummary = QuarterlySummaryGrade::firstOrNew([
                'school_year' =>  $request->sy,
                'teacher_id' => auth()->user()->id,
                'student_id' => $student['student_id'],
                'subject_id' =>  $request->subject_id,
            ]);

            $gradeSummary->school_year = $request->sy;
            $gradeSummary->admin_id = $teacher->adminId;
            $gradeSummary->teacher_id = auth()->user()->id;
            $gradeSummary->student_id = $student['student_id'];
            $gradeSummary->subject_id = $request->subject_id;
            $gradeSummary->grade_level_id = $grade_level_id->gradeLevelId;
            $gradeSummary->section_id = $request->section_id;

            if ($request->quarter_id == 1) {
                $gradeSummary->quarter_1 = $request->transmuted_grade[$key]['final_grade'];
            } else if ($request->quarter_id == 2) {
                $gradeSummary->quarter_2 = $request->transmuted_grade[$key]['final_grade'];
            } else if ($request->quarter_id == 3) {
                $gradeSummary->quarter_3 = $request->transmuted_grade[$key]['final_grade'];
            } else if ($request->quarter_id == 4) {
                $gradeSummary->quarter_4 = $request->transmuted_grade[$key]['final_grade'];
            }
            $gradeSummary->save();
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
        $section = $request->section;


        $students = Student::where([
            'school_year' => $sy,
            'sectionId' => $section,
        ])
            ->orderBy('users.lastname', 'asc')
            ->join('users', 'students.studentId', 'users.id')
            ->get();

        $subjects = ClassSchedule::where([
            'school_year' => $sy,
            'teacherId' => auth()->user()->id,
            'sectionId' => $section,
        ])
            ->orderBy('subjects.subjectName', 'asc')
            ->join('subjects', 'class_schedules.subjectId', 'subjects.id')->get();

        $subjectArr = array();

        foreach ($subjects as $subject) {
            $subjectArr[$subject->subjectId] = $subject->subjectName;
        }

        return response()->json([
            'students' => $students,
            'subjects' => $subjectArr,
        ]);
    }
    public function find_sections(Request $request)
    {
        $sy = $request->sy;


        $sections = ClassSchedule::where([
            'school_year' => $sy,
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
    public function display_grades(Request $request)
    {
        $sy = $request->sy;
        $section_id = $request->section;
        $subject_id = $request->subject_id;
        $quarter_id = $request->quarter;

        $display_grades = StudentAssessmentScore::where([
            'student_assessment_scores.teacher_id' => auth()->user()->id,
            'student_assessment_scores.subject_id' => $subject_id,
            'student_assessment_scores.section_id' => $section_id,
            'student_assessment_scores.sy' => $sy,
            'student_assessment_scores.quarter_id' => $quarter_id,

        ])
            ->join('users', 'student_assessment_scores.student_id', 'users.id')
            ->get();

        $students = Student::where([
            'school_year' => $sy,
            'teacherId' => auth()->user()->id,
            'sectionId' => $section_id,
        ])
            ->orderBy('users.lastname', 'asc')
            ->join('users', 'students.studentId', 'users.id')
            ->get();

        $subject = Subject::find($subject_id);


        return response()->json([
            'display_grades' => $display_grades,
            'students' => $students,
            'subject' => $subject,
        ]);
    }
}
