<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\GradeLevel;
use App\Models\Section;
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

    public function create()
    {

    }

    public function store(Request $request)
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


    public function show($id)
    {
        $teacher = Teacher::with('user', 'address', 'section', 'gradeLevel')->findOrFail($id);
        // You can also fetch related data like user and address if needed
        // $user = $teacher->user;
        // $address = $teacher->address;

        return view('web.backend.admin.users.teacher.show', compact('teacher'));
    }


    public function edit($id)
    {
        $teacher = Teacher::findOrFail($id);
        $sections = Section::all();
        $gradeLevels = GradeLevel::all();

        return view('web.backend.admin.users.teacher.edit', compact('teacher', 'sections', 'gradeLevels'));
    }

    public function update(Request $request, $id)
    {
        $teacher = Teacher::findOrFail($id);

        /** Update User */
        $user = User::findOrFail($teacher->teacherId);
        $user->name = $request->firstName;
        $user->middleName = $request->middleName;
        $user->lastName = $request->lastName;
        $user->suffix = $request->suffix;
        $user->gender = $request->gender;

        // Validate and update email if not empty
        if (!empty($request->email)) {
            $user->email = $request->email;
        }

        if (!empty($request->password)) {
            $user->password = Hash::make($request->password);
        }
        $user->save();

        /** Update Address */
        $address = Address::findOrFail($teacher->addressId);
        $address->purok = $request->purok;
        $address->barangay = $request->barangay;
        $address->city = $request->city;
        $address->province = $request->province;
        $address->zipCode = $request->zipCode;
        $address->save();

        /** Update Teacher */
        $teacher->school_year = $request->schoolYear;
        $teacher->sectionId = $request->sectionTaught;
        $teacher->gradeLevelId = $request->gradeLevelTaught;
        $teacher->designation = $request->designation;
        $teacher->employeeNumber = $request->employeeNumber;
        $teacher->position = $request->position;
        $teacher->fundSource = $request->fundSource;
        $teacher->degree = $request->degree;
        $teacher->major = $request->major;
        $teacher->minor = $request->minor;
        $teacher->totalTeachingTimePerWeek = $request->minPerWeek;
        $teacher->numberOfAncillary = $request->ancillary;
        $teacher->save();

        return redirect()->back()->with('success_updated', 'Successfully updated record');
    }






    public function destroy($id)
    {
        $teacher = Teacher::findOrFail($id);

        // Delete associated user
        User::where('id', $teacher->teacherId)->delete();

        // Delete the teacher record
        $teacher->delete();

        return redirect()->back()->with('success_deleted', 'Successfully deleted record');
    }

}
