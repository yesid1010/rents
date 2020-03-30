@extends('layouts.app')

@section('content')
<div class="container"> 
    <div class="card">
        <div class="card-header">     
            <h3 class="float-left">Listado de Servicios</h3>       
            <button class="btn btn-primary float-right mt-1" type="button" data-toggle="modal" data-target="#abrirmodalService">
                <i class="fa fa-plus "></i>&nbsp;&nbsp;Agregar Servicio
            </button>
        </div>
    </div>

    <div class="card-body">
        <table id="tablaServicios" class="table table-bordered table-striped">
            <thead class="bg-primary">
                <tr>
                    <th class="text-center">Nombre</th>
                    <th class="text-center">precio</th>
                    <th class="text-center">Descripción</th>
                    <th class="text-center">Editar</th>  
                    <th class="text-center">Eliminar</th> 
                </tr>
            </thead>

            @foreach ($services as $service)
                <tr>
                <td class="text-center">{{$service->name}}</td>
                <td class="text-center">{{$service->price}}</td>
                <td class="text-center">{{$service->description}}</td>
                <td class="text-center"> <button class="btn btn-primary" type="button"
                        data-target="#abrirmodalEditarService"
                        data-toggle="modal" 
                        data-id="{{$service->id}}"
                        data-name="{{$service->name}}"
                        data-price="{{$service->price}}"
                        data-description="{{$service->description}}">  
                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                        
                    </button>
                </td>
                <td class="text-center">
                    @if (count($service->rents) > 0)
                        <button disabled class="btn btn-secondary " type="button">
                            <i class="fa fa-trash-o" aria-hidden="true"></i>
                        </button>
                    @else
                        <button class="btn btn-danger " data-id="{{$service->id}}" type="button" data-toggle="modal" data-target="#abrirmodalEliminarService">
                            <i class="fa fa-trash-o" aria-hidden="true"></i>
                        </button>
                    @endif
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