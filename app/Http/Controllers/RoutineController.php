<?php

namespace App\Http\Controllers;
<<<<<<< HEAD
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
=======

use App\Routine;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class RoutineController extends ApiController
{
        /**
>>>>>>> master
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
<<<<<<< HEAD
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
=======
    public function index(Request $request)
    {
        $routines = Routine::all();
        return $this->showAll($routines);
>>>>>>> master
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
<<<<<<< HEAD
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
=======
        // Recoger POST
        $rules = [
            'trainer_id' => 'required',
            'title' => 'required|min:3',
            'description' => 'required|min:10',
            'duration' => 'required|integer',
            'frequency' => 'required|integer',
            'goal' => 'required|min:10',
        ];

        $this->validate($request, $rules);
        $campos = $request->all();
        
        $routine = Routine::create($campos);

        return $this->showOne($routine, 201);
    }

   
    public function show($id)
    {
        $routine = Routine::findOrFail($id);
        return $this->showOne($routine);
>>>>>>> master
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
<<<<<<< HEAD
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
        
=======
        $routine = Routine::findOrFail($id);

        $rules = [
            'trainer_id' => 'required',
            'title' => 'required|min:3',
            'description' => 'required|min:10',
            'duration' => 'required|integer',
            'frequency' => 'required|integer',
            'goal' => 'required|min:10',
        ];

        $this->validate($request, $rules);

        if ($request->has('trainer_id')) {
            $routine->trainer_id = $request->trainer_id;
        }

        if ($request->has('title')) {
            $routine->title = $request->title;
        }

        if ($request->has('description')) {
            $routine->description = $request->description;
        }

        if ($request->has('duration')) {
            $routine->duration = $request->duration;
        }

        if ($request->has('frequency')) {
            $routine->frequency = $request->frequency;
        }

        if ($request->has('goal')) {
            $routine->goal = $request->goal;
        }

        if (!$routine->isDirty()) {
            return $this->errorResponse('Se debe especificar al menos un valor diferente para actualizar',422);
        } 

        $routine->save();

        return $this->showOne($routine);
    }

>>>>>>> master
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
<<<<<<< HEAD
    }
    public function destroy($id)

    {
        Routine::destroy($id);
        return redirect('routine')->with('message', 'routine deleted!');

=======
    public function destroy($id)
    {
        $routine = Routine::findOrFail($id);
        $routine->delete();
        return $this->showOne($routine);
>>>>>>> master
    }
}
