
 <!--Inicio del modal fingerprint-->
 <div class="modal fade" id="abrirmodalFingerprint" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-danger modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h4 class="modal-title text-white">Agregar Huella</h4>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            
            <div class="modal-body">
                <form action="{{route('fingerprint')}}" method="post"  onsubmit="return checkSubmit();" class="form-horizontal">
                    
                    {{csrf_field()}}
                    <input type="hidden" name="id" id="id" value=""> 

                    <div class="form-group row">
                        <label class="col-md-4 form-control-label" for="text-input">Número de huella : </label>
                        <div class="col-md-4">
                            <input type="number"  name="fingerprint" id="fingerprint"  required class="form-control" >  
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
<!--Fin del modal fingerprint-->