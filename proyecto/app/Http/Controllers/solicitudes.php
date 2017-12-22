<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\solicitud;
use App\Semestral;
use App\experiencia;
use Session;

class solicitudes extends Controller
{
    public function crearInsumos(Request $request){


    	$docente = Session::get('userid');

    	$alumno = $request->input('Alumno');
    	$asignatura = $request->input('Asignatura');
    	$fecha = $request->input('fechaClase');
    	$hora = $request->input('time');
    	$descripcion = $request->input('descripcion');
    	$nGrupos = $request->input('nGrupos');

    	//Aqui se llama a la petición de creación de solicitud por parte del otro grupo, esperamos su respuesta.

        $solicitud = new solicitud;
        $solicitud->id = solicitud::count('id') +1;
        $solicitud->docente = $docente;
        $solicitud->alumno = $alumno;

        $solicitud->asignatura = $asignatura;
        $solicitud->fechaClase = $fecha;
        $solicitud->horaClase = $hora;
        $solicitud->descripcion = $descripcion;
        $solicitud->nGrupos = $nGrupos;
        $solicitud->estado = 1;

        


        

        $respuesta= ($solicitud->save() == true?1:-1);

    	if($respuesta == 1){
    		return view('crearSolicitud')->with('msg','Solicitud creada con exito')->with('tipo',1);
    	}
    	else{
    		return view('crearSolicitud')->with('msg','Error al crear la solicitud')->with('tipo',-1);
    	}

    	
    }


    public function crearSemestral(Request $r){
        $docente = Session::get('userid');
        $asignatura = $r->input('Asignatura');
        $horario = $r->input('horario');


        $semestral = new Semestral;
        $semestral->docente = $docente;
        $semestral->horario = $horario;
        $semestral->asignatura = $asignatura;

        $semestral->save();




        for($i = 0; $i < 20; $i++){
            if(!is_null($r->input('numYNom-'.$i))){
                $experiencia = new experiencia;
                $experiencia->solicitud = $semestral->id;
                $experiencia->nombre = $r->input('numYNom-'.$i);
                $experiencia->fecha = $r->input('fecha-'.$i);
                $experiencia->horario = $r->input('horario-'.$i);
                $experiencia->laboratorio = $r->input('lab-'.$i);
                $experiencia->save();
            }
        }

        return view('creaSemestral')->with('msg','Solicitud creada con exito')->with('tipo',1);
    }


    public function aceptarSem($id){
        $semes = Semestral::find($id);
        $semes->estado = 2;
        $semes->save();
        return view('revisarSemestral')->with('msg','Solicitud aprobada con exito')->with('tipo',1);
    }

    
        public function rechazarSem($id){
        $semes = Semestral::find($id);
        $semes->estado = 0;
        $semes->save();
        return view('revisarSemestral')->with('msg','Solicitud rechazada')->with('tipo',2);
    }


        public function aceptarInsu($id){
        $insu = solicitud::find($id);
        $insu->estado = 2;
        $insu->save();
        return view('revisarInsumos')->with('msg','Solicitud aprobada con exito')->with('tipo',1);
    }

    
        public function rechazarInsu($id){
        $insu = solicitud::find($id);
        $insu->estado = 0;
        $insu->save();
        return view('revisarInsumos')->with('msg','Solicitud rechazada')->with('tipo',2);
    }

}
