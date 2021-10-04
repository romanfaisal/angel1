<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
	protected $fillable = ['user_id','month_id','year', 'target_type_id' , 'target_unit_id','payment_date','payment_amount','member_id','client_info','note'];							
	public function member(){
		return $this->belongsTo('App\Models\Member');
		}
	public function month(){
		return $this->belongsTo('App\Models\Month');
		}	
	public function user(){
		return $this->belongsTo('App\Models\User');
		}
	public function target_cat(){
		return $this->belongsTo('App\Models\Target_Cat');
		}
	public function target_unit(){
		return $this->belongsTo('App\Models\Target_Unit');
		}
	public function user_achievement(){
		return $this->hasOne('App\Models\User_Achievement', 'payment_id', 'id');
		}
}
