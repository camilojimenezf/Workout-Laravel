<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/* Rutas para User */
Route::post('login', 'UserController@login');

Route::resource('users', 'UserController', ['except' => ['create', 'edit']]);

/* Rutas para Trainers */
Route::resource('trainers', 'TrainerController', ['except' => ['create', 'edit','index']])->middleware('trainerCheck');
Route::resource('trainers', 'TrainerController', ['only' => ['index']]);

Route::resource('athletes', 'AthleteController', ['except' => ['create', 'edit','index']])->middleware('athleteCheck');
Route::resource('athletes', 'AthleteController', ['only' => ['index']]);

//Route::resource('profile', 'ProfileController', ['except' => ['create', 'edit','index']])->middleware('athleteCheck');
//Route::resource('profile', 'ProfileController', ['only' => ['index']]);
Route::resource('profile', 'ProfileController');
Route::resource('plans', 'PlanController');
Route::resource('trainings', 'TrainingController');


/* Rutas para Routine */
Route::resource('routines', 'RoutineController', ['except' => ['create', 'edit']])->middleware('trainerCheck');

