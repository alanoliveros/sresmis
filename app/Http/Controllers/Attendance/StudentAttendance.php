<?php

namespace App\Http\Controllers\Attendance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Session;
use App\Models\DailyAttendance;
use App\Models\School;


class StudentAttendance extends Controller
{
  public function advisory_index()
  {
    $teacher_detail = Teacher::where('teacherId', auth()->user()->id)->first();
    $secionTaught = $teacher_detail->sectionId;




    // $students = Student::where('students.sectionId', $secionTaught)
    // ->join('users as u', 'students.studentId', 'u.id')
    // ->join('daily_attendances as da', 'students.studentId', 'da.studentId')
    // ->select('students.*', 'u.name as user_name', 'da.status as attendance_status')
    // ->get();

    $students = Student::where('students.sectionId', $secionTaught)
    ->join('users as u', 'students.studentId', 'u.id')
    ->join('daily_attendances as da', 'students.studentId', 'da.studentId')
    ->select('students.*', 'u.name as user_name', 'da.status as attendance_status')
    ->get();

    


    return view('web.backend.teacher.attendance.advisory.index', [
      'students' => $students,
    ]);
  }
  public function create_attendance()
  {
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

  public function save_attendance(Request $request)
  {
    $statusStudentAttendanceMale = $request->input('status_student_attendance_male');
    $statusStudentAttendanceFemale = $request->input('status_student_attendance_female');
    $teacher_detail = Teacher::where('teacherId', auth()->user()->id)->first();
    $school = School::where('adminId', $teacher_detail->adminId)->first();
    $school_year = $request->school_year;
    $sy = str_replace('-', ', ', $school_year);
    $explode_sy = explode(",", $sy);

    $date = date("d, M, Y", strtotime($request->attendance_date));
    $f_date = explode(",", $date);

    if (in_array($f_date[2], $explode_sy)) {
      // Save the attendance


      // Redirect to a success page
     
      // Process male students' attendance

      foreach ($statusStudentAttendanceMale as $studentId => $status) {
        $attendance = DailyAttendance::firstOrNew([
            'studentId' => $studentId,
            'school_year' => $school_year,
            'teacherId' => auth()->user()->id,
            'gradeLevelId' => $request->gradeLevelId,
            'date' => $request->attendance_date,
        ]);
    
        $attendance->adminId = $teacher_detail->adminId;
        $attendance->teacherId = auth()->user()->id;
        $attendance->gradeLevelId = $request->gradeLevelId;
        $attendance->sectionId = $request->sectionId;
        $attendance->studentId = $studentId;
        $attendance->school_year = $school_year;
        $attendance->date = $request->attendance_date;
        $attendance->status = $status;
        $attendance->save();
    }
    
    foreach ($statusStudentAttendanceFemale as $studentId => $status) {
        $attendance = DailyAttendance::firstOrNew([
            'studentId' => $studentId,
            'school_year' => $school_year,
            'teacherId' => auth()->user()->id,
            'gradeLevelId' => $request->gradeLevelId,
            'date' => $request->attendance_date,
        ]);
    
        $attendance->adminId = $teacher_detail->adminId;
        $attendance->teacherId = auth()->user()->id;
        $attendance->gradeLevelId = $request->gradeLevelId;
        $attendance->sectionId = $request->sectionId;
        $attendance->studentId = $studentId;
        $attendance->school_year = $school_year;
        $attendance->date = $request->attendance_date;
        $attendance->status = $status;
        $attendance->save();
    }
    

      return redirect()->back()->with('success', 'Attendance saved successfully');
    } else {
      // Redirect back with an error message
      // return redirect()->back()->with('error', 'Invalid school year');
      echo 'error';
    }









    // echo $f_date[2];
    // Process male students' attendance
    // foreach ($statusStudentAttendanceMale as $studentId => $status) {
    //   $attendance = new DailyAttendance();
    //   $attendance->studentId = $studentId;
    //   $attendance->status = $status;
    //   $attendance->save();
    // }
    // // Process female students' attendance
    // foreach ($statusStudentAttendanceFemale as $studentId => $status) {
    //   $attendance = new DailyAttendance();
    //   $attendance->studentId = $studentId;
    //   $attendance->status = $status;
    //   $attendance->save();

    // }

    // Add any additional logic or redirect as needed

    // Example redirect to a route
    // return redirect()->route('attendance.index')->with('success', 'Attendance saved successfully');
  }
}
