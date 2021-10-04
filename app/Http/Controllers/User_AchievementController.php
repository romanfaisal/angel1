<?php

namespace App\Http\Controllers;


use App\Models\Member;
use App\Models\Month;
use App\Models\Target_Cat;
use App\Models\Target_Unit;
use App\Models\User;
use App\Models\User_Achievement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Query\JoinClause;

class User_AchievementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		/*
		$user_achievements = DB::table('user_achievements')->
		->join('members', 'user_achievements.member_id', '=', 'members.id')
            	->join('months', 'user_achievements.month_id', '=', 'months.id')
		->join('target_cats', 'user_achievements.target_type_id', '=', 'target_cats.id')
            	->join('target_units', 'user_achievements.target_unit_id', '=', 'target_units.id')
		->join('users', 'user_achievements.user_id', '=', 'users.id')
            	->select('user_achievements.achievement_amount', 'members.name', 'months.month_name', 'target_cats.name', 			'target_units.name', 'users.name')->get();
		*/
        $user_achievements = User_Achievement::ALL();
		foreach ($user_achievements as $user_achievement){
				$user_data= User::where('id', $user_achievement->user_id)->first();
				$user_achievement->user_id=$user_data->name;
				$month_data= Month::where('id', $user_achievement->month_id)->first();
				$user_achievement->month_id=$month_data->month_name;
				$target_type_data= Target_Cat::where('id', $user_achievement->target_type_id)->first();
				$user_achievement->target_type_id=$target_type_data->name;
				$target_unit_data= Target_Unit::where('id', $user_achievement->target_unit_id)->first();
				$user_achievement->target_unit_id=$target_unit_data->name;
			}
		return view('user_achievements.index', compact('user_achievements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $members = Member::ALL();
		$months = Month::ALL();
		$load_target_cats = Target_Cat::where('parent_id', '=', 0)->get();
		$load_target_units = Target_Unit::where('parent_id', '=', 0)->get();
		$users = User::ALL();
		return view('user_achievements.create',compact('members','months','load_target_cats','load_target_units','users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(['year' => 'required','achievement_amount' => 'required']);	
		User_Achievement::create($request->all());
	    return redirect()->route('user_achievements.index')->with('success','User Achievement created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User_Achievement  $user_Achievement
     * @return \Illuminate\Http\Response
     */
    public function show(User_Achievement $user_achievement)
    {
		        $user_data= User::where('id', $user_achievement->user_id)->first();
				$user_achievement->user_id=$user_data->name;
				$month_data= Month::where('id', $user_achievement->month_id)->first();
				$user_achievement->month_id=$month_data->month_name;
				$target_type_data= Target_Cat::where('id', $user_achievement->target_type_id)->first();
				$user_achievement->target_type_id=$target_type_data->name;
				$target_unit_data= Target_Unit::where('id', $user_achievement->target_unit_id)->first();
				$user_achievement->target_unit_id=$target_unit_data->name;
				if($user_achievement->member_id!=0){
					$member_data= Member::where('id', $user_achievement->member_id)->first();
					$user_achievement->member_id=$member_data->name;
				}
				else{
					$user_achievement->member_id="";
					}
				
        return view('user_achievements.show',compact('user_achievement'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User_Achievement  $user_Achievement
     * @return \Illuminate\Http\Response
     */
    public function edit(User_Achievement $user_achievement)
    {
         $members = Member::ALL();
		$months = Month::ALL();
		$load_target_cats = Target_Cat::where('parent_id', '=', 0)->get();
		$load_target_units = Target_Unit::where('parent_id', '=', 0)->get();
		$users = User::ALL();
		 return view('user_achievements.edit',compact('user_achievement','members','months','load_target_cats','load_target_units','users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User_Achievement  $user_Achievement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User_Achievement $user_achievement)
    {
       $request->validate(['year' => 'required','achievement_amount' => 'required']);

        $user_achievement->update($request->all());
        return redirect()->route('user_achievements.index')->with('success','User Achievement updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User_Achievement  $user_Achievement
     * @return \Illuminate\Http\Response
     */
    public function destroy(User_Achievement $user_achievement)
    {
        $user_achievement->delete();
        return redirect()->route('user_achievements.index')->with('success','User Achievement deleted successfully');
    }
}
