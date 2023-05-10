<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use App\Models\GradeLevel;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\Request;

class AdminTeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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
        return view('web.backend.admin.users.teacher.index')->with(
            [
                'gradeLevel' => $gradeLevel,
                'subjects' => $subjects,
                'teachers' => $teachers,
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
