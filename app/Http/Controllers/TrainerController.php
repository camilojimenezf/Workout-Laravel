<?php

namespace App\Http\Controllers;

use App\Trainer;
use Illuminate\Http\Request;

class TrainerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['user', 'admin']);

        $trainers =Trainer::all();
        return view('trainer.index', compact('trainers'));//
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('trainer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dataTrainer=$request->except('_token');
        $message=["required"=>'Attribute is required'];
        $request->validate([
            'user_id'=>'required',
            'certification'=>'required',
            'score'=>'required',
            'description'=>'required'
        ],$message);
        
        $Trainer=new Trainer([
            'user_id'=>$request->get('user_id'),
            'certification'=>$request->get('certification'),
            'score'=>$request->get('score'),
            'description'=>$request->get('description'),
        ]);
        $Trainer->save();
       return redirect('trainer')->with('message','Saved Successfully ');
    }

   
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
        $trainers = Trainer::find($id);
        return view('trainer.edit',['trainer'=>$trainers]);
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
        $message=["required"=>'Attribute is required'];
        $request->validate([
            'user_id'=>'required',
            'certification'=>'required',
            'score'=>'required',
            'description'=>'required'
        ],$message);
        $trainer=Trainer::find($id);
        $trainer->user_id = $request->user_id;
        $trainer->certification = $request->certification;
        $trainer->score = $request->score;
        $trainer->description = $request->description;
         
        $trainer->save();
    
       // Session::flash('message', 'Editado Satisfactoriamente !');
        return redirect('trainer')->with('message', 'Successfully modified !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Trainer::destroy($id);
        return redirect('trainer')->with('message', 'Trainer Deleted!');

    }
}
