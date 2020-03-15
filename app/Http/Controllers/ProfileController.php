<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;
use App\Http\Controllers\ApiController;



class ProfileController extends ApiController
{
            /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $profiles = Profile::all();
        return $this->showAll($profiles);
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
            'athlete_id' => 'required|integer',
            'weight' => 'required|integer',
            'height' => 'required|integer',
            'body_fat' => 'required|integer',
        ]);

        if ($validate->fails()) {
            return $this->errorResponse('Error al validar los datos', 400);
        }

        $profile = Profile::create($params_array);

        return $this->showOne($profile, 201);
    }

   
    public function show($id)
    {
        $profile = Profile::findOrFail($id);
        return $this->showOne($profile);
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
        $profile = Profile::findOrFail($id);

        $json = $request->input('json', null);
        $params = json_decode($json);
        $params_array = json_decode($json, true);


        $validate = \Validator::make($params_array, [
            'athlete_id' => 'integer',
            'weight' => 'integer',
            'height' => 'integer',
            'body_fat' => 'integer',
        ]);

        if ($validate->fails()) {
            return $this->errorResponse('Error al validar los datos', 400);
        }

        if (isset($params->athlete_id)) {
            $profile->athlete_id = $params->athlete_id;
        }

        if (isset($params->weight)) {
            $profile->weight = $params->weight;
        }

        if (isset($params->height)) {
            $profile->height = $params->height;
        }

        if (isset($params->body_fat)) {
            $profile->body_fat = $params->body_fat;
        }

        if (!$profile->isDirty()) {
            return $this->errorResponse('Se debe especificar al menos un valor diferente para actualizar',422);
        } 

        $profile->save();

        return $this->showOne($profile);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $profile = Profile::findOrFail($id);
        $profile->delete();
        return $this->showOne($profile);
    }
}
