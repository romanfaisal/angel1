<?php

namespace App\Http\Controllers;

use App\Models\Target_Unit;
use Illuminate\Http\Request;

class Target_UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $target_units = Target_Unit::ALL();
		foreach ($target_units as $target_unit){
			if($target_unit->parent_id==0){
					$target_unit->parent_id="Parent";
				}
			else{
					$utarget_unit_data= Target_Unit::where('id', $target_unit->parent_id)->first();
					$target_unit->parent_id=$utarget_unit_data->name;				
				}
				
			}
		return view('target_units.index', compact('target_units'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {	   
	   $load_target_units = Target_Unit::where('parent_id', '=', 0)->get();
       return view('target_units.create', compact('load_target_units'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(['name' => 'required']);	
		Target_Unit::create($request->all());
	    return redirect()->route('target_units.index')->with('success','Target Unit created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Target_Unit  $target_Unit
     * @return \Illuminate\Http\Response
     */
    public function show(Target_Unit $target_unit)
    {
		if($target_unit->parent_id==0){
			$target_unit->parent_id="Parent";
		}
		else{
			$target_unit_data= Target_Unit::where('id', $target_unit->parent_id)->first();
			$target_unit->parent_id=$target_unit_data->name;				
		}
        return view('target_units.show',compact('target_unit'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Target_Unit  $target_Unit
     * @return \Illuminate\Http\Response
     */
    public function edit(Target_Unit $target_unit)
    {
		$load_target_units = Target_Unit::where('parent_id', '=', 0)->get();
         return view('target_units.edit',compact('target_unit','load_target_units'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Target_Unit  $target_Unit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Target_Unit $target_unit)
    {
        $request->validate(['name' => 'required',]);

        $target_unit->update($request->all());
        return redirect()->route('target_unit.index')->with('success','Target Unit updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Target_Unit  $target_Unit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Target_Unit $target_unit)
    {
        $target_unit->delete();
        return redirect()->route('target_units.index')->with('success','Target Unit deleted successfully');
    }
}
