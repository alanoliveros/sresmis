<?php

namespace App\Http\Controllers\Academic;

use App\Http\Controllers\Controller;
use App\Models\GradeLevel;
use App\Models\Section;
use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $subjects = Subject::join('grade_levels', 'subjects.gradeLevelId', 'grade_levels.id')->orderBy('subjects.subjectName', 'asc')->get();
        $gradelevel = GradeLevel::orderBy('gradeLevelName', 'asc')->get();
        return view('web.backend.admin.academics.subject.index')->with([
            '$subjects' => $subjects,
            'gradelevel' => $gradelevel,
        ]);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'subjectname' => 'required',
        ]);

        $gradeLevelId = $request->gradeLevelId;
        $subjectname = $request->subjectname;
        $description = $request->description;


        foreach ($subjectname as $key => $name) {

            // echo $name.'<br>';
            $subject = new Subject();
            $subject->adminId = auth()->user()->id;
            $subject->gradeLevelId = $gradeLevelId;
            $subject->subjectName = $name;
            $subject->description = $description[$key];
            $subject->save();
        }
        return redirect()->back()->with('success_added', 'Successfully added new record');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show($gradeLevelName, $id)
    {
        $gradelevel = GradeLevel::orderBy('gradeLevelName', 'asc')->get();
        $subject = Subject::where('gradeLevelId', '=', $id)->get();
        return view('web.backend.admin.academics.subject.show')->with([
            'name' => $gradeLevelName,
            'id' => $id,
            'gradelevel' => $gradelevel,
            'subjects' => $subject,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
