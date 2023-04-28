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
use App\Models\ClassSchedule;

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

    public function manageSubjects()
    {
       $sections = Section::where('sections.adminId', '=', auth()->user()->id)->join('grade_levels', 'sections.gradeLevelId', 'grade_levels.id')->orderBy('grade_levels.gradeLevelName' , 'ASC')->get();
       $gradelevel = GradeLevel::orderBy('gradeLevelName', 'asc')->get();
       return view('backend.admin.subjects.index')->with([
        'sections' => $sections,
        'gradelevel' => $gradelevel,
       ]);
    }

    public function addsubjectByGradeLevel($name, $id){
      $gradelevel = GradeLevel::orderBy('gradeLevelName', 'asc')->get();
      $subject = Subject::where('gradeLevelId','=', $id)->get();
      
      return view('backend.admin.subjects.bygradelevel')->with([
        'name' => $name,
        'id' => $id,
        'gradelevel' => $gradelevel,
        'subjects' => $subject,
      ]);
    }

    public function add_subjectBygradeLevel(Request $request)
    {
       $request->validate([
        'subjectname' => 'required',
       ]);

       $gradeLevelId = $request->gradeLevelId;
       $subjectname = $request->subjectname;
       $description = $request->description;

      
       foreach($subjectname as $key=>$name){

        // echo $name.'<br>';
          $subject = new Subject();
          $subject->adminId = auth()->user()->id;
          $subject->gradeLevelId =  $gradeLevelId;
          $subject->subjectName =  $name;
          $subject->description =  $description[$key];
          $subject->save();
       }
        return redirect()->back()->with('success_added', 'Successfully added new record');   

    }
    public function manageSections()
    {
       $sections = Section::where('sections.adminId', '=', auth()->user()->id)->join('grade_levels', 'sections.gradeLevelId', 'grade_levels.id')->orderBy('grade_levels.gradeLevelName' , 'ASC')->get();
       $gradelevel = GradeLevel::orderBy('gradeLevelName', 'asc')->get();
       return view('backend.admin.sections.index')->with([
        'sections' => $sections,
        'gradelevel' => $gradelevel,

       ]);
    }
    public function create_section(Request $request)
    {
       $request->validate([
        'gradeLevel' => 'required',
        'sectionName' => 'required',
       ]);

       $section = new Section();
       $section->adminId = auth()->user()->id;
       $section->sectionName = $request->sectionName;
       $section->gradeLevelId = $request->gradeLevel;
       $section->save();

       return redirect()->back()->with('success_added', 'Successfully added new record');   

    }
    public function getSection(Request $request)
    {


      $getGradeLevelById = Section::where('gradeLevelId','=', $request->id)->get();
      return response()->json([
        'gradeLevel' => $getGradeLevelById,
      ]);
    }
    public function manage_class_schedules(){
      $gradelevel = GradeLevel::orderBy('gradeLevelName', 'asc')->get();
      return view('backend.admin.class-schedules.index')->with([
        'gradelevel' => $gradelevel,
      ]);
    }

    public function view_by_gradeLevel($name){
      $changeName = str_replace('-', ' ', $name);
      $gradeLevel = GradeLevel::where('gradeLevelName', '=', $changeName)->first();
      
      // echo $gradeLevel->gradeLevelName;
      $sections = Section::where('gradeLevelId', '=', $gradeLevel->id)->get();

      return view('backend.admin.class-schedules.by-section')->with([
        'sections' => $sections,
        'gradeLevelId' => $gradeLevel->id,

      ]);
    }

    public function view_by_section($sid, $gid){
  
      $section = Section::find($sid);
      $classSchedule = ClassSchedule::where('sectionId', '=', $gid)->get();
      $subjects = Subject::where('gradeLevelId','=', $gid)->get();
      $teachers = Teacher::where('teachers.adminId' ,'=', auth()->user()->id)->join('users','teachers.teacherId','users.id')->get();
      $schedules = ClassSchedule::where('class_schedules.sectionId','=',$sid)->join('subjects', 'class_schedules.subjectId', 'subjects.id')->orderBy('class_schedules.startTime', 'asc')->get();
      
      return view('backend.admin.class-schedules.section')->with([
        'section' => $section,
        'classSchedule' => $classSchedule,
        'subjects' =>  $subjects,
        'teachers' =>  $teachers,
        'schedules' => $schedules,
      ]);
// 
    }
    public function add_schedule_by_section(Request $request){

      $request->validate([
        'teacherId' => 'required',
        'scheduleDay' => 'required',
      ]);

      $days = array();
      foreach($request->scheduleDay as $day){
          $days[] = $day;
      }

      $schedule = new ClassSchedule();
      $schedule->sectionId = $request->sectionId;
      $schedule->subjectId = $request->subjectId;
      $schedule->teacherId = $request->teacherId;
      $schedule->startTime = $request->startTime;
      $schedule->endTime =   $request->endTime;
      $schedule->scheduleDay = implode(',' ,$days);
      $schedule->save();

      return redirect()->back()->with('success_added', 'Successfully added new record');   
    }
}
