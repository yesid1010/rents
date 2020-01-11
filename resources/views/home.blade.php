{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @foreach ($rooms as $room)
            
        
            @if($room->status == 0)
                <div class="col-md-2 mt-4">
                    <div class="card bg-success">
                    <div class="card-header "> <b>{{$room->name}}</b>  </div>

                        <div class="card-body">
                            Disponible
                        </div>
                    </div>
                </div> 
            @else 
                <div class="col-md-2 mt-4">
                    <div class="card bg-danger">
                    <div class="card-header "><b>{{$room->name}}</b></div>

                        <div class="card-body">
                            Ocupada
                        </div>
                    </div>
                </div> 
            @endif
        @endforeach

    </div>
</div>
@endsection --}}
