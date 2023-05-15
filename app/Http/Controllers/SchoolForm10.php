<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Session;
use App\Models\GradeLevel;
use App\Models\ClassSchedule;
use App\Models\Student;

class SchoolForm10 extends Controller
{
    public function index()
    {

        $gradeLevels = GradeLevel::orderBy('id', 'asc')->get();
        $classes = ClassSchedule::where('class_schedules.teacherId', auth()->user()->id)
            ->join('sections', 'class_schedules.sectionId', 'sections.id')->get();


        $class = array();
        foreach ($classes as $key => $sub) {
            $class[$sub->id] = $sub->sectionName;
        }
        $sections = $class;
        return view('web.backend.teacher.school-forms.sf10.index')->with([
            'gradeLevels' => $gradeLevels,
            'sections' => $sections,
        ]);
    }
    public function get_section(Request $request)
    {

        $classes = ClassSchedule::where([
            'class_schedules.grade_level_id' => $request->glvl,
            'class_schedules.teacherId' => auth()->user()->id,])
            ->join('sections', 'class_schedules.sectionId', 'sections.id')->get();


        $class = array();
        foreach ($classes as $key => $sub) {
            $class[$sub->id] = $sub->sectionName;
        }
        $sections = $class;
        return response()->json([
            'sections' => $sections,
        ]);
    }
    public function get_students(Request $request)
    {

       $students = Student::where([
        'students.gradeLevelId' => $request->glvl,
        'students.sectionId' => $request->section,
        'students.teacherId' =>auth()->user()->id,
       ])
       ->join('users', 'students.studentId', 'users.id')->get();
        return response()->json([
            'students' => $students,
        ]);
    }
}
