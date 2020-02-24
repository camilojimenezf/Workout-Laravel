@extends('layouts.app') 
@section('content')

<div class="container">
    @if(Session::has('message'))
       <div class="alert alert-success" role="alert">
          {{  Session::get('message') }}
       </div>
        
    
    @endif


    <a href="{{route('training.create')}}" class="btn btn-success">agregar</a>
    <table class="table table-light table-hover">
        <thead class="thead-light">
            <tr>
                <th>#</th>
                <th>title</th>
                <th>description</th>
                <th>duration</th>
                <th>actions</th>

            </tr>
        </thead>
        <tbody>
            @foreach($trainings as $training)
            <tr>
                <td>{{$training->id}}</td>
                <td>{{$training->title}}</td>
                <td>{{$training->description}}</td>
                <td>{{$training->duration}}</td>
                <td>
                   <div class="btn-group">
                     <a href="{{ route('training.edit',$training->id)}}" class="btn btn-warning">Edit</a>

                    <form action="{{ route('training.destroy', $training->id)}}" method="post">
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