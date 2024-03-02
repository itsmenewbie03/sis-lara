<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Http\Requests\SubjectRequest;
use App\Http\Requests\SubjectUpdateRequest;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subjects = Subject::all();
        return view("subject.index", ["subjects" => $subjects]);
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
    public function store(SubjectRequest $request)
    {
        $subject = new Subject();
        $subject->subjectName = $request->subjectName;
        $subject->subjectCode = $request->subjectCode;
        $res = $subject->save();
        if ($res) {
            return redirect()->route("subject.index");
        } else {
            dd("Subject Insert Failed");
        }
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
    public function edit(Subject $subject)
    {
        return view("subject.edit", ["subject" => $subject]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SubjectUpdateRequest $request, Subject $subject)
    {
        $subject->subjectName = $request->subjectName;
        $subject->subjectCode = $request->subjectCode;
        $res = $subject->save();
        if ($res) {
            return redirect()->route("subject.index");
        } else {
            dd("Subject Update Failed");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subject $subject)
    {
        $res = $subject->delete();
        if ($res) {
            return redirect()->route("subject.index");
        } else {
            dd("Subject Delete Failed");
        }
    }
}
