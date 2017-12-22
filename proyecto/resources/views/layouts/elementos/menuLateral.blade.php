<div class="sidebar" data-color="purple" data-image="{{URL::asset('img/sidebar-1.jpg')}}">
    <!--
Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

Tip 2: you can also add an image using data-image tag
-->
    <div class="logo">
        <a href="#" class="simple-text"></a>
        <img src="img/logo.png" alt="" srcset="">
    </div>
    <div class="sidebar-wrapper">
        @if(Session::get('tipo') == 'profesor')
        <ul class="nav">
            <li>
                <a href="{{URL::to('panel')}}">
                    <i class="material-icons">dashboard</i>
                    <p>Inicio</p>
                </a>
            </li>
           
            <li>
                <a href="{{ url::to('solicitudes')}}">
                    <i class="material-icons">content_paste</i>
                    <p>Solicitar insumos</p>
                </a>
            </li>


            <li>
                <a href="{{ url::to('solicitudSemestral')}}">
                    <i class="material-icons">date_range</i>
                    <p>Solicitud semestral</p>
                </a>
            </li>


        </ul>
        @elseif(Session::get('tipo') == 'Admin')
            <ul class="nav">
            <li>
                <a href="{{URL::to('panel')}}">
                    <i class="material-icons">dashboard</i>
                    <p>Inicio</p>
                </a>
            </li>
           
            <li>
                <a href="{{ url::to('solicitudesAdmin')}}">
                    <i class="material-icons">content_paste</i>
                    <p>Revisar Solicitudes insumos</p>
                </a>
            </li>


            <li>
                <a href="{{ url::to('solicitudSemestralAdmin')}}">
                    <i class="material-icons">date_range</i>
                    <p>Revisar Solicitudes semestrales</p>
                </a>
            </li>


        </ul>
        @endif

    </div>
</div>