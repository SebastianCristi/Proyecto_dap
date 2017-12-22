@extends('layouts.template')


<?php

	use App\solicitud;
	use App\usuario;



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

           function cambia(texto){
        document.getElementById('descr').innerHTML= texto;
    
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

        	<table class="table table-hover">
                                        <thead class="text-warning"> 
                                            <tr>                                                

                                                <th>Docente</th>
                                                <th>Asignatura</th>
                                                <th>Hora</th>
                                                <th>N° de grupos</th>
                                                <th>Descripción experiencia</th>
                                                <th>Aceptar</th>
                                                <th>Rechazar</th>
                                            </tr>
                                        </thead>
                                          
                                        <tbody>
                                        


                                        @foreach(solicitud::where('estado',1)->get() as $soli)

                                            <tr>
                                               
      
                                                <td>{{(usuario::where('id',$soli->docente)->pluck('nombre'))[0]}}</td>
                                                <td>{{$soli->asignatura}}</td>
                                                <td>{{$soli->fechaClase}} {{$soli->horaClase}}</td>
                                                <td>{{$soli->nGrupos}}</td>
                                                <td>
                                                <button 
                                                   type="button" 
                                                   class="btn btn-outline-primary"
                                                   onclick="cambia('{{$soli->descripcion}}');"
                                                   data-toggle="modal" 
                                                   data-target="#solicitud">
>
                                                  {{substr($soli->descripcion,0,30)."..."}}
                                                </button>
                                                    
                                                </td>
                                                <td>
                                                    <a href="{{URL::to('aceptarInsu/'.$soli->id)}}">
                                                        <i class="material-icons">done</i>
                                                    </a>
                                                </td> 
                                                <td>
                                                    <a href="{{URL::to('rechazarInsu/'.$soli->id)}}">
                                                        <i class="material-icons">not_interested</i>
                                                    </a>
                                                </td>    
                                            </tr>



             

                                        @endforeach


                                        </tbody>
                                         
                                    </table>

        </div>
 </div>
@endsection