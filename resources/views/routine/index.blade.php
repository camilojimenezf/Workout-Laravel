@extends('layouts.app') 
@section('content')

<div class="container">
    @if(Session::has('message'))
       <div class="alert alert-success" role="alert">
          {{  Session::get('message') }}
       </div>
        
    
    @endif


    <a href="{{route('routine.create')}}" class="btn btn-success">agregar</a>
    <table class="table table-light table-hover">
        <thead class="thead-light">
            <tr>
                <th>#</th>
                <th>title</th>
                <th>description</th>
                <th>duration</th>
                <th>frequency</th>
                <th>actions</th>

            </tr>
        </thead>
        <tbody>
            @foreach($routines as $routine)
            <tr>
                <td>{{$routine->id}}</td>
                <td>{{$routine->title}}</td>
                <td>{{$routine->description}}</td>
                <td>{{$routine->duration}}</td>
                <td>{{$routine->frequency}}</td>
                <td>
                   <div class="btn-group">
                     <a href="{{ route('routine.edit',$routine->id)}}" class="btn btn-warning">Edit</a>

                    <form action="{{ route('routine.destroy', $routine->id)}}" method="post">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger" type="submit" onclick="return confirm('¿borrar?')">Delete</button>
                    </form>
                   
                   </div>
                </td>
               
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection