<?php

namespace App\Http\Controllers;


use App\Models\Month;
use App\Models\Target_Cat;
use App\Models\Target_Unit;
use App\Models\User;
use App\Models\User_Target;
use Illuminate\Http\Request;

class User_TargetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_targets = User_Target::ALL();
		foreach ($user_targets as $user_target){
				$user_data= User::where('id', $user_target->user_id)->first();
				$user_target->user_id=$user_data->name;
				$month_data= Month::where('id', $user_target->month_id)->first();
				$user_target->month_id=$month_data->month_name;
				$target_type_data= Target_Cat::where('id', $user_target->target_type_id)->first();
				$user_target->target_type_id=$target_type_data->name;
				$target_unit_data= Target_Unit::where('id', $user_target->target_unit_id)->first();
				$user_target->target_unit_id=$target_unit_data->name;
			}
		return view('user_targets.index', compact('user_targets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$months = Month::ALL();
		$load_target_cats = Target_Cat::where('parent_id', '=', 0)->get();
		$load_target_units = Target_Unit::where('parent_id', '=', 0)->get();
		$users = User::ALL();
        return view('user_targets.create',compact('months','load_target_cats','load_target_units','users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(['year' => 'required','target_amount' => 'required']);	
		User_Target::create($request->all());
	    return redirect()->route('user_targets.index')->with('success','User Target created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User_Target  $user_Target
     * @return \Illuminate\Http\Response
     */
    public function show(User_Target $user_target)
    {
		$user_data= User::where('id', $user_target->user_id)->first();
		$user_target->user_id=$user_data->name;
		$month_data= Month::where('id', $user_target->month_id)->first();
		$user_target->month_id=$month_data->month_name;
		$target_type_data= Target_Cat::where('id', $user_target->target_type_id)->first();
		$user_target->target_type_id=$target_type_data->name;
		$target_unit_data= Target_Unit::where('id', $user_target->target_unit_id)->first();
		$user_target->target_unit_id=$target_unit_data->name;
        return view('user_targets.show',compact('user_target'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User_Target  $user_Target
     * @return \Illuminate\Http\Response
     */
    public function edit(User_Target $user_target)
    {
        $months = Month::ALL();
		$load_target_cats = Target_Cat::where('parent_id', '=', 0)->get();
		$load_target_units = Target_Unit::where('parent_id', '=', 0)->get();
		$users = User::ALL();
		 return view('user_targets.edit',compact('user_target','months','load_target_cats','load_target_units','users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User_Target  $user_Target
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User_Target $user_target)
    {
        $request->validate(['year' => 'required','target_amount' => 'required']);
        $user_target->update($request->all());
        return redirect()->route('user_targets.index')->with('success','User Target updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User_Target  $user_Target
     * @return \Illuminate\Http\Response
     */
    public function destroy(User_Target $user_target)
    {
        $user_target->delete();
        return redirect()->route('user_targets.index')->with('success','User Target deleted successfully');
    }
}
