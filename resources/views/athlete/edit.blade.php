<form action="{{route('athlete.update', $athlete->id)}}" method="post">
    @method('PATCH') @csrf
    <div class="form-group">
        <label for="user_id">User ID </label>
        <input type="text" class="form-control" id="user_id" name="user_id" value="{{$athlete->user_id}}">

    </div>
    <div class="form-group">
        <label for="level">Level </label>
        <input type="text" id="level" name="level" value="{{$athlete->level}}" class="form-control">

    </div>
    <div class="form-group">
        <label for="points">Points </label>
        <input type="number" class="form-control" id="points" name="points" value="{{$athlete->points}}">

    </div>
    <button type="submit" class="btn btn-primary" onclick="return confirm('¿Esta seguro desea editar los datos?');">Editar</button>

</form>