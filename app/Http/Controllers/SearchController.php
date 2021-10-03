<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Month;
use App\Models\Target_Cat;
use App\Models\Target_Unit;
use App\Models\User_Target;
use App\Models\User_Achievement;
use App\Models\User;
class SearchController extends Controller
{
    //
	public function index(Request $request)
    {
        
		$months = Month::ALL();
		$load_target_cats = Target_Cat::where('parent_id', '=', 0)->get();
		$load_target_units = Target_Unit::where('parent_id', '=', 0)->get();
		$users = User::ALL();
		$years =User_Target::select(DB::raw('DISTINCT(year)'))->orderBy('year')->get();
			
			$get_user_target =User_Target::orderBy('month_id')->orderBy('year')->orderBy('user_id');
			
			 if( $request->month_id and $request->month_id>0 ){
				 $get_user_target =$get_user_target->where('month_id', $request->month_id);
				 }
			if( $request->year and $request->year>0 ){
				  $get_user_target =$get_user_target->where('year', $request->year);
				 }
			 if( $request->user_id){
				 $user_id_array=$request->user_id;
				 if (!empty($user_id_array)) {
					 $get_user_target =$get_user_target->whereIn('user_id', $user_id_array);
				 	}
				 }
			 if( $request->target_type_id and $request->target_type_id>0 ){				 
				 $get_user_target =$get_user_target->where('target_type_id', $request->target_type_id);
				 }
			if( $request->target_unit_id and $request->target_unit_id>0 ){
				 $get_user_target =$get_user_target->where('target_unit_id', $request->target_unit_id);
				 }
			$get_user_target =$get_user_target->get();
			
		$si=1;
		foreach ($get_user_target as $key => $value){
			$user_id=$value->user_id;
			$month_id=$value->month_id;
			$year=$value->year;
			$target_type_id=$value->target_type_id;
			$target_unit_id=$value->target_unit_id;
			$total_target_amount=$value->target_amount;
			$total_achievements_amount=50;
			
			$month_details= Month::where('id',$month_id)->first();
			$users_details = User::where('id', $user_id)->first();
			$target_cat_details = Target_Cat::where('id', $target_type_id)->first();
			$target_unit_details = Target_Unit::where('id', $target_unit_id)->first();
			
			
			$user_achievements_details = User_Achievement::select('user_id',DB::raw('SUM(achievement_amount) as total_achievements_amount'))
                   ->where('user_id', '=', $user_id)
				   ->where('month_id', '=', $month_id)
				   ->where('year', '=', $year)
				   ->where('target_type_id', '=', $target_type_id)
				   ->where('target_unit_id', '=', $target_unit_id)
                   ->groupBy('user_id')->first();
				  
			   
			
		  	$total_achievements_amount=$user_achievements_details->total_achievements_amount;
			$achive_percentage=($total_achievements_amount/$total_target_amount)*100;				
			$search_resault[$si]["user_name"]=$users_details->name;
			$search_resault[$si]["user_email"]=$users_details->email;
			$search_resault[$si]["year"]=$year;
			$search_resault[$si]["month_name"]=$month_details->month_name;
		    $search_resault[$si]["target_type_name"]=$target_cat_details->name;
			$search_resault[$si]["target_unit_name"]=$target_unit_details->name;
			$search_resault[$si]["total_target_amount"]=$total_target_amount;
			$search_resault[$si]["total_achievements_amount"]=$total_achievements_amount;
		    $search_resault[$si]["achive_percentage"]=$achive_percentage;
			$si++;
		}   
						
		return view('search', compact('months','users','load_target_cats','load_target_units','search_resault','years'));
    }
}
