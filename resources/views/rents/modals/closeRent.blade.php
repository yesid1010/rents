
<!--Inicio del modal de eliminar-->
<div class="modal fade" id="abrirmodalCerrarArriendo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-danger " role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h4 class="modal-title text-white">¿ Está seguro de realizar esta acción?</h4>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            
            <div class="modal-body">
                <h5>Al dar click en Aceptar, No se podrá deshacer esta acción.</h5>
                <form action="{{route('cerrararriendo')}}"  method="post" onsubmit="return checkSubmit();" >
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