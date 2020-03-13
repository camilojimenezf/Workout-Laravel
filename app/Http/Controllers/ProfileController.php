<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use DB;
use Input;
use Storage;


class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profiles=Profile::all();
    
        return view ('profile.index',compact('profiles'));   //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('profile.create');//
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dataProfiles=$request->except('_token');
        $message=["required"=>'Attribute is required'];
        $request->validate([
            'athlete_id'=>'required',
            'weight'=>'required',
            'height'=>'required',
            'body_fat'=>'required'
        ],$message);
        
        $Profile=new Profile([
            'athlete_id'=>$request->get('athlete_id'),
            'weight'=>$request->get('weight'),
            'height'=>$request->get('height'),
            'body_fat'=>$request->get('body_fat'),
        ]);
        $Profile->save();
       return redirect('profile')->with('message','Saved Successfully  !');
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
        $profiles = Profile::find($id);
        return view('profile.edit',['profile'=>$profiles]);
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
            'athlete_id'=>'required',
            'weight'=>'required',
            'height'=>'required',
            'body_fat'=>'required'
        ],$message);
        $profile=Profile::find($id);
        $profile->athlete_id = $request->athlete_id;
        $profile->weight = $request->weight;
        $profile->height = $request->height;
        $profile->body_fat = $request->body_fat;
         
        $profile->save();
    
       // Session::flash('message', 'Editado Satisfactoriamente !');
        return redirect('profile')->with('message', 'Successfully modified !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Profile::destroy($id);
        return redirect('profile')->with('message', 'plan deleted!');
    }
}
