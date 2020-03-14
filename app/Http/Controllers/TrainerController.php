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
        // Recoger POST
        $rules = [
            'user_id' => 'required|integer|unique:trainers',
            'certification' => 'required|min:10',
            'score' => 'required|integer',
            'description' => 'required|min:10',
        ];

        $this->validate($request, $rules);
        $campos = $request->all();
        
        $trainer = Trainer::create($campos);

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

        $rules = [
            'user_id' => 'required|number',
            'certification' => 'required|min:10',
            'score' => 'required|number',
            'description' => 'required|min:10',
        ];

        $this->validate($request, $rules);

        if ($request->has('certification')) {
            $trainer->certification = $request->certification;
        }

        if ($request->has('score')) {
            $trainer->score = $request->score;
        }

        if ($request->has('description')) {
            $trainer->description = $request->description;
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
