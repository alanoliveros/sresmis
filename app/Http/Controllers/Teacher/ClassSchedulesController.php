<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\ClassSchedule;
use Illuminate\Http\Request;
use App\Models\Session;

class ClassSchedulesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sessions = Session::orderBy('school_year', 'desc')->get();
        $activeSession = Session::where('status', 1)->first();

        return view('web.backend.teacher.class-schedule.index', [
            'sessions' => $sessions,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function filter_sy(Request $request)
    {

        $sy = ClassSchedule::where([
            'school_year' => $request->sy,
            'teacherId' => auth()->user()->id,
        ])->get();
        return response()->json([
            'sy' => $sy,
        ]);
    }
}
