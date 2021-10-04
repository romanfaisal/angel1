<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;
	protected $fillable = ['name','mobile','email','address','details'];
	public function user_achievement(){
		return $this->hasMany('App\Models\User_Achievement', 'member_id', 'id');
		}
	public function payment(){
		return $this->hasMany('App\Models\Payment', 'member_id', 'id');
		}
}
