<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\GradeLevel;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminStudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $students = Student::where('students.adminId', auth()->user()->id)
            ->join('users', 'students.studentId', 'users.id')
            ->get();

        return view('web.backend.admin.users.student.index', [
            'students' => $students,
        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create(Request $request)
    {
        /** Insert User */
        $user = User::firstOrNew(['email' => $request->email]);
        $user->name = $request->firstName;
        $user->role = 3;
        $user->middleName = $request->middleName;
        $user->lastName = $request->lastName;
        $user->suffix = $request->suffix;
        $user->gender = $request->gender;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->image = 'avatar.png';
        $user->save();
        $studentId = $user->id;

        /** Insert Address */
        $address = Address::firstOrNew(['userId' => $studentId]);
        $address->userId = $studentId;
        $address->purok = $request->purok;
        $address->barangay = $request->barangay;
        $address->city = $request->city;
        $address->province = $request->province;
        $address->zipCode = $request->zipCode;
        $address->save();

        /** Insert Student */
        $student = new Student();
        $student->adminId = auth()->user()->id;
        $student->studentId = $studentId;
        $student->school_year = $request->schoolYear;
        $student->lrn = $request->lrn;
        $student->sectionId = $request->section;
        $student->gradeLevelId = $request->gradeLevel;
        $student->mothertongue = $request->mothertongue;
        $student->ethnicgroup = $request->ethnicgroup;
        $student->religion = $request->religion;
        $student->learning_modality = $request->learning_modality;
        $student->remarks = $request->remarks;
        $student->status = $request->status;
        $student->save();
        $student->id;

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
