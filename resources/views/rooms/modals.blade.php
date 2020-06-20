
<!--- MODALES --->
<!--Inicio del modal agregar-->
<div class="modal fade" id="abrirmodalRoom" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-danger" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h4 class="modal-title text-white">Agregar Habitacion</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            
            <div class="modal-body">
                <form action="{{route('rooms.store')}}" method="post"  onsubmit="return checkSubmit();" class="form-horizontal">
                    {{csrf_field()}}
                    @include('rooms.form')
                </form>
            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!--Fin del modal agregar Habitacion-->

<!--Inicio del modal editar-->
<div class="modal fade" id="abrirmodalEditarRoom" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-danger" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h4 class="modal-title text-white">Detalles Habitacion</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            
            <div class="modal-body">
                <form action="{{route('rooms.update','test')}}" method="post" class="form-horizontal">
                    {{method_field('patch')}}
                    {{csrf_field()}}
                    <input type="hidden" name="id" id="id" value="">
                    @include('rooms.form')
                </form>
            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!--Fin del modal agregar Habitacion-->



<!--Inicio del modal de eliminar-->
<div class="modal fade" id="abrirmodalEliminarRoom" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-danger " role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h4 class="modal-title text-white">¿ Está seguro de realizar esta acción?</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            
            <div class="modal-body">
                <h5>Al dar click en Aceptar, No se podrá deshacer esta acción.</h5>
                <form action="{{route('destroyroom')}}" method="post">
                    {{csrf_field()}}   
                    <input type="hidden" name="id" id="id" value="">  
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-danger" data-dismiss="modal"><i class="fa fa-times"></i> Cancelar</button>
                        <button type="submit" class="btn btn-danger"><i class="fa fa-save"></i> Aceptar</button> 
                    </div>
                </form>
            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!--Fin del modal-->


 <!--Inicio del modal agregar rol-->
 <div class="modal fade" id="abrirmodalArrendarRoom" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-danger modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h4 class="modal-title text-white">Agregar Arriendo</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            
            <div class="modal-body">
                <form action="{{route('rents.store')}}" method="post" class="form-horizontal">
                    {{csrf_field()}}
                    <input type="hidden" name="id" id="id" value="">  
                    @include('rooms.formRent')
                </form>
            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!--Fin del modal agregar rol-->