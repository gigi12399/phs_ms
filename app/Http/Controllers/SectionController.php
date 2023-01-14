<?php

namespace App\Http\Controllers;

use App\Models\Section;
use App\Models\Grade;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sections = Section::all();
        return view('schoolTemplate.Section.list', compact('sections'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $grades = Grade::all();
        return view('schoolTemplate.Section.createForm', compact('grades'));
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
            'name' => 'required',
            'grade' => 'required',
            'description' => 'required'
        ]);
        //dd($request);

        $section = new Section;
        $section->name = $request->name;
        $section->grade_id = $request->grade;
        $section->description = $request->description;
        $section->save();
        return redirect()->route('section.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function show(Section $section)
    {
        return view('schoolTemplate.Section.detail', compact('section'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function edit(Section $section)
    {
        $grades = Grade::all();
        return view('schoolTemplate.Section.editForm', compact('section', 'grades'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Section $section)
    {
        //dd($section);
        $request->validate([
            'name' => 'required',
            'grade' => 'required',
            'description' => 'required'
        ]);
        //dd($request);

        $section->name = $request->name;
        $section->grade_id = $request->grade;
        $section->description = $request->description;
        $section->save();
        return redirect()->route('section.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function destroy(Section $section)
    {
        $section->delete();
        return redirect()->route('section.index');

    }
}
