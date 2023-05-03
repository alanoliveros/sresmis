<?php

namespace App\Http\Controllers;

use App\Models\Modality;
use App\Http\Requests\StoreModalityRequest;
use App\Http\Requests\UpdateModalityRequest;

class ModalityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        /*return view('indicator.modality.index');*/
        $modalities = Modality::all();
        return view('modalities.index', compact('modalities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('modalities.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreModalityRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreModalityRequest $request)
    {
        //
        $request->validate([
            'name' => 'required|unique:modalities',
        ]);

        $modality = new Modality([
            'name' => $request->get('name'),
        ]);
        $modality->save();
        return redirect()->route('modalities.index')->with('success', 'Modality created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Modality  $modality
     * @return \Illuminate\Http\Response
     */
    public function show(Modality $modality)
    {
        //
        return view('modalities.show', compact('modality'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Modality  $modality
     * @return \Illuminate\Http\Response
     */
    public function edit(Modality $modality)
    {
        //
        return view('modalities.edit', compact('modality'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateModalityRequest  $request
     * @param  \App\Models\Modality  $modality
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateModalityRequest $request, Modality $modality)
    {
        //
        $request->validate([
            'name' => 'required|unique:modalities,name,' . $modality->id,
        ]);

        $modality->name = $request->get('name');
        $modality->save();
        return redirect()->route('modalities.index')->with('success', 'Modality updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Modality  $modality
     * @return \Illuminate\Http\Response
     */
    public function destroy(Modality $modality)
    {
        //
        $modality->delete();
        return redirect()->route('modalities.index')->with('success', 'Modality deleted successfully.');

    }
}
