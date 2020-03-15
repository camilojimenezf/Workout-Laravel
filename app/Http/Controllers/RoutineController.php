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
        $json = $request->input('json', null);
        $params_array = json_decode($json, true);

        $validate = \Validator::make($params_array, [
            'trainer_id' => 'required',
            'title' => 'required',
            'description' => 'required',
            'duration' => 'required|integer',
            'frequency' => 'required|integer',
            'goal' => 'required',
        ]);

        if ($validate->fails()) {
            return $this->errorResponse('Error al validar los datos', 400);
        }

        $routine = Routine::create($params_array);

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

        $json = $request->input('json', null);
        $params = json_decode($json);
        $params_array = json_decode($json, true);

        $validate = \Validator::make($params_array, [
            'duration' => 'integer',
            'frequency' => 'integer',
        ]);

        if ($validate->fails()) {
            return $this->errorResponse('Error al validar los datos', 400);
        }

        if (isset($params->trainer_id)) {
            $routine->trainer_id = $params->trainer_id;
        }

        if (isset($params->title)) {
            $routine->title = $params->title;
        }

        if (isset($params->description)) {
            $routine->description = $params->description;
        }

        if (isset($params->duration)) {
            $routine->duration = $params->duration;
        }

        if (isset($params->frequency)) {
            $routine->frequency = $params->frequency;
        }

        if (isset($params->goal)) {
            $routine->goal = $params->goal;
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
