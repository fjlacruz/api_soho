<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{

//===== funcion para devolver todos los usuarios ============//
    public function getUsers(){
    $users = User::all();

      if($users){
       return (array('response' => $users, 'estatus' => 'OK', 'code' => 200));
      }else{
       return (array('response' => 'fail', 'estatus' => 'OK', 'code' => 404));
      }
    }

//===== funcion para agregar un usuario usuarios ============//
    public function addUser(Request $request){
     
      $user = new User(array(
        'rut'       => $request->get('rut'), 
        'nombres'   => $request->get('nombres'),
        'apellidos' => $request->get('apellidos'),
        'correo'    => $request->get('correo'),
        'clave'     => md5($request->get('clave'))
    ));
    $user->save();
      if($user){
       return (array('response' => 'success', 'estatus' => 'OK', 'code' => 200));
      }else{
       return (array('response' => 'fail', 'estatus' => 'OK', 'code' => 404));
      }

    }


//===== funcion para loguaer los usuarios ============//
    public function login($rut,$clave, Request $request){

     $user = User::where('rut','=',$rut)
                  ->where('clave','=',md5($clave))
                  ->get();
    if($user){
     foreach ($user as $us) {
       $id = $us->id;
       $token = sha1(rand(0000, 9999));
      }
      User::find($id)->update(['token' => $token]);
      return (array('token' => $token, 'res' => 'success'));
    }else{
      return (array('token' => '', 'res' => 'fail'));
      }

    }


//===== funcion para cerrar la sesion ============//
   public function logout($token, Request $request){
    $user = User::where('token','=',$token)
                  ->get();

  if($user){
     foreach ($user as $token) {
       $id = $token->id;
       $token = $token->token;
       User::find($id)->update(['token' => null]);
       return (array('res' => 'success'));
      }
  
    }else{
      return (array('res' => 'fail'));
    }
  
  }

//===== funcion para cambiar la clave de usuario ============//
public function cambiarClave($id, $clave, Request $request){
    $user = User::find($id);

    $up = User::find($id)->update(['clave' => md5($clave)]);
    if($up){
     return (array('response' => 'success', 'estatus' => 'OK', 'code' => 200));
    }else{
    return (array('res' => 'fail'));
   }

}
}
