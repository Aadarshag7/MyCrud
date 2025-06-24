<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource. 
     */
    public function index()
    {
        $grade = Grade::paginate(3);
        return view('grades.index',compact('grade'));
    } 

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('grades.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation=$request->validate([
            'title'=>['required'],
            'activity'=>['required']
        ]);
        Grade::create([
            'title'=>$request->title,
            'activity'=>$request->activity
        ]);
        return redirect()->route('grades');
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
        $grade= Grade::find($id);
        return view('grades.edit',compact('grade'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $grade=Grade::findorFail($id);
        $grade->update($request->all());
        return redirect()->route('grades');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        
        $grade= Grade::find($id);
        $grade->delete();
        return redirect()->route('grades');
    }
}
