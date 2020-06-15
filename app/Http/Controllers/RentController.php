<?php

namespace App\Http\Controllers;

use App\Rent;
use App\Room;
use App\User;
use App\Service;
use App\Rent_Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\UserController;
use App\Http\Requests\UserCreateRequest;

class RentController extends Controller
{

// metodo para mostrar todos los arriendos agregados a la bd
    public function index(Request $request)
    {   
        $abierto = false;

        if($request->ab == 'true'){
            $abierto = true;
        }

        $rents = $this->rents($request->id);
        
        $services = Service::all();  
        $users = User::where('rol','1')->get();
        $rooms = Room::where('status','0')->get();
        return view('rents.index',['rents'=>$rents,
                                    'services'=>$services,
                                    'users'=>$users,
                                    'rooms'=>$rooms,
                                    'abierto'=>$abierto]);
    }

 // metodo para  crear un arriendo con un huesped que no esta guardado en el sistema
    public function store(UserCreateRequest $request)
    {
        // creamos una instancia del controlador de usuarios para crear un nuevo usuario
        $usercontroller = new UserController();
        $user = $usercontroller->store($request);
        
        //pasamos el usuario creado y los parametros del formulario al método createRent
        $this->createRent($user,$request);
        
        return redirect('/rooms');  
    }

// metodo para crear un arriendo con un huesped que ya se encuentra registrado en el sistema
    public function save(Request $request){
        
        //buscamos el usuario escogido en la base de datos y pasamos los parametros del formulario al método createRent
        $user = User::findOrFail($request->user_id);
        $this->createRent($user,$request);

        return redirect('/rooms');
    }

// metodo llamado para crear un arriendo
    public function createRent(User $user,Request $request){
        $rent = new Rent();
        $rent->room_id = $request->id;
        $rent->user_id = $user->id;
        $rent->startdate = $request->startdate;
        $rent->endingdate = $request->endingdate;
        $rent->description = $request->description;

        // habitacion a arendar se le cambia el estado
        $room = Room::findOrFail($rent->room_id);
        $room->status = '1';
        $room->save();

        $rent->habPrice = $room->price;
        $rent->total = $room->price;

        $rent->save();

        alert()->success('Ok','Arriendo creado correctamente');
        return back();

    }

// metodo para agregar un servicio adicional a un arriendo
    public function AddService(Request $request)
    {   
        // recibimos por parametro el id del arriendo y el id del servicio
        $rent = Rent::findOrFail($request->id);
        $service = Service::findOrFail($request->service_id);

        // guardamos en la tabla pivote esos id 
        $rent_service = new Rent_Service();
        $rent_service->service_id = $request->service_id;
        $rent_service->rent_id = $request->id;
        $rent_service->total = $service->price;
        $rent_service->description = $request->description;
        $rent_service->save();

        //actualizamos en total del arriendo
        $rent->total = $rent->total + $service->price;
        $rent->save();

        alert()->success('Ok', '!! Servicio Agregado con exito !!');
        return back();
    }

// metodo para mostrar toda la información relacionada de un arriendo
//('usuario','habitacion','servicios','detalle del arriendo') 
    public function Detail(Request $request){

        // usuario del arriendo
        $user = $this->User($request->id);

        //habitacion del arriendo
        $room = $this->Room($request->id); 
        
        // datos del arriendo
        $rent = $this->Rent($request->id);

        // servicios adicionales del arriendo
        $services = $this->Services($request->id);

        // pagos  del arriendo
        $payments = $this->payments($request->id);

        // total del arriendo
        $total = $this->total($request->id);

        return view('rents.show',['user'=>$user,
                                'room'=>$room,
                                'rent'=>$rent,
                                'services'=>$services,
                                'abonos'=>$payments,
                                'total'=>$total,
                    ]);

    }


