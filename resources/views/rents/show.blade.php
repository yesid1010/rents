@extends('layouts.app')

@section('content')
<div class="container"> 
    <div class="row">
      <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-danger">
                    <strong class="text-white">Información del cliente</strong> 
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
                    <div class=" row">
                        <label class="col-md-6 form-control-label" for="unity">&nbsp;</label>
                        <label class="col-md-6 form-control-label" for="unity">&nbsp;</label> 
                    </div>

                </div>
            </div>
      </div>
      <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-danger">
                    <strong class="text-white">Información del Arriendo</strong> 
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
                        <label class="col-md-6 form-control-label" for="unity">Contrato:</label>
                        @if($rent->contract != null )
                            <a href="{{Storage::url($rent->contract)}}" class="col-md-6 form-control-label" target="_blank" rel="noopener noreferrer">Contrato</a>
                        @else
                        <label class="col-md-6 form-control-label" for="unity">no hay contrato adjunto</label>
                        @endif
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
                <div class="card-header bg-danger">
                    <strong class="text-white">Informacion de pago total</strong> 
                </div>
                <div class="card-body">
                    <div class=" row">
                        <label class="col-md-5 form-control-label" for="unity"><strong>Precio Habitacion :</strong> </label>
                        <label class="col-md-6 form-control-label" for="unity"><strong>{{number_format($rent->habPrice, 0 )}}</strong> </label> 
                    </div>
                    <hr>

                    @if (count($services)>0)

                        <label class="form-control-label"><strong>Servicios Adicionales</strong> </label>
                        
                        @foreach ($services as $service)
                    
                            <div class=" row">
                                <label class="col-md-5 form-control-label" for="unity">{{$service->nameService}}</label>
                                <label class="col-md-4 form-control-label" for="unity"> {{number_format($service->priceService, 0 )}}</label> 

                                
                                    <button class="btn btn-outline-danger  col-md-1 mx-1 mb-1" type="button"
                                            data-target= "#abrirmodaldetalle"
                                            data-toggle = "modal"
                                            data-date = "{{$service->created_at}}"
                                            data-description = "{{$service->description}} "
                                            >
                                            <i class="fa fa-pencil" aria-hidden="true"></i>
                                    </button>
                                @if($rent->statusRent == 0)
                                    <button class="btn btn-outline-danger  col-md-1  mb-1" type="button"
                                            data-id="{{$service->id}}"
                                            data-target= "#abrirmodalEliminarServicio"
                                            data-toggle = "modal"
                                            >
                                            <i class="fa fa-trash-o" aria-hidden="true"></i>
                                    </button>
                            @endif         
                            </div>

                        @endforeach
                        <hr>
                    @endif
                    <div class=" row">
                        <label class="col-md-5 form-control-label" for="unity"> <strong>Total</strong> </label>
                        <label class="col-md-6 form-control-label" for="unity"><strong> {{number_format($total, 0 )}} </strong></label> 
                    </div>
                    <hr>
                    @if (count($abonos)>0)
                        <label class="form-control-label"> <strong>Abonos</strong></label>
                        @foreach ($abonos as $abono)
                            <div class=" row">
                                <label class="col-md-5 form-control-label" for="unity">{{$abono->created_at}}</label>
                                <label class="col-md-4 form-control-label" for="unity">{{number_format($abono->total, 0 )}}</label> 
                                <button class="btn btn-outline-danger mx-1 col-md-1 mb-1" type="button"
                                    data-target= "#abrirmodaldetalle"
                                    data-toggle = "modal"
                                    data-date = "{{$abono->created_at}}"
                                    data-description = "{{$abono->description}} "
                                    >
                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                </button> 
                                @if($rent->statusRent == 0)
                                    <button class="btn btn-outline-danger  col-md-1  mb-1" type="button"
                                        data-target= "#abrirmodalEliminarPayment"
                                        data-toggle = "modal"
                                        data-id  = "{{$abono->id}}"
                                        >
                                        <i class="fa fa-trash-o" aria-hidden="true"></i>
                                    </button> 
                                @endif                      
                            </div>
                        @endforeach
                        <hr>
                    @endif
                    <div class=" row">
                        <label class="col-md-5 form-control-label" for="unity"><strong>Pendiente</strong></label>
                        <label class="col-md-6 form-control-label" for="unity"><strong>{{number_format($rent->total, 0 )}}</strong></label> 
                    </div>
                </div>
            </div>
        </div>   
    {{-- @if($rent->statusRent)
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-danger">
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
    @endif  --}}
    </div>
    
</div>

{{-- modales --}}
 <!--Inicio del modal detalle-->
 <div class="modal fade" id="abrirmodaldetalle" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-danger modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h4 class="modal-title text-white">Detalle</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            
            <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-md-4 form-control-label" for="text-input">Fecha : </label>
                        <div class="col-md-8">
                         <input type="text"  disabled class="form-control " id="date">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label  class="col-md-4 form-control-label" for="text-input">Descripción : </label>
                        <div class="col-md-8">
                            <textarea required disabled name="description" id="description" rows ="2" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Cerrar</button>
                    </div>
            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!--Fin del modal detalle-->
<!--Inicio del modal de eliminar-->
<div class="modal fade" id="abrirmodalEliminarServicio" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-danger " role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h4 class="modal-title text-white">¿ Está seguro de realizar esta acción?</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            
            <div class="modal-body">
                <h5>Al dar click en Aceptar, No se podrá deshacer esta acción.</h5>
                <form action="{{route('deleteserviceR')}}" method="post">
                    {{csrf_field()}}   
                    <input type="hidden" name="id" id="id" value="">  
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-danger" data-dismiss="modal"><i class="fa fa-times"></i> Cancelar</button>
                        <button type="submit" class="btn btn-danger"><i class="fa fa-save"></i> Aceptar</button> 
                    </div>
                </form>
            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!--Fin del modal-->
<!--Inicio del modal de eliminar-->
<div class="modal fade" id="abrirmodalEliminarPayment" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-danger " role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h4 class="modal-title text-white">¿ Está seguro de realizar esta acción?</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            
            <div class="modal-body">
                <h5>Al dar click en Aceptar, No se podrá deshacer esta acción.</h5>
                <form action="{{route('deletepaymentR')}}" method="post">
                    {{csrf_field()}}   
                    <input type="hidden" name="id" id="id" value="">  
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-danger" data-dismiss="modal"><i class="fa fa-times"></i> Cancelar</button>
                        <button type="submit" class="btn btn-danger"><i class="fa fa-save"></i> Aceptar</button> 
                    </div>
                </form>
            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!--Fin del modal-->
@endsection