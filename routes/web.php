<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\MonthController;
use App\Http\Controllers\Target_CatController;
use App\Http\Controllers\Target_UnitController;
use App\Http\Controllers\User_AchievementController;
use App\Http\Controllers\User_TargetController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::resource('members', MemberController::class);
Route::resource('months', MonthController::class);
Route::resource('target_cats', Target_CatController::class);
Route::resource('target_units', Target_UnitController::class);
Route::resource('user_achievements', User_AchievementController::class);
Route::resource('user_targets', User_TargetController::class);
Route::resource('users', UserController::class);
Route::get('/', [SearchController::class,'index'])->name('search');