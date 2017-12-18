<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;

class login extends Controller
{
    public function iniciarSesion(Request $request){

    	//Aqui cargaremos nuestro controlador de ejemplo ya que le estariamos pidiendo los datos al otro grupo.
    	$logInfo = file_get_contents('datos_ejemplo.json');
    	$json = json_decode($logInfo, true);

    	$user = $request->input('user');
    	$pass = $request->input('pass');

    	for($i = 0; $i < sizeof($json[0]['login']['usuarios']); $i++){
    		if($json[0]['login']['usuarios'][$i]['usuario'] == $user)
    			if($json[0]['login']['usuarios'][$i]['contraseña'] == $pass){
    				session_start();
    				$_SESSION['user'] = $user;
    				$_SESSION['nombre'] = $json[0]['login']['usuarios'][$i]['nombre'];
    				$_SESSION['tipo'] = $json[0]['login']['usuarios'][$i]['tipo'];
    				return Redirect::to('panel');
    			}
    	}

    	return Redirect::back()->withErrors(['Usuario o contraseña incorrectos']);
    }
}
