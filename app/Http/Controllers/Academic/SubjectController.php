<?php

namespace App\Http\Controllers\Academic;

use App\Http\Controllers\Controller;
use App\Models\GradeLevel;
use App\Models\Subject;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        {
            $subjects = Subject::all();
            $gradelevel = GradeLevel::orderBy('gradeLevelName', 'asc')->get();
            return view('web.backend.admin.academics.subject.index', [
                'subjects' => $subjects,
                'gradelevel' => $gradelevel,
            ]);

        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return RedirectResponse
     */
    public function create(Request $request)
    {
        $request->validate([
            'subjectname' => 'required',
        ]);

        $gradeLevelId = $request->gradeLevelId;
        $subjectname = $request->subjectname;
        $description = $request->description;
        $written_work = $request->writtenWork;
        $performance_task = $request->performanceTask;


            $subject = new Subject();
            $subject->adminId = auth()->user()->id;
            $subject->gradeLevelId = $gradeLevelId;
            $subject->subjectName = $subjectname;
            $subject->description = $description;
            $subject->written_work_percentage= $written_work;
            $subject->performance_tasks_percentage= $performance_task;
            $subject->save();

        return redirect()->back()->with('success_added', 'Successfully added new record');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
       /* $request->validate([
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
        return redirect()->back()->with('success_added', 'Successfully added new record');*/
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Application|Factory|View
     */
    public function show($gradeLevelName, $id)
    {
       /* $gradelevel = GradeLevel::orderBy('gradeLevelName', 'asc')->get();
        $subject = Subject::where('gradeLevelId', '=', $id)->get();
        return view('web.backend.admin.academics.subject.show')->with([
            'name' => $gradeLevelName,
            'id' => $id,
            'gradelevel' => $gradelevel,
            'subjects' => $subject,
        ]);*/
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
