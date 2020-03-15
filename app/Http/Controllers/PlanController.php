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
    public function index()
    {
        $plans=Plan::all();
    
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

        $rules=[
            'name' => 'required',
            'price' =>'required'
        
        ];

        $this->validate($request,$rules);
        $campos=$request->all();
        $plan=Plan::create($campos);

        return $this->showOne($plan,201);  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $plan = Plan::findOrFail($id);
        return $this->showOne($plan);
    }
   
    public function update(Request $request, $id){
        
        $plan =Plan::findOrFail($id);

        $rules=[
            'name' => 'required',
            'price' =>'required|integer'
        
        ];
        $this->validate($request, $rules);

        if ($request->has('name')) {
            $plan->name = $request->name;
        }

        if ($request->has('price')) {
            $plan->price = $request->price;
        }
         
        $plan->save();
    
       // Session::flash('message', 'Editado Satisfactoriamente !');
        return $this->showOne($plan);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $plan = Plan::findOrFail($id);
        $plan->delete();
        return $this->showOne($plan);
   }
}
