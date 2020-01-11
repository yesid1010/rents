<?php

namespace App\Http\Controllers;

use App\Service;
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
}
