<?php

namespace App\Http\Controllers\Academic;

use App\Http\Controllers\Controller;
use App\Models\GradeLevel;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SubjectController extends Controller
{
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

    public function create()
    {

    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'subjectname' => 'required',
            'gradeLevelId' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $subject = new Subject();
        $subject->adminId = auth()->user()->id;
        $subject->gradeLevelId = $request->gradeLevelId;
        $subject->subjectName = $request->subjectname;
        $subject->description = $request->description;
        $subject->written_work_percentage = $request->writtenWork;
        $subject->performance_tasks_percentage = $request->performanceTask;
        $subject->quarterly_assessment_percentage = $request->quarterlyAssessment;
        $subject->save();

        return redirect()->back()->with('success_added', 'Successfully added new record');
    }

    public function show($id)
    {
        $subject = Subject::find($id);

        if (!$subject) {
            return redirect()->back()->with('error', 'Subject not found');
        }
        return view('web.backend.admin.academics.subject.show', compact('subject'));
    }
    public function edit($id)
    {
        $subject = Subject::find($id);

        if (!$subject) {
            return redirect()->back()->with('error', 'Subject not found');
        }

        return view('web.backend.admin.academics.subject.edit', compact('subject'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'subjectName' => 'required',
            'description' => 'required',
            'writtenWork' => 'required',
            'performanceTask' => 'required',
            'quarterlyAssessment' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $subject = Subject::find($id);

        if (!$subject) {
            return redirect()->back()->with('error', 'Subject not found');
        }

        $subject->subjectName = $request->subjectName;
        $subject->description = $request->description;
        $subject->written_work_percentage = $request->writtenWork;
        $subject->performance_tasks_percentage = $request->performanceTask;
        $subject->quarterly_assessment_percentage = $request->quarterlyAssessment;
        $subject->update();

        return redirect()->back()->with('success_updated', 'Successfully updated the record');
    }

    public function destroy($id)
    {
        $subject = Subject::find($id);

        if (!$subject) {
            return redirect()->back()->with('error', 'Subject not found');
        }

        $subject->delete();

        return redirect()->back()->with('success_deleted', 'Successfully deleted the record');
    }
}
