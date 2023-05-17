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
        return view('web.backend.admin.academics.section.index', [
            'sections' => $sections,
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
        $getGradeLevelById = Section::where('gradeLevelId', '=', $request->id)->get();
        return response()->json([
            'gradeLevel' => $getGradeLevelById,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
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

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
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
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
