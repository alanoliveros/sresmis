<?php

namespace App\Http\Controllers\Attendance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Session;
use App\Models\DailyAttendance;
use Illuminate\Support\Facades\Validator;
use App\Models\School;


class StudentAttendance extends Controller
{
  public function advisory_index()
  {
    $teacher_detail = Teacher::where('teacherId', auth()->user()->id)->first();
    $secionTaught = $teacher_detail->sectionId;


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
    $month = $f_date[1];


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
          'month' => $f_date[1],
        ]);

        $attendance->adminId = $teacher_detail->adminId;
        $attendance->teacherId = auth()->user()->id;
        $attendance->gradeLevelId = $request->gradeLevelId;
        $attendance->sectionId = $request->sectionId;
        $attendance->studentId = $studentId;
        $attendance->school_year = $school_year;
        $attendance->date = $request->attendance_date;
        $attendance->status = $status;
        $attendance->month = $month;
        $attendance->save();
      }

      foreach ($statusStudentAttendanceFemale as $studentId => $status) {
        $attendance = DailyAttendance::firstOrNew([
          'studentId' => $studentId,
          'school_year' => $school_year,
          'teacherId' => auth()->user()->id,
          'gradeLevelId' => $request->gradeLevelId,
          'date' => $request->attendance_date,
          'month' => $f_date[1],
        ]);

        $attendance->adminId = $teacher_detail->adminId;
        $attendance->teacherId = auth()->user()->id;
        $attendance->gradeLevelId = $request->gradeLevelId;
        $attendance->sectionId = $request->sectionId;
        $attendance->studentId = $studentId;
        $attendance->school_year = $school_year;
        $attendance->date = $request->attendance_date;
        $attendance->status = $status;
        $attendance->month = $month;
        $attendance->save();
      }


      return redirect()->back()->with('success', 'Attendance saved successfully');
    } else {
      return redirect()->back()->with('error', 'School year and date did not match');
    }



    // Add any additional logic or redirect as needed

    // Example redirect to a route
    // return redirect()->route('attendance.index')->with('success', 'Attendance saved successfully');
  }
  public function filter_attendance(Request $request)
  {

    $validator = Validator::make($request->all(), [
      'date' => 'required',
    ]);

    if ($validator->fails()) {
      return response()->json([
        'response' => 'error'
      ]);
    }

    $teacher_detail = Teacher::where('teacherId', auth()->user()->id)->first();

    $attendance = DailyAttendance::where([
      'teacherId' => auth()->user()->id,
      'date' =>  $request->date,
      'sectionId' =>  $teacher_detail->sectionId,
      'gradeLevelId' =>  $teacher_detail->gradeLevelId,
    ])
      ->join('users', 'daily_attendances.studentId', 'users.id')
      ->get();

    return response()->json([
      'response' => $attendance,
    ]);
  }

  // by subject
  public function subject_index()
  {
    $students = 'Subject';
    return view('web.backend.teacher.attendance.subject.index', [
      'students' => $students,
    ]);
  }
}