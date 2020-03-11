<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Athlete;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use DB;
use Input;
use Storage;
class AthleteController extends Controller{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(Request $request){
        $request->user()->authorizeRoles(['user', 'admin']);

        $athletes=Athlete::all();
        return view ('athlete.index',compact('athletes'));
    }

    public function create(){
      
            return view ('athlete.create');

    }
    public function store(Request $request){
        $dataAthlete=$request->except('_token');
        $message=["required"=>'El: atribute es requerido'];
        $request->validate([
            'user_id'=>'required',
            'level'=>'required',
            'points'=>'required'
        ],$message);
        
        $Athlete=new Athlete([
            'user_id'=>$request->get('user_id'),
            'level'=>$request->get('level'),
            'points'=>$request->get('points') 
        ]);
        $Athlete->save();
       return redirect('athlete')->with('message','Guardado Satisfactoriamente !');

    }
    public function edit($id)
    {
        $athletes = Athlete::find($id);
        return view('athlete.edit',['athlete'=>$athletes]);
    }

    public function update(Request $request, $id){
        $message=["required"=>'El: atribute es requerido'];
        $request->validate([
            'user_id'=>'required',
            'level'=>'required',
            'points'=>'required'
        ],$message);
        $athlete=Athlete::find($id);
        $athlete->user_id = $request->user_id;
        $athlete->level = $request->level;
        $athlete->points = $request->points;   
        $athlete->save();
    
       // Session::flash('message', 'Editado Satisfactoriamente !');
        return redirect('athlete')->with('message', 'Modificado Satisfactoriamente !');
    }
     public function destroy($id){
         Athlete::destroy($id);
        return redirect('athlete')->with('message', 'athletes deleted!');
    }

    
}
