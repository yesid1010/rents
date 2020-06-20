<div class="mt-3">
    <table id="tablaArriendos" class="table table-bordered table-striped">
        <thead class="bg-danger">
            <tr>
                <th class="text-center text-white">Huesped</th>
                <th class="text-center text-white">Habitacion</th>
                <th class="text-center text-white">Fecha inicio</th>
                <th class="text-center text-white">Huella</th>
                <th class="text-center text-white">Contrato</th>
                <th class="text-center text-white">Servicios</th>
                <th class="text-center text-white">Pagar Arriendo</th>
                <th class="text-center text-white">Detalles</th>
                <th class="text-center text-white">Cerrar Arriendo</th>
                <th class="text-center text-white">Enviar Factura</th>
            </tr>
        </thead>

        @foreach ($rents as $rent)
            <tr>
                <td>{{$rent->identification}}</td>
                <td>{{$rent->nameR}}</td>
                <td>{{$rent->startdate}}</td>
                <td class="text-center">
                    @if($rent->fingerprint == 0 )
                        <button class="btn btn-danger" type="button"
                            data-toggle="modal"
                            data-id = "{{$rent->idRe}}"
                            data-target="#abrirmodalFingerprint">
                            <i class="fa fa-plus "></i>
                        </button>
                    @else
                        <label class="form-control-label">{{$rent->fingerprint}}</label>
                    @endif
                </td>

                <td class="text-center">
                    @if($rent->contract == null )
                        <button class="btn btn-danger" type="button"
                            data-toggle="modal"
                            data-id = "{{$rent->idRe}}"
                            data-target="#abrirmodalContract">
                            <i class="fa fa-plus "></i>
                        </button>
                    @else
                    <a href="{{Storage::url($rent->contract)}}" class="col-md-6 text-danger form-control-label" target="_blank" rel="noopener noreferrer">Contrato</a>
                    @endif
                </td>

                <td class="text-center">
                    @if($rent->status == 0 )
                        <button class="btn btn-danger" type="button"
                            data-toggle="modal"
                            data-id = "{{$rent->idRe}}"
                            data-target="#abrirmodalAgregarServicio">
                            <i class="fa fa-plus "></i>
                        </button>
                    @else
                        <button disabled class="btn  btn-outline-dark" type="button">
                            <i class="fa fa-plus "></i>
                        </button>
                    @endif
                </td>
                <td class="text-center">
                    @if($rent->status == 0 )
                        <button  class="btn  btn-danger" type="button"
                                data-toggle="modal"
                                data-id="{{$rent->idRe}}"
                                data-total = "{{ number_format($rent->total, 0 ) }}"
                                data-target="#abrirmodalAbonarPago">
                                <i class="fa fa-money" aria-hidden="true"></i>
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
                        <button class= "btn btn-danger" type="submit">
                            <i class="fa fa-clone" aria-hidden="true"></i>
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
                  @if($rent->fingerprint != null )  
                    <form action="{{route('pdf',$rent->idRe)}}" method="get">
                        
                        <button class= "btn btn-danger" type="submit">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </button> 
                    </form>
                  @else
                    <button disabled class= "btn btn-secondary" type="submit">
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                    </button> 
                @endif
                </td>
            </tr>
        @endforeach
    </table>
</div>