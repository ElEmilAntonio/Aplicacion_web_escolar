
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
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
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

</div>
<br>
<!--menu--> <!--menu--> <!--menu--> <!--menu--> 
<!--menu--> <!--menu--> <!--menu--> <!--menu--> 
<!--menu--> <!--menu--> <!--menu--> <!--menu--> 
<!--menu--> <!--menu--> <!--menu--> <!--menu-->  
<div class="container">
 <div class="row">
  <div  class="col-sm-1">
  </div>
 <div  class="col-sm-10">
  <a class="row justify-content-center">
     <button type="submit" class="btn btn-warning " onclick="location.href='/proceso_de_catalizacion/1'" method="POST">
     <i   class="fa fa-refresh"></i> Reiniciar
   </button> 
 <button type="button" class="btn btn-info" class="btn btn-info">
   <i class="fa fa-sort-numeric-asc"></i> Pasos
 </button>
 <button type="submit" class="btn btn-success" method="POST" onclick="location.href='/proceso_de_catalizacion/2'" method="POST">
 <i class="fa fa-check"></i> Terminar práctica
</button>
  </a>
 </div>
 <div  class="col-sm-1">  
  </div>
</div>
<hr>
<!--PRactica6-->
<!--PRactica6-->
<!--PRactica6-->
<!--PRactica6-->
<!--PRactica6-->
<div class="row" style="background:white;">
 <div class="col-sm-1">
 <H3 class="agua-log" style="color:#b8b9bb; display: inline;">H<sub>2</sub>O<sub>2</sub>:</H3><H3 class="battery-log" style="color:#b8b9bb; display: inline;">0</H3>  
 </div> 
 <div class="col-sm-5">
  <div class="demo-content specific-unit-values-demo">
    <div class="barra agua" style=" height:33px;width:0px;background-color: #555;"></div>
  </div>
 </div>
 <div class="col-sm-1">
 <H3 class="oxigeno-log" style="color:#b8b9bb; display: inline;">O<sub>2</sub>:</H3><H3 
 class="battery-lag" style="color:#b8b9bb; display: inline;">0</H3>  
 </div> 
 <div class="col-sm-5">
  <div class="demo-content specific-unit-values-demo">
    <div class="barra oxigeno" style=" height:33px;width:0px;background-color: #555;"></div>
  </div>
 </div>
</div>
<div class="row">
<div  class="col-sm-2">
   <button id="restar" onclick = "manipularaguaoxigenada(false);" href="javascript:void(0);" title="disminuir agua oxigenada" style="background: transparent; border:0;">
  <H2  class="agua-log" style="color:#b8b9bb;"><i class="fa fa-minus-square fa-4x"></i></H2></button>
 </div>
 <div  class="col-sm-2">
  <button id="sumar" onclick = "manipularaguaoxigenada(true);" href="javascript:void(0);" title="añadir agua oxigenada" style="background: transparent; border:0;">
  <H2  class="agua-log" style="color:#b8b9bb;"><i class="fa fa-plus-square fa-4x"/></i></H2></button>
 </div>
 <div  class="col-sm-1">
 </div>
 <div  class="col-sm-2">
 <div style="visibility:hidden;" class="espacio" id="divcerillo"><img class="cerilloimagen"  id="idcerillo" src="/images/practica7/cerillo.png" alt="caida"/></div>
 </div>
 <div  class="col-sm-1">
 </div>
 <div  class="col-sm-2">
  <div class='cerillo' onclick = "movercerillo();" href="javascript:void(0);" title="cerillo al rojo vivo">
   <div class="cerillointerno" id="divcerillo"><img class="cerilloimagen"  id="idcerillo" src="/images/practica7/cerillo.png" alt="caida"/></div>
   <div class="fuegointerno" id="fuegodiv">
  <img class="fuego" id="idfuego" src="/images/practica7/fueguito.gif" alt="caida"  />
 </div>
