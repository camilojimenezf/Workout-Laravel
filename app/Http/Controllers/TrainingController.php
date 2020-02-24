<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Training;

class TrainingController extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trainings=Training::all();

        return view('training.index', compact('trainings'));//

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('training.create') ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $message=["required"=>'El: atribute es requerido'];
        $request->validate([
            'title'=>'required',
            'description'=>'required',
            'duration'=>'required',
        ],$message);
        
        $training=new Training([
            'title'=>$request->get('title'),
            'description'=>$request->get('description'),
            'duration'=>$request->get('duration'),
        ]);
        $training->save();
       return redirect('/training')->with('message','Guardado Satisfactoriamente');
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
        $training = Training::find($id);
        return view('training.edit',['training'=>$training]);
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
        ],$message);
        $training=Training::find($id);
        $training->title = $request->title;
        $training->description = $request->description;
        $training->duration = $request->duration;
         
        $training->save();
    
       // Session::flash('message', 'Editado Satisfactoriamente !');
        return redirect('training')->with('message', 'Modificado Satisfactoriamente !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Training::destroy($id);
        return redirect('training')->with('message', 'training deleted!');
    }
}
