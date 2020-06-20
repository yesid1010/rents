@extends('layouts.app')

@section('content')
<div class="container"> 
    <div class="card">
        <div class="card-header">     
            <h3 class="float-left">Listado de Arriendos</h3>       
            <button class="btn btn-danger float-right mt-1" type="button" data-toggle="modal" data-target="#abrirmodalAddRent">
                <i class="fa fa-plus "></i>&nbsp;&nbsp;Agregar Arriendo
            </button>
        </div>
    </div>

    @if ($abierto)
        @include('rents.types.abiertos')
    @else
        @include('rents.types.cerrados')
    @endif
    
</div>

{{-- modales --}}
@include('rents.modals.index')
@include('rents.modals.addRent')

@endsection