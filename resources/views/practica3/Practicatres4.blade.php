
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
     <button type="submit" class="btn btn-warning " onclick="location.href='/Metodos_fisicos_de_separacion_de_mezclas/3'" method="POST">
     <i class="fa fa-arrow-left"></i> Anterior
   </button> 
 <button type="button" class="btn btn-info" class="btn btn-info" onclick = "pasos();" href="javascript:void(0);"><i class="fa fa-sort-numeric-asc"></i> Pasos
 </button>
 <button type="submit" disabled id="botonsiguiente" class="btn btn-success" method="POST" onclick="location.href='/Metodos_fisicos_de_separacion_de_mezclas/5'" method="POST">
 <i class="fa fa-check"></i> Terminar práctica 
</button>
  </a>
 </div>
 <div  class="col-sm-1">  
  </div>
</div>
<hr>
<!--PRactica4-->
<!--PRactica4-->
<!--PRactica4-->
<!--PRactica4-->
<!--PRactica4--> 
<div class="row">
 <div  class="col-sm-4">
    <a class="row justify-content-right">
    <div class="cerillo" onclick = "prenderfuego();" href="javascript:void(0);" title="encendedor" >
  <img id="decantador" src="/images/practica33/cerillo.png" alt="caida"  width=150 height=150  /></div>
    </a>
  </div>
  <div  class="col-sm-4">
    <a class="row justify-content-center">
    <div class="Npo" onclick = "VertirNpo();" href="javascript:void(0);" title="Nitrato de potasio (KNo3)">
  <img id="decantador" src="/images/practica33/NPo.gif" alt="caida"  width=150 height=150  /></div>
    </a>
  </div>
  <div  class="col-sm-4">
    <a class="row justify-content-end">
    <div class="vertiragua" onclick = "vertiragua();" href="javascript:void(0);" title="100ml de agua destilada">
  <img id="vertiragua" src="/images/practica33/vertiragua.png" alt="caida"  width=150 height=150  /></div>
    </a>
  </div>
</div>
 <a class="row justify-content-center">
    <div class="vaso" onclick = "revolvertodo();" href="javascript:void(0);" >
  <img id="vaso" src="/images/practica33/vaso.png" alt="caida"  width=200 height=200/></div>
    </a>
    <a class="row justify-content-center">
    <div onclick = "apagarfuego();" href="javascript:void(0);" title="la temperatura aumenta la disolución del Kno3 (click para apagar el fuego)" id="fuegohidden" class="fuegohidden">
  <img id="decantador" src="/images/practica33/fueguito.gif" alt="caida"  width=200 height=150/></div>
    </a>
 <link href="{{ asset('css/cuadros.css') }}" rel="stylesheet">
</body>
</html>

<script src="https://cdn.jsdelivr.net/npm/animejs@3.0.1/lib/anime.min.js"></script>
<script type="text/javascript">
var informacion=false;
var encendido=false;
var diluido=false;
var llenado=false;
var agitado=false;
var revuelto=false;
var cristalizado=false;
var revolver=1;

function pasos(){
var titulo="<h2><b>Pasos del proceso de cristalizado con Nitrato de potasio (KNO<sub>3</sub>)</b></h2>"
  var myHeading ='<div style="float:left;background-color:#e3dac9;border-style:groove;"><p><b>Materiales y reactivos</b></p><p><b>-.</b>un vaso de precipitado</p><p><b>-.</b>agitador</p><p><b>-.</b>100ml de agua destilada</p><p><b>-.</b>38gr de nitrato de potasio(KNo<sub>3</sub>)</p><p><b>-.</b>un mechero bunsen</p><p>o cualquier fuente productora de calor</p></div><p><b>1.</b>Agregamos 38gr de Nitrato de potasio al vaso de precipitación</p><p><b>2.</b>Vertimos 100ml de agua destilada</p><p><b>3.</b>Encendemos la llama para que el nitrato de potasio alcanze su mayor nivel de disolución</p><p><b>4.</b>agitamos la mezcla mientras este sobre la llama asta que asta que la mezcla alcanze un ligero color gris</p><p><b>5.</b>dejamos que la mezcla se enfrie a temperatura ambiente apagando la llama</p>';
   $("#modal-title").html(titulo); 
     $("#modal-body").html(myHeading);  
var modal = document.getElementById("modal"); 
modal.style.display = "block";     
}
function prenderfuego() {
  if(informacion==false){
     var animacionprenderfuego = anime({
    targets: '.cerillo',
   keyframes: [
    {translateY:300},
    {translateX:360},
    {translateX:0},
    {translateY:0}
  ],
  duration:2700,
    autoplay: true
  });
  encendido=true;
setTimeout(function(){
document.getElementById("fuegohidden").style.visibility = "visible";},850);
if(cristalizado==true){
setTimeout(function(){
document.getElementById('vaso').src = "/images/practica33/cristalizacioninvertido.gif";
cristalizado=false;},850);
 document.getElementById("botonsiguiente").disabled = true;  
}//cristalizado
}//informacion
}//clase
function VertirNpo(){
  if(informacion==false){
  if(llenado==false){
  if(encendido==false){
 document.getElementById('vaso').src = "/images/practica33/llenarnpo.gif";
 llenado=true;
}//encendido
}//llenado
}else{
 var titulo="<h2><b>Nitrato de potasio (KNO<sub>3</sub>)</b></h2>"
  var myHeading ='<div style="float:left;background-color:#e3dac9;border-style:groove;" align="center" ><img id="vaso" src="/images/comburente.png" /><br><b><i>Comburente</i></b><br><img id="vaso" src="/images/practica33/diamanteKNo3.png" /><br><small><b><i>Peligrosidad del KNO<sub>3</sub></i></b></small></div><p>El compuesto químico <b>nitrato de potasio</b>, componente del salitre,nitrato potásico o nitrato de potasio es un nitrato cuya fórmula es <b>KNO<sub>3</sub></b>. Actualmente, la mayoría del nitrato de potasio viene de los vastos depósitos de nitrato de sodio en los desiertos chilenos. El nitrato de sodio es purificado y posteriormente se le hace reaccionar en una solución con cloruro de potasio (KCl), en la cual el nitrato de potasio, menos soluble, cristaliza.</p><p>El nitrato de potasio tiene una estructura <b>cristalina ortorrómbica</b> a temperatura ambiente, que se transforma en un sistema trigonal a 129°C<br>El nitrato de potasio es moderadamente soluble en agua, pero su solubilidad aumenta con la temperatura. La solución acuosa es casi neutra, exhibe un pH 6.2 a 14 °C para una solución al 10% de polvo comercial. No es muy higroscópico, absorbe aproximadamente 0.03% de agua en 80% de humedad relativa durante 50 días. Es insoluble en alcohol y no es venenoso; puede reaccionar explosivamente con agentes reductores, pero no es explosivo por sí mismo.</p><p><b>Solubilidad en agua:</b>38 g en 100g de agua</p><p><b>Efectos de Salud Agudos:</b> Causa irritación de la piel y los ojos cuando hay contacto. La inhalacióncausará irritación de los pulmones y de la membrana mucosa. La irritación a los ojos causará lagrimeo y enrojecimiento. La piel puede presentar enrojecimiento, descamación y comezón. Siga las prácticas seguras de higiene industrial y use siempre el equipo de protección personal al usar este compuesto.<br><b>Efectos de Salud Crónicos:</b> Este producto no tiene ningún efecto crónico conocido. No se sabe si la repetida o prolongada exposición a este material pueda agravar las condiciones médicas.</p><b>Riesgos especiales:</b><br><b>Incombustible</b>.Favorece un incendio. Alejar de sustancias combustibles. En caso de incendio posible formación de gases de combustión o vapores peligrosos. Precipitar los vapores emergentes con agua.';
   $("#modal-title").html(titulo); 
     $("#modal-body").html(myHeading);  
var modal = document.getElementById("modal"); 
modal.style.display = "block";     
}//informacion
}//clase

