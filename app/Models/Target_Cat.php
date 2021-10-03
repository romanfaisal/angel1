<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Target_Cat extends Model
{
    use HasFactory;
	protected $fillable = ['name','desc','parent_id'];
	protected $table = "target_cats";
	public function childs() {
        return $this->hasMany('App\Models\Target_Cat','parent_id','id') ;
    }
	
	public function user_target(){
		return $this->hasMany('App\Models\User_Target', 'target_type_id', 'id');
		}
	public function user_achievement(){
		return $this->hasMany('App\Models\User_Achievement', 'target_type_id', 'id');
		}

}
