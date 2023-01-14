<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\Schedule;
use App\Models\Subject;
use App\Models\Section;
use App\Models\Teacher;
use App\Models\Student;
use App\Models\StudentHistory;
use App\Models\AcademicYear;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $grades = Grade::all();
        return view('schoolTemplate.grade.list', compact('grades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('schoolTemplate.grade.createForm');
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
            'name' => 'required'
        ]);

        $grade = new Grade;
        $grade->name = $request->name;
        
        $grade->save();
        return redirect()->route('grade.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function show(Grade $grade)
    {
        $section_id = [];
        foreach ($grade->sections as $section) {
            array_push($section_id, $section->id);
        }
        //dd($sections);
        $subjects_id = Schedule::select('subject_id')->whereIn('section_id',$section_id)->get()->groupBy('subject_id');
        // dd($subjects_id);
        // $sub_id = [];
        // foreach ($subjects_id as $item) {
        //    array_push($sub_id,$item[0]->subject_id);
        // }
        //dd($sub_id);
        $subjects = Subject::whereIn('id',$subjects_id)->get();
        $student_histories = StudentHistory::whereIn('section_id', $section_id)->get();
        $student_id = [];
        foreach ($student_histories as $key => $value) {
            array_push($student_id, $value->student_id);
        }
        $students = Student::whereIn('id', $student_id)->get();
        return view('schoolTemplate.grade.detail', compact('grade', 'subjects', 'students'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function edit(Grade $grade)
    {
        
        return view('schoolTemplate.Grade.editForm', compact('grade'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Grade $grade)
    {
        //dd($grade);
        $request->validate([
            'name' => 'required'
        ]);

        $grade->name = $request->name;
        
        $grade->save();
        return redirect()->route('grade.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function destroy(Grade $grade)
    {
        DB::table('grade_teacher')
            ->where('grade_id', $grade->id)
            ->update(array('deleted_at' => DB::raw('NOW()')));
        $grade->delete();
        return redirect()->route('grade.index');
    }
}
