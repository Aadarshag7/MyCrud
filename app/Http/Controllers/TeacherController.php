<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teacher=Teacher::get();
        return view('teacher.index',compact('teacher'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('teacher.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate= validate([
            'name'=>['required']
        ]);
        
        Teacher::create([
            'name'=>$request->name,
            'age'=>$request->age,
            'photo'=>$request->photo? $request->photo->store('Teacher','public'):null
        ]);
        return redirect()->route('teacher');
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
        return view('teacher.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $teacher=Teacher::find($id);
        $teacher->update($request->all());
        return redirect()->route('teacher');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $teacher=Teacher::find($id);
        $teacher->delete();
        return redirect()->route('teacher');
    }
}
