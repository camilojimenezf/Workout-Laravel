<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Athlete;
use App\Http\Controllers\ApiController;

class AthleteController extends ApiController{
    
    public function index(Request $request){

        $athletes=Athlete::all();
        return $this->showAll($athletes);
    }

    public function store(Request $request){
        $rules=[
            'user_id' => 'required|unique:athletes',
            'level' => 'required',
            'points' => 'required|integer'

        ];
        $this->validate($request,$rules);
        $campos=$request->all();
        $athlete=Athlete::create($campos);
        return $this->showOne($athlete,201);
      

    }
    public function show($id){
        $athlete =Athlete::findOrFail($id);
        return $this->showOne($athlete);
     
    }
    public function update(Request $request, $id){
       
        $athlete = Athlete::findOrFail($id);
       
        $rules=[
            'user_id' => 'required|unique:athletes',
            'level' => 'required',
            'points' => 'required|integer'

        ]; 

        $this->validate($request, $rules);

        if ($request->has('user_id')) {
            $athlete->user_id = $request->user_id;
        }
        if ($request->has('level')) {
            $athlete->level = $request->level;
        }
        if ($request->has('points')) {
            $athlete->points = $request->points;
        }
       
        $athlete->save();

        return $this->showOne($athlete);   
     }
     public function destroy($id)
     {
         $athlete = Athlete::findOrFail($id);
         $athlete->delete();
         return $this->showOne($athlete);
     }

    
}
