@extends('layouts.app')

@section('content')
<div class="container"> 
    <div class="card">
        <div class="card-header">     
            <h3 class="float-left">Listado de Arriendos</h3>       
            <button class="btn btn-primary float-right mt-1" type="button" data-toggle="modal" data-target="#abrirmodalAddRent">
                <i class="fa fa-plus "></i>&nbsp;&nbsp;Agregar Arriendo
            </button>
        </div>
    </div>

    @if (session('mensajeok'))
        <div class="alert alert-success">
            {{ session('mensajeok') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="card-body">
        <table id="tablaArriendos" class="table table-bordered table-striped">
            <thead class="bg-primary">
                <tr>
                    <th>Cliente</th>
                    <th>Habitacion</th>
                    <th>Fecha Inicio</th>
                    <th>Fecha Final</th> 
                    <th>Servicios</th>
                    <th>Cancelar Arriendo</th>
                    <th>Detalles</th>
                </tr>
            </thead>

            @foreach ($rents as $rent)
                <tr>
                    <td>{{$rent->identification}}</td>
                    <td>{{$rent->nameR}}</td>
                    <td>{{$rent->startdate}}</td>
                    <td>{{$rent->endingdate}}</td>
                    <td class="text-center">
                        <button class="btn btn-primary" type="button"
                            data-toggle="modal"
                            data-id = "{{$rent->idRe}}"
                            data-target="#abrirmodalAgregarServicio">
                            Agregar
                        </button>
                    </td>
                    <td class="text-center">
                        @if($rent->status == 0 )
                            <button class="btn btn-primary" type="button"
                                data-toggle="modal"
                                data-id = "{{$rent->idRe}}"
                                data-target="#abrirmodalCancelarArriendo">
                                Cancelar
                            </button>
                        @else
                            <button class="btn disabled btn-dark" type="button">
                                Pagado
                            </button>
                        @endif
                    </td>
                    {{-- <td class="text-center">
                        @if($rent->status == 0)
                            <form action="{{route('staturents',$rent->idRe)}}" method="get">
                                @csrf
                                <button class= "btn btn-warning" type="submit">
                                    Pendiente
                                </button>
                            </form>
                        @else
                            <form action="{{route('staturents',$rent->idRe)}}" method="get">
                                @csrf
                                <button class= "btn btn-success" type="submit">
                                    Cancelado
                                </button>
                            </form>
                        @endif
                    </td> --}}
                    <td class="text-center">
                        <form action="{{route('rents.show','test')}}" method="get">
                            @csrf
                            <input type="hidden" value="{{$rent->idRe}}" name="id">
                            <button class= "btn btn-success" type="submit">
                                <i class="fa fa-pencil " aria-hidden="true"></i>
                            </button> 
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
</div>


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

 <!--Inicio del modal cancelar Arriendo-->
 <div class="modal fade" id="abrirmodalCancelarArriendo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-primary modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Agregar Pago</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            
            <div class="modal-body">
                <form action="{{route('payments.store')}}" method="post" class="form-horizontal">
                    
                    {{csrf_field()}}
                    <input type="hidden" name="id" id="id" value=""> 
                     @include('rents.payment')
                </form>
            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!--Fin del modal Cancelar Arriendo-->
@endsection