
  <div class="form-group row">
    <label class="col-md-3 form-control-label" for="servicios">Tipo de Pago : </label>
    <div class="col-md-5">
        <select class="form-control" required name="type" id="type">

                <option value="Efectivo">Efectivo</option>
                <option value="tarjeta de credito">tarjeta de credito</option>
        </select>
    </div>
</div>

<div class="form-group row">
    <label class="col-md-3 form-control-label" for="unity">Descripcion : </label>
    <div class=" col-md-8">
      <textarea  name="description" required id="description" rows ="2" class="form-control" placeholder="Ingrese descripcion"></textarea>
    </div>
</div>

<div class="modal-footer">
    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Cerrar</button>
    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Guardar</button> 
</div>