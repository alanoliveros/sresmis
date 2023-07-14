<?php

namespace App\Http\Controllers\Academic;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Section;
use App\Models\GradeLevel;
use Illuminate\Http\Response;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $gradelevel = GradeLevel::orderBy('id', 'asc')->get();
        $sections = Section::join('grade_levels', 'sections.gradeLevelId', 'grade_levels.id')
            ->orderBy('grade_levels.id', 'asc')
            ->get();

        $glevel = array();
        foreach($sections as $level){
            $glevel[$level->gradeLevelId] = [
                'gradeLevel' => $level->gradeLevelName,
                'sections' => Section::where('gradeLevelId', $level->gradeLevelId)->get(),
            ];
        }
//        print_r($glevel);
        return view('web.backend.admin.academics.section.index', [
            'glevel' => $glevel,
            'gradelevel' => $gradelevel,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return RedirectResponse
     */


    public function create(Request $request)
    {
    }

    public function getSection(Request $request)
    {
        $getGradeLevelById = Section::where('sections.gradeLevelId', $request->id)
            ->get();

        return response()->json([
            'gradeLevel' => $getGradeLevelById,
        ]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'gradeLevel' => 'required',
            'sectionName' => 'required',
        ]);

        $section = new Section();
        $section->adminId = auth()->user()->id;
        $section->sectionName = ucfirst($request->sectionName);
        $section->gradeLevelId = $request->gradeLevel;
        $section->save();

        return redirect()->back()->with('success_added', 'Successfully added new record');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
