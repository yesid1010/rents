<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserCreateRequest;
use Illuminate\Http\Request;
use App\User;
use App\Rent;
use Illuminate\Support\Facades\DB;
class UserController extends Controller
{
    //

    public function index(){
        $users = User::where('rol','1')->get();

        return view('users.index',['users'=>$users]);
    }

    public function store(UserCreateRequest $request){
        $user = new User();
        $user->identification = $request->identification; 
        $user->name = $request->name; 
        $user->email = $request->email; 
        $user->telephone = $request->telephone; 
        $user->family_telephone = $request->family_telephone; 
        $user->rol = '1';     
        
        $user->save();
        return $user;
    }

    public function Rents(Request $request){

       
         $rents = $this->rents_U($request->id);
        //$user = User::where('id',$id)->first();
        return view('users.rents.index',['rents'=>$rents]);
    }

    public function rents_U($id){
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
                ->where('rents.user_id','=',$id)
                ->orderBy('idRe', 'desc')
                ->get();
    }
}
