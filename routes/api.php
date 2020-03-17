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
Route::resource('users', 'UserController', ['except' => ['create', 'edit']]);//->middleware('authCheck');

/* Rutas para Trainers */
Route::resource('trainers', 'TrainerController', ['except' => ['create', 'edit','index']])->middleware('trainerCheck');
Route::resource('trainers', 'TrainerController', ['only' => ['index']]);

/* Rutas para Athletes */
Route::resource('athletes', 'TrainerController', ['except' => ['create', 'edit','index']])->middleware('athleteCheck');
Route::resource('athletes', 'TrainerController', ['only' => ['index']]);

/* Rutas para Profiles */
Route::resource('profiles', 'ProfileController', ['except' => ['create', 'edit']])->middleware('athleteCheck');

/* Rutas para Routine */
Route::resource('routines', 'RoutineController', ['except' => ['create', 'edit']])->middleware('trainerCheck');

/* Rutas para User-Athlete */
Route::resource('users.athletes', 'User\UserAthleteController', ['only' => ['index','store']])->middleware('authCheck');

/* Rutas para User-Profile */
Route::resource('users.profiles', 'User\UserProfileController', ['only' => ['index']])->middleware('athleteCheck');

