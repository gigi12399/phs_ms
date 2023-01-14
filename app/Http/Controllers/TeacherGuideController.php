<?php

namespace App\Http\Controllers;

use App\Models\TeacherGuide;
use App\Models\Teacher;
use App\Models\Section;
use App\Models\Subject;
use Illuminate\Http\Request;

class TeacherGuideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teacherGuides = TeacherGuide::all()->groupBy('teacher_id');
        return view('schoolTemplate.TeacherGuide.list', compact('teacherGuides'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teachers = Teacher::all();
        $sections = Section::all();
        $subjects = Subject::all();
        return view('schoolTemplate.TeacherGuide.createForm', compact('teachers', 'sections', 'subjects'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'teacher' => 'required',
            'section' => 'required',
            'subject' => 'required',
        ]);

        $teacherGuide = new TeacherGuide;
        $teacherGuide->teacher_id = $request->teacher;
        $teacherGuide->section_id = $request->section;
        $teacherGuide->subject_id = $request->subject;
        $teacherGuide->save();
        return redirect()->route('guide.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TeacherGuide  $teacherGuide
     * @return \Illuminate\Http\Response
     */
    public function show(TeacherGuide $teacherGuide)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TeacherGuide  $teacherGuide
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $teacherGuide = TeacherGuide::find($id);
        $teachers = Teacher::all();
        $sections = Section::all();
        $subjects = Subject::all();
        return view('schoolTemplate.TeacherGuide.editForm', compact('teachers', 'sections', 'subjects', 'teacherGuide'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TeacherGuide  $teacherGuide
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $teacherGuide = TeacherGuide::find($id);
        $request->validate([
            'teacher' => 'required',
            'section' => 'required',
            'subject' => 'required',
        ]);

        $teacherGuide->teacher_id = $request->teacher;
        $teacherGuide->section_id = $request->section;
        $teacherGuide->subject_id = $request->subject;
        $teacherGuide->save();
        return redirect()->route('guide.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TeacherGuide  $teacherGuide
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $teacherGuide = TeacherGuide::find($id);
        $teacherGuide->delete();
        return redirect()->route('guide.index');
    }
}
