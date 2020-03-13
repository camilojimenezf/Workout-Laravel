@extends('layouts.app') 
@section('content')

<div class="container">
    @if(Session::has('message'))
       <div class="alert alert-success" role="alert">
          {{  Session::get('message') }}
       </div>
        
    
    @endif


    <a href="{{route('trainer.create')}}" class="btn btn-success">Add</a>
    <br> </br>
    <table class="table table-light table-hover">
        <thead class="thead-light">
            <tr>
                <th>#</th>
                <th>user id</th>
                <th>certification</th>
                <th>score</th>
                <th>description</th>
                <th>actions</th>

            </tr>
        </thead>
        <tbody>
            @foreach($trainers as $trainer)
            <tr>
                <td>{{$trainer->id}}</td>
                <td>{{$trainer->user_id}}</td>
                <td>{{$trainer->certification}}</td>
                <td>{{$trainer->score}}</td>
                <td>{{$trainer->description}}</td>
                <td>
                   <div class="btn-group">
                     <a href="{{ route('trainer.edit',$trainer->id)}}" class="btn btn-warning">Edit</a>

                    <form action="{{ route('trainer.destroy', $trainer->id)}}" method="post">
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