<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_Achievement extends Model
{
    use HasFactory;
	protected $fillable = ['user_id','month_id','year','achievements_date','target_type_id','target_unit_id','achievement_amount'
							,'member_id','client_info','note'];							
	protected $table = "user_achievements";	
	public function member(){
		return $this->belongsTo('App\Models\Member');
		}
	public function month(){
		return $this->belongsTo('App\Models\Month');
		}
	public function target_cat(){
		return $this->belongsTo('App\Models\Target_Cat');
		}
	public function target_unit(){
		return $this->belongsTo('App\Models\Target_Unit');
		}
	public function user(){
		return $this->belongsTo('App\Models\User');
		}
			
}
