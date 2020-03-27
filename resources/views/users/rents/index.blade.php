@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">     
        <h3 class="float-left">Listado de Arriendos</h3>       
    </div>
</div>

@include('rents.types.abiertos')
@endsection