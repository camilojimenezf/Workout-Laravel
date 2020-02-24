<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Routine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;
use Input;
use Storage;

class RoutineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $routines=Routine::all();
        return view('routine.index',compact('routines'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('routine.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // $dataroutine=$request->except('_token');
        $message=["required"=>'El: atribute es requerido'];
        $request->validate([
            'title'=>'required',
            'description'=>'required',
            'duration'=>'required',
            'frequency'=>'required'
        ],$message);
        
        $Routine=new Routine([
            'title'=>$request->get('title'),
            'description'=>$request->get('description'),
            'duration'=>$request->get('duration'),
            'frequency'=>$request->get('frequency'),
        ]);
        $Routine->save();
       return redirect('/routine')->with('message','Guardado Satisfactoriamente');
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $routines = Routine::find($id);
        return view('routine.edit',['routine'=>$routines]);
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
        $message=["required"=>'El: atribute es requerido'];
        $request->validate([
            'title'=>'required',
            'description'=>'required',
            'duration'=>'required',
            'frequency'=>'required'
        ],$message);
        $routine=Routine::find($id);
        $routine->title = $request->title;
        $routine->description = $request->description;
        $routine->duration = $request->duration;
        $routine->frequency = $request->frequency;
         
        $routine->save();
    
       // Session::flash('message', 'Editado Satisfactoriamente !');
        return redirect('routine')->with('message', 'Modificado Satisfactoriamente !');
        
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    }
    public function destroy($id)

    {
        Routine::destroy($id);
        return redirect('routine')->with('message', 'routine deleted!');

    }
}
