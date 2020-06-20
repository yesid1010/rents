
 <!--Inicio del modal agregar Arriendo-->
 <div class="modal fade" id="abrirmodalAddRent" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-primary modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h4 class="modal-title text-white">Agregar Arriendo</h4>
                <button type="button"  class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span  aria-hidden="true">×</span>
                </button>
            </div>
            
            <div class="modal-body">
                <form action="{{route('save')}}" method="post" onsubmit="return checkSubmit();"  class="form-horizontal">
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





