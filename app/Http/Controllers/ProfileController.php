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
    public function index()
    {
        $profiles=Profile::all();
    
        return $this->showAll($profiles);   //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        
        $rules=[
            'athlete_id'=>'required',
            'weight'=>'required',
            'height'=>'required|integer',
            'body_fat'=>'required|integer'
        ];

        $this->validate($request,$rules);
        $campos=$request->all();
        $profile=Profile::create($campos);
        return $this->showOne($profile,201);    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $profile =Profile::findOrFail($id);
        return $this->showOne($profile);
     
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        
        $profile =Profile::findOrFail($id);
        
        $rules=[
            'athlete_id'=>'required|unique:athletes',
            'weight'=>'required',
            'height'=>'required|integer',
            'body_fat'=>'required|integer'
        ];

        $this->validate($request,$rules);

        if ($request->has('athlete_id')) {
            $profile->athlete_id = $request->athlete_id;
        }
        if ($request->has('weight')) {
            $profile->weight = $request->weight;
        }
        if ($request->has('height')) {
            $profile->height = $request->height;
        }
        if ($request->has('body_fat')) {
            $profile->body_fat = $request->body_fat;
        }



        $profile->save();

        $this->validate($request,$rules);

    
   
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
