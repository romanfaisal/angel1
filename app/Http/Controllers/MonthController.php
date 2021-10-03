<?php

namespace App\Http\Controllers;

use App\Models\Month;
use Illuminate\Http\Request;


class MonthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       	$months = Month::ALL();
		return view('months.index', compact('months'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('months.create');
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
            'month_name' => 'required',
             ]);
		
		
		   Month::create($request->all());
	    	
			
			return redirect()->route('months.index')->with('success','Month created successfully.');
		
		
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Month  $month
     * @return \Illuminate\Http\Response
     */
    public function show(Month $month)
    {
		return view('months.show',compact('month'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Month  $month
     * @return \Illuminate\Http\Response
     */
    public function edit(Month $month)
    {
        return view('months.edit',compact('month'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Month  $month
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Month $month)
    {
        $request->validate([
            'month_name' => 'required',
        ]);

        $month->update($request->all());
        return redirect()->route('months.index')->with('success','Month updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Month  $month
     * @return \Illuminate\Http\Response
     */
    public function destroy(Month $month)
    {
        $month->delete();
        return redirect()->route('months.index')->with('success','Month deleted successfully');
    }
}
