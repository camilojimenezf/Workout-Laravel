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


/* Rutas para Routine */
Route::resource('routines', 'RoutineController', ['except' => ['create', 'edit']])->middleware('trainerCheck');

