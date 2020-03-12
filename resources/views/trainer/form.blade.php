
{{$mode=='create' ? 'ADD TRAINER':'UPDATE TRAINER'}}
<br> </br>
<div class="form-group">
    <label for="user_id" class="control-label">User_id </label>
    <input type="text" class="form-control {{$errors->has('user_id')?'is-invalid':''}} " id="user_id" name="user_id" value="{{isset($trainer->user_id)?$trainer->user_id:old('user_id')}}"> 
    {!!$errors->first('user_id','<div class="invalid-feedback">:message</div>')!!}
</div>
<div class="form-group">
    <label for="certification" class="control-label">Certification </label>
    <input type="text" id="certification" name="certification" value="{{isset($trainer->certification)?$trainer->certification:old('certification')}}" class="form-control {{$errors->has('certification')?'is-invalid':''}}">
        {!!$errors->first('certification','<div class="invalid-feedback">:message</div>')!!}


</div>
<div class="form-group">
    <label for="score" class="control-label">Score </label>
    <input type="text" class="form-control {{$errors->has('score')?'is-invalid':''}} " id="score" name="score" value="{{isset($trainer->score)?$trainer->score:old('score')}}"> 
    {!!$errors->first('score','<div class="invalid-feedback">:message</div>')!!}
</div>
<div class="form-group">
    <label for="description" class="control-label">Description </label>
    <input type="text" class="form-control {{$errors->has('description')?'is-invalid':''}} " id="description" name="description" value="{{isset($trainer->description)?$trainer->description:old('description')}}"> 
    {!!$errors->first('description','<div class="invalid-feedback">:message</div>')!!}
</div>

<input type="submit" class="btn btn-success" value="{{$mode=='create'? 'Add':'Update'}}">
<a type="" class="btn btn-primary" href="{{url('trainer')}}">Back</a>