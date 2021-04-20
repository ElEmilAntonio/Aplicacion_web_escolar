
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
      <button type="submit" class="btn btn-warning " onclick = "mostrarpaso(false);" href="javascript:void(0);" ><i class="fa fa-arrow-left"></i>
     Anterior 
   </button> 
 <button id="botonsiguiente" class="btn btn-success" onclick = "mostrarpaso(true);" href="javascript:void(0);">
  Siguiente <i class="fa fa-arrow-right"></i>
</button> 
</button>
  </a>
 </div>
 <div  class="col-sm-1">  
  </div>
</div>
<hr>
 <!--DIVS-->
 <!--DIVS-->
 <!--DIVS-->
 <!--DIVS-->
<div class="row">
 <div  class="col-sm-12" >
  <div clas="contenedor">
<div class="pasos" id="paso0"></div> 
<div class="pasos" id="paso1">
<div id="contenidopaso1" style="background-color:#d2c3a7;">
<div style="float:left;background-color:#e3dac9;border-style:groove;padding:2px;" ><p><b>Materiales y reactivos</b></p><b>-.</b>4 tubos de ensayo de 50ml<br><br><b>-.</b>termometro de 10 a 250c°<br><br><b>-.</b>pinza para tubo de ensayo<br><br><b>-.</b>base para tubos de ensayo<br><br><b>-.</b>mechero<br><br><b>-.</b>aceite de coco<br><br><b>-.</b>agua destilada<br><br><b>-.</b>Solución de hidróxido de sodio al 30%<br><br><b>-.</b>Ácido clorhídrico</p></div><h2 align="center"><b>Proceso de saponificación para la creación de jabon</b></h2><p><b>Objetivo de la práctica:</b></p><p>Ejercitar  técnicas  de  laboratorio    de  síntesis  orgánica: Formación de  jabón mediante la reacción de una base fuerte, hidróxido de sodio (NaOH) con una grasa animal o vegetal.</p><p><b>Explicación cientifica de la práctica:</b></p><p><b>La saponificación</b>, también conocida como una hidrólisis de éster en medio básico, es un proceso químico por el cual un cuerpo graso, unido a una base y agua, da como resultado jabón y glicerina. Se llaman jabones a las sales sódicas y potásicas derivadas de los ácidos grasos. Son susceptibles de saponificación todas aquellas sustancias que en su estructura molecular contienen restos de ácidos grasos, y son sustancias naturales a las que llamamos lípidos saponificables. Los lípidos saponificables más abundantes en la naturaleza son las grasas neutras o glicéridos. La saponificación de un triglicérido se resume así:<br><p align="center">grasa + <b>sosa cáustica</b> → jabón + glicerina</p><p align="center"></p><p>Este proceso químico es utilizado como un parámetro de medición de la composición y calidad de los ácidos grasos presentes en los aceites y grasas de origen animal o vegetal, denominándose este análisis como Índice de saponificación; el cual es un método de medida para calcular el peso molecular promedio de todos los ácidos grasos presentes. Igualmente este parámetro es utilizado para determinar el porcentaje en los cuerpos grasos de materias insaponificables, es decir, sustancias que no contienen ácidos grasos.</p><p>Un método de saponificación común en el aspecto industrial consiste en hervir la grasa en grandes calderas, añadir lentamente hidróxido de sodio (NaOH) y agitarlo continuamente hasta que la mezcla comienza a ponerse pastosa.</p></p>
</div></div><!--paso1-->
<div class="pasos" id="paso2"><div id="contenidopaso2" style="background-color:#d2c3a7;">
<div style="float:left;background-color:#e3dac9;border-style:groove;padding:2px;" ><p><b>Materiales y reactivos</b></p><b>-.</b><font color="red">4 tubos de ensayo de 50ml</font><br><br><b>-.</b>termometro de 10 a 250c°<br><br><b>-.</b>pinza para tubo de ensayo<br><br><b>-.</b><font color="red">base para tubos de ensayo</font><br><br><b>-.</b>mechero<br><br><b>-.</b><font color="red">aceite de coco</font><br><br><b>-.</b><font color="red">agua destilada</font><br><br><b>-.</b><font color="red">Solución de hidróxido de sodio al 30%</font><br><br><b>-.</b>Ácido clorhídrico</p></div><h2>Paso 1:</h2><p><b>Preparar los 4 tubos de ensayo:</b></p><p>1.Al primer tubo de ensayo se le añadira 5ml Hidróxido de sodio diluido al 30%(comercial) o también puedes calcular calcular la disolución y diluirlo para obtener Hidróxido de sodio al 30%<p>a.identificamos la mezcla para obtener porcentaje de disolución la cual es:<br>(Concentración ml o g/disolvente ml)X100=Porcentaje de solución %</p><p>b.hacemos la conversión necesaria para que en ves de obtener el porcentaje % obtengamos la cantidad de gramos que necesitamos para obtener el porcentaje deseado que seria:<br>disolvente ml(porcentaje %/100)=Concentración gramos o ml</p>
<p>c.si queremos obtener los 5ml de hidróxido de sodio al 30% seria algo como esto:<br>
5ml de agua destilada(30 % de disolución/100)=1.5 gramos o ml de hidróxido de sodio en un estado mas puro.</p><p>2.el segundo tubo de ensayo se le añadiran 6gr de aceite de coco que servira como la grasa que hara reacción con la base</p><p>el 3 y 4 tubo de ensayo se dejaran vacios por ahora.</p><p>3.usa las pinzas para transportar los tubos de ensayo a la rejilla con mas razon si es que hiciste la disolución de la sosa caustica ya que al reaccionar con el agua produce calor</p><div><div class="ensayo0"><h2><b>1.</b></h2><br><img src="/images/practica8/hidroxido.gif"></div><div class="ensayo1"><h2><b>2.</b></h2><br><img src="/images/practica8/tubococo.gif"></div><div class="ensayo2"><h2><b>3.</b></h2><br><img src="/images/practica8/tubo.png"></div><div class="ensayo3"><h2><b>4.</b></h2><br><img src="/images/practica8/tubo.png"></div><div style="display:inline-block;height:450px;width:450px;"><img src="/images/practica8/rejilla.png"></div></div>
</div>
</div> <!--paso2-->
<div class="pasos" id="paso3"><div id="contenidopaso3" style="background-color:#d2c3a7;">
<div style="float:left;background-color:#e3dac9;border-style:groove;padding:2px;" ><p><b>Materiales y reactivos</b></p><b>-.</b><font color="red">4 tubos de ensayo de 50ml</font><br><br><b>-.</b><font color="red">termometro de 10 a 250c°</font><br><br><b>-.</b><font color="red">pinza para tubo de ensayo</font><br><br><b>-.</b><font color="red">base para tubos de ensayo</font><br><br><b>-.</b><font color="red">mechero</font><br><br><b>-.</b><font color="red">aceite de coco</font><br><br><b>-.</b>agua destilada<br><br><b>-.</b>Solución de hidróxido de sodio al 30%<br><br><b>-.</b>Ácido clorhídrico</p></div><h2>Paso 2:</h2><p><b>Cambiar el estado del aceite de coco a liquido:</b></p><p>El aceite de coco es un grasa de tipo vegetal la cual se mantiene en estado solido a los 21°C o menores y liquido de 22°C en adelante el aceite de coco no pierde ninguna propiedad a menos que este se caliente al punto de 176°C o superior.</p><p><p>1.obtenemos el tubo de ensayo con el aceite de coco de la rejilla utilizando las pinzas y lo ponemos sobre la llama del mechero hasta que todo el aceite se encuentre en estado liquido</p>2.con el termometro medimos su temperatura y esperamos a que este se enfrie y este en una temperatura de 40°C grados<br>nota: tambien se puede acelerar este proceso ponendo el tubo de ensayo bajo un chorro de agua cuidando de que no entre agua en el tubo y no baje la temperatura mas de lo deseado, de ser asi se tendria que volver a calentar el tubo de ensayo</p><img style="height:350px;width:350px;"src="/images/practica8/rejillasincoco.gif"/><img src="/images/practica8/calentar.gif"><p></p>
</div></div><!--paso3-->
<div class="pasos" id="paso4"><div id="contenidopaso4" style="background-color:#d2c3a7;">
<div style="float:left;background-color:#e3dac9;border-style:groove;padding:2px;" ><p><b>Materiales y reactivos</b></p><b>-.</b><font color="red">4 tubos de ensayo de 50ml</font><br><br><b>-.</b><font color="red">termometro de 10 a 250c°</font><br><br><b>-.</b><font color="red">pinza para tubo de ensayo</font><br><br><b>-.</b><font color="red">base para tubos de ensayo</font><br><br><b>-.</b>mechero<br><br><b>-.</b><font color="red">aceite de coco</font><br><br><b>-.</b>agua destilada<br><br><b>-.</b><font color="red">Solución de hidróxido de sodio al 30%</font><br><br><b>-.</b>Ácido clorhídrico</p></div><h2>Paso 3:</h2><p><b>Preparar la solución de sosa caustica con aceite de coco:</b></p><p>el hidróxido de sodio o sosa caustica es soluble en liquidos pero para que este sea soluble debe la disolucíon debe estar a minimo 22°C de temperatura ya que el aceite de coco es una sustancia mas densa para asegurar la correcta disolución de la mezcla el aceite de coco debe estar aproximadamente a 40°C grados</p><p></p><img style="height:350px;width:350px;"src="/images/practica8/rejillasinsosacoco.gif"/><img src="/images/practica8/ponernaoh.gif"><p></p>
</div></div><!--pasos4-->
<div class="pasos" id="paso5"><div id="contenidopaso5" style="background-color:#d2c3a7;">
<div style="float:left;background-color:#e3dac9;border-style:groove;padding:2px;" ><p><b>Materiales y reactivos</b></p><b>-.</b><font color="red">4 tubos de ensayo de 50ml</font><br><br><b>-.</b>termometro de 10 a 250c°<br><br><b>-.</b> pinza para tubo de ensayo<br><br><b>-.</b><font color="red">base para tubos de ensayo</font><br><br><b>-.</b>mechero<br><br><b>-.</b><font color="red">aceite de coco</font><br><br><b>-.</b><font color="red">agua destilada</font><br><br><b>-.</b>Solución de hidróxido de sodio al 30%<br><br><b>-.</b><font color="red">Ácido clorhídrico</font></p></div><h2>Paso 4:</h2><p><b>Pruebas de solubilidad y descomposición: </b></p><p>para comprobar si en verdad el proceso de saponificación se hiso adecuadamente se tiene que verificar la solubilidad y su descomposición al interactuar con un ácido</p><p>1. añadir mitad de la mezcla de aceite de coco y sosa caustica a cada tubo de ensayo vacio</p><p></p><img style="height:350px;width:350px;"src="/images/practica8/rejillasincocovacios.gif"/><img src="/images/practica8/quitarcoco.gif"><img src="/images/practica8/ponercoco.gif"><img src="/images/practica8/ponercoco.gif"><p><p>2.añadimos 5ml de agua destilada al tubo numero 3 y lo agitamos para comprobar su solubilidad, si este hace espuma significa que el compuesto se combino correctamente.</p><p><img src="/images/practica8/agitar.gif"></p><p>3. lo siguiente seria descomponer el compuesto alterando el ph de este y lo haremos añadiendo 5ml de agua destilada y un ml de ácido clorhidrico</p><img src="/images/practica8/poneracido.gif"><p>el compuesto se descompone por el cambio del ph lo que hace que la sosa caustica se separa del acite de coco. aqui terminaria el experimento de saponificacón</p><p align="center"><button type="submit" class="btn btn-success" method="POST" onclick="location.href='/Reaccion_de_saponificacion/2'" method="POST">
 <i class="fa fa-check"></i> Terminar práctica
