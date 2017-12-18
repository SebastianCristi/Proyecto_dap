@extends('layouts.template')


@section("contenido")

 <div class="content">
        <div class="container-fluid">

        	@if($msg !== '')
        		<div class="alert alert-info fade in">
				  <strong>{{$msg}}</strong>
				</div>

        	@endif


			<div class="formulario" style="width: 95%; border: 1px solid gray; padding: 10px;">
				<form method="POST" action="solicitaInsumos">

				{{ csrf_field() }}

				<div class="form-group">
					<label for="Docente">Docente:  </label><input type="text" id="docente" name="docente" placeholder="docente..." required/>
				</div>
				<div class="form-group">
					<label for="Alumno">Alumno:  </label><input type="text" id="Alumno" name="Alumno" placeholder="Alumno..." required/>
				</div>

				<div class="form-group">
					<label for="Asignatura">Asignatura:  </label><input type="text" id="Asignatura" name="Asignatura" placeholder="Asignatura..." required/>
				</div>

				<div class="form-group">
					<label for="fecha">Fecha y hora que se realizara la clase:  </label><input type="date" id="fecha" name="fecha" placeholder="fecha..." required/>
					<input type="time" name="time" value="12:00" required/>
				</div>

				<div class="form-group">
					<label for="fecha">Descripción de la experiencia a realizar:  </label><br><textarea name="descripcion" rows="6" cols="50" required></textarea>
				</div>
				<div class="form-group">
					<label for="nGrupos">Nº de grupos de trabajo:  </label><input type="number" id="nGrupos" name="nGrupos"  required/>
				</div>

				<div class="form-group">
					<input type="submit" id="Enviar" name="Enviar" value="Enviar solicidud" />
				</div>





				</form>
			</div>
        </div>
 </div>
@endsection