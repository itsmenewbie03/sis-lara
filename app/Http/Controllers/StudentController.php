<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::all();
        return view("student.index", ["students" => $students]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // TODO: perform validation here xD
        $student = new Student();
        $student->name = $request->name;
        $student->address = $request->address;
        $student->age = $request->age;
        $res = $student->save();
        if ($res) {
            return redirect()->route("student.index");
        } else {
            dd("Student Insert Failed");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        return view("student.edit", ["student" => $student]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        // TODO: perofrm validation here xD
        $student->name = $request->name;
        $student->address = $request->address;
        $student->age = $request->age;
        $res = $student->save();
        if ($res) {
            return redirect()->route("student.index");
        } else {
            dd("Student Update Failed");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $res = $student->delete();
        if ($res) {
            return redirect()->route("student.index");
        } else {
            dd("Student Delete Failed");
        }
    }
}
