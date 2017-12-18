<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class solicitudes extends Controller
{
    public function crearInsumos(Request $request){


    	$docente = $request->input('docente');
    	$alumno = $request->input('Alumno');
    	$asignatura = $request->input('Asignatura');
    	$fecha = $request->input('fecha');
    	$hora = $request->input('time');
    	$descripcion = $request->input('descripcion');
    	$nGrupos = $request->input('nGrupos');

    	//Aqui se llama a la petición de creación de solicitud por parte del otro grupo, esperamos su respuesta.



    	//$respuesta = controlador::crearSolicitudInsumo($docente, $alumno, $asignatura, $fecha, $hora, $descripcion, $nGrupos);

    	//Mientras tanto ponemos una respuesta por defecto.
    	$respuesta = 1;

    	if($respuesta == 1){
    		return view('crearSolicitud')->with('msg','Solicitud creada con exito');
    	}
    	else{
    		return view('crearSolicitud')->with('msg','Error al crear la solicitud');
    	}

    	
    }
}
