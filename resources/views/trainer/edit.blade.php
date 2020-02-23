@extends('layouts.app')

@section('content')
<div class="container">
    @if(count($errors)>0)
    <div class="alert alert-danger" role="alert" style="display: none;">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>

    </div>
    @endif

    <form action="{{route('trainer.update', $trainer->id)}}" method="post">
        @method('PATCH')
        @csrf
        @include('trainer.form',['mode'=>'update'])


    </form>
 </div>
 @endsection   