<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Models\Day;
use App\Models\Period;
use App\Models\Grade;
use App\Models\Section;
use App\Models\AcademicYear;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\TeacherGuide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schedules = Schedule::all();
        $days = Day::all();
        $periods = Period::all();
        $grades = Grade::all();
        $teachers = Teacher::all();
        $sections = Section::all();
        $academic_year = AcademicYear::where('year_one', date('Y'))->first();
        return view('schoolTemplate.Schedule.list', compact('schedules', 'days', 'periods', 'grades', 'sections', 'teachers', 'academic_year'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $days = Day::all();
        $periods = Period::all();
        $grades = Grade::all();
        $sections = Section::all();
        $teachers = Teacher::all();
        $subjects = Subject::all();
        return view('schoolTemplate.Schedule.createForm', compact('days', 'periods','grades', 'sections', 'teachers', 'subjects'));
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
            'day' => 'required',
            'period' => 'required',
            'section' => 'required',
            'teacher' => 'required',
            'subject' => 'required',
        ]);

        $academic = AcademicYear::where('year_one', $request->academicYear)->first();

        $schedule = new Schedule;
        $schedule->day_id = $request->day;
        $schedule->period_id = $request->period;
        $schedule->section_id = $request->section;
        $schedule->teacher_id = $request->teacher;
        $schedule->subject_id = $request->subject;
        $schedule->academic_year_id = $academic->id;
        $schedule->save();
        return redirect()->route('schedule.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function show($request)
    {
        $days = Day::all();
        $periods = Period::all();
        $grades = Grade::all();
        $academic_year = AcademicYear::where('year_one', date('Y'))->first();
        if($request == 'grade'){
            $sections = Section::all();
            return view('schoolTemplate.Schedule.scheduleWithGrade', compact('days', 'periods', 'sections', 'grades', 'academic_year'));
        }
        if($request == 'teacher'){
            $teachers = Teacher::all();
            return view('schoolTemplate.Schedule.scheduleWithTeacher', compact('days', 'periods', 'teachers', 'grades', 'academic_year'));
        }
        // $type = explode('=', $request);
        // $days = Day::all();
        // $periods = Period::all();
        // $grades = Grade::all();
        // if($type[0] == 'grade'){
        //     $section = Section::find($type[1]);
        //     $schedules = Schedule::where('section_id', $type[1])->get();
        //     return view('schoolTemplate.Schedule.scheduleWithGrade', compact('schedules', 'days', 'periods', 'section', 'grades'));
        // }elseif ($type[0] == 'teacher') {
        //     $teacher = Teacher::find($type[1]);
        //     $schedules = Schedule::where('teacher_id', $type[1])->get();
        //     //dd($allSchedules);
        //     return view('schoolTemplate.Schedule.scheduleWithTeacher', compact('schedules', 'days', 'periods', 'teacher', 'grades'));
        // }
    }

    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function edit(Schedule $schedule)
    {
        $days = Day::all();
        $periods = Period::all();
        $grades = Grade::all();
        return view('schoolTemplate.Schedule.editForm', compact('days', 'periods','grades', 'schedule'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Schedule $schedule)
    {
        $request->validate([
            'day' => 'required',
            'period' => 'required',
        ]);

        $schedule->day_id = $request->day;
        $schedule->period_id = $request->period;
        if($request->section != ''){
            $schedule->section_id = $request->section;
        }
        if($request->teacher != ''){
            $schedule->teacher_id = $request->teacher;
        }
        if($request->subject != ''){
            $schedule->subject_id = $request->subject;
        }
        
        $schedule->save();
        return redirect()->route('schedule.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function destroy(Schedule $schedule)
    {
        $schedule->delete();
        return redirect()->route('schedule.index');
    }

    public function getteacherandsection(Request $request){
        $grade_id = $request->grade_id;
        $grade = Grade::find($grade_id);

        return response()->json([
            'teachers' => $grade->teachers,
            'sections' => $grade->sections,
        ]);
    }

    public function getteacherandsubject(Request $request){
        $teacher_id = $request->teacher_id;
        $teacher = Teacher::find($teacher_id);

        return response()->json([
            'subjects' => $teacher->subjects,
        ]);
    }

    public function getsectionschedules(Request $request){
        $days = Day::all();
        $periods = Period::all();
        $section_id = $request->section_id;
        $section = Section::find($section_id);
        $subjects = Subject::all();
        $teachers = Teacher::all();
        $schedules = Schedule::where('section_id', $section_id)->get();

        return response()->json([
            'days' => $days,
            'periods' => $periods,
            'section' => $section,
            'grade' => $section->grade,
            'subjects' => $subjects,
            'teachers' => $teachers,
            'schedules' => $schedules,
        ]);
    }

    public function getteacherschedules(Request $request){
        $days = Day::all();
        $periods = Period::all();
        $teacher_id = $request->teacher_id;
        $teacher = Teacher::find($teacher_id);
        $subjects = Subject::all();
        $sections = Section::all();
        $grades = Grade::all();
        $schedules = Schedule::where('teacher_id', $teacher_id)->get();

        return response()->json([
            'days' => $days,
            'periods' => $periods,
            'sections' => $sections,
            'grades' => $grades,
            'subjects' => $subjects,
            'teacher' => $teacher,
            'schedules' => $schedules,
        ]);
    }
}
