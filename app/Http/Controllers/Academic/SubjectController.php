<?php

namespace App\Http\Controllers\Academic;

use App\Http\Controllers\Controller;
use App\Models\GradeLevel;
use App\Models\GradeLevelSubject;
use App\Models\Subject;
use App\Models\Session;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;


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
            $sessions = Session::orderBy('school_year', 'desc')->get();
            $subjects = Subject::all();
            $gradelevel = GradeLevel::orderBy('gradeLevelName', 'asc')->get();
            return view('web.backend.admin.academics.subject.index', [
                'subjects' => $subjects,
                'gradelevel' => $gradelevel,
                'sessions' => $sessions,
            ]);

        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return RedirectResponse
     */
    /*public function create(Request $request)
    {
        $validator=$request->validate([
            'subjectname' => 'required',
            'gradeLevelId' => 'required',
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

        if ($validator == false) {
            return redirect()->back()->withErrors($validator)->withInput();
        }


        return redirect()->back()->with('success_added', 'Successfully added new record');
    }*/

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'grade_level_id' => 'required',
            'subject_id' => 'required',
            'school_year' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $subject =  GradeLevelSubject::firstOrNew([
            'grade_level_id' => $request->grade_level_id,
            'subject_id' => $request->subject_id,
        ]);
        $subject->admin_id = auth()->user()->id;
        $subject->school_year = $request->school_year;
        $subject->grade_level_id = $request->grade_level_id;
        $subject->subject_id = $request->subject_id;
        $subject->description = $request->description;
        // $subject->written_work_percentage = $request->writtenWork;
        // $subject->performance_tasks_percentage = $request->performanceTask;
        // $subject->quarterly_assessment_percentage = $request->quarterlyAssessment;
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
