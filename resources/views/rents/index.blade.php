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
                    <th>Huella</th>
                    <th>Servicios</th>
                    <th>Cancelar Arriendo</th>
                    <th>Detalles</th>
                    <th>Cerrar Arriendo</th>
                    <th>Imprimir</th>
                </tr>
            </thead>

            @foreach ($rents as $rent)
                <tr>
                    <td>{{$rent->identification}}</td>
                    <td>{{$rent->nameR}}</td>
                    <td>{{$rent->startdate}}</td>
                    <td>{{$rent->endingdate}}</td>
                    <td class="text-center">
                        @if($rent->fingerprint == 0 )
                            <button class="btn btn-primary" type="button"
                                data-toggle="modal"
                                data-id = "{{$rent->idRe}}"
                                data-target="#abrirmodalFingerprint">
                                Agregar
                            </button>
                        @else
                            <label class="form-control-label">{{$rent->fingerprint}}</label>
                        @endif
                    </td>
                    <td class="text-center">
                        @if($rent->status == 0 )
                            <button class="btn btn-primary" type="button"
                                data-toggle="modal"
                                data-id = "{{$rent->idRe}}"
                                data-target="#abrirmodalAgregarServicio">
                                Agregar
                            </button>
                        @else
                            <button disabled class="btn  btn-outline-dark" type="button">
                                Agregar
                            </button>
                        @endif
                    </td>
                    <td class="text-center">
                        @if($rent->status == 0 )
                            <button  class="btn  btn-primary" type="button"
                                    data-toggle="modal"
                                    data-id="{{$rent->idRe}}"
                                    data-total = "{{ number_format($rent->total, 0 ) }}"
                                    data-target="#abrirmodalAbonarPago">
                                Pagar
                            </button>
                        @else
                            <button disabled class="btn  btn-outline-dark" type="button">
                                Pagado
                            </button>
                        @endif
                    </td>
                    <td class="text-center">
                        <form action="{{route('detailr')}}" method="get">
                            @csrf
                            <input type="hidden" value="{{$rent->idRe}}" name="id">
                            <button class= "btn btn-success" type="submit">
                                <i class="fa fa-pencil " aria-hidden="true"></i>
                            </button> 
                        </form>
                    </td>
                    <td class="text-center">
                        @if($rent->status == 0 )
                            <button  class="btn  btn-danger" type="button"
                                data-toggle="modal"
                                data-id="{{$rent->idRe}}"
                                data-target="#abrirmodalCerrarArriendo">
                                <i class="fa fa-pencil " aria-hidden="true"></i>
                            </button>
                        @else 
                            <button disabled class="btn  btn-outline-dark" type="button">
                                <i class="fa fa-pencil " aria-hidden="true"></i>
                            </button>
                        @endif
                    </td>
                    <td class="text-center">
                      @if($rent->fingerprint != null && $rent->status == 1)  
                        <form target="_blank" action="{{route('pdf',$rent->idRe)}}" method="get">
                            
                            <button class= "btn btn-danger" type="submit">
                                <i class="fa fa-print" aria-hidden="true"></i>
                            </button> 
                        </form>
                      @else
                        <button disabled class= "btn btn-secondary" type="submit">
                            <i class="fa fa-print" aria-hidden="true"></i>
                        </button> 
                    @endif
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

 <!--Inicio del modal Abonar pago-->
 <div class="modal fade" id="abrirmodalAbonarPago" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-primary modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Agregar Abono  </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            
            <div class="modal-body">
                <form action="{{route('payments.store')}}" method="post" class="form-horizontal">
                    
                    {{csrf_field()}}
                    <input type="hidden" name="id" id="id" value=""> 
                    <div class="form-group row">
                        <label class="col-md-3 form-control-label" for="text-input">Total Abonar : </label>
                        <div class="col-md-5">
                            <input type="number"  name="abono" id="abono"  required class="form-control" >  
                        </div>
                    </div>
                     @include('rents.payment')
                </form>
            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!--Fin del modal Abonar pago-->

 <!--Inicio del modal fingerprint-->
 <div class="modal fade" id="abrirmodalFingerprint" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-primary modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Agregar Huella</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            
            <div class="modal-body">
                <form action="{{route('fingerprint')}}" method="post" class="form-horizontal">
                    
                    {{csrf_field()}}
                    <input type="hidden" name="id" id="id" value=""> 

                    <div class="form-group row">
                        <label class="col-md-4 form-control-label" for="text-input">Número de huella : </label>
                        <div class="col-md-4">
                            <input type="number"  name="fingerprint" id="fingerprint"  required class="form-control" >  
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Cerrar</button>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Guardar</button> 
                    </div>
                </form>
            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!--Fin del modal fingerprint-->

<!--Inicio del modal de eliminar-->
<div class="modal fade" id="abrirmodalCerrarArriendo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
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
                <form action="{{route('cerrararriendo')}}" method="post">
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
@endsection