<div class="form-group row">
  <label class="col-md-3 form-control-label" for="cliente">Cliente : </label>
  <div class="col-md-5">
      <select class="form-control" name="user_id" id="ex-search">
        @foreach ($users as $user)
          <option value="{{$user->id}}">{{$user->identification}}</option>
        @endforeach
      </select>
  </div>
</div>

<div class="form-group row">
  <label class="col-md-3 form-control-label" for="cliente">Habitacion : </label>
  <div class="col-md-5">
      <select class="form-control" name="room_id" id="ex-search2">
        @foreach ($rooms as $room)
          <option value="{{$room->id}}">{{$room->name}}</option>
        @endforeach
      </select>
  </div>
</div>

<div class="form-group row">
  <label class="col-md-3 form-control-label" for="unity">Descripcion : </label>
  <div class="col-md-5">
    <textarea  name="description" id="description" rows ="2" class="form-control" placeholder="Ingrese descripcion"></textarea>
  </div>
</div>




