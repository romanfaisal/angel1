<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_Target extends Model
{
    use HasFactory;
	protected $fillable = ['user_id' , 'month_id' , 'year' , 'achievements_date' , 'target_type_id' , 'target_unit_id' ,
							'target_amount' , 'note'];
	protected $table = "user_targets";
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