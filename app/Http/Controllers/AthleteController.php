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
    
    public function index(){
        $athletes=Athlete::all();
        return view('admin.athlete.index',compact('athletes'));
    }

    public function create(){
        $athletes=Athlete::all();
       
        return view ('admin.athlete.create',compact('athletes'));

    }
    public function store(ItemCreateRequest $request){
        $athletes = new Athlete;
        $athletes->user_id=$request->user_id;
        $athletes->level=$request->level;
        $athletes->points=$request->points;

        $athletes->save();;

        return redirect('admin/athletes')->with('message','Guardado Satisfactoriamente !');

    }
    public function edit($id)
    {
        $athletes = Athlete::find($id);
        return view('admin/athletes.edit',['athletes'=>$athletes]);
    }

    public function update(ItemUpdateRequest $request, $id)
    {        
        $athletes = Athlete::find($id);
    
        $athletes->user_id = $request->user_id;
        $athletes->level = $request->level;
        $athletes->points = $request->points;   
        $athletes->save();
    
        Session::flash('message', 'Editado Satisfactoriamente !');
        return Redirect::to('admin/athelte');
    }
  

    
}
