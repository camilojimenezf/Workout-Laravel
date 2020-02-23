@extends('layouts.app') 
@section('content')

<div class="container">
    @if(Session::has('message'))
       <div class="alert alert-success" role="alert">
          {{  Session::get('message') }}
       </div>
        
    
    @endif


    <a href="{{route('profile.create')}}" class="btn btn-success">agregar</a>
    <table class="table table-light table-hover">
        <thead class="thead-light">
            <tr>
                <th>#</th>
                <th>Athlete id</th>
                <th>weight</th>
                <th>height</th>
                <th>body_fat</th>
                <th>actions</th>

            </tr>
        </thead>
        <tbody>
            @foreach($profiles as $profile)
            <tr>
                <td>{{$profile->id}}</td>
                <td>{{$profile->athlete_id}}</td>
                <td>{{$profile->weight}}</td>
                <td>{{$profile->height}}</td>
                <td>{{$profile->body_fat}}</td>
                <td>
                   <div class="btn-group">
                     <a href="{{ route('profile.edit',$profile->id)}}" class="btn btn-warning">Edit</a>

                    <form action="{{ route('profile.destroy', $profile->id)}}" method="post">
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