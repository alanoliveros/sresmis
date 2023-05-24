<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Teacher;
use App\Models\Section;
use App\Models\Session;
use App\Models\GradeLevel;
use App\Models\User;
use App\Models\Student;
use App\Models\Address;
use App\Models\ParentGuardian;
use App\Models\Subject;
use App\Models\ClassSchedule;
use App\Models\LearningModality;
use App\Models\Enrollment;
use App\Models\QuarterlyGrading;
use Carbon\Carbon;

class TeacherController extends Controller
{

  public function index()
  {
    $teacher = Teacher::where('teacherId', auth()->user()->id)->first();
    $students = Student::where([
      'sectionId' => $teacher->sectionId,
      'school_year' => $teacher->school_year,
    ])->get();
    
    return view('web.backend.teacher.dashboard.index',[
      'teacher' => $teacher,
      'students' => $students,
    ]);
  }

  public function attendance()
  {

    $user = User::find(auth()->user()->id);
    $create = $user->created_at;
    // echo date("F d Y",strtotime($create));
    $numMonth = date("m", strtotime($create)); //ok ni
    $year = date("Y", strtotime($create)); //ok ni
    $teacherId = auth()->user()->id;
    $sessions = Session::orderBy('school_year', 'desc')->get();

    $sectionName = Teacher::join('sections', 'teachers.sectionId', '=', 'sections.id')
      ->join('grade_levels', 'teachers.gradeLevelId', '=', 'grade_levels.id')
      ->where('teachers.teacherId', '=', $teacherId)->first();

    $grades = GradeLevel::where('id', '=', $sectionName->gradeLevelId)->first();

    $students = Student::where('students.teacherId', '=', $teacherId)
      ->join('users', 'students.studentId', '=', 'users.id')
      ->get();

    return view('backend.teacher.attendance.attendance')->with([
      'section' => $sectionName,
      'grades' => $grades,
      'sessions' => $sessions,
      'students' => $students,
    ]);
  }

  public function create_attendance(Request $request)
  {

    // $date = $request->attendance_date;
    // $sessionId = $request->school_year;
    // $female = $request->status_student_attendance_female;
    // $male = $request->status_student_attendance_male;
    // $teacherId = auth()->user()->id;

    // $teacher_detail = Teacher::where('teacherId', $teacherId)->first();

    // foreach ($male as $key => $status) {
    //   $attendance = new DailyAttendance();

    //   $attendance->adminId = $teacher_detail->adminId;
    //   $attendance->teacherId = $teacherId;
    //   $attendance->gradeLevelId = $teacher_detail->gradeLevelId;
    //   $attendance->sectionId = $teacher_detail->sectionId;
    //   $attendance->studentId = $key;
    //   $attendance->sessionId = $sessionId;
    //   $attendance->date = $date;
    //   $attendance->status = $status;
    //   $attendance->save();
    // }

    // // $user = DailyAttendance::firstOrNew(['email' => $email]);

    // foreach ($female as $key => $status) {
    //   $attendance = new DailyAttendance();
    //   $attendance->adminId = $teacher_detail->adminId;
    //   $attendance->teacherId = $teacherId;
    //   $attendance->gradeLevelId = $teacher_detail->gradeLevelId;
    //   $attendance->sectionId = $teacher_detail->sectionId;
    //   $attendance->studentId = $key;
    //   $attendance->sessionId = $sessionId;
    //   $attendance->date = $date;
    //   $attendance->status = $status;
    //   $attendance->save();
    //   // echo $status;
    // }
    // return redirect()->back()->with('success_added', 'Successfully added new record');
  }



  public function grades()
  {

    $sectionTaughtBy = Teacher::where('teacherId', '=', auth()->user()->id)->first();

    $class_schedules = ClassSchedule::where('class_schedules.teacherId', '=', auth()->user()->id)->join('subjects', 'class_schedules.subjectId', 'subjects.id')->get();


    $teacherId = auth()->user()->id;
    $sectionName = Teacher::join('sections', 'teachers.sectionId', '=', 'sections.id')
      ->join('grade_levels', 'teachers.gradeLevelId', '=', 'grade_levels.id')
      ->where('teachers.teacherId', '=', $teacherId)
      ->first();
    $adminId = $sectionName->adminId;
    $schoolYear = Session::where('adminId', '=', $adminId)->orderBy('school_year', 'desc')->get();

    return view('backend.teacher.grades.grades')->with([

      'sectionName' => $sectionName,
      'schoolYear' => $schoolYear,
      'class_schedules' => $class_schedules,
    ]);
  }

