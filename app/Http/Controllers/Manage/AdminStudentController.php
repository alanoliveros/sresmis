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

    public function create()
    {
        return view('web.backend.admin.users.student.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */


        public function store(Request $request)
    {

        // Set enrollment data
        $enrollment = new Enrollment;

        $enrollment->enrollment_status = $request->input('enrollment_status');

        $enrollment->lrn = $request->input('lrn');
        $enrollment->first_name = $request->input('first_name');
        $enrollment->middle_name = $request->input('middle_name');
        $enrollment->last_name = $request->input('last_name');
        $enrollment->suffix = $request->input('suffix');
        $enrollment->ethnic_group = $request->input('ethnic_group');
        $enrollment->mothertongue = $request->input('mothertongue');
        $enrollment->religion = $request->input('religion');
        $enrollment->date_of_birth = $request->input('date_of_birth');
        $enrollment->gender = $request->input('gender');
        $enrollment->purok = $request->input('purok');
        $enrollment->barangay = $request->input('barangay');
        $enrollment->city = $request->input('city');
        $enrollment->province = $request->input('province');

        $enrollment->save();


        return redirect()->route('student.index')->with('success', 'Student has been added successfully.');


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
