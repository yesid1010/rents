@extends('layouts.app')

@section('content')
<div class="container"> 
    <div class="row">
      <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-primary">
                    <strong>Información del cliente</strong> 
                 </div>
                <div class="card-body">
                    <div class=" row">
                        <label class="col-md-6 form-control-label" for="unity">Identificacion :</label>
                        <label class="col-md-6 form-control-label" for="unity">{{$user->identification}}</label> 
                    </div>
                    <div class=" row">
                        <label class="col-md-6 form-control-label" for="unity">Nombres :</label>
                        <label class="col-md-6 form-control-label" for="unity">{{$user->nameUser}}</label> 
                    </div>
                    <div class=" row">
                        <label class="col-md-6 form-control-label" for="unity">Correo :</label>
                        <label class="col-md-6 form-control-label" for="unity">{{$user->email}}</label> 
                    </div>
                    <div class=" row">
                        <label class="col-md-6 form-control-label" for="unity">Telefono :</label>
                        <label class="col-md-6 form-control-label" for="unity">{{$user->telephone}}</label> 
                    </div>
                    <div class=" row">
                        <label class="col-md-6 form-control-label" for="unity">Contacto familiar:</label>
                        <label class="col-md-6 form-control-label" for="unity">{{$user->family_telephone}}</label> 
                    </div>

                </div>
            </div>
      </div>
      <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-primary">
                    <strong>Información del Arriendo</strong> 
                 </div>
                <div class="card-body">
                    <div class=" row">
                        <label class="col-md-6 form-control-label" for="unity">Fecha Entrada:</label>
                        <label class="col-md-6 form-control-label" for="unity">{{$rent->startdate}}</label> 
                    </div>
                    <div class=" row">
                        <label class="col-md-6 form-control-label" for="unity">Fecha Salida:</label>
                        <label class="col-md-6 form-control-label" for="unity">{{$rent->endingdate}}</label> 
                    </div>
                    <div class=" row">
                        <label class="col-md-6 form-control-label" for="unity">Huela Dactilar:</label>
                        <label class="col-md-6 form-control-label" for="unity">{{$rent->fingerprint}}</label> 
                    </div>
                    <div class=" row">
                        <label class="col-md-6 form-control-label" for="unity">Habitacion:</label>
                        <label class="col-md-6 form-control-label" for="unity">{{$room->nameRoom}}</label> 
                    </div>
                    <div class=" row">
                        <label class="col-md-6 form-control-label" for="unity">Estado:</label>
                        @if($rent->statusRent == 0)
                            <label class="col-md-6 form-control-label" for="unity">Pendiente por pagar</label> 
                        @else
                           <label class="col-md-6 form-control-label" for="unity">Pagado</label>
                        @endif
                    </div>
                </div>
            </div> 
        </div>
        
    </div>
    <div class="row mt-5">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-primary">
                    <strong>Informacion de pago total</strong> 
                </div>
                <div class="card-body">
                    <div class=" row">
                        <label class="col-md-6 form-control-label" for="unity">Precio Habitacion :</label>
                        <label class="col-md-6 form-control-label" for="unity">{{number_format($room->priceRoom, 0 )}}</label> 
                    </div>
                    <hr>
                    <label class="form-control-label">Servicios Adicionales</label>
                    @foreach ($services as $service)
                        <div class=" row">
                            <label class="col-md-6 form-control-label" for="unity">{{$service->nameService}}</label>
                            <label class="col-md-6 form-control-label" for="unity">{{number_format($service->priceService, 0 )}}</label> 
                        </div>
                    @endforeach
                    <hr>
                    <div class=" row">
                        <label class="col-md-6 form-control-label" for="unity">Total a pagar</label>
                        <label class="col-md-6 form-control-label" for="unity">{{number_format($total, 0 )}}</label> 
                    </div>
                </div>
            </div>
        </div>   
    @if($rent->statusRent)
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-primary">
                    <strong>Informacion del pago </strong> 
                </div>
                <div class="card-body">
                    <div class=" row">
                        <label class="col-md-6 form-control-label" for="unity">Tipo de pago :</label>
                        <label class="col-md-6 form-control-label" for="unity">{{$payment->type}}</label> 
                    </div>
                    <div class=" row">
                        <label class="col-md-6 form-control-label" for="unity">Atendido por :</label>
                        <label class="col-md-6 form-control-label" for="unity">{{$empleado->name}}</label> 
                    </div>
                </div>
            </div>
        </div>  
    @endif 
    </div>
    
</div>
@endsection