function vertiragua(){
if(informacion==false){
if(diluido==false){
if(llenado==true){
  var animacionfiltro = anime({
    targets: '.vaso',
    translateX:440,
    autoplay: true
  });
  diluido=true;
   document.getElementById('vertiragua').src = "/images/practica33/vertiragua.gif";
 document.getElementById('vaso').src = "/images/practica33/diluir.gif";
 setTimeout(function(){
var animacionfiltro = anime({
    targets: '.vaso',
    translateX:0,
    autoplay: true
  });},1250);
document.getElementById('vaso').src = "/images/practica33/revolver/revolver-1.png.png";
}//llenado
}//diluido
}else{
var titulo="<h2><b>Agua destilada(H<sub>2</sub>O)</b></h2>"
  var myHeading ='<div style="float:left;background-color:#e3dac9;border-style:groove;" align="center" ></p><img id="vaso" src="/images/diamanteagua.png" /><br><b><i>Peligrosidad H<sub>2</sub></i></b>O</div><p><b>OLOR Y APARIENCIA: </b> Líquido incoloro e inodoro<br><b>FORMULA: </b> H<sub>2</sub>O<br><b>MASA MOLAR: </b> 18,02 g/mol</br><b>GRAVEDAD ESPECÍFICA: </b> 0,9982 a 20 °C<br><b>SOLUBILIDAD EN AGUA Y OTROS DISOLVENTES: </b> No aplicable<br><b>PUNTO DE FUSIÓN: </b> 0 °C<br><b>PUNTO DE EBULLICIÓN: </b> 100 °C<br><b>PH: </b> (Solución acuosa al 1%) 4,5 - 8<br><b>ESTADO DE AGREGACIÓN A 25°C Y 1 ATM. Líquido</p><p><b>Riesgos y efectos por exposición</b><b>Inhalación: </b>El producto no es peligroso<br><b>Ingestión: </b>El producto no es peligroso<br><b>Contacto con los ojos: </b>El producto no es peligroso<br><b>Contacto con la piel: </b>El producto no es peligroso<br></p>';
   $("#modal-title").html(titulo); 
     $("#modal-body").html(myHeading);  
var modal = document.getElementById("modal"); 
modal.style.display = "block";        
}//informacion
}//clase
function revolvertodo(){
if(informacion==false){
if(encendido==true){
if(diluido==true){
 revolver++; 
 if(revolver<=14){
document.getElementById('vaso').src = "/images/practica33/revolver/revolver-"+revolver+".png.png";
}else{
 revuelto=true; 
}//revolver
}}}}//clase
function apagarfuego(){
if(informacion==false){
document.getElementById("fuegohidden").style.visibility = "hidden";
encendido=false;
if(revuelto==true){
document.getElementById('vaso').src = "/images/practica33/cristalizacion.gif";
 document.getElementById("botonsiguiente").disabled = false;  
cristalizado=true;
}//revuelto
}else{
 
}//informacion
}//clase
 function activarinformacion(){
if(informacion==false){
  informacion=true;
  alert("Estas en modo de información: dale click a los componentes y mostrara información relevante a esta");
}else{
  informacion=false;
  alert("Saliste de modo de información ya puedes interactuar con los componentes");
}//informacion 
}//clase
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