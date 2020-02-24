
{{$mode=='create' ? 'add routine':'update routine'}}
<div class="form-group">
    <label for="title" class="control-label">title </label>
    <input type="text" class="form-control {{$errors->has('title')?'is-invalid':''}} " id="title" name="title" value="{{isset($routine->title)?$routine->title:old('title')}}"> 
    {!!$errors->first('title','<div class="invalid-feedback">:message</div>')!!}
</div>
<div class="form-group">
    <label for="description" class="control-label">description </label>
    <input type="text" id="description" name="description" value="{{isset($routine->description)?$routine->description:old('description')}}" class="form-control {{$errors->has('description')?'is-invalid':''}}">
        {!!$errors->first('description','<div class="invalid-feedback">:message</div>')!!}


</div>
<div class="form-group">
    <label for="duration" class="control-label">duration </label>
    <input type="text" class="form-control {{$errors->has('duration')?'is-invalid':''}} " id="duration" name="duration" value="{{isset($routine->duration)?$routine->duration:old('duration')}}"> 
    {!!$errors->first('duration','<div class="invalid-feedback">:message</div>')!!}
</div>

<div class="form-group">
    <label for="frequency" class="control-label">frequency </label>
    <input type="text" class="form-control {{$errors->has('frequency')?'is-invalid':''}} " id="frequency" name="frequency" value="{{isset($routine->frequency)?$routine->frequency:old('frequency')}}"> 
    {!!$errors->first('frequency','<div class="invalid-feedback">:message</div>')!!}
</div>


<input type="submit" class="btn btn-success" value="{{$mode=='create'? 'Agregar':'Modificar'}}">
<a type="" class="btn btn-primary" href="{{url('routine')}}">Volver</a>