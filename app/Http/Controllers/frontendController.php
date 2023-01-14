<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\Student;
use App\Models\Grade;
use App\Models\Section;
use App\Models\AcademicYear;

class frontendController extends Controller
{
    public function index()
    {
        $teachers = Teacher::all();
        $students = Student::all();
        $grades = Grade::all();
        $sections = Section::all();
        $academic_year = AcademicYear::where('year_one', date('Y'))->first();
        return view('frontendTemplate.index',compact('teachers', 'students', 'grades', 'sections', 'academic_year'));
    }

    public function team()
    {
        $teachers = Teacher::all();
        return view('frontendTemplate.ourTeam',compact('teachers'));
    }

    public function contact()
    {
        return view('frontendTemplate.contact');
    }
}
