<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Session;
use App\Models\QuarterlySummaryGrade;
use App\Models\Teacher;

use App\Models\ClassSchedule;

class QuarterGradeController extends Controller
{
    public function index()
    {
        $sessions = Session::orderBy('school_year', 'desc')->get();
        return view('web.backend.teacher.quarterly-grade.index', [
            'sessions' => $sessions
        ]);
    }
    public function get_section(Request $request)
    {
        // $sections = Section::where('class_id', $request->class_id)->get();
        $sections = ClassSchedule::where([
            'class_schedules.school_year' => $request->sy,
            'class_schedules.teacherId' => auth()->user()->id,
        ])
            ->join('sections', 'class_schedules.sectionId', 'sections.id')
            ->get();

        $sectionArr = array();
        foreach ($sections as $section) {
            $sectionArr[$section->sectionId] = $section->sectionName;
        }
        return response()->json([
            'sections' => $sectionArr,
        ]);
    }
    public function get_subjects(Request $request)
    {
        // $sections = Section::where('class_id', $request->class_id)->get();
        $subjects = ClassSchedule::where([
            'class_schedules.sectionId' => $request->section_id,
            'class_schedules.teacherId' => auth()->user()->id,
        ])
            ->join('subjects', 'class_schedules.subjectId', 'subjects.id')
            ->get();

        $subjectArr = array();
        foreach ($subjects as $subject) {
            $subjectArr[$subject->subjectId] = $subject->subjectName;
        }
        return response()->json([
            'subjects' => $subjectArr,
        ]);
    }
    public function get_student_summary_grade(Request $request)
    {
        // $sections = Section::where('class_id', $request->class_id)->get();

        $teacher = Teacher::where('teacherId', auth()->user()->id)->first();
        $students_grades = QuarterlySummaryGrade::where([
            'quarterly_summary_grades.school_year' => $request->sy,
            'quarterly_summary_grades.admin_id' => $teacher->adminId,
            'quarterly_summary_grades.teacher_id' => auth()->user()->id,
            'quarterly_summary_grades.section_id' => $request->section_id,
            'quarterly_summary_grades.subject_id' => $request->subject_id,
        ])
            ->join('users', 'quarterly_summary_grades.student_id', 'users.id')
            ->get();

        return response()->json([
            'students' => $students_grades
        ]);
    }
}
