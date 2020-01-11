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
      <select class="form-control" name="id" id="ex-search2">
        @foreach ($rooms as $room)
          <option value="{{$room->id}}">{{$room->name}}</option>
        @endforeach
      </select>
  </div>
</div>

<div class="form-group row">
  <label class="col-md-3 form-control-label" for="unity">Fecha Inicio : </label>
  <div class="col-md-5">
      <input type="date" name="startdate" id="startdate"  required class="form-control">    
  </div>
</div>
<div class="form-group row">
  <label class="col-md-3 form-control-label" for="unity">Fecha Salida : </label>
  <div class="col-md-5">
      <input type="date" name="endingdate" id="endingdate"  required class="form-control">    
  </div>
</div>
<div class="form-group row">
  <label class="col-md-3 form-control-label" for="unity">Descripcion : </label>
  <div class="col-md-5">
    <textarea  name="description" id="description" rows ="2" class="form-control" placeholder="Ingrese descripcion"></textarea>
  </div>
</div>

<div class="modal-footer">
  <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Cerrar</button>
  <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Guardar</button> 
</div>




