<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Plan;
use App\Http\Controllers\ApiController;


class PlanController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $plans = Plan::all();
        return $this->showAll($plans);
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
            'name' => 'required',
            'price' => 'required|integer',
        ]);

        if ($validate->fails()) {
            return $this->errorResponse('Error al validar los datos', 400);
        }

        $plan = Plan::create($params_array);

        return $this->showOne($plan, 201);
    }

   
    public function show($id)
    {
        $plan = Plan::findOrFail($id);
        return $this->showOne($plan);
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
        $plan = Plan::findOrFail($id);

        $json = $request->input('json', null);
        $params = json_decode($json);
        $params_array = json_decode($json, true);

        $validate = \Validator::make($params_array, [
            'price' => 'integer',
        ]);

        if ($validate->fails()) {
            return $this->errorResponse('Error al validar los datos', 400);
        }

        if (isset($params->name)) {
            $plan->name = $params->name;
        }

        if (isset($params->price)) {
            $plan->price = $params->price;
        }

        if (!$plan->isDirty()) {
            return $this->errorResponse('Se debe especificar al menos un valor diferente para actualizar',422);
        } 

        $plan->save();

        return $this->showOne($plan);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $plan = Plan::findOrFail($id);
        $plan->delete();
        return $this->showOne($plan);
    }
}
