 <!--Inicio del modal Abonar pago-->
 <div class="modal fade" id="abrirmodalAbonarPago" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-primary modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h4 class="modal-title text-white">Agregar Abono  </h4>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            
            <div class="modal-body">
                <form action="{{route('payments.store')}}" method="post" onsubmit="return checkSubmit();" class="form-horizontal">
                    
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