<?php

namespace App\Http\Controllers;

use App\Room;
use Illuminate\Http\Request;
use App\Rent;
use App\Service;
use Illuminate\Support\Facades\DB;

class RoomController extends Controller
{

// metodo para mostrar todas las habitaciones guardadas en la bd
    public function index()
    {
        $rooms = Room::orderBy('name','asc')->get();

        return view('rooms.index',['rooms'=>$rooms]);
    }

// metodo para guardar una habitación en la bd
    public function store(Request $request)
    {
        $room = new Room();
        $room->name = $request->name;
        $room->description = $request->description;
        $room->price = $request->price;

        $room->save();
        alert()->success('OK', '!! Habitación agregada con exito!!');
        return back();
        
    }

// metodo para Editar una habitación en la bd
    public function update(Request $request)
    {
        $room = Room::findOrFail($request->id);

        $room->name = $request->name;
        $room->price = $request->price;
        $room->description = $request->description;

        $room->save();
        alert()->success('OK', '!! Habitación Editada con exito!!');
        return back();
    }

// metodo para Eliminar una habitación en la bd
    public function destroy(Request $request )
    {
        $room =  Room::findOrFail($request->id);
        $room->delete();
        alert()->success('OK', '!! Habitación Eliminada con exito!!');
        return back();  
    }

// // metodo para cambiar el estado de  una habitación en la bd
    public function Status($id){
        $room          = Room::findOrFail($id);
        $room->status  = '0';
        $room->save();
        return back();
    }

    // metodo para traer todos los arriendos asociados a una habitacion

    public function Rents(Request $request){
        $rents = $this->rents_R($request->id);
        $services = Service::all(); 
        return view('rooms.rents.index',['rents'=>$rents,'services'=>$services]);
    }

    public function rents_R($id){
        return $rents =  DB::table('rents')
         ->join('users','users.id','=','rents.user_id')
         ->join('rooms','rooms.id','=','rents.room_id')
         ->select('users.identification as identification',
                 'users.name as nameU',
                 'users.telephone as telephone',
                 'users.family_telephone as family_telephone',
                 'users.email as email',
                 'rooms.name as nameR',
                 'rooms.description as descriptionR',
                 'rooms.price as priceR',
                 'rents.description as descriptionRe',
                 'rents.fingerprint as fingerprint',
                 'rents.startdate as startdate',
                 'rents.endingdate as endingdate',
                 'rents.status as status',
                 'rents.total as total',
                 'rooms.id as idR','users.id as idU',
                 'rents.id as idRe')
                 ->where('rents.room_id','=',$id)
                 ->orderBy('idRe', 'desc')
                 ->get();
     }
    
}
