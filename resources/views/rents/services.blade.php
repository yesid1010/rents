

  <div class="form-group row">
    <label class="col-md-3 form-control-label" for="servicios">Servicios : </label>
    <div class="col-md-5">
        <select class="form-control" required name="service_id" id="service_id">
            @foreach ($services as $service)
                <option value="{{$service->id}}">{{$service->name}}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="form-group row">
    <label class="col-md-3 form-control-label" for="unity">Descripcion : </label>
    <div class=" col-md-8">
      <textarea  name="description" id="description" rows ="2" class="form-control" placeholder="Ingrese descripcion"></textarea>
    </div>
</div>

<div class="modal-footer">
    <button type="button" class="btn btn-outline-danger" data-dismiss="modal"><i class="fa fa-times"></i> Cerrar</button>
    <button type="submit" class="btn btn-danger"><i class="fa fa-save"></i> Guardar</button> 
</div>