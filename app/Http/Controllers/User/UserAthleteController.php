<?php

namespace App\Http\Controllers\User;

use App\Athlete;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use Illuminate\Support\Collection;

class UserAthleteController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        $athlete = $user->athlete;
        if (is_null($athlete)) {
            return $this->errorResponse('No posee un atleta asociado al usuario', 400);
        }
        return response()->json($athlete, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(User $user)
    {
        $exist_athlete = $user->athlete;

        if (is_null($exist_athlete)) {
            $athlete = new Athlete();
            $athlete->user_id = $user->id;
            $athlete->level = 'BEGINNER';
            $athlete->points = 0;
            
            $athlete->save();
    
            return $this->showOne($athlete, 201);
        } else {
            return $this->errorResponse('Ya posee un atleta asociado', 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
