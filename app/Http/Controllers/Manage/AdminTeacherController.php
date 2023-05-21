<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\GradeLevel;
use App\Models\Session;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminTeacherController extends Controller
{
    public function index()
    {
        $adminId = auth()->user()->id;

        $teachers = Teacher::where([
            'teachers.adminId' => $adminId,
            'users.role' => 2
        ])
            ->join('users',
                'teachers.teacherId', '=', 'users.id')
            ->join('grade_levels',
                'teachers.gradeLevelId', '=', 'grade_levels.id')
            ->join('sections',
                'teachers.sectionId', '=', 'sections.id')

            ->orderBy('grade_levels.gradeLevelName', 'asc')
            ->get();

        $gradeLevel = GradeLevel::orderBy('gradeLevelName', 'asc')->get();
        $subjects = Subject::orderBy('subjectName', 'asc')->get();
        $sessions = Session::orderBy('school_year', 'desc')->get();


        /*foreach ($teachers as $teacher) {
            echo $teacher->teacherId.' '.$teacher->name .' '. $teacher->gradeLevelName .' '. $teacher->sectionName . '<br>';
        }*/

        return view('web.backend.admin.users.teacher.index')
            ->with([
                'teachers' => $teachers,
                'sessions' => $sessions,
                'gradeLevel' => $gradeLevel,
                'subjects' => $subjects,
            ]);
    }


    public function create(Request $request)
    {
        /** Insert User */
        $user = User::firstOrNew(['email' => $request->email]);
        $user->name = $request->firstName;
        $user->role = 2;
        $user->middleName = $request->middleName;
        $user->lastName = $request->lastName;
        $user->suffix = $request->suffix;
        $user->gender = $request->gender;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->image = 'avatar.png';
        $user->save();
        $teacherId = $user->id;

        /** Insert Address */
        $address = Address::firstOrNew(['userId' => $teacherId]);
        $address->userId = $teacherId;
        $address->purok = $request->purok;
        $address->barangay = $request->barangay;
        $address->city = $request->city;
        $address->province = $request->province;
        $address->zipCode = $request->zipCode;
        $address->save();
        $addressId = $address->id;

        /** Insert Teacher */
        $teacher = new Teacher();
        $teacher->adminId = auth()->user()->id;
        $teacher->teacherId = $teacherId;
        $teacher->school_year = $request->schoolYear;
        $teacher->sectionId = $request->sectionTaught;
        $teacher->gradeLevelId = $request->gradeLevelTaught;
        $teacher->addressId = $addressId;
        $teacher->designation = $request->designation;
        $teacher->employeeNumber = $request->employeeNumber;
        $teacher->position = $request->position;
        $teacher->fundSource = $request->fundSource;
        $teacher->degree = $request->degree;
        $teacher->major = $request->major;
        $teacher->minor = $request->minor;
        $teacher->totalTeachingTimePerWeek = $request->minPerWeek;;
        $teacher->numberOfAncillary = $request->ancillary;
        $teacher->save();

        return redirect()->back()->with('success_added', 'Successfully added new record');
    }



    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }

    public function teachers()
    {

        $adminId = auth()->user()->id;

        $teachers = Teacher::orderby('users.lastname', 'asc')
            ->where('teachers.adminId', '=', $adminId)
            ->where('users.role', '=', 2)
            ->join('users', 'teachers.teacherId', '=', 'users.id')
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

        $purok = $request->purok;
        $barangay = $request->barangay;
        $city = $request->city;
        $province = $request->province;
        $zipCode = $request->zipCode;

        $designation = $request->designation;
        $employeeNumber = $request->employeeNumber;
        $position = $request->position;
        $fundSource = $request->fundSource;
        $degree = $request->degree;
        $major = $request->major;
        $minor = $request->minor;
        $gradeLevelTaught = $request->gradeLevelTaught;

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

        if ($teacherSave) {
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

        if ($teacherSave) {
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
            $teacher->totalTeachingTimePerWeek = $minPerWeek;
            $teacher->numberOfAncillary = $ancillary;
            $teacherSave = $teacher->save();
        }

        if ($teacherSave || $addressSave || $teacherSave) {
            return redirect()->back()->with('success_added', 'Successfully added new record');
        } else {
            return redirect()->back()->with('error', 'Something went wrong, Please try again!');
        }
    }



}
