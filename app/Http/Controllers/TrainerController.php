<?php

namespace App\Http\Controllers;

use App\Trainer;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class TrainerController extends ApiController
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $trainers = Trainer::all();
        return $this->showAll($trainers);
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
            'certification' => 'required',
            'score' => 'required|integer',
            'description' => 'required'
        ]);

        if ($validate->fails()) {
            return $this->errorResponse('Error al validar los datos', 400);
        }
        
        $trainer = Trainer::create($params_array);

        return $this->showOne($trainer, 201);
    }

   
    public function show($id)
    {
        $trainer = Trainer::findOrFail($id);
        return $this->showOne($trainer);
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
        $trainer = Trainer::findOrFail($id);

        $json = $request->input('json', null);
        $params = json_decode($json);
        $params_array = json_decode($json, true);

        $validate = \Validator::make($params_array, [
            'user_id' => 'integer',
            'score' => 'integer',
            'description' => 'required'
        ]);

        if ($validate->fails()) {
            return $this->errorResponse('Error al validar los datos', 400);
        }

        if (isset($params->user_id)) {
            $trainer->user_id = $params->user_id;
        }

        if (isset($params->certification)) {
            $trainer->certification = $params->certification;
        }

        if (isset($params->score)) {
            $trainer->score = $params->score;
        }

        if (isset($params->description)) {
            $trainer->description = $params->description;
        }

        if (!$trainer->isDirty()) {
            return $this->errorResponse('Se debe especificar al menos un valor diferente para actualizar',422);
        } 

        $trainer->save();

        return $this->showOne($trainer);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $trainer = Trainer::findOrFail($id);
        $trainer->delete();
        return $this->showOne($trainer);
    }
}
