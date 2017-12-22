<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;
use Session;
use DB;

use App\usuario;


class login extends Controller
{
    public function iniciarSesion(Request $request){

    	//Aqui cargaremos nuestro controlador de ejemplo ya que le estariamos pidiendo los datos al otro grupo.
    	$logInfo = file_get_contents('datos_ejemplo.json');
    	$json = json_decode($logInfo, true);

        $user = $request->input('user');
        $pass = $request->input('pass');


    	$usuario = usuario::where(['usuario'=>$user, 'password'=>$pass])->first();
            
            if(!is_null($usuario))
                {
                    Session::start();
                    Session::put('user', $user);
                    Session::put('nombre', $usuario['nombre']);
                    Session::put('tipo',  $usuario['tipo']);
                    Session::put('userid',  $usuario['id']);
                    return Redirect::to('panel');
                }


    }

    public function cerrarSesion(){
        session_start();

        // Destruir todas las variables de sesión.
        $_SESSION = array();

        session_destroy();

        return Redirect::to(' ');
    }

}
