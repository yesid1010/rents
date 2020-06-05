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
@include('rooms.modals')
@endsection


