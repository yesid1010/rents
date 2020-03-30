@extends('layouts.app')

@section('content')
<div class="container"> 

    <div class="card-body">
        <table id="tablaClientes" class="table table-bordered table-striped">
            <thead class="bg-primary">
                <tr>
                    <th>identificacion</th>
                    <th>Nombre</th>
                    <th>telefono</th>
                    <th>telefono familiar</th>
                    <th>correo</th>  
                    <th>Historial</th>
                </tr>
            </thead>

            @foreach ($users as $user)
                <tr>
                <td>{{$user->identification}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->telephone}}</td>
                <td>{{$user->family_telephone}}</td>
                <td>{{$user->email}}</td>
                <td class="text-center">
                    <form action="{{route('rentus')}}" method="get">
                        @csrf
                        <input type="hidden" name="id" value="{{$user->id}}">
                        <button class= "btn btn-primary" type="submit">
                            <i class="fa fa-pencil" aria-hidden="true"></i>
                        </button> 
                    </form>
                </td>
                </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection