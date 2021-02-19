<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class UserController extends Controller
{
    
    public function index()
    {
        return User::where('role_id', '!=', 1)->paginate(2);
        // return User::paginate(15);
    }


    public function show($id)
    {
        $user = User::find($id);
        if($user == null){
            return response('Usuario no encontrado', 200);
        }else{
            return response()->json(['user'=>$user]);
        }
    }

    public function edit($id)
    {
        //
    }

    function update(Request $request, $id)
    {
        $user = User::find($id);
        if($user == null){
            return response('Usuario no encontrado', 200);
        }else{
            $user->name = $request->name;
            $user->telefono = $request->telefono;
            $user->area = $request->area;
            $user->puesto = $request->puesto;
            $user->update();
        }
        return response()->json(['user'=>$user], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        if($user == null){
            return response('Usuario no encontrado', 200);
        }else{
            User::destroy($id);
        }
        return response()->json(['user'=>$user], 200);
    }
}
