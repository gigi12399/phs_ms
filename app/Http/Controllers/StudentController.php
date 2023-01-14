<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\StudentHistory;
use App\Models\Section;
use App\Models\AcademicYear;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use File;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $academic_year = AcademicYear::where('year_one', date('Y'))->first();
        $students = Student::all();
        return view('schoolTemplate.Student.list', compact('students', 'academic_year'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sections = Section::all();
        $academic_years = AcademicYear::all();
        return view('schoolTemplate.Student.createForm', compact('sections', 'academic_years'));
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
            'nrc' => 'required|unique:students,nrc',
            'phone' => 'required|min:7|max:11',
            'birthday' => 'required|date|before:'.now()->toDateString(),
            'profile' => 'required|image|mimes:jpg,png,jpeg,giff,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000',
            'grade_section' => 'required',
            'academic_year' => 'required',
            'email' => 'required|unique:students,email|email',
            'gender' => 'required',
            'info' => 'required',
        ]);
        $file_name = $request->profile->getClientOriginalName();
        DB::transaction(function () use($request, $file_name){
        $student = new Student;
        $student->name = $request->name;
        $student->address = $request->address;
        $student->nrc = $request->nrc;
        $student->phone = $request->phone;
        $student->birthday = $request->birthday;
        $student->profile = $file_name;
        if ($request->gender == 'male') {
            $student->gender = 1;
        } else {
            $student->gender = 0;
        }
        $student->email = $request->email;
        $student->info = $request->info;
        $student->save();

        $student_histories = new StudentHistory;
        $student_histories->student_id = $student->id;
        $student_histories->section_id = $request->grade_section;
        $student_histories->academic_year_id = $request->academic_year;
        $student_histories->status = 0;
        $student_histories->save();

        $student_id = $student->id;
        $path = public_path('school/profile/student/').$student_id;
        File::makeDirectory($path);
        $request->profile->move($path,$file_name);
    });
        return redirect()->route('student.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        return view('schoolTemplate.Student.detail', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        $sections = Section::all();
        $academic_years = AcademicYear::all();
        return view('schoolTemplate.Student.editForm', compact('student', 'sections', 'academic_years'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'nrc' => ['required', Rule::unique('students', 'nrc')->ignore($student->id)],
            'phone' => 'required|min:7|max:11',
            'birthday' => 'required|date|before:'.now()->toDateString(),
            'profile' => 'image|mimes:jpg,png,jpeg,giff,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000',
            'grade_section' => 'required',
            'email' => ['required', Rule::unique('students', 'email')->ignore($student->id)],
            'gender' => 'required',
            'info' => 'required',
        ]);

        DB::transaction(function () use($request,$student){
        if($request->profile != ''){
            $file_name = $request->profile->getClientOriginalName();
            $student->profile = $file_name;
            $path = public_path('school/profile/student/').$student->id;
            $request->profile->move($path,$file_name);
        }
        $student->name = $request->name;
        $student->address = $request->address;
        $student->nrc = $request->nrc;
        $student->phone = $request->phone;
        $student->birthday = $request->birthday;
        if ($request->gender == 'male') {
            $student->gender = 1;
        } else {
            $student->gender = 0;
        }
        $student->email = $request->email;
        $student->info = $request->info;
        $student->save();

        $student_histories = StudentHistory::find($request->std_his_id);
        $student_histories->section_id = $request->grade_section;
        $student_histories->status = 0;
        $student_histories->save();
        
        });
        return redirect()->route('student.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('student.index');
    }

    public function getoldStudent(Request $request)
    {
        $student_histories = StudentHistory::select('student_id')->where('section_id', $request->section_id)->get()->groupBy('student_id');
        $students = Student::whereIn('id', $student_histories)->where('birthday', $request->birthday)->get();
        
        // $students = [];
        // foreach ($allstudents as $student) {
        //     foreach ($student_histories as $history) {
        //         if($history == $student){
        //             $final_std = Student::find($history);
        //             array_push($students, $final_std);
        //         }
        //     }
        // }
        return response()->json([
            'students' => $students,
        ]);
    }

    public function getoldStudentstore(Request $request)
    {
        $request->validate([
            'old_student' => 'required',
            'old_std_academic_year' => [
                'required',
                Rule::unique('student_histories','academic_year_id')->where(function ($query) use($request){
                    $query->where('student_id', $request->old_student)
                    ->where('academic_year_id', $request->old_std_academic_year);
                }),
            ],
            'old_std_grade_section' => 'required',
        ]);

        $old_student = new StudentHistory;
        $old_student->student_id = $request->old_student;
        $old_student->academic_year_id = $request->old_std_academic_year;
        $old_student->section_id = $request->old_std_grade_section;
        $old_student->status = 0;
        $old_student->save();

        return redirect()->route('student.index');
    }
}
