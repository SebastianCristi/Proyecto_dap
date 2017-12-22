@extends('layouts.template')


@section("contenido")

 <div class="content">
        <div class="container-fluid">

        	@if($msg !== '')
        		@if($tipo == 1)
        			<div class="alert alert-info fade in">
        		@else
        			<div class="alert alert-danger fade in">
        		@endif

				  <strong>{{$msg}}</strong>
				</div>

        	@endif


			<div class="formulario" style="width: 95%; border: 1px solid gray; padding: 10px;">
				<form method="POST" action="solicitudSemestral">

				{{ csrf_field() }}


				<div style="position: relative; float: right;"> Nº <input type="number" name="ID" value="{{ App\Semestral::max('id') +1 }}" disabled></div>

				<div class="form-group">
					<label for="Docente">Docente:  </label><input type="text" id="docente" name="docente" 
					value="{{Session::get('nombre')}}" disabled required/>

					<label for="Asignatura">Asignatura:  </label><input type="text" id="Asignatura" name="Asignatura" placeholder="Asignatura..." required/>

				</div>

				<div class="form-group">
					<label for="fecha">Horario:  </label><br><textarea name="horario" rows="3" cols="40" required></textarea>

				</div>
				

				<h3>Planificación asignatura</h3>
				<table border="1px" align="center">
				<th>Numero y nombre de la experiencia</th><th>Fecha</th><th>Horario</th><th>Laboratorio Solicitado</th>
					@for($i = 0; $i < 20; $i++)
						<tr>
							<td>
								<input type="text" name="numYNom-{{$i}}">
							</td>
							<td>
								<input type="date" name="fecha-{{$i}}" >
							</td>
							<td>
								<input type="time" name="horario-{{$i}}">
							</td>
							<td>
								<input type="text" name="lab-{{$i}}">
							</td>
						</tr>
					@endfor
				</table>

				<div class="form-group">
					<input type="submit" id="Enviar" name="Enviar" value="Enviar solicidud" />
				</div>





				</form>
			</div>
        </div>
 </div>
@endsection