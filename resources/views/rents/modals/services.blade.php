 <!--Inicio del modal agregar Servicio-->
 <div class="modal fade" id="abrirmodalAgregarServicio" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-primary modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h4 class="modal-title text-white">Agregar Servicio</h4>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            
            <div class="modal-body">
                <form action="{{route('addservices')}}" method="post" class="form-horizontal"  onsubmit="return checkSubmit();">
                    
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