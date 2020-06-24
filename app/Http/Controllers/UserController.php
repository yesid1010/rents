<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserCreateRequest;
use Illuminate\Http\Request;
use App\User;
use App\Rent;
use App\Service;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
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
         $services = Service::all(); 
        //$user = User::where('id',$id)->first();
        return view('users.rents.index',['rents'=>$rents,'services'=>$services]);
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
                'rents.contract as contract',
                'rooms.id as idR','users.id as idU',
                'rents.id as idRe')
                ->where('rents.user_id','=',$id)
                ->orderBy('idRe', 'desc')
                ->get();
    }


    public function edit(){
        $user = Auth::user();
        return view('users.profile.index',['user'=>$user]);
    }

    public function update(Request $request, $id)
    {
        
        $user = Auth::user();
        
        $user->identification = $request->identification;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->telephone = $request->telephone;

        $user->save();
        alert()->success('Ok', '!! Perfil actualizado !!')->autoclose(3000);
        return back();
    }

    public function updatePassword(Request $request){
        $user  = Auth::user();
        $actualypassword = $request->input('actualypassword');

        if (Hash::check($actualypassword,$user->password)){
            $user->password = bcrypt($request->input('newpassword'));
            $user->save();
            alert()->success('OK', '!!Contraseña Actualizada con exito!!')->autoclose(3000);
            return back();
        }
        else{
            alert()->error('OK', '!!Error al cambiar contraseña!!')->autoclose(3000);
            return back();
        }
    }
}
