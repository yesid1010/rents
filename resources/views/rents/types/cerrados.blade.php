<div class="card-body">
    <table id="tablaArriendos" class="table table-bordered table-striped">
        <thead class="bg-danger">
            <tr>
                <th class="text-center text-white">Cliente</th>
                <th class="text-center text-white">Habitacion</th>
                <th class="text-center text-white">Fecha Inicio</th>
                <th class="text-center text-white">Fecha Final</th> 
                <th class="text-center text-white">Huella</th>
                <th class="text-center text-white">Detalles</th>
                <th class="text-center text-white">Enviar Factura</th>
            </tr>
        </thead>

        @foreach ($rents as $rent)
            <tr>
                <td class="text-center">{{$rent->identification}}</td>
                <td class="text-center">{{$rent->nameR}}</td>
                <td class="text-center">{{$rent->startdate}}</td>
                <td class="text-center">{{$rent->endingdate}}</td>
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
                    <form action="{{route('detailr')}}" method="get">
                        @csrf
                        <input type="hidden" value="{{$rent->idRe}}" name="id">
                        <button class= "btn btn-danger" type="submit">
                            <i class="fa fa-clone" aria-hidden="true"></i>
                        </button> 
                    </form>
                </td>

                <td class="text-center">
                  @if($rent->fingerprint != null && $rent->status == 1)  
                    <form  action="{{route('pdf',$rent->idRe)}}" method="get">
                        
                        <button class= "btn btn-danger" type="submit">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </button> 
                    </form>
                  @else
                    <button disabled class= "btn btn-danger" type="submit">
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                    </button> 
                @endif
                </td>
            </tr>
        @endforeach
    </table>
</div>