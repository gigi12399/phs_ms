<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Schedule;
use App\Models\Day;
use App\Models\Period;
use App\Models\Grade;
use App\Models\Section;
use App\Models\Subject;
use App\Models\Teacher;

class PrintController extends Controller
{
    public function overallprint()
      {
        $schedules = Schedule::all();
        $days = Day::all();
        $periods = Period::all();
        $grades = Grade::all();
        $teachers = Teacher::all();
        $sections = Section::all();
        return view('schoolTemplate.Schedule.overallprint', compact('schedules', 'days', 'periods', 'grades', 'sections', 'teachers'));
      }

      public function gradeprint($id)
      {
        $section = Section::find($id);
        $schedules = Schedule::where('section_id', $id)->get();
        $days = Day::all();
        $periods = Period::all();
        return view('schoolTemplate.Schedule.gradeprint', compact('schedules', 'days', 'periods', 'section'));
      }
      public function teacherprint($id)
      {
        $teacher = Teacher::find($id);
        $schedules = Schedule::where('teacher_id' , $id)->get();
        $days = Day::all();
        $periods = Period::all();
        return view('schoolTemplate.Schedule.teacherprint', compact('schedules', 'days', 'periods', 'teacher'));
      }
}
