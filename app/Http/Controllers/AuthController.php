<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request){

        $newUser = User::create([
            'name' => $request->name,
            'email'=> $request->email,
            'password' => Hash::make($request->password),
            'telefono' => $request->telefono,
            'area' => $request->area,
            'puesto' => $request->puesto,
            'role_id' => 2
        ]);
        return $newUser;
    }

    public function login(Request $request){

        if(!$token = Auth::attempt($request->only('email', 'password'))){
            return response(null, 401);
        }
        return response()->json(compact('token'));
     }

     public function logout(){
        Auth::logout();
        return response('Logged Out', 200);
    }
}
