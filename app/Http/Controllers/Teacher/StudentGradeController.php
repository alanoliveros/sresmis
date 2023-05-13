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
    public function create_grade($sy, $sub, $sec, $qtr){
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

       return view('web.backend.teacher.students.student-grades.create',[
        'students' => $students,
        'data' => $data,
        'subject' => $subject,
       ]);
    }

    public function save_grade(Request $request){
         $outputs = json_decode($request->input('outputs'));
         $form = array();
            foreach($outputs->outputs->student_written->quizzes as $key=>$val){
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

        $transmuted = 0;

        if($grade == 100) {
            $transmuted = 100;
        }else if ($grade <= 98.39 && $grade >= 96.80) {

        }else if($grade >= 99.99 && $grade <= 98.40) {
            $transmuted = 99;
        } else if ($grade <= 98.39 && $grade >= 96.80) {
            $transmuted = 98;
        } else if ($grade <= 96.79 && $grade >= 95.20) {
            $transmuted = 97;
        } else if ($grade <= 95.19 && $grade >= 93.60) {
            $transmuted = 96;
        } else if ($grade <= 93.59 && $grade >= 92.00) {
            $transmuted = 95;
        } else if ($grade <= 91.99 && $grade >= 90.40) {
            $transmuted = 94;
        } else if ($grade <= 90.39 && $grade >= 88.80) {
            $transmuted = 93;
        } else if ($grade <= 88.79 && $grade >= 87.20) {
            $transmuted = 92;
        } else if ($grade <= 87.19 && $grade >= 85.60) {
            $transmuted = 91;
        } else if ($grade <= 85.59 && $grade >= 84.00) {
            $transmuted = 90;
        } else if ($grade <= 83.99 && $grade >= 82.40) {
            $transmuted = 89;
        } else if ($grade <= 82.39 && $grade >= 80.80) {
            $transmuted = 88;
        } else if ($grade <= 80.79 && $grade >= 79.20) {
            $transmuted = 87;
        } else if ($grade <= 79.19 && $grade >= 77.60) {
            $transmuted = 86;
        } else if ($grade <= 77.59 && $grade >= 76.00) {
            $transmuted = 85;
        } else if ($grade <= 75.99 && $grade >= 74.40) {
            $transmuted = 84;
        } else if ($grade <= 74.39 && $grade >= 72.80) {
            $transmuted = 83;
        } else if ($grade <= 72.79 && $grade >= 71.20) {
            $transmuted = 82;
        } else if ($grade <= 71.19 && $grade >= 69.60) {
            $transmuted = 81;
        } else if ($grade <= 69.59 && $grade >= 68.00) {
            $transmuted = 80;
        } else if ($grade <= 67.99 && $grade >= 66.40) {
            $transmuted = 79;
        } else if ($grade <= 66.39 && $grade >= 64.80) {
            $transmuted = 78;
        } else if ($grade <= 64.79 && $grade >= 63.20) {
            $transmuted = 77;
        } else if ($grade <= 63.19 && $grade >= 61.60) {
            $transmuted = 76;
        } else if ($grade <= 61.59 && $grade >= 60.00) {
            $transmuted = 75;
        } else if ($grade <= 59.99 && $grade >= 56.00) {
            $transmuted = 74;
        } else if ($grade <= 55.99 && $grade >= 52.00) {
            $transmuted = 73;
        } else if ($grade <= 51.99 && $grade >= 48.00) {
            $transmuted = 72;
        } else if ($grade <= 47.99 && $grade >= 44.00) {
            $transmuted = 71;
        } else if ($grade <= 43.99 && $grade >= 40.00) {
            $transmuted = 70;
        } else if ($grade <= 39.99 && $grade >= 36.00) {
            $transmuted = 69;
        } else if ($grade <= 35.99 && $grade >= 32.00) {
            $transmuted = 68;
        } else if ($grade <= 31.99 && $grade >= 28.00) {
            $transmuted = 67;
        } else if ($grade <= 27.99 && $grade >= 24.00) {
            $transmuted = 66;
        } else if ($grade <= 23.99 && $grade >= 20.00) {
            $transmuted = 65;
        } else if ($grade <= 19.99 && $grade >= 16.00) {
            $transmuted = 64;
        } else if ($grade <= 15.99 && $grade >= 12.00) {
            $transmuted = 63;
        } else if ($grade <= 11.99 && $grade >= 8.00) {
            $transmuted = 62;
        } else if ($grade <= 7.99 && $grade >= 4.00) {
            $transmuted = 61;
        } else if ($grade <= 3.99 && $grade >= 0) {
            $transmuted = 60;
        } else if($grade < 0) {
            $transmuted = 60;
        }
        return response()->json([
            'transmuted' => $transmuted,
            'grade' => $grade,
        ]);
    }
}
