<?php

namespace App\Http\Controllers\Academic;

use App\Http\Controllers\Controller;
use App\Models\ClassSchedule;
use App\Models\GradeLevel;
use App\Models\Section;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\Session;
use Illuminate\Http\Request;

class ClassScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $gradelevel = GradeLevel::orderBy('gradeLevelName', 'asc')->get();
        return view('web.backend.admin.academics.classschedule.index')->with([

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
            'teacherId' => 'required',
            'scheduleDay' => 'required',
        ]);

        $days = array();
        foreach ($request->scheduleDay as $day) {
            $days[] = $day;
        }

        $section_detail = Section::where('id', $request->sectionId)->first();
        $session_active = Session::where('status', 1)->first();  //1 means active 2 means Deactive

        $schedule = new ClassSchedule();
        $schedule->sectionId = $request->sectionId;
        $schedule->subjectId = $request->subjectId;
        $schedule->teacherId = $request->teacherId;
        $schedule->grade_level_id = $section_detail->gradeLevelId;
        $schedule->startTime = $request->startTime;
        $schedule->endTime = $request->endTime;
        $schedule->school_year = $session_active->school_year;
        $schedule->scheduleDay = implode(',', $days);
        $schedule->save();

        // echo $session_active->school_year;

        return redirect()->back()->with('success_added', 'Successfully added new record');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show($name)
    {
        $changeName = str_replace('-', ' ', $name);
        $gradeLevel = GradeLevel::where('gradeLevelName', '=', $changeName)->first();

        // echo $gradeLevel->gradeLevelName;
        $sections = Section::where('gradeLevelId', '=', $gradeLevel->id)->get();
        return view('web.backend.admin.academics.classschedule.by-section')->with([
            'sections' => $sections,
            'gradeLevelId' => $gradeLevel->id,
            // $schedule = new ClassSchedule();

        ]);
    }

    public function show_by_section($sid, $gid)
    {
        $section = Section::find($sid);
        $classSchedule = ClassSchedule::where('sectionId', '=', $gid)->get();
        $subjects = Subject::where('gradeLevelId', '=', $gid)->get();
        $teachers = Teacher::where('teachers.adminId', '=', auth()->user()->id)->join('users', 'teachers.teacherId', 'users.id')->get();
        $schedules = ClassSchedule::where('class_schedules.sectionId', '=', $sid)->join('subjects', 'class_schedules.subjectId', 'subjects.id')->orderBy('class_schedules.startTime', 'asc')->get();


        return view('web.backend.admin.academics.classschedule.section')->with([
            'section' => $section,
            'classSchedule' => $classSchedule,
            'subjects' => $subjects,
            'teachers' => $teachers,
            'schedules' => $schedules,
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
