<?php

namespace App\Http\Controllers;

use App\Models\Period;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PeriodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $periods = Period::all();
        return view('schoolTemplate.Period.list', compact('periods'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('schoolTemplate.Period.createForm');
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
            'start_time' => 'required|unique:periods,start_time',
            'end_time' => 'required|unique:periods,start_time',
        ]);
        $period = new Period;
        $period->start_time = $request->start_time;
        $period->end_time = $request->end_time;
        $period->save();
        return redirect()->route('period.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Period  $period
     * @return \Illuminate\Http\Response
     */
    public function show(Period $period)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Period  $period
     * @return \Illuminate\Http\Response
     */
    public function edit(Period $period)
    {
        return view('schoolTemplate.Period.editForm', compact('period'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Period  $period
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Period $period)
    {
        $request->validate([
            'start_time' => ['required', Rule::unique('periods', 'start_time')->ignore($period->id)],
            'end_time' => ['required', Rule::unique('periods', 'end_time')->ignore($period->id)],
        ]);
        $period->start_time = $request->start_time;
        $period->end_time = $request->end_time;
        $period->save();
        return redirect()->route('period.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Period  $period
     * @return \Illuminate\Http\Response
     */
    public function destroy(Period $period)
    {
        $period->delete();
        return redirect()->route('period.index'); 
    }
}
