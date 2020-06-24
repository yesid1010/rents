@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card m-auto col-md-8 ">
        <div class="card-header ">     
            <h3 class="float-left">Perfil de usuario</h3>       
            <button class="btn btn-danger float-right mt-1" type="button"
                    data-id="{{$user->id}}"
                    data-identification="{{$user->identification}}"
                    data-name="{{$user->name}}"
                    data-email="{{$user->email}}"
                    data-telephone="{{$user->telephone}}"
                    data-toggle="modal" data-target="#abrirmodalEditarProfile">
                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp;&nbsp;Actualizar Datos
            </button>
            <button class="btn btn-danger mr-2 float-right mt-1" type="button"
                    data-toggle="modal" data-target="#abrirmodalEditarPassword">
                <i class="fa fa-unlock-alt" aria-hidden="true"></i>&nbsp;&nbsp;Actualizar contraseña
            </button>
        </div>
        <div class="card-body">
            <div class=" row">
                <label class="col-md-6 form-control-label" for="unity">Identificacion :</label>
                <label class="col-md-6 form-control-label" for="unity">{{$user->identification}}</label> 
            </div>
            <div class=" row">
                <label class="col-md-6 form-control-label" for="unity">Nombres :</label>
                <label class="col-md-6 form-control-label" for="unity">{{$user->name}}</label> 
            </div>
            <div class=" row">
                <label class="col-md-6 form-control-label" for="unity">Correo :</label>
                <label class="col-md-6 form-control-label" for="unity">{{$user->email}}</label> 
            </div>
            <div class=" row">
                <label class="col-md-6 form-control-label" for="unity">Telefono :</label>
                <label class="col-md-6 form-control-label" for="unity">{{$user->telephone}}</label> 
            </div>
        </div>

    </div>
</div>
@include('users.profile.modals')
@endsection