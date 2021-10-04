<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Target_Unit extends Model
{
    use HasFactory;
	protected $fillable = ['name','desc','parent_id'];
	protected $table = "target_units";
	public function childs() {
        return $this->hasMany(Target_Unit::class,'parent_id','id') ;
    }
	public function user_target(){
		return $this->hasMany('App\Models\User_Target', 'target_unit_id', 'id');
		}
	public function user_achievement(){
		return $this->hasMany('App\Models\User_Achievement', 'target_unit_id', 'id');
		}
	public function payment(){
		return $this->hasMany('App\Models\Payment', 'member_id', 'id');
		}
}