  public function filterGrades(Request $request)
  {

    $teacherId = auth()->user()->id;

    $sectionName = Teacher::join('sections', 'teachers.sectionId', '=', 'sections.id')
      ->join('grade_levels', 'teachers.gradeLevelId', '=', 'grade_levels.id')
      ->where('teachers.teacherId', '=', $teacherId)->first();

    $year = $request->getYear;
    $subject = $request->getSubject;

    $subjectselect = Subject::find($subject);
    $yearselect = Session::find($year);

    return view('backend.teacher.grades.filter-grades')->with([
      'sectionName' => $sectionName,
      'yearselect' => $yearselect,
      'subjectselect' => $subjectselect,
    ]);
  }

  public function students_information()
  {
    return view('backend.teacher.students_information.students_information');
  }

  public function advisory()
  {

    $teacherId = auth()->user()->id;

    $section = Teacher::join('sections', 'teachers.sectionId', '=', 'sections.id')
      ->join('grade_levels', 'teachers.gradeLevelId', '=', 'grade_levels.id')
      ->where('teachers.teacherId', '=', $teacherId)->first();

    $grades = GradeLevel::where('id', '=', $section->gradeLevelId)->first();


    $students = Student::where('students.teacherId', '=', $teacherId)
      ->join('users', 'students.studentId', '=', 'users.id')
      ->orderBy('users.lastname', 'asc')
      ->get();
    $sessions = Session::orderBy('school_year', 'desc')->get();
    $learnings = LearningModality::orderBy('id', 'asc')->get();

    return view('web.backend.teacher.students.admission-advisory.index')->with([
      'section' => $section,
      'grades' => $grades,
      'students' => $students,
      'sessions' => $sessions,
      'learnings' => $learnings,
    ]);
  }
  public function student_advisory_by_school_year($id)
  {
    $students = Student::where([
      'students.school_year' => $id,
      'students.teacherId' => auth()->user()->id,
    ])
      ->orderBy('users.lastname', 'asc')
      ->join('users', 'students.studentId', 'users.id')
      ->join('addresses', 'students.studentId', 'addresses.userId')
      ->join('parent_guardians', 'students.studentId', 'parent_guardians.studentId')
      ->get();
    return response()->json(['students' => $students]);
  }
  public function info_by_subject()
  {
    $teacher_id = auth()->user()->id;
    $subjects = ClassSchedule::where([
      'class_schedules.teacherId' => $teacher_id,
    ])->join('users', 'class_schedules.teacherId', 'users.id')
      ->join('subjects', 'class_schedules.subjectId', 'subjects.id')
      ->get();
    $sessions = Session::orderBy('school_year', 'desc')->get();
    return view('web.backend.teacher.students.admission-subject.index')->with([
      'subjects' => $subjects,
      'sessions' => $sessions,
    ]);
  }
  public function filter_info_by_subject(Request $request)
  {
    $subject_id = $request->sub_id;
    $sy_id = $request->sy_id;
    $class_sched = ClassSchedule::where([
      'subjectId' => $subject_id,
      'teacherId' => auth()->user()->id,
    ])->first();
    $section_id = $class_sched->sectionId;



    $students = Student::where([
      'sectionId' => $section_id,
      'teacherId' => auth()->user()->id,
      'school_year' => $sy_id,
    ])
      ->join('users', 'students.studentId', 'users.id')
      ->get();



    return response()->json([
      'students' => $students,
    ]);
  }
  public function student_grades()
  {
    $teacher_detail = Teacher::where('teacherId', auth()->user()->id)->first();
    $sessions = Session::orderBy('school_year', 'desc')->get();
    $subjects = Subject::where([
      'subjects.gradeLevelId' => $teacher_detail->gradeLevelId
    ])
      ->get();
    $quarterlygrading = QuarterlyGrading::orderBy('quarter_name', 'asc')->get();

    return view('web.backend.teacher.students.student-grades.index')->with([
      'sessions' => $sessions,
      'subjects' => $subjects,
      'quarterlygrading' => $quarterlygrading
    ]);
  }
  public function grades_advisory_by_school_year()
  {
    return view('web.backend.teacher.students.grade-advisory.grades-by-school-year');
  }
  public function create_student(Request $request)
  {

    try {
      $school_year = $request->schoolYearId;
      $studentLrn = $request->studentLrn;
      $firstName = $request->firstName;
      $middleName = $request->middleName;
      $lastName = $request->lastName;
      $suffix = $request->suffix;
      $gender = $request->gender;
      $birthdate = $request->birthdate;
      $age = $request->age;

      // student info
      $mothertongue = $request->mothertongue;
      $ethnicgroup = $request->ethnicgroup;
      $religion = $request->religion;

      // Address
      $purok = $request->purok;
      $barangay = $request->barangay;
      $city = $request->city;
      $province = $request->province;
      $zipCode = $request->zipCode;

      // parent guardian
      $fathersFirstName = $request->fathersFirstName;
      $fathersMiddleName = $request->fathersMiddleName;
      $fathersLastName = $request->fathersLastName;
      $fathersSuffix = $request->fathersSuffix;

      $mothersFirstName = $request->mothersFirstName;
      $mothersMiddleName = $request->mothersMiddleName;
      $mothersLastName = $request->mothersLastName;
      $mothersSuffix = $request->mothersSuffix;

      $guardiansFirstName = $request->guardiansFirstName;
      $guardiansMiddleName = $request->guardiansMiddleName;
      $guardiansLastName = $request->guardiansLastName;
      $guardiansSuffix = $request->guardiansSuffix;
      $relationship = $request->relationship;
      $contactNumber = $request->contactNumber;

      $teacherId = auth()->user()->id;
      $adminId = Teacher::where('teacherId', '=', $teacherId)->first();

      $passwordFind = str_replace(' ', '', strtolower($lastName));

      $email = $studentLrn;
      $password = Hash::make($passwordFind . '1234');

      $user = User::firstOrNew(['email' => $email]);
      /**$user = new User();*/
      $user->name = $firstName;
      $user->role = 3;
      $user->middleName = $middleName;
      $user->lastName = $lastName;
      $user->suffix = $suffix;
      $user->email = $email;
      $user->password = $password;
      /**$user->gender = $gender;*/
      $user->gender = $gender;
      $user->birthdate = $birthdate;
      $user->age = $age;
      $user->image = 'avatar.png';
      $userSave = $user->save();
      $studentId = $user->id;


      $student = Student::firstOrNew(['studentId' => $studentId, 'school_year' => $school_year, 'lrn' => $studentLrn]);
      $student->adminId = $adminId->adminId;
      $student->teacherId = $teacherId;
      $student->studentId = $studentId;
      $student->school_year = $school_year;
      $student->lrn = $studentLrn;
      $student->sectionId = $adminId->sectionId;
      $student->gradeLevelId = $adminId->gradeLevelId;
      $student->mothertongue = $mothertongue;
      $student->ethnicgroup = $ethnicgroup;
      $student->religion = $religion;
      $student->learning_modality = $request->learning_mode;
      $student->save();

      $address = Address::firstOrNew(['userId' => $studentId]);
      $address->userId = $studentId;
      $address->purok = $purok;
      $address->barangay = $barangay;
      $address->city = $city;
      $address->province = $province;
      $address->zipCode = $zipCode;
      $address->save();

      $parent = ParentGuardian::firstOrNew(['studentId' => $studentId]);
      $parent->adminId = $adminId->adminId;
      $parent->teacherId = $teacherId;
      $parent->studentId = $studentId;

      $parent->fathersFirstName = $fathersFirstName;
      $parent->fathersMiddleName = $fathersMiddleName;
      $parent->fathersLastName = $fathersLastName;
      $parent->fathersSuffix = $fathersSuffix;

      $parent->mothersFirstName = $mothersFirstName;
      $parent->mothersMiddleName = $mothersMiddleName;
      $parent->mothersLastName = $mothersLastName;
      $parent->mothersSuffix = $mothersSuffix;

      $parent->guardiansFirstName = $guardiansFirstName;
      $parent->guardiansMiddleName = $guardiansMiddleName;
      $parent->guardiansLastName = $guardiansLastName;
      $parent->guardiansSuffix = $guardiansSuffix;

      $parent->relationshiptoStudent = $relationship;
      $parent->contactNumber = $contactNumber;
      $parent->save();


      $teacher_detail = Teacher::where('teacherId', auth()->user()->id)->first();

      $enrollment = Enrollment::firstOrNew([
        'school_year' => $request->schoolYearId,
        'student_id' => $studentId,
        'lrn' => $studentLrn,
      ]);
      $enrollment->lrn = $studentLrn;
      $enrollment->student_id = $studentId;
      $enrollment->first_name = $request->firstName;
      $enrollment->middle_name = $request->middleName;
      $enrollment->last_name = $request->lastName;
      $enrollment->suffix = $request->suffix;
      $enrollment->date_of_birth = $request->birthdate;
      $enrollment->gender = $request->gender;
      $enrollment->purok = $request->purok;
      $enrollment->barangay = $request->barangay;
      $enrollment->city = $request->city;
      $enrollment->province = $request->province;
      $enrollment->grade_level_id = $request->gradeLevelId;
      $enrollment->section_id = $teacher_detail->sectionId;
      $enrollment->teacher_id = auth()->user()->id;
      $enrollment->school_year = $request->schoolYearId;
      $enrollment->enrollment_status = $request->enrollment_status == 1 ? 1 : 2; // You can set this value accordingly
      // $enrollment->date_enrolled = $request->enrollment_status == 1? now():null; // You can set this value accordingly
      // $enrollment->date_dropped = null; // You can set this value accordingly
      // $enrollment->date_transferred_in = $request->enrollment_status == 1? now():null; // You can set this value accordingly
      // $enrollment->date_transferred_out = null; // You can set this value accordingly
      // $enrollment->academic_status = null; // You can set this value accordingly



      if ($request->enrollment_status == 1) {
        $enrollment->date_enrolled = now();
      } else {
        $enrollment->date_transferred_in = now();
      }
      $enrollment->save();

      return redirect()->back()->with('success_added', 'Successfully added new record');
    } catch (\Exception $e) {
      echo 'error';  // return redirect()->back()->with('error', 'Failed to save the record. Please try again.');
    }
  }

