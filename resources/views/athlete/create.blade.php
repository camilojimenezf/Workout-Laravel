




    <form method="post" action="{{route('athlete.store')}}">
        @csrf
        @include('athlete.form',['mode'=>'create'])

    </form>


