
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Sistema web quimica') }}</title>

  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>

  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <style>
   .navbar-nav li:hover{
    color: black !important;
    font-size: 17px;
  }
</style>
</head>
 <body style="background-color: gray" background="{{url('images/back.png')}}">
  <div id="app">
    <nav class="navbar navbar-expand-md navbar-dark" style="background-color: #323232;">
      <div class="container">
        <a class="navbar-brand" href="{{ route('alumno') }}">
          {{ config('app.name', 'Sistema web quimica') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Left Side Of Navbar -->
          <ul class="navbar-nav mr-auto">

          </ul>

          <!-- Right Side Of Navbar -->
          <ul class="navbar-nav ml-auto">
            <!-- Authentication Links -->
            @guest
            <li class="nav-item">
              <a class="nav-link" href="{{ route('login') }}">{{ __('Ingresar') }}</a>
            </li>
            @if (Route::has('register'))
            <li class="nav-item">
              <a class="nav-link" href="{{ route('register') }}">{{ __('Registrarse como docente') }}</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('registararalumno') }}">{{ __('Registrarse como Alumno') }}</a>
            </li>

            @endif
            @else
            @include('layouts.navAlumno')
            <li class="nav-item">
              <a class="nav-link" style="color: #CC66CC" href="{{ route('editar_alumno') }}"><i class="fa fa-user-circle"></i> {{ __('Alumno') }}</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" style="color: #4e83f5" href="{{ route('Tabla_Periodica_alumno') }}"><i class="fa fa-table"></i> {{ __('TablaPeriodica') }}</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" style="color: #FF4D4D" href="{{ route('Teoria_Alumno') }}"><i class="fa fa-book"></i> {{ __('Teoria') }}</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" style="color: #FF704D" href="{{ route('Seguimiento_alumno') }}"><i class="fa fa-vcard"></i> {{ __('Seguimiento') }}</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" style="color: #FFB84D" href="{{ route('Asistencias_alumno') }}"><i class="fa fa-calendar-check-o"></i> {{ __('Asistencia') }}</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" style="color: #96A5A7" href="{{ route('Actividades_alumno') }}"><i class="fa fa-pencil"></i> {{ __('Actividades') }}</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" style="color: #b339b3" href="{{ route('Practicas_alumno') }}"><i class="fa fa-flask"></i> {{ __('Prácticas') }}</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" style="color: #0c87c7" href="{{ route('Examen_alumno') }}"><i class="fa fa-institution"></i> {{ __('Examenes') }}</a>
            </li>
            <li class="nav-item dropdown">
              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }} <span class="caret"></span>
              </a>

              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                <i class="fa fa-sign-out"></i>  {{ __('Cerrar Sesion') }}
              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
              </form>
            </div>
          </li>
          @endguest
        </ul>
      </div>
    </div>
  </nav>

  <main class="py-4">
    @yield('content')
  </main>
</div>

<!--menu--> <!--menu--> <!--menu--> <!--menu--> 
<!--menu--> <!--menu--> <!--menu--> <!--menu--> 
<!--menu--> <!--menu--> <!--menu--> <!--menu--> 
<!--menu--> <!--menu--> <!--menu--> <!--menu-->  
<div class="container">
<div class="row">
  <div  class="col-sm-1">
  <a style="color: #ffdd42">
   <button type="submit" class="btn btn-secondary" method="POST" onclick = "activarinformacion();" href="javascript:void(0);" title="Activar Información" ><i class="fa fa-info-circle"></i></a>
  </div>
 <div  class="col-sm-10">
  <a class="row justify-content-center">
     <button type="submit" class="btn btn-warning " onclick="location.href='/Metodos_fisicos_de_separacion_de_mezclas/2'" method="POST"><i class="fa fa-arrow-left"></i>
     Anterior 
   </button> 
 <button id="botonsiguiente" disabled type="submit" class="btn btn-success" method="POST" onclick="location.href='/Metodos_fisicos_de_separacion_de_mezclas/4'" method="POST">
  Siguiente <i class="fa fa-arrow-right"></i>
