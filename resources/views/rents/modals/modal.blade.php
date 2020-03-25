
 <!--Inicio del modal agregar Arriendo-->
 <div class="modal fade" id="abrirmodalAddRent" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-primary modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Agregar Arriendo</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            
            <div class="modal-body">
                <form action="{{route('save')}}" method="post" class="form-horizontal">
                    {{csrf_field()}}
                    @include('rents.form')
                </form>
            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!--Fin del modal agregar Arriendo-->

 <!--Inicio del modal agregar Servicio-->
 <div class="modal fade" id="abrirmodalAgregarServicio" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-primary modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Agregar Servicio</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            
            <div class="modal-body">
                <form action="{{route('addservices')}}" method="post" class="form-horizontal">
                    
                    {{csrf_field()}}
                    <input type="hidden" name="id" id="id" value=""> 
                     @include('rents.services')
                </form>
            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!--Fin del modal agregar Servicio-->

 <!--Inicio del modal Abonar pago-->
 <div class="modal fade" id="abrirmodalAbonarPago" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-primary modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Agregar Abono  </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            
            <div class="modal-body">
                <form action="{{route('payments.store')}}" method="post" class="form-horizontal">
                    
                    {{csrf_field()}}
                    <input type="hidden" name="id" id="id" value=""> 
                    <div class="form-group row">
                        <label class="col-md-3 form-control-label" for="text-input">Total Abonar : </label>
                        <div class="col-md-5">
                            <input type="number"  name="abono" id="abono"  required class="form-control" >  
                        </div>
                    </div>
                     @include('rents.payment')
                </form>
            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!--Fin del modal Abonar pago-->

 <!--Inicio del modal fingerprint-->
 <div class="modal fade" id="abrirmodalFingerprint" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-primary modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Agregar Huella</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            
            <div class="modal-body">
                <form action="{{route('fingerprint')}}" method="post" class="form-horizontal">
                    
                    {{csrf_field()}}
                    <input type="hidden" name="id" id="id" value=""> 

                    <div class="form-group row">
                        <label class="col-md-4 form-control-label" for="text-input">Número de huella : </label>
                        <div class="col-md-4">
                            <input type="number"  name="fingerprint" id="fingerprint"  required class="form-control" >  
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Cerrar</button>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Guardar</button> 
                    </div>
                </form>
            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!--Fin del modal fingerprint-->

<!--Inicio del modal de eliminar-->
<div class="modal fade" id="abrirmodalCerrarArriendo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-primary " role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h4 class="modal-title">¿ Está seguro de realizar esta acción?</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            
            <div class="modal-body">
                <h5>Al dar click en Aceptar, No se podrá deshacer esta acción.</h5>
                <form action="{{route('cerrararriendo')}}" method="post">
                    {{csrf_field()}}   
                    <input type="hidden" name="id" id="id" value="">  
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Cancelar</button>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Aceptar</button> 
                    </div>
                </form>
            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!--Fin del modal-->