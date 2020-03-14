<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Plan;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use DB;
use Input;
use Storage;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $plans=Plan::all();
    
         return view ('plan.index',compact('plans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('plan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dataPlans=$request->except('_token');
        $message=["required"=>'El: atribute es requerido'];
        $request->validate([
            'name'=>'required',
            'price'=>'required',
        ],$message);
        
        $Plan=new Plan([
            'name'=>$request->get('name'),
            'price'=>$request->get('price'),
        ]);
        $Plan->save();
       return redirect('plan')->with('message','Guardado Satisfactoriamente !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        $plans = Plan::find($id);
        return view('plan.edit',['plan'=>$plans]);
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        $message=["required"=>'El: atribute es requerido'];
        $request->validate([
            'name'=>'required',
            'price'=>'required',
        ],$message);
        $plan=Plan::find($id);
        $plan->name = $request->name;
        $plan->price = $request->price;
         
        $plan->save();
    
       // Session::flash('message', 'Editado Satisfactoriamente !');
        return redirect('plan')->with('message', 'Modificado Satisfactoriamente !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        Plan::destroy($id);
       return redirect('plan')->with('message', 'plan deleted!');
   }
}
