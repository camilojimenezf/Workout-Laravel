<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Athlete;
use App\Http\Controllers\ApiController;

class AthleteController extends ApiController{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $athletes = Athlete::all();
        return $this->showAll($athletes);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Recoger los datos del usuario por post
        $json = $request->input('json', null);
        $params_array = json_decode($json, true);

        $validate = \Validator::make($params_array, [
            'user_id' => 'required|integer',
            'level' => 'required',
            'points' => 'required|integer'
        ]);

        if ($validate->fails()) {
            return $this->errorResponse('Error al validar los datos', 400);
        }
        
        $athlete = Athlete::create($params_array);

        return $this->showOne($athlete, 201);
    }

   
    public function show($id)
    {
        $athlete = Athlete::findOrFail($id);
        return $this->showOne($athlete);
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
        $athlete = Athlete::findOrFail($id);

        $json = $request->input('json', null);
        $params = json_decode($json);
        $params_array = json_decode($json, true);

        $validate = \Validator::make($params_array, [
            'user_id' => 'required|integer',
            'level' => 'required',
            'points' => 'required|integer'
        ]);

        if ($validate->fails()) {
            return $this->errorResponse('Error al validar los datos', 400);
        }

        if (isset($params->user_id)) {
            $athlete->user_id = $params->user_id;
        }

        if (isset($params->level)) {
            $athlete->level = $params->level;
        }

        if (isset($params->points)) {
            $athlete->points = $params->points;
        }

        if (!$athlete->isDirty()) {
            return $this->errorResponse('Se debe especificar al menos un valor diferente para actualizar',422);
        } 

        $athlete->save();

        return $this->showOne($athlete);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $athlete = Athlete::findOrFail($id);
        $athlete->delete();
        return $this->showOne($athlete);
    }
}
