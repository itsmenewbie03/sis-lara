<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\Student;
use App\Models\Subject;
use App\Http\Requests\GradeRequest;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // NOTE: we will pass the students and subjects as we need it on the add form
        $grades = Grade::all();
        $students = Student::all();
        $subjects = Subject::all();

        return view('grade.index', ['grades' => $grades, 'students' => $students, 'subjects' => $subjects]);
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
    public function store(GradeRequest $request)
    {
        // TODO: perform validation here xD
        $grade = new Grade();
        $grade->student_id = $request->student_id;
        $grade->subject_id = $request->subject_id;
        $grade->grade = $request->grade;
        $res = $grade->save();
        if ($res) {
            return redirect()->route("grade.index");
        } else {
            dd("Grade Insert Failed");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Grade $grade)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Grade $grade)
    {
        return view("grade.edit", ["grade" => $grade]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Grade $grade)
    {
        // NOTE: we will only allow updates in grade
        $grade->grade = $request->grade;
        $res = $grade->save();
        if ($res) {
            return redirect()->route("grade.index");
        } else {
            dd("Grade Update Failed");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Grade $grade)
    {
        $res = $grade->delete();
        if ($res) {
            return redirect()->route("grade.index");
        } else {
            dd("Grade Deletion Failed");
        }
    }
}
