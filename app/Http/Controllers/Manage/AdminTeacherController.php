<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\GradeLevel;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminTeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $adminId = auth()->user()->id;

        $teachers = Teacher::orderby('users.lastname', 'asc')
            ->where([
                'teachers.adminId' => $adminId,
                'users.role' => 2
            ])
//            ->where('users.role', 2)
            ->join('users', 'teachers.teacherId', '=', 'users.id')
            ->join('grade_levels', 'teachers.gradeLevelId', '=', 'grade_levels.id')
            ->join('sections', 'teachers.sectionId', '=', 'sections.id')
            ->get();
        $gradeLevel = GradeLevel::orderBy('gradeLevelName', 'asc')->get();
        $subjects = Subject::orderBy('subjectName', 'asc')->get();

        return view('web.backend.admin.users.teacher.index')
            ->with(['gradeLevel' => $gradeLevel, 'subjects' => $subjects, 'teachers' => $teachers,]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\RedirectResponse
     */


    public function create(Request $request)
    {
        /** Insert User */
        $user = new User();
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
        $address = new Address();
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


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
