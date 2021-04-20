
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
     <button  type="submit" class="btn btn-warning " onclick="location.href='/Metodos_fisicos_de_separacion_de_mezclas/1'" method="POST"><i class="fa fa-arrow-left"></i>
     Anterior
   </button>
 <button disabled id="botonsiguiente" type="submit" class="btn btn-success" method="POST" onclick="location.href='/Metodos_fisicos_de_separacion_de_mezclas/3'" method="POST">
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
<a class="row justify-content-end"><div class="vertircafe" onclick = "movercafe();" href="javascript:void(0);">
  <img id="cafe" src="/images/practica32/vertircafe.png" alt="caida"  width=200 height=200 />
</div></a>
<br>
<a class="row justify-content-right"><div class="filtro" onclick = "moverfiltro();" href="javascript:void(0);">
  <img id="filtro" src="/images/practica32/filtro.png" alt="caida"  width=150 height=150 />
</div></a>
<br>
<a class="row justify-content-center">
  <div class="vasoprecipitacion" onclick = "vaso();" href="javascript:void(0);">
  <img id="llenarvaso" src="/images/practica32/llenarvaso.png" alt="caida"  width=200 height=200  />
</div>
</a>
  <br>
</div>

<link href="{{ asset('css/cuadros.css') }}" rel="stylesheet">
</body>
</html>


<script src="https://cdn.jsdelivr.net/npm/animejs@3.0.1/lib/anime.min.js"></script>

<script type="text/javascript">
var informacion=false;
var vertido=false;
  var filtrado=false;

  function validarfiltrado(){
  if(vertido==true&&filtrado==true){
   document.getElementById("botonsiguiente").disabled = false;  
  }else{
   document.getElementById("botonsiguiente").disabled = true;  
  }
  }

  function movercafe() {
     if(informacion==false){
     var animacionvertircafe = anime({
    targets: '.vertircafe',
    translateX:-360,
    autoplay: true
  });
    vertido=true;
    if(filtrado==true){
        document.getElementById('cafe').src = "/images/practica32/vertircafe.gif";
   document.getElementById('filtro').src = "/images/practica32/filtro.gif";
    document.getElementById('llenarvaso').src = "/images/practica32/llenarvaso.gif";
    }
}else{
   var titulo="<h2><b>Filtrado por gravedad </b></h2>"
  var myHeading ='<div style="float:left;"><img id="vaso" src="/images/practica32/vertircafe.png" width=200 height=200/><br><small></small></div><p>Probablemente la técnica mas familiar de filtrado consista en dejar escurrir el líquido por gravedad a través de un papel de filtro colocado apropiadamente en un embudo que retiene los sólidos. El uso del papel de filtro en el embudo es adecuado cuando las cantidad de líquido a filtrar es relativamente grande (10 mL o más). Para pequeñas cantidades de soluciones lo mejor es usar una pipeta Pasteur con una mota de algodón o de lana de vidrio taponando la salida.</p>';
   $("#modal-title").html(titulo); 
     $("#modal-body").html(myHeading);  
var modal = document.getElementById("modal"); 
modal.style.display = "block";   
}
validarfiltrado();
}

function vaso() {
     if(informacion==false){

}else{
   var titulo="<h2><b>Objetivos Básicos </b></h2>"
  var myHeading ='<p><b>1</b>.- "Limpiar" un líquido o una solución de las impurezas sólidas presentes y donde no interesa recolectar el sólido.<br><b>2</b>.- Separar y recolectar algún sólido precipitado o cristalizado durante una reacción en medio líquido.  En este caso puede interesar recolectar tanto el sólido como la solución de forma separada para uso posterior.<br>Las técnicas de filtrado pueden ser diversas, las mas generales están recogidas en la tabla 1 a continuación, y todas se describen con algún detalle mas adelante.</p>';
   $("#modal-title").html(titulo); 
     $("#modal-body").html(myHeading);  
var modal = document.getElementById("modal"); 
modal.style.display = "block";   
}
}

