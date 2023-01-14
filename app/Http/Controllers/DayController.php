<?php

namespace App\Http\Controllers;

use App\Models\Day;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class DayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $days = Day::all();
        return view('schoolTemplate.Day.list', compact('days'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('schoolTemplate.Day.createForm');
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
            'name' => 'required|unique:days,name',
        ]);
        $day = new Day;
        $day->name = $request->name;
        $day->save();
        return redirect()->route('day.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Day  $day
     * @return \Illuminate\Http\Response
     */
    public function show(Day $day)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Day  $day
     * @return \Illuminate\Http\Response
     */
    public function edit(Day $day)
    {
        return view('schoolTemplate.Day.editForm', compact('day'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Day  $day
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Day $day)
    {
        $request->validate([
            'name' => ['required', Rule::unique('days', 'name')->ignore($day->id)],
        ]);

        $day->name = $request->name;
        $day->save();
        return redirect()->route('day.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Day  $day
     * @return \Illuminate\Http\Response
     */
    public function destroy(Day $day)
    {
        $day->delete();
        return redirect()->route('day.index');
    }
}
