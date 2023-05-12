<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\ClassSchedule;
use App\Models\Student;
use App\Models\Subject;


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
        $subject = Subject::find($request->subject);

        


        $students = Student::where([
            'students.teacherId' => auth()->user()->id,
            'students.school_year' => $sy,
            'students.sectionId' => $section,
        ])
        ->join('users', 'students.studentId', 'users.id')
        ->orderBy('users.gender','desc')
        ->orderBy('users.lastname','asc')
        ->get();
        return response()->json([
            'students' => $students,
            'subject' => $subject,
        ]);
    }
    public function transmuted_grade(Request $request) {

        // return response()->json([
        //     'transmuted' => $request->initialGrade,
        // ]);

      
            $grade = $request->initialGrade;
            
            $transmuted = 0;

            if($grade >= 16.00 || $grade <= 19.99){
                $transmuted = 64;
            }else if($grade >= 12.00 || $grade <= 15.99){
                $transmuted = 63;
            }
            else if($grade >= 8.00 || $grade <= 11.99){
                $transmuted = 62;
            }else if($grade >= 4.00  || $grade <= 7.99){
                $transmuted = 61;
            }else if($grade <= 0  || $grade <= 3.99){
                $transmuted = 60;
            }
            return response()->json([
                'transmuted' => $transmuted,
            ]);
        
       
    }
}
