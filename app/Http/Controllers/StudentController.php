<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\Image;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $student=Student::with('grade','image')->get();

        return view('students.index',compact('student'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $grade=Grade::get();
        return view('students.create',compact('grade'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validation=$request->validate([
            'name'=>['required'],
            'dob'=>['required']
        ]);
        $student= Student::create([
            'name'=>$request->name,
            'dob'=>$request->dob,
            'section_id'=>$request->section_id ?? 1,
            'grade_id'=>$request->grade_id ?? 1 
        ]);
           if ($request->hasFile('photo')) {
           
            foreach($request->file('photo')as $img) {
            
                $path=$img->store('Student','public');
                    //   dd($student->id,$path);       
                Image::create([
                    'student_id'=>$student->id,

                    'filename'=>$path
                ]);
           } 

        }  

        return redirect()->route('students');
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
        $student=Student::find($id);
        return view('students.edit',compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $student=Student::find($id);
        $student->update($request->all());
        return redirect()->route('students');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $student = Student::find($id);
        $student->delete();
        return redirect()->route('students');
    }
}