    public function DetailRent(Request $request){
       $room = Room::findOrFail($request->id);
       $rent = DB::table('rents')
                   ->where('room_id','=',$room->id)
                   ->where('status','=','0')
                   ->get();
        
       // Rent::where('room_id','=',$room->id)->first();
       
        // usuario del arriendo
        $user = $this->User($rent[0]->id);

        //habitacion del arriendo
        $room = $this->Room($rent[0]->id); 
        
        // datos del arriendo
        $Rent = $this->Rent($rent[0]->id);

        // servicios adicionales del arriendo
        $services = $this->Services($rent[0]->id);

        // pagos  del arriendo
        $payments = $this->payments($rent[0]->id);

        // total del arriendo
        $total = $this->total($rent[0]->id);

        return view('rents.show',['user'=>$user,
                                'room'=>$room,
                                'rent'=>$Rent,
                                'services'=>$services,
                                'abonos'=>$payments,
                                'total'=>$total,
                    ]);


    }

// metodo para agregar un numero de huela a un arriendo
    public function fingerprint(Request $request){

        $rent = Rent::findOrFail($request->id);

        if($request->hasFile('file')){
            $rent->contract = $request->file('file')->store('public/contratos');
        }
        
        $rent->fingerprint = $request->fingerprint;

        $rent->save();

        return back();
    }


// metodo para cerrar un arriendo ya pagado
    public function CloseRent(Request $request){

        $rent = Rent::findOrFail($request->id);
        
        if($rent->fingerprint == ''){
            alert()->error('Error','Por favor agregar huella al arriendo')->autoclose(5000);
            return back();
        }

        $payments =  $this->payments($request->id);

        $totalPayments = 0;
        foreach ($payments as $payment) {
            $totalPayments = $totalPayments + $payment->total;
        }

        $totalRent = $this->total($request->id);

        if($totalRent > $totalPayments){
            alert()->error('Error','Aún no se han completado los pagos')->autoclose(5000);
            return back();

        }else{
        
            // 1 pagado 0 pendiente
            
            $rent->status = '1';
            $rent->save();

            // liberamos la habitación asociada a ese arriendo
            // 1 ocupada 0 libre
            $room = Room::findOrFail($rent->room_id);
            $room->status = '0';
            $room->save();

            alert()->success('Ok',' !! Arriendo Cerrado con Exito !!');
            return back();
        }


    }

    // ----------- METODOS ADICIONALES ------------------//

    // metodo para obtener los datos del usuario de un arriendo
    public function User($id){
        $user = DB::table('rents')
                    ->join('users','users.id','=','rents.user_id')
                    ->select('users.identification as identification',
                            'users.name as nameUser',
                            'users.telephone as telephone',
                            'users.family_telephone as family_telephone',
                            'users.email as email')
                    ->where('rents.id','=',$id)
                    ->first();
        return $user;
    }

    // metodo para obtener los datos de la habitación de un arriendo
    public function Room($id){
        $room = DB::table('rents')
                        ->join('rooms','rooms.id','=','rents.room_id')
                        ->select('rooms.name as nameRoom',
                        'rooms.description as descriptionRoom',
                        'rooms.price as priceRoom')
                        ->where('rents.id','=',$id)
                        ->first();
        return $room;
    }

    // metodo para traer algunos datos  del arriendo
    public function Rent($id){
        $rent = DB::table('rents')
                ->select('rents.startdate as startdate',
                        'rents.endingdate as endingdate',
                        'rents.fingerprint as fingerprint',
                        'rents.status as statusRent',
                        'rents.habPrice as habPrice',
                        'rents.contract as contract',
                        'rents.total as total')
                ->where('rents.id','=',$id)
                ->first();
        return $rent;
    }

    // metodo para traer servicios adicionales del arriendo
    public function Services($id){
        $services = DB::table('rents')
                    ->join('rent_service','rent_service.rent_id','=','rents.id')
                    ->join('services','services.id','=','rent_service.service_id')
                    ->select('services.name as nameService',
                            'rent_service.id as id',
                            'rent_service.total as priceService',
                            'rent_service.description as description',
                            'rent_service.created_at as created_at')
                    ->where('rents.id','=',$id)
                    ->get();
        return $services;
    }

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

    // metodo para calcular el total de un arriendo 
    public function total($id){
        $services = DB::table('rent_service')
                        ->where('rent_id','=',$id)
                        ->get();
        $rent = Rent::findOrFail($id);
        $total = 0;
        foreach($services as $service){
            $total = $total + $service->total;
        }
        return $total + $rent->habPrice;
    }

    
// metodo para cambiar el estado de un arriendo (' 1 = pagado',' 0 = pendiente')
public function State($id){
    $rent = Rent::findOrFail($id);

    if($rent->status == '0'){
        $rent->status = '1';
    }else{
        $rent->status = '0';  
    }
    
    $rent->save();
    return back();
}

public function rents($id){
  return   $rents =  DB::table('rents')
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
             ->where('rents.status','=',$id)
             ->orderBy('idRe', 'desc')
             ->get();
}

}
