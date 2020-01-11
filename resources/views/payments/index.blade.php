@extends('layouts.app')

@section('content')
<div class="container"> 

    <div class="card-body">
        <table id="tablaServicios" class="table table-bordered table-striped">
            <thead class="bg-primary">
                <tr>
                    <th>Usuario</th>
                    <th>Cliente</th>
                    <th>Tipo de pago</th>
                    <th>Descripción</th>
                    <th>Total</th>  
                    <th>Fecha</th>
                    <th>Detalles</th> 
                </tr>
            </thead>

            @foreach ($payments as $payment)
                <tr>
                <td>{{$payment->user_id}}</td>
                <td>{{$payment->rent_id}}</td>
                <td>{{$payment->type}}</td>
                <td>{{$payment->description}}</td>
                <td>{{$payment->total}}</td>
                <td>{{$payment->created_at}}</td>
                <td class="text-center"> <button class="btn btn-primary" type="button"
                        data-target="#abrirmodalEditarService"
                        data-toggle="modal" 
                        data-id="{{$payment->id}}">  
                        Detalle
                    </button>
                </td>
                </tr>
            @endforeach
        </table>
    </div>
</div>

<!--- MODALES --->
<!--Inicio del modal agregar-->
<div class="modal fade" id="abrirmodalService" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-primary" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Agregar Servicio</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            
            <div class="modal-body">
                <form action="{{route('services.store')}}" method="post" class="form-horizontal">
                    {{csrf_field()}}
                    @include('services.form')
                </form>
            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!--Fin del modal agregar Service-->

<!--Inicio del modal editar-->
<div class="modal fade" id="abrirmodalEditarService" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-primary" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Editar Servicio</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            
            <div class="modal-body">
                <form action="{{route('services.update','test')}}" method="post" class="form-horizontal">
                    {{method_field('patch')}}
                    {{csrf_field()}}
                    <input type="hidden" name="id" id="id" value="">
                    @include('services.form')
                </form>
            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!--Fin del modal editar service-->

<!--Inicio del modal de eliminar-->
<div class="modal fade" id="abrirmodalEliminarService" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
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
                <form action="{{route('destroyservice')}}" method="post">
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
@endsection