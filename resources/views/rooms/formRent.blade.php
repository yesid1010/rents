<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Cliente</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Hospedaje</a>
    </li>

</ul>
  <div class="tab-content" id="myTabContent">
    {{-- cliente --}}
    <div class="tab-pane mt-5 fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
      <div class="form-group row">
          <label class="col-md-3 form-control-label" for="unity">Identificación : </label>
          <div class="col-md-5">
              <input type="text" name="identification" id="identification" required class="form-control" >    
          </div>
      </div>
      <div class="form-group row">
              <label class="col-md-3 form-control-label" for="unity">Nombres : </label>
          <div class="col-md-5">
                  <input type="text" name="name" id="name" required class="form-control">    
          </div>
      </div>

      <div class="form-group row">
        <label class="col-md-3 form-control-label" for="unity">Correo : </label>
        <div class="col-md-5">
            <input type="email" name="email" id="email" required class="form-control">    
        </div>
      </div>
      <div class="form-group row">
              <label class="col-md-3 form-control-label" for="unity">Telefono : </label>
          <div class="col-md-5">
                  <input type="number" name="telephone" id="telephone"  required class="form-control">    
          </div>
      </div>

      <div class="form-group row">
        <label class="col-md-3 form-control-label" for="unity">Tel. Familiar : </label>
        <div class="col-md-5">
            <input type="number" name="family_telephone" id="family_telephone"  required class="form-control">    
        </div>
      </div>
      

    </div> 
    {{-- fin cliente  --}}

    {{-- servicio --}}
    <div class="tab-pane fade mt-5" id="profile" role="tabpanel" aria-labelledby="profile-tab">
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
    </div>
    {{-- fin servicio --}}
  
  </div>
  {{-- fin tap --}}