<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\ClassSchedule;
use App\Models\Student;
use App\Models\Subject;
use App\Models\QuarterlyGrading;


class StudentGradeController extends Controller
{
    public function filter_school_year(Request $request)
    {

        $sy = $request->sy;
        $subject = ClassSchedule::where([
            'class_schedules.teacherId' => auth()->user()->id,
            'class_schedules.school_year' => $sy
        ])
            ->join('subjects', 'class_schedules.subjectId', 'subjects.id')
            ->get();


        $subjectArr = array();
        foreach ($subject as $key => $sub) {
            $subjectArr[$sub->id] = $sub->subjectName;
        }
        $subjects = $subjectArr;

        return response()->json([
            'subjects' => $subjects,

        ]);
    }

    public function filter_by_subject(Request $request)
    {

        $id = $request->subject;
        $sy = $request->sy;
        $sections = ClassSchedule::where([
            'class_schedules.teacherId' => auth()->user()->id,
            'class_schedules.school_year' => $sy,
            'class_schedules.subjectId' => $id
        ])
            ->join('sections', 'class_schedules.sectionId', 'sections.id')
            ->get();
        return response()->json([
            'sections' => $sections,
        ]);
    }
    public function filter_students(Request $request)
    {

        $section = $request->section;
        $sy = $request->sy;
        $quarter = $request->quarter;
        $subject = Subject::find($request->subject);

        $students = Student::where([
            'students.teacherId' => auth()->user()->id,
            'students.school_year' => $sy,
            'students.sectionId' => $section,
        ])
            ->join('users', 'students.studentId', 'users.id')
            ->orderBy('users.gender', 'desc')
            ->orderBy('users.lastname', 'asc')
            ->get();

        return response()->json([
            'students' => $students,
            'subject' => $subject,
        ]);
    }
    public function create_grade($sy, $sub, $sec, $qtr)
    {
        $quarter = str_replace('-', ' ', $qtr);

        $data = array(
            'sy' => $sy,
            'sub' => $sub,
            'sec' => $sec,
            'qtr' => $quarter,
        );

        $students = Student::where([
            'students.teacherId' => auth()->user()->id,
            'students.school_year' => $sy,
            'students.sectionId' => $sec,
        ])
            ->join('users', 'students.studentId', 'users.id')
            ->orderBy('users.gender', 'desc')
            ->orderBy('users.lastname', 'asc')
            ->get();
        $subject = Subject::find($sub);

        return view('web.backend.teacher.students.student-grades.create', [
            'students' => $students,
            'data' => $data,
            'subject' => $subject,
        ]);
    }

    public function save_grade(Request $request)
    {
        $outputs = json_decode($request->input('outputs'));
        $form = array();
        foreach ($outputs->outputs->student_written->quizzes as $key => $val) {
            $form[] = $val;
        }

        return response()->json([
            'id' => $form,
        ]);
    }
    public function transmuted_grade(Request $request)
    {

        // return response()->json([
        //     'transmuted' => $request->initialGrade,
        // ]);


        $grade = floatval($request->initialGrade);

        $transmuted = match (true) {
            $grade == 100 => 100,
            $grade >= 98.40 && $grade <= 99.99 => 99,
            $grade >= 96.80 && $grade <= 98.39 => 98,
            $grade >= 95.20 && $grade <= 96.79 => 97,
            $grade >= 93.60 && $grade <= 95.19 => 96,
            $grade >= 92.00 && $grade <= 93.59 => 95,
            $grade >= 90.40 && $grade <= 91.99 => 94,
            $grade >= 88.80 && $grade <= 90.39 => 93,
            $grade >= 87.20 && $grade <= 88.79 => 92,
            $grade >= 85.60 && $grade <= 87.19 => 91,
            $grade >= 84.00 && $grade <= 85.59 => 90,
            $grade >= 82.40 && $grade <= 83.99 => 89,
            $grade >= 80.80 && $grade <= 82.39 => 88,
            $grade >= 79.20 && $grade <= 80.79 => 87,
            $grade >= 77.60 && $grade <= 79.19 => 86,
            $grade >= 76.00 && $grade <= 77.59 => 85,
            $grade >= 74.40 && $grade <= 75.99 => 84,
            $grade >= 72.80 && $grade <= 74.39 => 83,
            $grade >= 71.20 && $grade <= 72.79 => 82,
            $grade >= 69.60 && $grade <= 71.19 => 81,
            $grade >= 68.00 && $grade <= 69.59 => 80,
            $grade >= 66.40 && $grade <= 67.99 => 79,
            $grade >= 64.80 && $grade <= 66.39 => 78,
            $grade >= 63.20 && $grade <= 64.79 => 77,
            $grade >= 61.60 && $grade <= 63.19 => 76,
            $grade >= 60.00 && $grade <= 61.59 => 75,
            $grade >= 56.00 && $grade <= 59.99 => 74,
            $grade >= 52.00 && $grade <= 55.99 => 73,
            $grade >= 48.00 && $grade <= 51.99 => 72,
            $grade >= 44.00 && $grade <= 47.99 => 71,
            $grade >= 40.00 && $grade <= 43.99 => 70,
            $grade >= 36.00 && $grade <= 39.99 => 69,
            $grade >= 32.00 && $grade <= 35.99 => 68,
            $grade >= 28.00 && $grade <= 31.99 => 67,
            $grade >= 24.00 && $grade <= 27.99 => 66,
            $grade >= 20.00 && $grade <= 23.99 => 65,
            $grade >= 16.00 && $grade <= 19.99 => 64,
            $grade >= 12.00 && $grade <= 15.99 => 63,
            $grade >= 8.00 && $grade <= 11.99 => 62,
            $grade >= 4.00 && $grade <= 7.99 => 61,
            $grade >= 0 && $grade <= 3.99 => 60,
            default => 60,
        };

        return response()->json([
            'transmuted' => $transmuted,
            'grade' => $grade,
        ]);
    }
}
