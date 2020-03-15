<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Training;
use App\Http\Controllers\ApiController;


class TrainingController extends ApiController{
    
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $trainings = Training::all();
        return $this->showAll($trainings);
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
            'title'=>'required',
            'description'=>'required',
            'duration'=>'required|integer',
        ]);
        if ($validate->fails()) {
            return $this->errorResponse('Error al validar los datos', 400);
        }
        
        $trainings = Training::create($params_array);

        return $this->showOne($trainer, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $trainings = Training::findOrFail($id);
        return $this->showOne($trainings);
    }

    /**
     * 
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $training=Training::findOrFail($id);

        $json=$request->input('json',null);
        $params=json_decode($json);
        $params_array=json_decode($json,true);


        $validate= \Validator::make($params_array,[
            'title'=>'required',
            'description'=>'required',
            'duration'=>'required|integer',
        ]);
        if ($validate->fails()) {
            return $this->errorResponse("Error al validar los datos",400);
        }
        
        if (isset($params->title)) {
            $training->title=$params->title;
        }
        if (isset($params->description)) {
            $training->description=$params->description;
        }
        if (isset($params->duration)) {
            $training->duration=$params->duration;
        }

        if (!$training->isDirty()) {
            return $this->errorResponse("se debe especificar almenos un valor diferente para actualizar");
        }

         
        $training->save();
        
        return $this->showOne($training);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $training = Training::findOrFail($id);
        $training->delete();
        return $this->showOne($training);
    }
}
