<?php

namespace App\Http\Controllers;

use App\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rooms = Room::orderBy('name','asc')->get();

        return view('rooms.index',['rooms'=>$rooms]);
    }

  
    public function store(Request $request)
    {
        $room = new Room();
        $room->name = $request->name;
        $room->description = $request->description;
        $room->price = $request->price;

        $room->save();

        return back()->with('mensaje', '!! Habitación creada con exito !!');
    }


    public function update(Request $request)
    {
        $room = Room::findOrFail($request->id);

        $room->name = $request->name;
        $room->price = $request->price;
        $room->description = $request->description;

        $room->save();
        return back()->with('mensaje', '!! Habitación Editada con exito !!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request )
    {
        $room =  Room::findOrFail($request->id);
        $room->delete();
        return back()->with('mensaje', '!! Habitación eliminada con exito !!');
    }


    public function Status($id){
        $room          = Room::findOrFail($id);
        $room->status  = '0';
        $room->save();
        return back();
    }
}
