@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">     
            <h3 class="float-left">Historial de Arriendos</h3>       
        </div>
    </div>
    @include('rents.types.abiertos')
</div>

@include('rents.modals.index')
@endsection