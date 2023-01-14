<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grade;
use App\Models\Section;
use App\Models\Teacher;
use App\Models\Student;
use App\Models\Subject;

class OtherController extends Controller
{

    public function dashboard()
    {
        $grades = Grade::all();
        $sections = Section::all();
        $teachers = Teacher::all();
        $students = Student::all();
        $subjects = Subject::all();
        return view('schoolTemplate.dashboard', compact('grades', 'sections', 'teachers', 'students', 'subjects'));
    }
    
    public function grade()
    {
        $sections = Section::all();
        return view('schoolTemplate.Schedule.gradeSearch', compact('sections'));
    }

    public function teacher()
    {
        $teachers = Teacher::all();
        return view('schoolTemplate.Schedule.teacherSearch', compact('teachers'));
    }
}
