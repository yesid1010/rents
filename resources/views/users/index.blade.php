@extends('layouts.app')

@section('content')
<div class="container"> 

    <div class="card-body">
        <table id="tablaClientes" class="table table-bordered table-striped">
            <thead class="bg-danger">
                <tr>
                    <th class="text-center text-white">identificacion</th>
                    <th class="text-center text-white">Nombre</th>
                    <th class="text-center text-white">telefono</th>
                    <th class="text-center text-white">telefono familiar</th>
                    <th class="text-center text-white">correo</th>  
                    <th class="text-center text-white">Historial</th>
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
                        <button class= "btn btn-danger" type="submit">
                            <i class="fa fa-newspaper-o" aria-hidden="true"></i>
                        </button> 
                    </form>
                </td>
                </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection