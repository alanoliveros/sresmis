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
use Carbon\Carbon;
class TeacherController extends Controller
{

    public function index(){
      return view('backend.teacher.dashboard.dashboard');
    }
    public function attendance(){

      $user = User::find(auth()->user()->id);
      
      $create = $user->created_at;
      // echo date("F d Y",strtotime($create));
      $numMonth = date("m", strtotime($create)); //ok ni
      $year = date("Y", strtotime($create)); //ok ni
  
      // echo date("F",strtotime($create));

    
      // $d=cal_days_in_month(0,$numMonth,$year); mas ok ni
      // echo "There was $d days in $ 1965.<br>";
      // $arr = range(1, Carbon::now()->month(12)->daysInMonth);

      // foreach($arr as $k){
      //       echo $k;
      // }

      
      $teacherId = auth()->user()->id;
    
      $sectionName = Teacher::join('sections','teachers.sectionId', '=', 'sections.id')
                              ->join('grade_levels','teachers.gradeLevelId', '=', 'grade_levels.id')
                              ->where('teachers.teacherId', '=', $teacherId)->first();


      $grades = GradeLevel::where('id','=', $sectionName->gradeLevelId)->first();
      $students = Student::where('students.teacherId' , '=', $teacherId)
                        ->join('users', 'students.studentId', '=', 'users.id')
                        ->get();

          return view('backend.teacher.attendance.attendance')->with([
            'section' =>$sectionName,
            'grades' =>$grades,
            'students' => $students,
          ]);
    }
    public function grades(){
          return view('backend.teacher.grades.grades');
    }
    public function students_information(){
          return view('backend.teacher.students_information.students_information');
    }
    public function advisory(){

      $teacherId = auth()->user()->id;
    
      $sectionName = Teacher::join('sections','teachers.sectionId', '=', 'sections.id')
                              ->join('grade_levels','teachers.gradeLevelId', '=', 'grade_levels.id')
                              ->where('teachers.teacherId', '=', $teacherId)->first();


      $grades = GradeLevel::where('id','=', $sectionName->gradeLevelId)->first();
      $students = Student::where('students.teacherId' , '=', $teacherId)
                        ->join('users', 'students.studentId', '=', 'users.id')
                        ->get();


      return view('backend.teacher.advisory.index')->with([
            'section' =>$sectionName,
            'grades' =>$grades,
            'students' => $students,
      ]);

    }
    public function addStudent(Request $request){

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

      $passwordFind = str_replace(' ', '',strtolower($lastName));

      $email = $studentLrn;
      $password = Hash::make($passwordFind.'1234');


      
    
        $user = new User();
        $user->name = $firstName;
        $user->role = 3;
        $user->middleName = $middleName;
        $user->lastName = $lastName;
        $user->suffix = $suffix;
        $user->gender = $gender;
        $user->email = $email;
        $user->password = $password;
        $user->gender = $gender;
        $user->birthdate = $birthdate;
        $user->age = $age;
        $user->image = 'avatar.png';
        $userSave = $user->save();
        $studentId = $user->id;

      if($userSave){
            $student = new Student();
            $student->adminId = $adminId->adminId;
            $student->teacherId = $teacherId;
            $student->studentId = $studentId;
            $student->lrn = $studentLrn;
            $student->sectionId = $adminId->sectionId;
            $student->gradeLevelId = $adminId->gradeLevelId;
            $student->mothertongue = $mothertongue;
            $student->ethnicgroup = $ethnicgroup;
            $student->religion = $religion;
            $student->save();

      }

      if($userSave){
            $address = new Address();
            $address->userId = $studentId;
            $address->purok = $purok;
            $address->barangay = $barangay;
            $address->city = $city;
            $address->province = $province;
            $address->zipCode = $zipCode;
            $address->save();

      }
      if($userSave){
            $parent = new ParentGuardian();
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
      }

      if($userSave){
        return redirect()->back()->with('success_added', 'Successfully added new record');   
      }
      else{
        return redirect()->back()->with('error', 'Something went wrong, Please try again!')->withInput();
      }
    }
    public function deleteStudent($id){
             User::where('id', $id)->delete();
             Student::where('studentId', $id)->delete();
             Address::where('userId', $id)->delete();
             ParentGuardian::where('studentId', $id)->delete();

             return redirect()->back()->with('deleted', 'Successfully deleted');   

    }



    public function sf9()
    {

            $session = Session::orderBy('school_year', 'desc')->get();
            $first_session = Session::orderBy('school_year', 'desc')->first();

            
          return view('backend.teacher.school-forms.school-form-9.school-form-9')
                 ->with([
                        'sessions' => $session,
                        'first_session' => $first_session,

                       ]);
    }
}
