
{{$mode=='create' ? 'ADD PLAN':'UPDATE PLAN'}}
<br> </br>
<div class="form-group">
    <label for="name" class="control-label">Name </label>
    <input type="text" class="form-control {{$errors->has('name')?'is-invalid':''}} " id="name" name="name" value="{{isset($plan->name)?$plan->name:old('name')}}"> 
    {!!$errors->first('name','<div class="invalid-feedback">:message</div>')!!}
</div>
<div class="form-group">
    <label for="price" class="control-label">Price </label>
    <input type="nume" id="price" name="price" value="{{isset($plan->price)?$plan->price:old('price')}}" class="form-control {{$errors->has('price')?'is-invalid':''}}">
        {!!$errors->first('price','<div class="invalid-feedback">:message</div>')!!}


</div>

<input type="submit" class="btn btn-success" value="{{$mode=='create'? 'ADD':'Update'}}">
<a type="" class="btn btn-primary" href="{{url('plan')}}">Back</a>