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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $rents = DB::table('rents')
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
                             'rooms.id as idR','users.id as idU',
                             'rents.id as idRe')
                             ->orderBy('idRe', 'desc')
                             ->get();

        $services = Service::all();  
        $users = User::where('rol','1')->get();
        $rooms = Room::where('status','0')->get();
        return view('rents.index',['rents'=>$rents,
                                    'services'=>$services,
                                    'users'=>$users,
                                    'rooms'=>$rooms]);
    }

 
    public function store(UserCreateRequest $request)
    {
        
        $usercontroller = new UserController();
        $user = $usercontroller->store($request);

        $this->createRent($user,$request);

        // $rent = new Rent();
        // $rent->room_id = $request->id;
        // $rent->user_id = $user->id;
        // $rent->startdate = $request->startdate;
        // $rent->endingdate = $request->endingdate;
        // $rent->description = $request->description;


        // $rent->save();

        // $room = Room::findOrFail($rent->room_id);

        // $room->status = '1';

        // $room->save();
        
        return back();  
    }

    public function save(Request $request){
        
        $user = User::findOrFail($request->user_id);
        $this->createRent($user,$request);

        return back();
    }


    public function createRent(User $user,Request $request){
        $rent = new Rent();
        $rent->room_id = $request->id;
        $rent->user_id = $user->id;
        $rent->startdate = $request->startdate;
        $rent->endingdate = $request->endingdate;
        $rent->description = $request->description;
        $rent->save();

        $room = Room::findOrFail($rent->room_id);

        $room->status = '1';

        $room->save();
     
        return back();

    }

    public function AddService(Request $request)
    {
        $rent_rervice = new Rent_Service();
        $rent_rervice->service_id = $request->service_id;
        $rent_rervice->rent_id = $request->id;
        $rent_rervice->description = $request->description;
        

        $rent_rervice->save();

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Rent  $rent
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rent $rent)
    {
        //
    }

    
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

    public function show(Request $request)
    {
        $user = DB::table('rents')
                    ->join('users','users.id','=','rents.user_id')
                    ->select('users.identification as identification',
                             'users.name as nameUser',
                             'users.telephone as telephone',
                             'users.family_telephone as family_telephone',
                             'users.email as email')
                    ->where('rents.id','=',$request->id)
                    ->first();

        $room = DB::table('rents')
                    ->join('rooms','rooms.id','=','rents.room_id')
                    ->select('rooms.name as nameRoom',
                    'rooms.description as descriptionRoom',
                    'rooms.price as priceRoom')
                    ->where('rents.id','=',$request->id)
                    ->first();
        
        $rent = DB::table('rents')
                    ->select('rents.startdate as startdate',
                             'rents.endingdate as endingdate',
                             'rents.fingerprint as fingerprint',
                             'rents.status as statusRent')
                    ->where('rents.id','=',$request->id)
                    ->first();

        $services = DB::table('rents')
                        ->join('rent_service','rent_service.rent_id','=','rents.id')
                        ->join('services','services.id','=','rent_service.service_id')
                        ->select('services.name as nameService',
                                 'services.price as priceService')
                        ->where('rents.id','=',$request->id)
                        ->get();
        

        $total = $this->total($request->id);

        if($rent->statusRent == 1){
            $payment = DB::table('rents')
                ->join('payments','payments.rent_id','=','rents.id')
                ->select('payments.type as type','payments.user_id as userp_id')
                ->where('rents.id','=',$request->id)
                ->first();

            $empleado = DB::table('users')->where('id','=',$payment->userp_id)->first();

            return view('rents.show',['user'=>$user,
                                'room'=>$room,
                                'rent'=>$rent,
                                'services'=>$services,
                                'total'=>$total,
                                'payment'=>$payment,
                                'empleado'=>$empleado,
                                ]);
        }else{
            return view('rents.show',['user'=>$user,
                                'room'=>$room,
                                'rent'=>$rent,
                                'services'=>$services,
                                'total'=>$total
                                ]);
        }

    }


    public function total($id){
        $rent = Rent::findOrFail($id);
        $room = Room::findOrFail($rent->room_id);

        $services =  $rent->services;
        $total = 0;

        foreach($services as $service){
            $total = $total + $service->price;
        }

        return $total + $room->price;
    }

    public function fingerprint(Request $request){
        $rent = Rent::findOrFail($request->id);

        $rent->fingerprint = $request->fingerprint;

        $rent->save();

        return back();
    }
}
