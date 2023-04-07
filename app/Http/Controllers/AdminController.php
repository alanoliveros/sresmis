<?php

namespace App\Http\Controllers;

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
        $firstName = $request->firstName;
        $middleName = $request->middleName;
        $lastName = $request->lastName;
        $suffix = $request->suffix;
        $gender = $request->gender;
        $city = $request->city;
        $province = $request->province;
        $designation = $request->designation;
        $employeeNumber = $request->employeeNumber;
        $position = $request->position;
        $fundSource = $request->fundSource;
        $degree = $request->degree;
        $major = $request->major;
        $minor = $request->minor;
        $gradeLevelTaught = $request->gradeLevelTaught;
        // array subject subjectTaught[] need for each to specify
        $subjectTaught = $request->subjectTaught;
        $minPerWeek = $request->subjectTaught;
        $ancillary = $request->ancillary;
        
        

         foreach($subjectTaught as $key=>$sub)
         {
            // echo $sub.'<br>';
         }

    }
}
