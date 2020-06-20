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
use App\Http\Controllers\MailController;

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

    // metodo para crear un abono
    public function store(Request $request)
    {
        $user                   = Auth::user();
        $payment                = new Payment();
        $payment->rent_id       = $request->id;
        $payment->user_id       = $user->id;
        $payment->description   = $request->description;
        $payment->type          = $request->type;
        $payment->total         = $request->abono;
        $payment->save();

        $this->abonar($payment->rent_id,$request->abono);
        
        alert()->success('Ok','!! Pago generado satisfactoriamente !!');
        return back();

    }

    // metodo para restar al total del arriendo, el abono actual
    public function abonar($id,$abono){
        $rent = Rent::findOrFail($id);

        $rent->total = $rent->total - $abono;
        $rent->save();

        return back();
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

    // metodo para traer el nombre y el precio de la habitacion de un arriendo
    public function room($id){
        $room = DB::table('rents')
            ->join('rooms','rooms.id','=','rents.room_id')
            ->select('rooms.name as nameRoom',
            'rooms.price as priceRoom')
            ->where('rents.id','=',$id)
            ->first();
        
        return $room;
    }
// metodo para traer los datos de un usuario huesped de un arriendo
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

    // metodo para traer los datos de un arriendo en especifica
    public function rent($id){
        $rent = DB::table('rents')
        ->select('rents.startdate as startdate',
                 'rents.endingdate as endingdate',
                 'rents.fingerprint as fingerprint',
                 'rents.status as statusRent',
                 'rents.habPrice as habPrice',
                 'rents.total as total')
        ->where('rents.id','=',$id)
        ->first();

        return $rent;
    }

    // metodo para traer los servicios asociados a un arriendo
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

    // metodo que devuelve el pago asociado a un arriendo
    // metodo para traer los pagos de un arriendo
    public function payments($id){
        $payments    = DB::table('payments')
                            ->select('payments.description as description',
                            'payments.id as id',
                            'payments.type as type',
                            'payments.total as total',
                            'payments.created_at as created_at',
                            'payments.updated_at as updated_at')
                            ->where('payments.rent_id','=',$id)
                            ->get();
        return $payments;
    }

    public function pdf($id){
        $user       = Auth::user();
        $room       = $this->room($id);
        $huesped    = $this->user($id);
        $rent       = $this->rent($id);
        $services   = $this->services($id);
        $payments    = $this->payments($id);
        $rent_      = Rent::findOrFail($id);

        $pdf = \PDF::loadView('pdf.rent',['payments'=>$payments,
                                          'empleado'=>$user,
                                          'room'=>$room,
                                          'huesped'=>$huesped,
                                          'rent'=>$rent,
                                          'rent_'=>$rent_,
                                          'services'=>$services]);

        $mailController = new MailController();

        $mailController->sendEmail($pdf,$huesped);
        
        alert()->success('Ok','!! Factura enviada con exito !!');
        //return $pdf->stream('pdf'.$id.'.pdf');
        return back();
    }


    public function DeletePayment(Request $request){
        $payment =  Payment::findOrFail($request->id);
        $rent = Rent::findOrFail($payment->rent_id);

        $rent->total = $rent->total + $payment->total;

        $rent->save();
        $payment->delete();
        
        alert()->success('Ok','!! Abono eliminado con exito !!');
        return back();
    }
}