</div>
 </div>
 <div  class="col-sm-2">
 </div> 
 </div>
 <!--RECIPIENTES PH-->
 <!--RECIPIENTES PH-->
 <!--RECIPIENTES PH-->
 <!--RECIPIENTES PH-->
<div class="row">
 <div  class="col-sm-2">
 </div>
<div  class="col-sm-2">
  
 </div>
 <div  class="col-sm-1"></div>
 <div  class="col-sm-2">
   
    <div id="matrazdiv" class="fenol" title="matraz" onclick = "informacionrecipiente(1);" href="javascript:void(0);">
  <img class="practicas6" id="idmatraz" src="/images/practica7/matrazvacio.png" alt="caida"  />
 </div>
</div>
 <div  class="col-sm-1"></div>
 <div  class="col-sm-2">
 </div>
 <div  class="col-sm-2">
 </div>
</div>  

 <div class="modal fade" id="modaldextrosa" 
     tabindex="-1" role="dialog" 
     aria-labelledby="favoritesModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
         <b><span id="fav-title">EMBUDO</span></b> 
        <button type="button" class="close" 
          data-dismiss="modal" 
          aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" 
        id="favoritesModalLabel"></h4>
      </div>
      <div class="modal-body">
        <p>
                <b><span id="fav-title">QUE ES:</span></b> 
                <p></p>
      El embudo de laboratorio es un recipiente cónico, el cual es usado en el laboratorio para pasar líquidos de un recipiente a otro. También es utilizado para realizar el filtrado de algunas sustancias.<p></p>
     <b><span id="fav-title">  FORMAS Y CARACTERISTICAS:</span></b>
   <P></P>
        </p>
      </div>
    </div>
  </div>
</div>
 <link href="{{ asset('css/cuadros.css') }}" rel="stylesheet">
</body>


</html>
<!--JAVASCRIPT-->
<!--JAVASCRIPT-->
<!--JAVASCRIPT-->
<!--JAVASCRIPT-->
<!--JAVASCRIPT-->
<script src="https://cdn.jsdelivr.net/npm/animejs@3.0.1/lib/anime.min.js"></script>
<script type="text/javascript">
var aguaoxigenadaanterior=0;
var aguaoxigenada=0;
var oxigenoanterior=0;
var oxigeno=0;
var vacio=true;
var movimiento=false;
var t;
var adentro=false;

function agrandarfuego(aguaoxigenada){
  if(adentro==true){
  anime({
  targets: '.fuego',scale: {value: aguaoxigenada,duration: 800,delay: 0,easing: 'easeInOutQuart'},});
}else{
 anime({
  targets: '.fuego',scale: {value: 0,duration: 800,delay: 0,easing: 'easeInOutQuart'},});
}
}

function reduccionagua(llave){
  if(llave==false){
    t=setInterval(calcularaguayoxigeno,500);
}else{
clearInterval(t);
}
}

function movercerillo(){
if(adentro==false){
 var trasladosx='-170%';
 var animacionvasoida = anime({targets: '.cerillo',translateX:trasladosx,autoplay: true});
 setTimeout(function(){
var animacionvasoida = anime({targets: '.cerillo',translateY:150,autoplay: true});},1250);
 adentro=true;
}else{
 var animacionvasoida = anime({targets: '.cerillo',translateY:0,autoplay: true});
 setTimeout(function(){
var animacionvasoida = anime({targets: '.cerillo',translateX:'0%',autoplay: true});},1250); 
 adentro=false;
}
}

function calcularaguayoxigeno(){
 aguaoxigenadaanterior=aguaoxigenada;
 aguaoxigenada-=0.1; 
if(aguaoxigenada<0){
movimiento=false;
aguaoxigenada=0;
aguaoxigenadaanterior=0;  
reduccionagua(true);
}
limiteoxigeno(aguaoxigenada);
animacioncantidad(aguaoxigenadaanterior,aguaoxigenada,0);
animacionmatraz(aguaoxigenadaanterior,aguaoxigenada);
agrandarfuego(aguaoxigenada);
}

