<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\GradeLevel;
use App\Models\Section;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\User;
use App\Models\Address;

class AdminController extends Controller
{

    public function index(){
      return view('backend.admin.dashboard.dashboard');
    }
    public function teachers(){

      $adminId = auth()->user()->id;

      $teachers = Teacher::orderby('users.lastname', 'asc')
                          ->where('teachers.adminId', '=', $adminId)
                          ->where('users.role', '=', 2)
                          ->join('users','teachers.teacherId', '=', 'users.id')
                          ->join('grade_levels', 'teachers.gradeLevelId', '=', 'grade_levels.id')
                          ->join('sections', 'teachers.sectionId', '=', 'sections.id')
                          // ->select('articles.id','articles.title','articles.body','user.user_name', 'categories.category_name')
                          ->get();
      $gradeLevel = GradeLevel::orderBy('gradeLevelName', 'asc')->get();
      $subjects = Subject::orderBy('subjectName', 'asc')->get();
      return view('backend.admin.teachers.teachers')->with(
        [
          'gradeLevel' => $gradeLevel,
          'subjects' => $subjects,
          'teachers' => $teachers,
        ]
      );
    }

    // ADD TEACHER
    public function addTeacher(Request $request)
    {


      
        $email = $request->email;
        $password = Hash::make($request->password);
        $firstName = $request->firstName;
        $middleName = $request->middleName;
        $lastName = $request->lastName;
        $suffix = $request->suffix;
        $gender = $request->gender;

        // address
        $purok = $request->purok;
        $barangay = $request->barangay;
        $city = $request->city;
        $province = $request->province;
        $zipCode = $request->zipCode;


        // end of address
        $designation = $request->designation;
        $employeeNumber = $request->employeeNumber;
        $position = $request->position;
        $fundSource = $request->fundSource;
        $degree = $request->degree;
        $major = $request->major;
        $minor = $request->minor;
        $gradeLevelTaught = $request->gradeLevelTaught;
        // array subject subjectTaught[] need for each to specify
        $subjectTaught = implode(', ', $request->subjectTaught);
        $minPerWeek = $request->minPerWeek;
        $ancillary = $request->ancillary;
        $sectionTaught = $request->sectionTaught;
       
         


        $user = new User();
        $user->name = $firstName;
        $user->role = 2;
        $user->middleName = $middleName;
        $user->lastName = $lastName;
        $user->suffix = $suffix;
        $user->gender = $gender;
        $user->email = $email;
        $user->password = $password;
        $user->image = 'avatar.png';
        $teacherSave = $user->save();
        $teacherId = $user->id;

        // insert Address
         if($teacherSave){
          $address = new Address();
          $address->userId = $teacherId;
          $address->purok = $purok;
          $address->barangay = $barangay;
          $address->city = $city;
          $address->province = $province;
          $address->zipCode = $zipCode;
          $addressSave = $address->save();
          $addressId = $address->id;

        }

        // insert Teacher
        if($teacherSave){
          $teacher = new Teacher();
          $teacher->adminId = auth()->user()->id;
          $teacher->teacherId = $teacherId;
          $teacher->sectionId = $sectionTaught;
          $teacher->gradeLevelId = $gradeLevelTaught;
          $teacher->subjectId = $subjectTaught;
          $teacher->addressId = $addressId;
          $teacher->designation = $designation;
          $teacher->employeeNumber = $employeeNumber;
          $teacher->position = $position;
          $teacher->fundSource = $fundSource;
          $teacher->degree = $degree;
          $teacher->major = $major;
          $teacher->minor = $minor;
          $teacher->minor = $minor;
          $teacher->totalTeachingTimePerWeek = $minPerWeek;
          $teacher->numberOfAncillary = $ancillary;
          $teacherSave = $teacher->save();
        }

        if($teacherSave || $addressSave || $teacherSave){
          return redirect()->back()->with('success_added', 'Successfully added new record');   
        }
        else{
          return redirect()->back()->with('error', 'Something went wrong, Please try again!');   
        }

       
    }
    public function getSection(Request $request)
    {


      $getGradeLevelById = Section::where('gradeLevelId','=', $request->id)->get();
      return response()->json([
        'gradeLevel' => $getGradeLevelById,
    ]);
    }
}
