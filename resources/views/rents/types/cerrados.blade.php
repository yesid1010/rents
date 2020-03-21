<div class="card-body">
    <table id="tablaArriendos" class="table table-bordered table-striped">
        <thead class="bg-primary">
            <tr>
                <th>Cliente</th>
                <th>Habitacion</th>
                <th>Fecha Inicio</th>
                <th>Fecha Final</th> 
                <th>Huella</th>
                <th>Detalles</th>
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
                    <form action="{{route('detailr')}}" method="get">
                        @csrf
                        <input type="hidden" value="{{$rent->idRe}}" name="id">
                        <button class= "btn btn-success" type="submit">
                            <i class="fa fa-pencil " aria-hidden="true"></i>
                        </button> 
                    </form>
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