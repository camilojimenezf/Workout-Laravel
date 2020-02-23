 @extends('layouts.app') @section('content')

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
    <form method="post" action="{{route('plan.store')}}">
        @csrf @include('plan.form',['mode'=>'create'])

    </form>
</div>
@endsection