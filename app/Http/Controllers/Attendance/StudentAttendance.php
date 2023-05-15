<?php

namespace App\Http\Controllers\Attendance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Session;


class StudentAttendance extends Controller
{
    public function advisory_index(){
        $teacher_detail = Teacher::where('teacherId', auth()->user()->id)->first();
        $secionTaught = $teacher_detail->sectionId;
        $students = Student::where('students.sectionId', $secionTaught)->join('users', 'students.studentId', 'users.id')->get();
        return view('web.backend.teacher.attendance.advisory.index', [
            'students' => $students,
        ]);
    }
    public function create_attendance(){
        $teacherId = auth()->user()->id;
        $sectionName = Teacher::join('sections', 'teachers.sectionId', '=', 'sections.id')
          ->join('grade_levels', 'teachers.gradeLevelId', '=', 'grade_levels.id')
          ->where('teachers.teacherId', '=', $teacherId)
          ->first();
    
        $adminId = $sectionName->adminId;
        $schoolYear = Session::where('adminId', '=', $adminId)->orderBy('school_year', 'desc')->get();
    
        $students = Student::where('students.teacherId', '=', $teacherId)
          ->join('users', 'students.studentId', '=', 'users.id')
          ->get();
        return view('web.backend.teacher.attendance.advisory.create')->with([
          'students' => $students,
          'schoolYear' => $schoolYear,
          'sectionName' => $sectionName,
        ]);
        
    }
    
}