</button> 
  </a>
 </div>
 <div  class="col-sm-1">  
  </div>
</div>
<!--PRactica3-->
<!--PRactica3-->
<!--PRactica3-->
<!--PRactica3-->
<!--PRactica3--> 
<a class="row justify-content-center">
  <div  onclick = "abrirllave();" href="javascript:void(0);">
  <img id="decantador" src="/images/practica32/decantacion/decantacion-1.png.png" alt="caida"  />
</div></a>

</html>

<script type="text/javascript">
var informacion=false;
var llave=false;
var frames=2;
var t;
function abrirllave(){
  if(informacion==false){
  if(llave==false){
    t=setInterval(decantar,200);
 llave=true;
}else{
clearInterval(t);
llave=false;
}
}else{
 var titulo="<h2><b>decantación </b></h2>"
  var myHeading ='<p>método físico utilizado para la separación de mezclas, se usa para separar un sólido de uno o dos líquidos, uno más denso que otro que ocupará la parte inferior de la mezcla.<br>Es un proceso importante en el tratamiento de las aguas residuales.<br>No debe ser confundida con la separación gravítica, que es la separación por gravedad de los sólidos suspendidos en el agua (arena y materia orgánica).<br>Existen diferentes tipos de decantación:</p><p>Decantación sólido-líquido: Se utiliza cuando un componente sólido se encuentra depositado en un líquido.</p><p>Decantación líquido-líquido: se separan líquidos que no pueden mezclarse y tienen densidades diferentes; el líquido más denso se acumula en la parte inferior del sistema. En el laboratorio se usa un embudo de bromo, también conocido como embudo de decantación, o inclusive, embudo de separación.En un sistema formado por agua y aceite, por ejemplo, el agua, por ser más densa, se ubica en la parte inferior del embudo y es separada abriendo una llave de paso de forma controlada.</p><br><p><b>Procedimiento:</b></p><p>Es necesario dejar reposar la mezcla para que el sólido se separe gravitatoria mente, hace que descienda y sea posible su extracción por acción de la gravedad.</p><p><br><b>Decantación:</b><br></p><p>técnica empleada para separar dos líquidos. que no se mezclan homogéneamente por ejemplo el aceite y el agua para esto es necesaria mente dejarla la mezcla decantar o reposar durante un tiempo con el fin de que sus componentes se separen.</p>';
   $("#modal-title").html(titulo); 
     $("#modal-body").html(myHeading);  
var modal = document.getElementById("modal"); 
modal.style.display = "block";   
}
}

function decantar() {
if(frames>=53&&frames<=57){
   document.getElementById("botonsiguiente").disabled = false; 
  }else{
    document.getElementById("botonsiguiente").disabled = true;
  }
if(frames<=70){
document.getElementById('decantador').src ="/images/practica32/decantacion/decantacion-"+frames+".png.png";
frames++;
}else{
document.getElementById('decantador').src ="/images/practica32/decantacion/decantacion-1.png.png";  
frames=2;
}
}

 function activarinformacion(){
if(informacion==false){
  informacion=true;
  alert("Estas en modo de información: dale click a los componentes y mostrara información relevante a esta");
}else{
  informacion=false;
  alert("Saliste de modo de información ya puedes interactuar con los componentes");
}  
}
</script>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<div id="modal" class="w3-modal">
    <div class="w3-modal-content w3-animate-zoom w3-lg" >
      <header class="w3-container w3-red"> 
        <span onclick="document.getElementById('modal').style.display='none'" 
        class="w3-button w3-display-topright">&times;</span>
       <div class="modal-title" id= "modal-title">
       </div>
      </header>
      <div class="w3-container">
         <div class="modal-body text-justify" id= "modal-body">
      </div>
       </div>
      <footer class="w3-container w3-red">
        <p></p>
      </footer>
    </div>
  </div>