function animacionmatraz(aguaoxigenadaanterior,aguaoxigenada){
if(aguaoxigenada>0&&aguaoxigenadaanterior==0){
document.getElementById('idmatraz').src = "/images/practica7/movimiento.gif";
}else if(aguaoxigenada==0&&aguaoxigenadaanterior==0){
document.getElementById('idmatraz').src = "/images/practica7/matrazlleno.png";  
}
}

function manipularaguaoxigenada(agregar){
aguaoxigenadaanterior=aguaoxigenada;
if(agregar){
if(vacio){
movimiento=true;
document.getElementById('idmatraz').src = "/images/practica7/ponerliquido.gif";
setTimeout(function(){
if(aguaoxigenada>0){
document.getElementById('idmatraz').src = "/images/practica7/movimiento.gif";
}},4400);
aguaoxigenada=4;
}
aguaoxigenada++;
if(aguaoxigenada>10){
aguaoxigenada=10;
aguaoxigenadaanterior=10;  
}
}else{
aguaoxigenada--;
if(aguaoxigenada<0){
aguaoxigenada=0;
aguaoxigenadaanterior=0; 
}}
reduccionagua(true);
animacioncantidad(aguaoxigenadaanterior,aguaoxigenada,0);
limiteoxigeno(aguaoxigenada);
setTimeout(function(){
if(aguaoxigenada>0){
reduccionagua(false);
}},1250);
if(vacio==false){
animacionmatraz(aguaoxigenadaanterior,aguaoxigenada);
}
vacio=false;
}

function limiteoxigeno(aguaoxigenada){
oxigenoanterior=oxigeno;
oxigeno=aguaoxigenada*10;
animacioncantidad(oxigenoanterior,oxigeno,1);
}


function animacioncantidad(valoranterior,valor,numero){
var Arraydivs=['.battery-log','.battery-lag','.agua-log','.oxigeno-log','.specific-unit-values-demo .agua','.specific-unit-values-demo .oxigeno'];
var total=[10,100];
var porcentaje=(Math.floor((valor/total[numero]) * 100));
if(numero==0){
var Arraycolor=['#c6cbcd','#c2ced1','#bdd0d6','#b9d2da','#b5d4de','#b1d6e2','#add8e6','#a9daea','#a5dcee','#a1def2'];
var colorchooser=Math.trunc(valor);
}else{
var Arraycolor=['#b8b9bb','#96989b','#75787c','#565a5e','#393d42','#303338','#282a2d','#1f2124','#18191a','#0e0f10'];
var colorchooser=Math.trunc((valor/10));
}
var logEl = document.querySelector(Arraydivs[numero]);
anime({targets: logEl,innerHTML: [valoranterior,valor],easing: 'linear',round: 10});
var colorsExamples = anime.timeline({
endDelay: 1000,easing: 'linear',direction: 'alternate',loop:false})
.add({ targets: Arraydivs[numero],color:Arraycolor[colorchooser] }, 0)
.add({ targets: Arraydivs[numero+2],color:Arraycolor[colorchooser]}, 0);
anime({targets: Arraydivs[numero+4],width: porcentaje+"%",easing: 'easeInOutQuad',direction: 'alternate',backgroundColor:Arraycolor[colorchooser],loop: false});
}


</script>

 <div id="modal" class="w3-modal">
    <div class="w3-modal-content w3-animate-zoom w3-lg" >
      <header class="w3-container w3-red"> 
        <span onclick="document.getElementById('modal').style.display='none'" 
        class="w3-button w3-display-topright">&times;</span>
       <div class="modal-title" id= "modal-title">
       </div>
      </header>
      <div class="w3-container">
         <div class="modal-body" id= "modal-body">
      </div>
       </div>
      <footer class="w3-container w3-red">
        <p></p>
      </footer>
    </div>
  </div>
