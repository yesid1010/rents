@extends('layouts.app')

@section('content')
<div class="container"> 
    <div class="card">
        <div class="card-header">     
            <h3 class="float-left">Listado de Servicios</h3>       
            <button class="btn btn-danger float-right mt-1" type="button" data-toggle="modal" data-target="#abrirmodalService">
                <i class="fa fa-plus "></i>&nbsp;&nbsp;Agregar Servicio
            </button>
        </div>
    </div>

    <div class="card-body">
        <table id="tablaServicios" class="table table-bordered table-striped">
            <thead class="bg-danger">
                <tr>
                    <th class="text-center text-white">Nombre</th>
                    <th class="text-center text-white">precio</th>
                    <th class="text-center text-white">Descripción</th>
                    <th class="text-center text-white">Editar</th>  
                    <th class="text-center text-white">Eliminar</th> 
                </tr>
            </thead>

            @foreach ($services as $service)
                <tr>
                    <td class="text-center">{{$service->name}}</td>
                    <td class="text-center">{{$service->price}}</td>
                    <td class="text-center">{{$service->description}}</td>
                    <td class="text-center"> 
                        <button class="btn btn-danger" type="button"
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
@include('services.modals')
@endsection