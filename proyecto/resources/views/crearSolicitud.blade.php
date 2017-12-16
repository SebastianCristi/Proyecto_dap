@extends('layouts.template')


@section("contenido")

 <div class="content">
        <div class="container-fluid">
			<div class="formulario" style="width: 95%; border: 1px solid gray; padding: 10px;">
				<form method="POST" action="solicitaInsumos">
				<div class="form-group">
					<label for="Docente">Docente:  </label><input type="text" id="docente" name="docente" placeholder="docente..." />
				</div>
				<div class="form-group">
					<label for="Alumno">Alumno:  </label><input type="text" id="Alumno" name="Alumno" placeholder="Alumno..." />
				</div>
				</form>
			</div>
        </div>
 </div>
@endsection