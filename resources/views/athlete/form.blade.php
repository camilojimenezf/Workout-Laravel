
        
     {{$mode=='create' ? 'add athlete':'update athlete'}}
     <div class="form-group">
        <label for="user_id">User ID </label>
        <input type="text" class="form-control" id="user_id" name="user_id" value="{{isset($athlete->user_id)?$athlete->user_id:''}}">

    </div>
    <div class="form-group">
        <label for="level">Level </label>
        <input type="text" id="level" name="level" value="{{isset($athlete->level)?$athlete->level:''}}" class="form-control">

    </div>
    <div class="form-group">
        <label for="points">Points </label>
        <input type="number" class="form-control" id="points" name="points" value="{{isset($athlete->points)?$athlete->points:''}}">

    </div>
    <input type="submit" class="btn btn-primary" value="{{$mode=='create'? 'Agregar':'Modificar'}}">
     <a type="" class="btn btn-primary" href="{{url('athlete')}}">Volver</a>
