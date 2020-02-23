
{{$mode=='create' ? 'add profile':'update profile'}}
<div class="form-group">
    <label for="athlete_id" class="control-label">Athlete_id </label>
    <input type="text" class="form-control {{$errors->has('athlete_id')?'is-invalid':''}} " id="athlete_id" name="athlete_id" value="{{isset($profile->athlete_id)?$profile->athlete_id:old('athlete_id')}}"> 
    {!!$errors->first('athlete_id','<div class="invalid-feedback">:message</div>')!!}
</div>
<div class="form-group">
    <label for="weight" class="control-label">Weight </label>
    <input type="text" id="weight" name="weight" value="{{isset($profile->weight)?$profile->weight:old('weight')}}" class="form-control {{$errors->has('weight')?'is-invalid':''}}">
        {!!$errors->first('weight','<div class="invalid-feedback">:message</div>')!!}


</div>
<div class="form-group">
    <label for="height" class="control-label">Height </label>
    <input type="text" class="form-control {{$errors->has('height')?'is-invalid':''}} " id="height" name="height" value="{{isset($profile->height)?$profile->height:old('height')}}"> 
    {!!$errors->first('profile','<div class="invalid-feedback">:message</div>')!!}
</div>
<div class="form-group">
    <label for="body_fat" class="control-label">Body fat </label>
    <input type="text" class="form-control {{$errors->has('body_fat')?'is-invalid':''}} " id="body_fat" name="body_fat" value="{{isset($profile->body_fat)?$profile->body_fat:old('name')}}"> 
    {!!$errors->first('body_fat','<div class="invalid-feedback">:message</div>')!!}
</div>

<input type="submit" class="btn btn-success" value="{{$mode=='create'? 'Agregar':'Modificar'}}">
<a type="" class="btn btn-primary" href="{{url('profile')}}">Volver</a>