@extends('layouts.app')

@section('content')
<div class="container">

    <form action="{{route('athlete.update', $athlete->id)}}" method="post">
        @method('PATCH')
        @csrf
        @include('athlete.form',['mode'=>'update'])


    </form>
 </div>
 @endsection   