</button></p><br><br></p>
</div></div> 
<div class="pasos" id="paso6">DIV NUMERO 6</div> 
</div><!--contenedor-->
</div><!--sm12-->
</div>  <!--row-->

<p></p>
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
  var paso=0;
window.onload=mostrarpaso(true);

function moverensayos(){
  var animacionensayo0 = anime({
    targets: '.ensayo0',
    translateX:450,
   
    duration:6000,
        easing:'easeInQuad'
  });
  var animacionensayo1 = anime({
    targets: '.ensayo1',
    translateX:450,

    duration:6000,
    easing:'easeInQuad'
  });
  var animacionensayo2 = anime({
   targets: '.ensayo2',
    translateX:450,

    duration:6000,
    easing:'easeInQuad'
  });
  var animacionensayo3 = anime({
    targets: '.ensayo3',
    translateX:450,

    duration:6000,
    easing:'easeInQuad'
  });
}
function mostrarpaso(siguiente) {
  document.getElementById("paso"+paso).style.visibility = "hidden";
if(siguiente==true){ 
paso++;
if(paso==2){
moverensayos();  
}
if(paso>6){
paso=6;  
}
if(paso==6){

}
document.getElementById("paso"+paso).style.visibility = "visible";
}else{
document.getElementById("paso"+paso).style.visibility = "hidden";
paso--;
if(paso<1){
paso=1;  
}
document.getElementById("paso"+paso).style.visibility = "visible";
}
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
