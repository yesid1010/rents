<?php

namespace App\Http\Controllers;

use App\Room;
use Illuminate\Http\Request;

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

    
}
