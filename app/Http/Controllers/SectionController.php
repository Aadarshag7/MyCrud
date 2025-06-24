<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $section = Section::with('grade')->get();
        return view('sections.index',compact('section'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $grade=Grade::get();
        return view('sections.create',compact('grade'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation=$request->validate([
            'title'=>['required']

        ]);
        Section::create([
            'title'=>$request->title,
            'grade_id'=>$request->grade_id
        ]);
        return redirect()->route('sections');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $section = Section::findOrFail($id);
        return view('sections.edit',compact('section'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $section=Section::find($id);
        $section->update($request->all());
        return redirect()->route('sections');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $section = Section::findOrFail($id);
        $section->delete();
        return redirect()->route('sections');
}
}