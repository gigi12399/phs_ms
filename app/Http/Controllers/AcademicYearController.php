<?php

namespace App\Http\Controllers;

use App\Models\AcademicYear;
use Illuminate\Http\Request;

class AcademicYearController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $academicYears = AcademicYear::all();
        return view('schoolTemplate.academicYear.list', compact('academicYears'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('schoolTemplate.academicYear.createForm');
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
            'yearOne' => 'required|unique:academic_years,year_one|digits:4|integer|min:1900|max:'.(date('Y')+1),
            'yearTwo' => 'required|unique:academic_years,year_two|digits:4|integer|min:1900|min:'.($request->yearOne)+1,
        ]);
        //dd($request);
        $academicYear = new AcademicYear;
        $academicYear->year_one = $request->yearOne;
        $academicYear->year_two = $request->yearTwo;
        $academicYear->save();

        return redirect()->route('academic.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AcademicYear  $academicYear
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $academicYear = AcademicYear::find($id);
        return view('schoolTemplate.academicYear.detail',compact('academicYear'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AcademicYear  $academicYear
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $academicYear = AcademicYear::find($id);
        //dd($academicYear);
        return view('schoolTemplate.academicYear.editForm',compact('academicYear'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AcademicYear  $academicYear
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'yearOne' => 'required|unique:academic_years,year_one|digits:4|integer|min:1900|max:'.(date('Y')+1),
            'yearTwo' => 'required|unique:academic_years,year_two|digits:4|integer|min:'.($request->yearOne)+1,
        ]);
        //dd($id);
        $academicYear = AcademicYear::find($id);
        $academicYear->year_one = $request->yearOne;
        $academicYear->year_two = $request->yearTwo;
        $academicYear->save();

        return redirect()->route('academic.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AcademicYear  $academicYear
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $academicYear = AcademicYear::find($id);
        $academicYear->delete();
        return redirect()->route('academic.index');
    }
}
