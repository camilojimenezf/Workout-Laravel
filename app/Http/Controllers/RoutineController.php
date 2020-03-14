<?php

namespace App\Http\Controllers;

use App\Routine;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class RoutineController extends ApiController
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $routines = Routine::all();
        return $this->showAll($routines);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Recoger POST
        $rules = [
            'trainer_id' => 'required',
            'title' => 'required|min:3',
            'description' => 'required|min:10',
            'duration' => 'required|integer',
            'frequency' => 'required|integer',
            'goal' => 'required|min:10',
        ];

        $this->validate($request, $rules);
        $campos = $request->all();
        
        $routine = Routine::create($campos);

        return $this->showOne($routine, 201);
    }

   
    public function show($id)
    {
        $routine = Routine::findOrFail($id);
        return $this->showOne($routine);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $routine = Routine::findOrFail($id);

        $rules = [
            'trainer_id' => 'required',
            'title' => 'required|min:3',
            'description' => 'required|min:10',
            'duration' => 'required|integer',
            'frequency' => 'required|integer',
            'goal' => 'required|min:10',
        ];

        $this->validate($request, $rules);

        if ($request->has('trainer_id')) {
            $routine->trainer_id = $request->trainer_id;
        }

        if ($request->has('title')) {
            $routine->title = $request->title;
        }

        if ($request->has('description')) {
            $routine->description = $request->description;
        }

        if ($request->has('duration')) {
            $routine->duration = $request->duration;
        }

        if ($request->has('frequency')) {
            $routine->frequency = $request->frequency;
        }

        if ($request->has('goal')) {
            $routine->goal = $request->goal;
        }

        if (!$routine->isDirty()) {
            return $this->errorResponse('Se debe especificar al menos un valor diferente para actualizar',422);
        } 

        $routine->save();

        return $this->showOne($routine);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $routine = Routine::findOrFail($id);
        $routine->delete();
        return $this->showOne($routine);
    }
}
