<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">    <title>Reportes</title>
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            Fecha: {{$payment->created_at}}
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-6">
                Recibido por : {{$empleado->name}}
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-6">
                Datos del Huésped
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
                Identificación : {{$huesped->identification}}
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            Nombre : {{$huesped->nameUser}}
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            Telefono : {{$huesped->telephone}}
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            Correo : {{$huesped->email}}
        </div>
    </div>

    <hr>
    <div class="row">
        <div class="col-md-6">
                Datos del Arriendo
        </div>
    </div>
        <table class="table table-bordered table-striped mt-2">
            <thead>
                <tr>
                    <th>Habitacion</th>
                    <th>Costo</th>
                    <th>Huella</th>
                    <th>Fecha Entrada</th>
                    <th>Fecha Salida</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>{{$room->nameRoom}}</th>
                    <th>{{number_format($room->priceRoom, 0 )}}</th>
                    <th>{{$rent->fingerprint}}</th>
                    <th>{{$rent->startdate}}</th>
                    <th>{{$rent->endingdate}}</th>
                </tr>
            </tbody>
        </table>
   
@if(count($rent_->services) > 0)
    <div class="row">
        <div class="col-md-6 mt-4">
                Servicios Adicionales
        </div>
    </div>
        <table class="table table-bordered table-striped mt-2">
            <thead>
                <tr>
                    <th>Tipo de servicio</th>
                    <th>Costo</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($services as $service)
                    <tr>
                        <th>{{$service->nameService}}</th>
                        <th>{{number_format($service->priceService,0)}}</th>
                    </tr> 
                @endforeach

            </tbody>
        </table>
@endif 
        <div class="row">
            <div class="col-md-6 float-right mt-5">
                    Total A Pagar : {{ number_format($payment->total, 0 )}}
            </div>
        </div>
</div>
</body>
</html>