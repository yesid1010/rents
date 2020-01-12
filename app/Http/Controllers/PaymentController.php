<?php

namespace App\Http\Controllers;

use App\Payment;
use App\Rent;
use App\Service;
use App\Room;
use App\Rent_Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payments = Payment::all();

        return view('payments.index',['payments'=>$payments]);
    }

    public function store(Request $request)
    {
        $user                   = Auth::user();
        $payment                = new Payment();
        $payment->rent_id       = $request->id;
        $payment->user_id       = $user->id;
        $payment->description   = $request->description;
        $payment->type          = $request->type;

        $total = $this->total($request->id);
        
        $payment->total = $total;

        $payment->save();

        $room       = $this->room($request->id);
        $huesped    = $this->user($request->id);
        $rent       = $this->rent($request->id);
        $services   = $this->services($request->id);


        $rent_      = Rent::findOrFail($request->id);

        $pdf = \PDF::loadView('pdf.rent',['payment'=>$payment,
                                          'empleado'=>$user,
                                          'total'=>$total,
                                          'room'=>$room,
                                          'huesped'=>$huesped,
                                          'rent'=>$rent,
                                          'rent_'=>$rent_,
                                          'services'=>$services]);
        return $pdf->stream('pdf'.$request->id.'.pdf');
    }



    public function total($id){

        $rent = Rent::findOrFail($id);
        $room = Room::findOrFail($rent->room_id);

        $rent->status = '1';

        $rent->save();

        $services =  $rent->services;
        $total = 0;

        foreach($services as $service){
            $total = $total + $service->price;
        }

        return $total + $room->price;
    }

    public function room($id){
        $room = DB::table('rents')
            ->join('rooms','rooms.id','=','rents.room_id')
            ->select('rooms.name as nameRoom',
            'rooms.price as priceRoom')
            ->where('rents.id','=',$id)
            ->first();
        
        return $room;
    }

    public function user($id){
        $user = DB::table('rents')
        ->join('users','users.id','=','rents.user_id')
        ->select('users.identification as identification',
                 'users.name as nameUser',
                 'users.telephone as telephone',
                 'users.email as email')
        ->where('rents.id','=',$id)
        ->first();

        return $user;
    }

    public function rent($id){
        $rent = DB::table('rents')
        ->select('rents.startdate as startdate',
                 'rents.endingdate as endingdate',
                 'rents.fingerprint as fingerprint',
                 'rents.status as statusRent')
        ->where('rents.id','=',$id)
        ->first();

        return $rent;
    }

    public function services($id){
        $services = DB::table('rents')
        ->join('rent_service','rent_service.rent_id','=','rents.id')
        ->join('services','services.id','=','rent_service.service_id')
        ->select('services.name as nameService',
                 'services.price as priceService')
        ->where('rents.id','=',$id)
        ->get();

        return $services;
    }
}
