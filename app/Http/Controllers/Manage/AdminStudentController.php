<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Enrollment;
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
        $enrollments = Enrollment::where('enrollments.adminId', auth()->user()->id)
            ->get();
        $sessions = DB::table('sessions')
            ->orderBy('sessions.school_year', 'desc')
            ->get();
        $grade_levels = GradeLevel::orderBy('gradeLevelName', 'asc')->get();

        return view('web.backend.admin.users.student.index', [
            'enrollments' => $enrollments,
            'sessions' => $sessions,
            'grade_levels' => $grade_levels,
        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */

    public function getStudentsFilterBySchoolYear(Request $request)
    {

        $enrollments = Enrollment::where([
            'enrollments.adminId' => auth()->user()->id,
            'enrollments.school_year' => $request->select_sy,
        ])
            ->get();
        return response()->json([
            'students' => $enrollments,
        ]);
    }

    public function getStudentsBySchoolYearAndGradeLevel(Request $request)
    {
        $enrollments = Enrollment::where([
            'enrollments.adminId' => auth()->user()->id,
            'enrollments.school_year' => $request->select_sy,
            'enrollments.grade_level_id' => $request->grade_level_id,
        ])
            ->get();
        return response()->json([
            'students' => $enrollments,
        ]);
    }

    public function create(Request $request)
    {
        //        /** Insert User */
//        $user = User::firstOrNew(['email' => $request->email]);
//        $user->name = $request->firstName;
//        $user->role = 3;
//        $user->middleName = $request->middleName;
//        $user->lastName = $request->lastName;
//        $user->suffix = $request->suffix;
//        $user->gender = $request->gender;
//        $user->email = $request->email;
//        $user->password = Hash::make($request->password);
//        $user->image = 'avatar.png';
//        $user->save();
//        $studentId = $user->id;
//
//        /** Insert Address */
//        $address = Address::firstOrNew(['userId' => $studentId]);
//        $address->userId = $studentId;
//        $address->purok = $request->purok;
//        $address->barangay = $request->barangay;
//        $address->city = $request->city;
//        $address->province = $request->province;
//        $address->zipCode = $request->zipCode;
//        $address->save();
//
//        /** Insert Student */
//        $student = new Student();
//        $student->adminId = auth()->user()->id;
//        $student->studentId = $studentId;
//        $student->school_year = $request->schoolYear;
//        $student->lrn = $request->lrn;
//        $student->sectionId = $request->section;
//        $student->gradeLevelId = $request->gradeLevel;
//        $student->mothertongue = $request->mothertongue;
//        $student->ethnicgroup = $request->ethnicgroup;
//        $student->religion = $request->religion;
//        $student->learning_modality = $request->learning_modality;
//        $student->remarks = $request->remarks;
//        $student->status = $request->status;
//        $student->save();
//        $student->id;
//
//        return redirect()->back()->with('success_added', 'Successfully added new record');
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
