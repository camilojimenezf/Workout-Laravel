<?php

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

<<<<<<< HEAD
Route::get('/', function () {
    return view('home');
});
//Auth::routes(['register'=>false,'reset'=>false]);
Auth::routes();
Route::resource('athlete','AthleteController')->middleware( 'auth' );
Route::resource('plan','PlanController')->middleware( 'auth' );
Route::resource('profile','ProfileController')->middleware( 'auth' );
Route::resource('trainer','TrainerController')->middleware( 'auth' );
Route::resource('routine','RoutineController')->middleware( 'auth' );
Route::resource('training','TrainingController')->middleware( 'auth' );



=======

/* 
Route::get('/', function () {
    return "Api desde laravel";
}); */
>>>>>>> master
