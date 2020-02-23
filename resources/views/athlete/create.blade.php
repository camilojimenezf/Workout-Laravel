

<div id="create-athlete" class="col-md-6 justify-content-center">
    <form method="post" action="{{url('/athletes')}}">
        {{csrf_field()}}
        <div class="form-group">
            <label for="user_id">User ID </label>
            <input type="text" class="form-control" id="user_id" name="user_id" value="" required>

        </div>
        <div class="form-group">
            <label for="level">Level </label>
            <input type="text" id="level" name="level" value="" class="form-control" required>

        </div>
        <div class="form-group">
            <label for="points">Points </label>
            <input type="number" class="form-control" id="points" name="points" value="" required>

        </div>
        <button type="submit" class="btn btn-primary">Registrar</button>


    </form>
</div>