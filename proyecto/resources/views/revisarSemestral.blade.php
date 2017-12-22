@extends('layouts.template')


<?php

	use App\Semestral;
	use App\usuario;
	use App\experiencia;


?>

<style type="text/css">
	td{
		padding: 5px;
		margin: 5px;
	}
	tr{
		padding: 5px;
		margin: 5px;
	}

</style>





@section("contenido")



<script type="text/javascript">

        function cambia(arr){
            let elementos = "";
            arr = JSON.parse(arr);

            elementos = "<table border='1'><th>Nombre</th><th>Fecha</th><th>Horario</th><th>Laboratorio</th>";
            for(let i = 0; i < arr.length; i++)
                elementos += "<tr><td> "+arr[i].nombre+" </td><td> "+arr[i].fecha+" </td><td> "+arr[i].horario+" </td><td> "+arr[i].laboratorio+" </td></tr>";
            elementos += "</table>";


        document.getElementById('descr').innerHTML= elementos;
    }
</script>



    <div class="modal fade" id="solicitud" 
         tabindex="-1" role="dialog" 
         aria-labelledby="favoritesModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" 
              data-dismiss="modal" 
              aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" 
            id="favoritesModalLabel">Elementos necesarios</h4>
          </div>
          <div class="modal-body">
            <p id="descr">
            prueba
            </p>
          </div>
          <div class="modal-footer">
            <button type="button" 
               class="btn btn-default" 
               data-dismiss="modal">Cerrar</button>
          </div>
        </div>
      </div>
    </div>

 <div class="content">
        <div class="container-fluid">
        <h2>Solicitudes semestrales</h2>
        	@if($msg !== '')
        		@if($tipo == 1)
        			<div class="alert alert-info fade in">
        		@else
        			<div class="alert alert-danger fade in">
        		@endif

				  <strong>{{$msg}}</strong>
				</div>

        	@endif

        	<table border="1" cellspacing="1" cellpadding="1">
        		<th>Docente</th><th>Asignatura</th><th>Horario</th><th>Elementos</th><th>Aprobar</th><th>Rechazar</th>
        	@foreach(Semestral::where('estado',1)->get() as $sem)
        		<tr>
        			<td>
        				{{(usuario::where('id',$sem->docente)->pluck('nombre'))[0]}}
        			</td>
        			<td>
        				{{$sem->asignatura}}
        			</td>
        			<td>
        				{{$sem->horario}}
        			</td>
        			<td>
        				 <button 
                           type="button" 
                           class="btn btn-outline-primary"
                           onclick="cambia('{{experiencia::where("solicitud",$sem->id)->get()}}');"
                           data-toggle="modal" 
                           data-target="#solicitud">
>
                         elementos
                        </button>
        			</td>
        			<td>
        				<a href="{{ URL::to('aceptarSem/'.$sem->id)  }}" class="btn">Aceptar</a>
        			</td>
        			<td>
        				<a href="{{ URL::to('rechazarSem/'.$sem->id)  }}" class="btn">Rechazar</a>
        			</td>
        		</tr>

        	@endforeach

        	</table>

        </div>
 </div>
@endsection