function moverfiltro() {
  if (informacion==false){
  var animacionfiltro = anime({
    targets: '.filtro',
    translateX:480,
    autoplay: true
  });
   filtrado=true;
   if(vertido==true){
   document.getElementById('cafe').src = "/images/practica32/vertircafe.gif";
   document.getElementById('filtro').src = "/images/practica32/filtro.gif";
    document.getElementById('llenarvaso').src = "/images/practica32/llenarvaso.gif";
   }
  }else{
    var titulo="<h2><b>Filtracíon </b></h2>"
  var myHeading ='<div style="float:left;"><img id="filtro" src="/images/practica3/modelo1.jpg"/><br><small><b><i>(Fig1.Elaboración de un cono de filtrado)</i></b></small><br><img id="vaso" src="/images/practica3/modelo.gif"/></div><p><b>Cono de papel</b><br>Para preparar un cono de papel se parte de un papel de filtro estándar de forma circular y se dobla como se muestra en la figura 1. A continuación se coloca dentro del embudo de dimensiones apropiadas que servirá de soporte, adherido a las paredes de este y se procede a filtrar como se muestra en la figura 2.<br>Esta técnica de filtrado es mas adecuada para los casos en los que el sólido separado debe ser recolectado para uso posterior. Debido a que la superficie del filtro de papel es lisa el sólido retenido se puede raspar y recoger con facilidad, lo que se dificulta un tanto si el papel de filtro hubiese sido plegado como se indica mas adelante para la técnica de filtrado con papel plegado. También el filtrado con cono de papel de filtro es conveniente para los casos donde el filtrado al vacío con embudo Büchner no es apropiado (esta tećnica se describe mas adelante).<br>Cuando se filtra usando un cono de papel de filtro el solvente adhiere el papel a las paredes del embudo y se puede formar un sello que no permite la salida del aire desde el recipiente de captura, lo mismo puede suceder entre el embudo y la boca del frasco, ambas situaciones conllevan a que el escurrido del solvente se detenga y por esa razón siempre es conveniente colocar un trozo de alambre doblado, una tira de papel, u otro elemento similar como se muestra en la figura 2, la holgura formada entre ambos cuerpos por la interposición del alambre permite la comunicación ente el interior del recipiente y la atmósfera y con ello el escape del aire. Una forma alternativa para resolver el problema es montar el embudo en un soporte independiente muy próximo, pero sin que toque la boca del frasco colector.Filtros de papel plegadoEn principio, para el filtrado con un filtro de papel plegado se usa la misma instalación que para el cono de papel pero existen algunas diferencias importantes:<br>1.- Debido a los pliegues del papel, la superficie de filtrado es mayor y por lo tanto también es mayor la velocidad de paso del líquido.<br>2.- Normalmente cuando se filtran soluciones frías no se produce el sellaje entre el embudo y el papel por lo que no es necesario el uso del alambre doblado.<br>3.- Es mucho más apropiado para filtrar soluciones calientes que los conos, ya que la producción de vapores en el interior del frasco colector debido a la temperatura del solvente puede necesitar una abundante posibilidad de escape al exterior que es mucho mejor en estos filtros que en los de cono. No es mala práctica colocar el alambre doblado descrito arriba cuando se filtran soluciones calientes como medida favorecedora adicional.<br>4.- Debido a los pliegues, resulta mas difícil raspar y recolectar el sólido retenido sin contaminación con fibras del papel, por ello este método de filtrado está indicado principalmente para "limpiar" la solución deseada de los sólidos indeseados.<br>5.- Especial cuidado hay que tener cuando se filtran soluciones calientes saturadas o muy cerca de la saturación. El contacto de la solución con las paredes frías del filtro reduce su temperatura y con ello puede producirse la formación de cristales en el vástago del embudo o en el papel de filtro, los que eventualmente tupen el sistema y el filtrado se detiene.<br>Para evitar que el filtro se tupa se pueden utilizar cuatro métodos:<br>1.- Utilizando un embudo de vástago corto o sin vástago lo que hace mas difícil que resulte obstruido por los cristales.<br>2.- Mantener el líquido a filtrar en ebullición o muy próximo a la ebullición en todo momento.<br>3.- Filtrar un poco de solvente caliente para calentar el sistema antes de echar la solución definitiva a filtrar.<br>4.- Mantener la solución filtrada ebullendo ligeramente en el frasco colector, por ejemplo, sobre una plancha de calefacción. El reflujo del solvente condensado mantiene limpio el vástago del embudo y además calienta la solución que está dentro del embudo.</p>';
   $("#modal-title").html(titulo); 
     $("#modal-body").html(myHeading);  
var modal = document.getElementById("modal"); 
modal.style.display = "block";   
  }
validarfiltrado();
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
