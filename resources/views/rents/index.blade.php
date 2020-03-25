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

    @if ($abierto)
        @include('rents.types.abiertos')
    @else
        @include('rents.types.cerrados')
    @endif
    
</div>

@include('rents.modals.modal')
@endsection