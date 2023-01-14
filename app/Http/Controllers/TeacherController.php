<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Models\Grade;
use Illuminate\Http\Request;
use File;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachers = Teacher::all();
        return view('schoolTemplate.Teacher.list', compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $grades = Grade::all();
        return view('schoolTemplate.Teacher.createForm', compact('grades'));
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
            'address' => 'required',
            'email' => 'required|unique:teachers,email|email',
            'phone' => 'required|min:7|max:11',
            'nrc' => 'required|unique:teachers,nrc',
            'salary' => 'required|numeric',
            'birthday' => 'required|date|before:'.now()->toDateString(),
            'profile' => 'required|image|mimes:jpg,png,jpeg,giff,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000',
            'gender' => 'required',
            'degree' => 'required',
            'grade' => 'required',
            'description' => 'required'
        ]);

        //dd($request);
        DB::transaction(function () use($request) {
            $file_name = $request->profile->getClientOriginalName();
            $teacher = new Teacher;
            $teacher->name = $request->name;
            $teacher->address = $request->address;
            $teacher->email = $request->email;
            $teacher->phone = $request->phone;
            $teacher->nrc = $request->nrc;
            $teacher->salary = $request->salary;
            $teacher->birthday = $request->birthday;
            $teacher->profile = $file_name;
            if ($request->gender == 'male') {
                $teacher->gender = 1;
            } else {
                $teacher->gender = 0;
            }
            $teacher->degree = $request->degree;
            $teacher->description = $request->description;
            //dd($teacher);
            $teacher->save();
            $teacher->grades()->attach($request->grade);
            $teacher_id = $teacher->id;
            $path = public_path('school/profile/teacher/').$teacher_id;
            File::makeDirectory($path);
            $request->profile->move($path,$file_name);
        });

        
        
        return redirect()->route('teacher.index');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function show(Teacher $teacher)
    {
        return view('schoolTemplate.teacher.detail', compact('teacher'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function edit(Teacher $teacher)
    {
        $grades = Grade::all();
        return view('schoolTemplate.teacher.editForm', compact('teacher', 'grades'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Teacher $teacher)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'email' => ["required", Rule::unique("teachers","email")->ignore($teacher->id)],
            'phone' => 'required|min:7|max:11',
            'nrc' => ["required", Rule::unique('teachers', 'nrc')->ignore($teacher->id)],
            'salary' => 'required|numeric',
            'birthday' => 'required|date|before:'.now()->toDateString(),
            'profile' => 'image|mimes:jpg,png,jpeg,giff,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000',
            'gender' => 'required',
            'degree' => 'required',
            'grade' => 'required',
            'description' => 'required'
        ]);

        //dd($request);
        DB::transaction(function () use($request, $teacher) {
            if($request->profile != ''){
                $file_name = $request->profile->getClientOriginalName();
                $teacher->profile = $file_name;
                $path = public_path('school/profile/teacher/').$teacher->id;
                $request->profile->move($path,$file_name);
            }
            
            $teacher->name = $request->name;
            $teacher->address = $request->address;
            $teacher->email = $request->email;
            $teacher->phone = $request->phone;
            $teacher->nrc = $request->nrc;
            $teacher->salary = $request->salary;
            $teacher->birthday = $request->birthday;
            if ($request->gender == 'male') {
                $teacher->gender = 1;
            } else {
                $teacher->gender = 0;
            }
            $teacher->degree = $request->degree;
            $teacher->description = $request->description;
            $teacher->save();
            $teacher->grades()->detach();
            $teacher->grades()->attach($request->grade);
        });
        return redirect()->route('teacher.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy(Teacher $teacher)
    {
        DB::table('subject_teacher')
            ->where('teacher_id', $teacher->id)
            ->update(array('deleted_at' => DB::raw('NOW()')));
        DB::table('grade_teacher')
        ->where('teacher_id', $teacher->id)
        ->update(array('deleted_at' => DB::raw('NOW()')));
        $teacher->delete();
        return redirect()->route('teacher.index');
    }
}
