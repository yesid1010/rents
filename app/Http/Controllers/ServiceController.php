<?php

namespace App\Http\Controllers;

use App\Service;
use App\Rent_Service;
use App\Rent;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::orderBy('id','desc')->get();
        return view('services.index',['services'=>$services]);
    }


    public function store(Request $request)
    {
        $service = new Service();
        $service->name = $request->name;
        $service->price = $request->price;
        $service->description = $request->description;

        $service->save();

        return back()->with('mensajeok', '!! Servicio creado con exito !!');
    }




    public function update(Request $request)
    {
        $service = Service::findOrFail($request->id);

        $service->name = $request->name;
        $service->price = $request->price;
        $service->description = $request->description;

        $service->save();
        return back()->with('mensajeok', '!! Servicio Editado con exito !!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $service =  Service::findOrFail($request->id);
        $service->delete();
        return back()->with('mensajeok', '!! Servicio eliminado con exito !!');
    }

    public function deleteService(Request $request){
        $rent_service =  Rent_Service::findOrFail($request->id);
        $rent = Rent::findOrFail($rent_service->rent_id);

        $rent->total = $rent->total - $rent_service->total;

        $rent->save();
        $rent_service->delete();

        return back()->with('mensajeok', '!! Servicio eliminado con exito !!');
    }
}
