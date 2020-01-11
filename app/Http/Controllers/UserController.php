<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserCreateRequest;
use Illuminate\Http\Request;
use App\User;
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
}
