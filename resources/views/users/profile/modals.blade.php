
<!--- MODALES --->

<!--Inicio del modal editar-->
<div class="modal fade" id="abrirmodalEditarProfile" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-danger" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h4 class="modal-title text-white">Actualizar Datos</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            
            <div class="modal-body">
                <form action="{{route('users.update','test')}}" method="post" onsubmit="return checkSubmit();"  class="form-horizontal">
                    {{method_field('patch')}}
                    {{csrf_field()}}
                    <input type="hidden" name="id" id="id" value="">
                    {{-- @include('services.form') --}}
                    <div class="form-group row">
                        <label class="col-md-3 form-control-label" for="text-input">Identificaciòn</label>
                        <div class="col-md-9">
                            <input type="number" name="identification" id="identification"  required class="form-control" placeholder="identificacion">  
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 form-control-label" for="text-input">Nombres</label>
                        <div class="col-md-9">
                            <input type="text" name="name" id="name"  required class="form-control" placeholder="Nombres y apellidos">  
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 form-control-label" for="des">Correo</label>
                        <div class="col-md-9">
                            <input type="email" name="email" id="email"  required class="form-control" placeholder="Correo electronico">  
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 form-control-label" for="text-input">Telefono</label>
                        <div class="col-md-9">
                            <input type="number" name="telephone" id="telephone"  required class="form-control" placeholder="telefono">  
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-danger" data-dismiss="modal"><i class="fa fa-times"></i> Cerrar</button>
                        <button type="submit" class="btn btn-danger"><i class="fa fa-save"></i> Guardar</button> 
                    </div>  
                </form>
            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!--Fin del modal editar profile-->


<!--Inicio del modal editar contraseña-->
<div class="modal fade" id="abrirmodalEditarPassword" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-danger" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h4 class="modal-title text-white">Actualizar Contraseña</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            
            <div class="modal-body">
                <form action="{{route('passedit')}}" method="post" onsubmit="return checkSubmit();"  class="form-horizontal">
                    {{method_field('put')}}
                    {{csrf_field()}}
                    <input type="hidden" name="id" id="id" value="">
                    {{-- @include('services.form') --}}

                    <div class="form-group row">
                        <label class="col-md-5 form-control-label" for="text-input">Contraseña actual</label>
                        <div class="col-md-7">
                            <div class="input-group">
                                <input name="actualypassword" id="actualypassword" type="Password" Class="form-control">
                                <div class="input-group-append">
                                      <button  class="btn btn-primary mostrar" type="button" onclick="mostrarPassword('actualypassword')"> <span class="fa fa-eye-slash icon"></span> </button>
                                    </div>
                              </div>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-md-5 form-control-label" for="text-input">Nueva contraseña</label>
                        <div class="col-md-7">
                            <div class="input-group">
                                <input name="newpassword" id="newpassword" type="Password" Class="form-control">
                                <div class="input-group-append">
                                      <button  class="btn btn-primary mostrar" type="button" onclick="mostrarPassword('newpassword')"> <span class="fa fa-eye-slash icon"></span> </button>
                                    </div>
                              </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-danger" data-dismiss="modal"><i class="fa fa-times"></i> Cerrar</button>
                        <button type="submit" class="btn btn-danger"><i class="fa fa-save"></i> Guardar</button> 
                    </div>  
                </form>
            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!--Fin del modal editar profile-->