<?php

namespace App\Http\Controllers;

use App\Service;
use App\Rent_Service;
use App\Rent;
use Illuminate\Http\Request;

class ServiceController extends Controller
{

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
        alert()->success('Ok', '!! Servicio creado con exito !!');

        return back();
    }

    public function update(Request $request)
    {
        $service = Service::findOrFail($request->id);

        $service->name = $request->name;
        $service->price = $request->price;
        $service->description = $request->description;

        $service->save();
        alert()->success('Ok', '!! Servicio Editado con exito !!');
        return back();
    }

    public function destroy(Request $request)
    {
        $service =  Service::findOrFail($request->id);
        
        $service->delete();
        alert()->success('Ok', '!! Servicio Eliminado con exito !!');
        return back();
    }

    // Eliminar un servicio de un arriendo en especifico
    public function deleteService(Request $request){
        $rent_service =  Rent_Service::findOrFail($request->id);
        $rent = Rent::findOrFail($rent_service->rent_id);

        $rent->total = $rent->total - $rent_service->total;

        $rent->save();
        $rent_service->delete();
        alert()->success('Ok', '!! Servicio Eliminado con exito !!');
        return back();
    }
}
