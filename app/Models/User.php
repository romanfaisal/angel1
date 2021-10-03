<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
   use HasFactory;
    protected $fillable = ['name','username','email','password'];
	public function user_target(){
		return $this->hasMany('App\Models\User_Target', 'user_id', 'id');
		}
	public function user_achievement(){
		return $this->hasMany('App\Models\User_Achievement', 'user_id', 'id');
		}
}
