<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Login Form</title>
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel="stylesheet" type="text/css" href="{{URL::asset('css/login.css')}}">

  <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>


</head>

<body >
@if(session_status() == PHP_SESSION_NONE)
  {!! \Redirect::to('panel')!!}

@endif
          

  <div class="login" >
 
	<h1>Ingresar</h1>
    <form method="POST" action="login">
    	{{ csrf_field() }}
    	<input type="text" name="user" placeholder="Usuario" required="required" />
        <input type="password" name="pass" placeholder="Contraseña" required="required" />
        <button type="submit" class="btn btn-primary btn-block btn-large">Iniciar Sesión</button>
        @if($errors->any())
              <div style="color: white; text-align: center; padding-top: 5px;">
                 <strong>{{$errors->first()}}</strong>
              </div>
          @endif
    </form>

  </div>
    <script  src="js/index.js"></script>

</body>
</html>