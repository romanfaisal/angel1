<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Month extends Model
{
    use HasFactory;	
	protected $fillable = ['month_name'];
	public function user_target(){
		return $this->hasMany('App\Models\User_Target', 'month_id', 'id');
		}
	public function user_achievement(){
		return $this->hasMany('App\Models\User_Achievement', 'month_id', 'id');
		}
	public function payment(){
		return $this->hasMany('App\Models\Payment', 'member_id', 'id');
		}
}
