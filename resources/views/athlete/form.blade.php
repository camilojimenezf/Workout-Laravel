 {{$mode=='create' ? 'ADD ATHLETE':'UPDATE ATHLETE'}}
 
 <div>
    <br>
 </div>
<div class="form-group">
    <label for="user_id" class="control-label">User ID </label>
    <input type="text" class="form-control {{$errors->has('user_id')?'is-invalid':''}} " id="user_id" name="user_id" value="{{isset($athlete->user_id)?$athlete->user_id:old('user_id')}}"> 
    {!!$errors->first('user_id','<div class="invalid-feedback">:message</div>')!!}
</div>
<div class="form-group">
    <label for="level" class="control-label">Level </label>
    <input type="text" id="level" name="level" value="{{isset($athlete->level)?$athlete->level:old('level')}}" class="form-control {{$errors->has('level')?'is-invalid':''}}">
        {!!$errors->first('level','<div class="invalid-feedback">:message</div>')!!}


</div>
<div class="form-group">
    <label for="points" class="control-label">Points </label>
    <input type="number" class="form-control {{$errors->has('points')?'is-invalid':''}}" id="points" name="points" value="{{isset($athlete->points)?$athlete->points:old('points')}}">
     {!!$errors->first('points','<div class="invalid-feedback">:message</div>')!!}

</div>
<input type="submit" class="btn btn-success" value="{{$mode=='create'? 'Add':'Update'}}">
<a type="" class="btn btn-primary" href="{{url('athlete')}}">back</a>