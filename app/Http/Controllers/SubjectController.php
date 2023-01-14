<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\Teacher;
use App\Models\SubjectTeacher;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subjects = Subject::all();
        return view('schoolTemplate.Subject.list', compact('subjects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teachers = Teacher::all();
        return view('schoolTemplate.Subject.createForm', compact('teachers'));
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
            'name' => 'required|unique:subjects,name',
            'teachers' => 'required',
        ]);
        DB::transaction(function () use($request) {
            $subject = new Subject;
            $subject->name = $request->name;
            $subject->save();
            $subject->teachers()->attach($request->teachers);
        });
        return redirect()->route('subject.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function show(Subject $subject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function edit(Subject $subject)
    {
        $teachers = Teacher::all();
        return view('schoolTemplate.Subject.editForm', compact('subject', 'teachers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subject $subject)
    {
        $request->validate([
            'name' => ['required', Rule::unique('subjects','name')->ignore($subject->id)],
            'teachers' => 'required',
        ]);

        DB::transaction(function () use($request, $subject) {
            $subject->name = $request->name;
            $subject->save();
            $subject->teachers()->detach();
            $subject->teachers()->attach($request->teachers);
        });
        return redirect()->route('subject.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subject $subject)
    {
        DB::table('subject_teacher')
            ->where('subject_id', $subject->id)
            ->update(array('deleted_at' => DB::raw('NOW()')));
        $subject->delete();

        return redirect()->route('subject.index');
    }
}