  public function delete_student($id)
  {
    User::where('id', $id)->delete();
    Student::where('studentId', $id)->delete();
    Address::where('userId', $id)->delete();
    ParentGuardian::where('studentId', $id)->delete();

    return redirect()->back()->with('deleted', 'Successfully deleted');
  }

  public function class_schedule()
  {
  }
  public function filter_section(Request $request)
  {
    $sy = $request->sy_id;
    $sub_id = $request->sub_id;
    $sections = ClassSchedule::where([
      'class_schedules.subjectId' => $sub_id,
      'class_schedules.school_year' => $sy,
      'class_schedules.teacherId' => auth()->user()->id,
    ])
      ->join('sections', 'class_schedules.sectionId', 'sections.id')
      ->get();


    $sectionArr = array();
    foreach ($sections as $sec) {
      $sectionArr[$sec->sectionId] = $sec->sectionName;
    }

    return response()->json([
      'sections' => $sectionArr
    ]);
  }
  public function filter_student_by_subject(Request $request)
  {
    $sy = $request->sy;
    $sub_id = $request->sub_id;
    $sec_id = $request->sec_id;

    $students = Student::where([
      'students.teacherId' => auth()->user()->id,
      'students.school_year' => $sy,
      'students.sectionId' => $sec_id,
    ])
      ->join('users', 'students.studentId', 'users.id')
      ->get();

    $subject = Subject::find($sub_id);

    return response()->json([
      'students' => $students,
      // 'subject' => $subject,
    ]);
  }
  public function update(Request $request)
  {
    $data = $request->data['studentId'];

    // try {

      // Update the student record with the new values

      $user = User::findOrFail($request->data['studentId']);
      $user->name = $request->data['name'];
      $user->middlename = $request->data['middlename'];
      $user->lastname = $request->data['lastname'];
      $user->suffix = $request->data['suffix'];
      $user->gender = $request->data['gender'];
      $user->birthdate = $request->data['birth_date'];
      $user->age = $request->data['age'];
      $user->email = $request->data['lrn'];
      $user->save();

      $student = Student::where('studentId', $request->data['studentId'])->first();  
      $student->school_year = $request->data['school_year'];
      $student->lrn = $request->data['lrn'];
      // $student->mothertongue = $request->data['mothertongue'];
      $student->ethnicgroup = $request->data['ethnicgroup'];
      $student->religion = $request->data['religion'];
      // $student->learning_modality = $request->data['learning_modality'];
      // $student->enrollment_status = $request->data['enrollment_status'];
      $student->save();

      
      $address = Address::where('userId', $request->data['studentId']);  
      $student->purok = $request->data['purok'];
      $student->barangay = $request->data['barangay'];
      $student->city = $request->data['city'];
      $student->province = $request->data['province'];
      $student->zipcode = $request->data['zipcode'];
      


      $parentGuardian = ParentGuardian::where('studentId',$request->data['studentId'])->first();

      $parentGuardian->fathersFirstName = $request->data['fathersFirstName'];
      $parentGuardian->fathersMiddleName = $request->data['fathersMiddleName'];
      $parentGuardian->fathersLastName = $request->data['fathersLastName'];
      $parentGuardian->fathersSuffix = $request->data['fathersSuffix'];
      $parentGuardian->mothersFirstName = $request->data['mothersFirstName'];
      $parentGuardian->mothersMiddleName = $request->data['mothersMiddleName'];
      $parentGuardian->mothersLastName = $request->data['mothersLastName'];
      $parentGuardian->mothersSuffix = $request->data['mothersSuffix'];
      $parentGuardian->guardiansFirstName = $request->data['guardiansFirstName'];
      $parentGuardian->guardiansMiddleName = $request->data['guardiansMiddleName'];
      $parentGuardian->guardiansLastName = $request->data['guardiansLastName'];
      $parentGuardian->guardiansSuffix = $request->data['guardiansSuffix'];
      // $parentGuardian->relationshiptoStudent = $request->data['relationshiptoStudent'];
      // $parentGuardian->contactNumber = $request->data['contactNumber'];
      $parentGuardian->save();


      $teacher_detail = Teacher::where('teacherId', auth()->user()->id)->first();
      $enrollment = Enrollment::where('student_id',$request->data['studentId'])->first();
      $enrollment->adminId = $teacher_detail->adminId;
      $enrollment->lrn = $request->data['lrn'];
      $enrollment->first_name =$request->data['name'];
      $enrollment->middle_name = $request->data['middlename'];
      $enrollment->last_name = $request->data['lastname'];
      $enrollment->suffix = $request->data['suffix'];
      $enrollment->date_of_birth = $request->data['birth_date'];
      $enrollment->gender = $request['gender'];
      $enrollment->purok = $request['purok'];
      $enrollment->barangay = $request['barangay'];
      $enrollment->city = $request['city'];
      $enrollment->school_year = $request->data['school_year'];
      $enrollment->enrollment_status = $request['enrollment_status'] == 1 ? 1 : 2;
      if ($request['enrollment_status'] == 1) {
        $enrollment->date_enrolled = now();
      } else {
        $enrollment->date_transferred_in = now();
      }
      $enrollment->save();
     

      return response()->json([
        'success_added' =>'Successfully updated the record'
      ]);
    // } catch (\Exception $e) {
    //   return response()->json([
    //     'error' =>'Erro occur'
    //   ]);
    // }
    




















    return response()->json([
      'data' => $data,
    ]);
  }
  public function delete(Request $request)
  {
    $student_id = $request->student_id;

    User::findOrFail($student_id)->delete();
    Student::where('studentId', $student_id)->delete();
    ParentGuardian::where('studentId', $student_id)->delete();
    Address::where('userId', $student_id)->delete();
    Enrollment::where('student_id', $student_id)->delete();




    return response()->json([
      'success' => 'Successfully deleted the record'
      // 'subject' => $subject,
    ]);
  }
}
