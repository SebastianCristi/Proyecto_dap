@extends('layouts.template')

<?php 
    use App\solicitud;
    use App\Semestral;
    use App\experiencia;
    use App\usuario;
?>


<script type="text/javascript">


        function cambiaS(arr){
            let elementos = "";
            arr = JSON.parse(arr);

            elementos = "<table border='1'><th>Nombre</th><th>Fecha</th><th>Horario</th><th>Laboratorio</th>";
            for(let i = 0; i < arr.length; i++)
                elementos += "<tr><td> "+arr[i].nombre+" </td><td> "+arr[i].fecha+" </td><td> "+arr[i].horario+" </td><td> "+arr[i].laboratorio+" </td></tr>";
            elementos += "</table>";


        document.getElementById('descr2').innerHTML= elementos;
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
            id="favoritesModalLabel">Descripción de la experiencia</h4>
          </div>
          <div class="modal-body">
            <p id="descrsoli">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat.
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


    <div class="modal fade" id="solicitudS" 
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
            <p id="descr2">
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


@section("contenido")
    <div class="content">
        <div class="container-fluid">
        @if(Session::get('tipo') == 'profesor' || Session::get('tipo') == 'Admin')
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header" data-background-color="orange">
                            <i class="material-icons">content_copy</i>
                        </div>       
                    
                        <div class="card-content">
                            <p class="category">Solicitudes activas</p>
                            <h3 class="title">{{ solicitud::where(['docente'=>\Session::get('userid'),'estado'=>1])->count('id') }}/{{ solicitud::where('docente',\Session::get('userid'))->count('id') }}</h3>
                        </div>

                    </div>
                </div>

                

                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header" data-background-color="orange">
                            <i class="material-icons">content_copy</i>
                        </div>
                        <div class="card-content">
                            <p class="category">Insumos activos</p>
                            <h3 class="title">{{ solicitud::where(['docente'=>\Session::get('userid'),'estado'=>2])->count('id') }}</h3>
                        </div>

                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header" data-background-color="red">
                            <i class="material-icons">info_outline</i>
                        </div>
                        <div class="card-content">
                            <p class="category">Reportes </p>
                            <h3 class="title">2</h3>
                        </div>

                    </div>
                </div>
                
            </div>
            
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="card card-nav-tabs">
                        <div class="card-header" data-background-color="purple">
                            <div class="nav-tabs-navigation">
                                <div class="nav-tabs-wrapper">
                                    <span class="nav-tabs-title">Solicitudes de insumos:</span>
                                    <ul class="nav nav-tabs" data-tabs="tabs">
                                        <li class="active">
                                            <a href="#profile" data-toggle="tab">
                                                <i class="material-icons">playlist</i> Activas
                                                <div class="ripple-container"></div>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="#messages" data-toggle="tab">
                                                <i class="material-icons">playlist_add_check</i> Aceptadas
                                                <div class="ripple-container"></div>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="#settings" data-toggle="tab">
                                                <i class="material-icons">clear</i> Denegadas
                                                <div class="ripple-container"></div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card-content">
                            <div class="tab-content">
                                
                                <div class="tab-pane active" id="profile">
                                   <table class="table table-hover">
                                        <thead class="text-warning"> 
                                            <tr>                                                
                                                <th></th>
                                                <th>Docente</th>
                                                <th>Asignatura</th>
                                                <th>Hora</th>
                                                <th>N° de grupos</th>
                                                <th>Descripción experiencia</th>
                                                <th>Editar</th>
                                                <th>Eliminar</th>
                                            </tr>
                                        </thead>
                                          
                                        <tbody>
                                        


                                        @foreach(solicitud::where(['docente'=>\Session::get('userid'),'estado'=>1])->get() as $soli)

                                            <tr>
                                               
                                                <td> <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" name="optionsCheckboxes">
                                                        </label>
                                                    </div>
                                                </td>
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

                                                  {{substr($soli->descripcion,0,30)."..."}}
                                                </button>
                                                    
                                                </td>
                                                <td>
                                                    <button type="button" rel="tooltip" title="Editar" class="btn btn-primary btn-simple btn-xs">
                                                        <i class="material-icons">edit</i>
                                                    </button>
                                                </td> 
                                                <td>
                                                    <button type="button" rel="tooltip" title="Eliminar" class="btn btn-danger btn-simple btn-xs">
                                                        <i class="material-icons">close</i>
                                                    </button>
                                                </td>    
                                            </tr>



             

                                        @endforeach


                                        </tbody>
                                         
                                    </table>
                                </div>
                                <div class="tab-pane" id="messages">
                                   <table class="table table-hover">
                                        <thead class="text-warning"> 
                                            <tr>                                                
                                                <th></th>
                                                <th>Docente</th>
                                                <th>Asignatura</th>
                                                <th>Hora</th>
                                                <th>N° de grupos</th>
                                                <th>Descripción experiencia</th>
                                                <th>Editar</th>
                                                <th>Eliminar</th>
                                            </tr>
                                        </thead>
                                          
                                        <tbody>
                                        


                                        @foreach(solicitud::where(['docente'=>\Session::get('userid'),'estado'=>2])->get() as $soli)

                                            <tr style="background-color: rgba(11, 105, 44, 0.4);">
                                               
                                                <td> <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" name="optionsCheckboxes">
                                                        </label>
                                                    </div>
                                                </td>
                                                <td>{{(usuario::where('id',$soli->docente)->pluck('nombre'))[0]}}</td>
                                                <td>{{$soli->asignatura}}</td>
                                                <td>{{$soli->fechaClase}} {{$soli->horaClase}}</td>
                                                <td>{{$soli->nGrupos}}</td>
                                                <td>
                                                <button 
                                                   type="button" 
                                                   class="btn btn-outline-primary"
                                                   onclick="cambia('lololo');"
                                                   data-toggle="modal" 
                                                   data-target="#solicitud">

                                                  {{substr($soli->descripcion,0,30)."..."}}
                                                </button>
                                                    
                                                </td>
                                                <td>
                                                    <button type="button" rel="tooltip" title="Editar" class="btn btn-primary btn-simple btn-xs">
                                                        <i class="material-icons">edit</i>
                                                    </button>
                                                </td> 
                                                <td>
                                                    <button type="button" rel="tooltip" title="Eliminar" class="btn btn-danger btn-simple btn-xs">
                                                        <i class="material-icons">close</i>
                                                    </button>
                                                </td>    
                                            </tr>


                                        @endforeach


                                        </tbody>
                                         
                                    </table>
                                </div>
                                <div class="tab-pane" id="settings">
                                   <table class="table table-hover">
                                        <thead class="text-warning"> 
                                            <tr>                                                
                                                <th></th>
                                                <th>Docente</th>
                                                <th>Asignatura</th>
                                                <th>Hora</th>
                                                <th>N° de grupos</th>
                                                <th>Descripción experiencia</th>
                                                <th>Editar</th>
                                                <th>Eliminar</th>
                                            </tr>
                                        </thead>
                                          
                                        <tbody>
                                        


                                        @foreach(solicitud::where(['docente'=>\Session::get('userid'),'estado'=>0])->get() as $soli)

                                            <tr style="background-color: rgba(215, 44, 44, 0.4);">
                                               
                                                <td> <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" name="optionsCheckboxes">
                                                        </label>
                                                    </div>
                                                </td>
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

                                                  {{substr($soli->descripcion,0,30)."..."}}
                                                </button>
                                                    
                                                </td>
                                                <td>
                                                    <button type="button" rel="tooltip" title="Editar" class="btn btn-primary btn-simple btn-xs">
                                                        <i class="material-icons">edit</i>
                                                    </button>
                                                </td> 
                                                <td>
                                                    <button type="button" rel="tooltip" title="Eliminar" class="btn btn-danger btn-simple btn-xs">
                                                        <i class="material-icons">close</i>
                                                    </button>
                                                </td>    
                                            </tr>

                                        @endforeach


                                        </tbody>
                                         
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>





                <div class="col-lg-12 col-md-12">
                    <div class="card card-nav-tabs">
                        <div class="card-header" data-background-color="orange">
                            <div class="nav-tabs-navigation">
                                <div class="nav-tabs-wrapper">
                                    <span class="nav-tabs-title">Solicitudes semestrales:</span>
                                    <ul class="nav nav-tabs" data-tabs="tabs">
                                        <li class="active">
                                            <a href="#acti" data-toggle="tab">
                                                <i class="material-icons">playlist</i> Activas
                                                <div class="ripple-container"></div>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="#aceptadas" data-toggle="tab">
                                                <i class="material-icons">playlist_add_check</i> Aceptadas
                                                <div class="ripple-container"></div>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="#denegadas" data-toggle="tab">
                                                <i class="material-icons">clear</i> Denegadas
                                                <div class="ripple-container"></div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="tab-content">
                                <div class="tab-pane active" id="acti">
                                   <table class="table table-hover">
                                        <thead class="text-warning"> 
                                            <tr>                                                
                                                <th></th>
                                                <th>Docente</th>
                                                <th>Asignatura</th>
                                                <th>Horario</th>
                                                <th>Planificación Docencia</th>
                      
                                                <th>Editar</th>
                                                <th>Eliminar</th>
                                            </tr>
                                        </thead>
                                          
                                        <tbody>
                                        
                                            
                                        @foreach(Semestral::where(['docente'=>\Session::get('userid'),'estado'=>1])->get() as $semes)

                                            <tr>
                                               
                                                <td> <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" name="optionsCheckboxes">
                                                        </label>
                                                    </div>
                                                </td>
                                                <td>{{(usuario::where('id',$soli->docente)->pluck('nombre'))[0]}}</td>
                                                <td>{{$semes->asignatura}}</td>
                                                <td>{{$semes->horario}}</td>
                                                <td>


                                                <button 
                                                   type="button" 
                                                   class="btn btn-outline-primary"
                                                   onclick="cambiaS('{{experiencia::where('solicitud',$semes->id)->get()}}');"
                                                   data-toggle="modal" 
                                                   data-target="#solicitudS">

                                                  {{substr($semes->descripcion,0,30)."..."}}
                                                </button>
                                                    
                                                </td>
                                                <td>
                                                    <button type="button" rel="tooltip" title="Editar" class="btn btn-primary btn-simple btn-xs">
                                                        <i class="material-icons">edit</i>
                                                    </button>
                                                </td> 
                                                <td>
                                                    <button type="button" rel="tooltip" title="Eliminar" class="btn btn-danger btn-simple btn-xs">
                                                        <i class="material-icons">close</i>
                                                    </button>
                                                </td>    
                                            </tr>

                                        @endforeach


                                        </tbody>
                                         
                                    </table>
                                </div>
                                <div class="tab-pane" id="aceptadas">
                                   <table class="table table-hover">
                                        <thead class="text-warning"> 
                                            <tr>                                                
                                                <th></th>
                                                <th>Name</th>
                                                <th>Position</th>
                                                <th>Office</th>
                                                <th>Age</th>
                                                <th>Start date</th>
                                                <th>Salary</th>
                                                <th>Editar</th>
                                                <th>Eliminar</th>
                                            </tr>
                                        </thead>
                                          
                                        <tbody>
                                        
                                            @foreach(Semestral::where(['docente'=>\Session::get('userid'),'estado'=>2])->get() as $semes)

                                            <tr>
                                               
                                                <td> <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" name="optionsCheckboxes">
                                                        </label>
                                                    </div>
                                                </td>
                                                <td>{{(usuario::where('id',$soli->docente)->pluck('nombre'))[0]}}</td>
                                                <td>{{$semes->asignatura}}</td>
                                                <td>{{$semes->horario}}</td>
                                                <td>


                                                <button 
                                                   type="button" 
                                                   class="btn btn-outline-primary"
                                                   onclick="cambiaS('{{experiencia::where('solicitud',$semes->id)->get()}}');"
                                                   data-toggle="modal" 
                                                   data-target="#solicitudS">

                                                  {{substr($semes->descripcion,0,30)."..."}}
                                                </button>
                                                    
                                                </td>
                                                <td>
                                                    <button type="button" rel="tooltip" title="Editar" class="btn btn-primary btn-simple btn-xs">
                                                        <i class="material-icons">edit</i>
                                                    </button>
                                                </td> 
                                                <td>
                                                    <button type="button" rel="tooltip" title="Eliminar" class="btn btn-danger btn-simple btn-xs">
                                                        <i class="material-icons">close</i>
                                                    </button>
                                                </td>    
                                            </tr>

                                        @endforeach
                                        </tbody>
                                         
                                    </table>
                                </div>
                                <div class="tab-pane" id="denegadas">
                                   <table class="table table-hover">
                                        <thead class="text-warning"> 
                                            <tr>                                                
                                                <th></th>
                                                <th>Name</th>
                                                <th>Position</th>
                                                <th>Office</th>
                                                <th>Age</th>
                                                <th>Start date</th>
                                                <th>Salary</th>
                                                <th>Editar</th>
                                                <th>Eliminar</th>
                                            </tr>
                                        </thead>
                                          
                                        <tbody>
                                        
                                           @foreach(Semestral::where(['docente'=>\Session::get('userid'),'estado'=>0])->get() as $semes)

                                            <tr>
                                               
                                                <td> <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" name="optionsCheckboxes">
                                                        </label>
                                                    </div>
                                                </td>
                                                <td>{{(usuario::where('id',$soli->docente)->pluck('nombre'))[0]}}</td>
                                                <td>{{$semes->asignatura}}</td>
                                                <td>{{$semes->horario}}</td>
                                                <td>


                                                <button 
                                                   type="button" 
                                                   class="btn btn-outline-primary"
                                                   onclick="cambiaS('{{experiencia::where('solicitud',$semes->id)->get()}}');"
                                                   data-toggle="modal" 
                                                   data-target="#solicitudS">

                                                  {{substr($semes->descripcion,0,30)."..."}}
                                                </button>
                                                    
                                                </td>
                                                <td>
                                                    <button type="button" rel="tooltip" title="Editar" class="btn btn-primary btn-simple btn-xs">
                                                        <i class="material-icons">edit</i>
                                                    </button>
                                                </td> 
                                                <td>
                                                    <button type="button" rel="tooltip" title="Eliminar" class="btn btn-danger btn-simple btn-xs">
                                                        <i class="material-icons">close</i>
                                                    </button>
                                                </td>    
                                            </tr>

                                        @endforeach
                                        </tbody>
                                         
                                    </table>
                                </div>
                            </div>
                    </div>
                </div>
                
            </div>

            @else

                <table class="table table-hover">
                    <thead>
                        <th>Docente</th>
                        <th>Pañol</th>
                        <th>Fecha</th>
                        <th>Hora clase</th>
                        <th>Insumo</th>
                    </thead>
                    <tbody>
                        @foreach(solicitud::where('estado',2)->orderBy('fechaClase')->get() as $solis)
                        <tr>
                            
                            <td>
                            {{$solis->docente}}
                            </td>
                            <td>
                            {{$solis->alumno}}
                            </td>
                            <td>
                            {{$solis->fechaClase}}
                            </td>
                            <td>
                            {{$solis->horaClase}}
                            </td>
                            <td>
                                {{$solis->descripcion}}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>

                </table>

            @endif



        </div>
    </div>
@endsection