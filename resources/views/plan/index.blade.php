@extends('layouts.app') 
@section('content')

<div class="container">
    @if(Session::has('message'))
       <div class="alert alert-success" role="alert">
          {{  Session::get('message') }}
       </div>
        
    
    @endif


    <a href="{{route('plan.create')}}" class="btn btn-success">agregar</a>
    <table class="table table-light table-hover">
        <thead class="thead-light">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Price</th>
                <th>Acciones</th>

            </tr>
        </thead>
        <tbody>
            @foreach($plans as $plan)
            <tr>
                <td>{{$plan->id}}</td>
                <td>{{$plan->name}}</td>
                <td>{{$plan->price}}</td>
                <td>
                   <div class="btn-group">
                     <a href="{{ route('plan.edit',$plan->id)}}" class="btn btn-warning">Edit</a>

                    <form action="{{ route('plan.destroy', $plan->id)}}" method="post">
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