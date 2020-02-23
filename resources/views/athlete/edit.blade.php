<form action="{{route('athlete.update', $athlete->id)}}" method="post">
    @method('PATCH')
    @csrf
    @include('athlete.form',['mode'=>'update'])


</form>