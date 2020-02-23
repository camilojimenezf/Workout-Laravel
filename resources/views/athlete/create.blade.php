 @extends('layouts.app') @section('content')

<div class="container">

    <form method="post" action="{{route('athlete.store')}}">
        @csrf @include('athlete.form',['mode'=>'create'])

    </form>
</div>
@endsection