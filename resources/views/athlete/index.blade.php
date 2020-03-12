@extends('layouts.app') 
@section('content')

<div class="container">
    @if(Session::has('message'))
       <div class="alert alert-success" role="alert">
          {{  Session::get('message') }}
       </div>
        
    
    @endif


    <a href="{{route('athlete.create')}}" class="btn btn-success">Add</a>
    <br> </br>
    <table class="table table-light table-hover">
        <thead class="thead-light">
            <tr>
                <th>#</th>
                <th>ID User</th>
                <th>Level</th>
                <th>Point</th>
                <th>Actions</th>

            </tr>
        </thead>
        <tbody>
            @foreach($athletes as $athlete)
            <tr>
                <td>{{$athlete->id}}</td>
                <td>{{$athlete->user_id}}</td>
                <td>{{$athlete->level}}</td>
                <td>{{$athlete->points}}</td>
                <td>
                   <div class="btn-group">
                     <a href="{{ route('athlete.edit',$athlete->id)}}" class="btn btn-warning">Edit</a>

                    <form action="{{ route('athlete.destroy', $athlete->id)}}" method="post">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger" type="submit" onclick="return confirm('¿Are you sure you want to delete it?')">Delete</button>
                    </form>
                   
                   </div>
                </td>
               
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection