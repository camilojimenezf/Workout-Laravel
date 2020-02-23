@extends('layouts.app') @section('content')

<div class="container">
    @if(Session::has('message')){{ Session::get('message') }} @endif


    <a href="{{route('athlete.create')}}" class="btn btn-primary">agregar</a>
    <table class="table table-light">
        <thead class="thead-light">
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Level</th>
                <th>Puntos</th>
                <th>Acciones</th>

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
                    <a href="{{ route('athlete.edit',$athlete->id)}}" class="btn btn-primary">Edit</a>
                </td>
                <td>
                    <form action="{{ route('athlete.destroy', $athlete->id)}}" method="post">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger" type="submit" onclick="return confirm('¿borrar?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection