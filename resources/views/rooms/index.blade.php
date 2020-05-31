@extends('layouts.app')

@section('content')
<div class="container">  
    <div class="card">
        <div class="card-header">     
            <h3 class="float-left">Listado de Habitaciones</h3>       
            <button class="btn btn-primary float-right mt-1" type="button" data-toggle="modal" data-target="#abrirmodalRoom">
                <i class="fa fa-plus "></i>&nbsp;&nbsp;Agregar Habitacion
            </button>
        </div>
    
        {{-- manejo de errores de campos --}}
        @if(count($errors))

        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif
        {{-- fin manejo de errores de campos --}}
    <div class="card-body row py-2">
        @if(count($rooms)==0)

        <h3 class="text-center col-md-10">No hay habitaciónes guardadas </h3>

        @endif
        @foreach ($rooms as $room)
            
        {{-- Si la habitacion no está arrendada --}}
            @if($room->status == 0)
                <div class="col-md-3 mt-4">
                    <div class="card text-success border-success mb-3" style="max-width: 18rem;">
                        <div class="card-header">

                            <div class="row">
                                <div class="col-md-6">{{$room->name}}</div>
                                <div class="col-md-6">
                                    {{-- Si la habitacion no ha sido arrendada por primera vez --}} 
                                    @if(count($room->rents) == 0) 
                                        <button class="btn btn-outline-success float-right" data-id="{{$room->id}}" type="button" data-toggle="modal" data-target="#abrirmodalEliminarRoom">
                                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                                        </button>
                                    @else
                                        <form action="{{route('rentsroom')}}" method="get">
                                            @csrf
                                            <input type="hidden" name="id" value="{{$room->id}}">
                                            <button class= " btn btn-outline-success float-right" type="submit">
                                            Historial
                                            </button> 
                                        </form>
                                    @endif
                                </div>
    
                            </div>
                        </div>
                            <div class="card-body">
                                <h5 class="card-title">Precio: {{ number_format($room->price, 0 ) }}</h5>        
                            </div>
                            <div class="card-footer">
                                <button class="btn btn-outline-success" type="button"
                                        data-toggle="modal"
                                        data-id = "{{$room->id}}"
                                        data-target="#abrirmodalArrendarRoom">
                                    Arrendar
                                </button>
                                <button class="btn btn-outline-success" type="button"
                                    data-target="#abrirmodalEditarRoom"
                                    data-toggle="modal" 
                                    data-id="{{$room->id}}"
                                    data-name="{{$room->name}}"
                                    data-price="{{$room->price}}"
                                    data-description="{{$room->description}}">  
                                    Editar
                                </button>
                            </div>
                    </div>
                </div>
         {{-- Si la habitacion  está arrendada --}}
            @else 
                <div class="col-md-3 mt-4">
                    <div class="card text-danger border-danger mb-3" style="max-width: 18rem;">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">{{$room->name}}</div>
                            <div class="col-md-6">
                                <form action="{{route('rentsroom')}}" method="get">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$room->id}}">
                                    <button class= " btn btn-outline-danger float-right" type="submit">
                                       Historial
                                    </button> 
                                </form>
                            </div>

                        </div>
                    </div>
                    

                        <div class="card-body">
                            <h5 class="card-title">Precio: {{ number_format($room->price, 0 ) }}</h5>
                            
                        </div>
                        <div class="card-footer">
                            <form action="{{route('detailroom')}}" method="get">
                                @csrf
                                <input type="hidden" value="{{$room->id}}" name="id">
                                <button class= "btn btn-outline-danger" type="submit">
                                   
                                    Información
                                </button> 
                            </form>
                           
                        </div>
                      </div>
                </div>
            @endif
        @endforeach

    </div>
</div>
</div>
<!--- MODALES --->
<!--Inicio del modal agregar-->
<div class="modal fade" id="abrirmodalRoom" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-primary" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Agregar Habitacion</h4>
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
    <div class="modal-dialog modal-primary" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Detalles Habitacion</h4>
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
                <form action="{{route('destroyroom')}}" method="post">
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


 <!--Inicio del modal agregar rol-->
 <div class="modal fade" id="abrirmodalArrendarRoom" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-primary modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Agregar Arriendo</h4>
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
@endsection
