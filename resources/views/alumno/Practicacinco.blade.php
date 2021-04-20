
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<meta name=”viewport” content=”width=device-width, initial-scale=1″>
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
   <button type="submit" class="btn btn-secondary" method="POST" onclick = "ActivarInformacion();" href="javascript:void(0);" title="Activar Información" ><i class="fa fa-info-circle"></i></a>
  </div>
  <div  class="col-sm-10">
  <a class="row justify-content-center">
     <button type="submit" class="btn btn-warning " onclick="location.href='/Tipos_de_compuestos_Acidos_y_bases_a_partir_de_indicadores_naturales/1'" method="POST">
     <i   class="fa fa-refresh"></i> Reiniciar
   </button> 
 <button type="button" class="btn btn-info" onclick = "pasos();" href="javascript:void(0);">
   <i class="fa fa-sort-numeric-asc"></i> Pasos
 </button>
 <button type="submit" class="btn btn-success" method="POST" onclick="location.href='/Tipos_de_compuestos_Acidos_y_bases_a_partir_de_indicadores_naturales/2'" method="POST">
 <i class="fa fa-check"></i> Terminar práctica
</button>
  </a>
 </div>
 
 <div  class="col-sm-1">  
  </div>
</div>
<hr>
<!--PRactica5-->
<!--PRactica5-->
<!--PRactica5-->
<!--PRactica5-->
<!--PRactica5-->
<div class="divmain">
<div class="row">
  <div  class="col-sm-2">
    <div class="gotero" onclick = "llenargotero();" href="javascript:void(0);" title="gotero suministrador">
  <img class="gotero" id="idgotero" src="/images/practica5/goterovacio.png" alt="caida"  width=170 height=170/></div>
</div>
<div  class="col-sm-10">
</div>
</div>
<div class="row">
 <div  class="col-sm-2">
  
    <div id="divdes" title="alcohol isopropilico pigmentado con Col lombarda" class="alcoholcol" onclick = "informacionalcohol();" href="javascript:void(0);" >
  <img class="practicas6" id="idalcohol" src="/images/practica5/alcoholpigmentado.png" alt="caida"  width=170 height=170  /></div>
   
  </div>
  <div  class="col-sm-2">
    
    <div class="alcalino1" onclick = "poneralcalino1();" href="javascript:void(0);" title="Hidróxido de amóniaco al 9.5% diluido en agua">
  <img class="practicas" id="idalcalino1" src="/images/practica5/matrazlleno.png" alt="caida"  width=170 height=170  /></div>
  
  </div>
  <div  class="col-sm-2">
    
    <div class="alcalino2" onclick = "poneralcalino2();" href="javascript:void(0);" title="disolucion de bicarbonato sodico">
  <img class="practicas" id="idalcalino2" src="/images/practica5/matrazlleno.png" alt="caida"  width=170 height=170  /></div>
 
  </div>
   <div  class="col-sm-2">
   
    <div class="neutro" onclick = "ponerneutro();" href="javascript:void(0);" title="Agua destilada" >
  <img class="practicas" id="idneutro" src="/images/practica5/matrazlleno.png" alt="caida"  width=170 height=170  /></div>

  </div>
  <div  class="col-sm-2">
   
    <div class="acido1" onclick = "poneracido1();" href="javascript:void(0);" title="Vinagre blanco">
  <img class="practicas" id="idacido1" src="/images/practica5/matrazlleno.png" alt="caida"  width=170 height=170  /></div>
 
  </div>
  <div  class="col-sm-2">
    <div class="acido2" onclick = "poneracido2();" href="javascript:void(0);" title="Acido clorhídrico(HCl) al 20% disoluido en agua">
  <img class="practicas" id="idacido2" src="/images/practica5/matrazlleno.png" alt="caida"  width=170 height=170  /></div>

  </div>
</div>   
</div><!--DIVMAIN-->
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
var click=true;
var alcalino1=false;
var alcalino2=false;
var neutro=false;
var acido1=false;
var acido2=false;
var informacion=false;
var goterolleno=false;
var agitadoalcalino1=false;
var agitadoalcalino2=false;
var agitadoneutro=false;
var agitadoacido1=false;
var agitadoacido2=false;
var agitadoinformacion=false;
var agitadogoterolleno=false;
function ActivarInformacion(){
if(informacion==false){
  informacion=true;
  alert("Estas en modo de información: dale click a los componentes y mostrara información relevante a esta");
}else{
  informacion=false;
  alert("Saliste de modo de información ya puedes interactuar con los componentes");
}  
}
function llenargotero(){
if (goterolleno==false){
var animacionvasoida = anime({targets: '.gotero',translateY:'35%',autoplay: true});
setTimeout(function(){
document.getElementById('idgotero').src = "/images/practica5/llenadogotero.gif";
},250);
 setTimeout(function(){
var animacionvasoida = anime({targets: '.gotero',translateY:0,autoplay: true});},1250);
 setTimeout(function(){
document.getElementById('idgotero').src = "/images/practica5/goterocol.png";
},1500);
goterolleno=true;
}}

function poneralcalino1(){
if (informacion==false){
if(click==true){
if(alcalino1==false){
if(goterolleno==true){
  click=false;
  var animacionvasoida = anime({targets: '.gotero',translateX:'68%',autoplay: true});
  setTimeout(function(){document.getElementById('idgotero').src = "/images/practica5/goterocol.gif";
},250);
setTimeout(function(){document.getElementById('idalcalino1').src = "/images/practica5/alcalino1.gif";
},750);
setTimeout(function(){var animacionvasoida = anime({targets: '.gotero',translateX:0,autoplay: true
});
document.getElementById('idgotero').src = "/images/practica5/goterovacio.png";
click=true;goterolleno=false;},1200);
setTimeout(function(){click=true;},2000);
alcalino1=true;
}
}else{
if(agitadoalcalino1==false){
  agitadoalcalino1=true;
document.getElementById('idalcalino1').src = "/images/practica5/agitaraalcalino1.gif"; 
anime({targets: '.alcalino1',translateX: 20,loop: 3,direction: 'reverse',easing: 'easeInOutSine'});
}}}
}else{
 var titulo="<h2><b>Hidróxido de amoniaco(NH<sub>4</sub>OH)</b></h2>"
  var myHeading ='<div style="float:left;background-color:#e3dac9;border-style:groove;" align="center" ></p><img id="vaso" src="/images/corrosivo.png" /><br><b><i>Corrisivo</b></i><br><img title="Hidróxido de amoniaco" id="quimico" src="/images/diamantehidroxidoamoniaco.png"/><br><b><i>Peligrosidad del NH<sub>4</sub>OH </i></b></div><p><b>Propiedades físicas y químicas:</b></p><b>Fórmula semidesarrollada: </b>H<sub>5</sub>NO<br><b>Densidad: </b>0,88 a 35%<br><b>Punto de ebullición:</b>59 ºC (35%)<br><b>Viscosidad La oposición de un fluido:</b>1,7 CsP a 40 ºF<br><b>Solubilidad en agua Medida de la capacidad de una determinada sustancia para disolverse en agua:</b>22,1 % a 122 ºF<p><b>Descripción y uso:</b></p>El <b>Hidróxido de amonio</b> es una solución incolora de amoníaco en agua con un olor acre. Por lo general se encuentra en concentraciones hasta del 30% y se utiliza en productos de limpieza doméstica, fotografia, fertilizantes, textiles, caucho, fármacos. También se utiliza como refrigerante.<p></p><p><b>Riesgos para la salud:</b></p><p>Los siguientes efectos agudos(a corto plazo) sobre la salud pueden ocurrir inmediatamente o poco después de la exposición al <b>Hidróxido de amonio</b></p><b>-.</b>El contacto puede producir graves irritaciones y quemaduras en la piel y ojos, que llevan a daño ocular.<br><b>-.</b>La exposición puede irritar los ojos, la nariz, y la garganta<br><b>-.</b>La inhalación de <b>Hidróxido de amonio</b> puede irritar el pulmón,causando tos o falta de aire. La exposición más alta podría causa una emergencia médica caraterizada por la acumulación del líquido en le pulmón e intensa falta de aire(edema pulmonar).<p><b>Equipo de pritección individual</b></p><b>-.</b>Evite el contacto con la piel con <b>hidróxido de amonio</b>. Utilize equipo de protección individual de materiales que no puedan ser permeados ni degradados por esta sustancia.<br><b>-.</b>Toda la ropa de protección(trajes,guantes,calzado,protección para los ojos) debe estar limpia y debe ponerse para trabajar.<br><b>-.</b>Al trabajar con líquidos, use gafas de protección antiimpacto y antisalpicadura con ventilación indirecta.';
   $("#modal-title").html(titulo); 
     $("#modal-body").html(myHeading);  
var modal = document.getElementById("modal"); 
modal.style.display = "block";  
}
}

function poneralcalino2(){v
if(informacion==false){
if(click==true){
if(alcalino2==false){
if(goterolleno==true){
  click=false;var animacionvasoida = anime({targets: '.gotero',translateX:'127%',autoplay: true});
  setTimeout(function(){
document.getElementById('idgotero').src = "/images/practica5/goterocol.gif";},500);
  setTimeout(function(){
document.getElementById('idalcalino2').src = "/images/practica5/alcalino2.gif";},970);
    setTimeout(function(){
var animacionvasoida = anime({targets: '.gotero',translateX:0,autoplay: true});
document.getElementById('idgotero').src = "/images/practica5/goterovacio.png";
click=true;
goterolleno=false;
},1400);
setTimeout(function(){click=true;},2300);
alcalino2=true;
}}else{
if(agitadoalcalino2==false){
  agitadoalcalino2=true;
document.getElementById('idalcalino2').src = "/images/practica5/agitaralcalino2.gif"; 
anime({targets: '.alcalino2',translateX: 20,loop: 3,direction: 'reverse',easing: 'easeInOutSine'});
}}}
}else{
var titulo="<h2><b>Bicarbonato sodico(NaHCO<sub>3</sub>)</b></h2>"
  var myHeading ='<div style="float:left;background-color:#e3dac9;border-style:groove;" align="center" ></p><img id="vaso" src="/images/irritacion_cutanea.webp" /><br><b><i>Toxicidad aguda</b></i><br><img title="Bicarbonato sodico" id="quimico" src="/images/diamantebicarbonatosodio.png"/><br><b><i>Peligrosidad del NaHCO<sub>3</sub> </i></b></div><p><b>Propiedades físicas y químicas</b></p><b>Apariencia: </b>Blanco cristalino<br><b>Densidad: </b>2173 kg/m3; 2,173 g/cm3<br><b>Masa molar: </b>84,01 g/mol<br><b>Punto de fusión: </b>323,15 K (50 ℃)<br><b>Punto de descomposición: </b>543,15 K (270 ℃)<br><b>Índice de refracción (nD):</b> </b>1,3344<br><b>Acidez: </b>10.3292​ pKa<br><b>Solubilidad en agua: </b>10,3 g⁄100 g de H2O<p><b>Indicaciones de peligro:</b></p><p><b>-.</b>Nocivo en caso de inhalación.<p><b>Consejos de prudencia:</b></p><b>-.</b>Evitar respirar el polvo o el aerosol.<br><b>-.</b>Utilizar sólo al aire libre o en un lugar bien ventilado.<br><b>-.</b>EN CASO DE INHALACIÓN: Transportar a la persona al aire libre y mantenerla en una posición que le facilite la respiración.<br><b>-.</b>Prohibido comer, beber o fumar durante su manipulación. Evitar contacto con ojos, piel y ropa. Lavarse los brazos, manos, y uñas después de manejar este producto. El uso de guantes es recomendado. Facilitar el acceso a duchas de seguridad y lavaojos de emergencias.';
   $("#modal-title").html(titulo); 
     $("#modal-body").html(myHeading);  
var modal = document.getElementById("modal"); 
modal.style.display = "block";    
}//informacion
}//clase poneralcalino1

function ponerneutro(){
if(informacion==false){
if(click==true){
  if(neutro==false){
if(goterolleno==true){
  click=false;
var animacionvasoida = anime({targets: '.gotero',translateX:'187%',autoplay: true});
  setTimeout(function(){
document.getElementById('idgotero').src = "/images/practica5/goterocol.gif";
},900);
  setTimeout(function(){
document.getElementById('idneutro').src = "/images/practica5/neutro.gif";
},1390);
    setTimeout(function(){
      var animacionvasoida = anime({targets: '.gotero',translateX:0,autoplay: true});
document.getElementById('idgotero').src = "/images/practica5/goterovacio.png";
click=true;
goterolleno=false;
},1800);
setTimeout(function(){click=true;},2700);
neutro=true;
}
}else{
if(agitadoneutro==false){
  agitadoneutro=true;
document.getElementById('idneutro').src = "/images/practica5/agitarneutro.gif"; 
anime({targets: '.neutro',translateX: 20,loop: 3,direction: 'reverse',easing: 'easeInOutSine'
});
}}}
}else{
var titulo="<h2><b>Agua destilada(H<sub>2</sub>O)</b></h2>"
  var myHeading ='<div style="float:left;background-color:#e3dac9;border-style:groove;" align="center" ></p><img id="vaso" src="/images/diamanteagua.png" /><br><b><i>Peligrosidad H<sub>2</sub></i></b>O</div><p><b>OLOR Y APARIENCIA: </b> Líquido incoloro e inodoro<br><b>FORMULA: </b> H<sub>2</sub>O<br><b>MASA MOLAR: </b> 18,02 g/mol</br><b>GRAVEDAD ESPECÍFICA: </b> 0,9982 a 20 °C<br><b>SOLUBILIDAD EN AGUA Y OTROS DISOLVENTES: </b> No aplicable<br><b>PUNTO DE FUSIÓN: </b> 0 °C<br><b>PUNTO DE EBULLICIÓN: </b> 100 °C<br><b>PH: </b> (Solución acuosa al 1%) 4,5 - 8<br><b>ESTADO DE AGREGACIÓN A 25°C Y 1 ATM. Líquido</p><p><b>Riesgos y efectos por exposición</b><b>Inhalación: </b>El producto no es peligroso<br><b>Ingestión: </b>El producto no es peligroso<br><b>Contacto con los ojos: </b>El producto no es peligroso<br><b>Contacto con la piel: </b>El producto no es peligroso<br></p>';
   $("#modal-title").html(titulo); 
     $("#modal-body").html(myHeading);  
var modal = document.getElementById("modal"); 
modal.style.display = "block";      
}//informacion
}//clase poneralcalino1
function poneracido1(){
if(informacion==false){
if(click==true){
  if(acido1==false){
if(goterolleno==true){
  click=false;
  var animacionvasoida = anime({targets: '.gotero',translateX:'246%',autoplay: true });
  setTimeout(function(){
document.getElementById('idgotero').src = "/images/practica5/goterocol.gif";
},1100);
  setTimeout(function(){
document.getElementById('idacido1').src = "/images/practica5/acido1.gif";
},1640);
setTimeout(function(){ var animacionvasoida = anime({targets: '.gotero',translateX:0, autoplay: true });
document.getElementById('idgotero').src = "/images/practica5/goterovacio.png";
click=true;
goterolleno=false;
},2000);
setTimeout(function(){click=true;},3000);
acido1=true;
}
}else{
if(agitadoacido1==false){
  agitadoacido1=true;
document.getElementById('idacido1').src = "/images/practica5/agitaracido1.gif"; 
anime({targets: '.acido1',translateX: 20,loop: 3,direction: 'reverse',easing: 'easeInOutSine'
});
}}}
}else{
var titulo="<h2><b>Vinagre blanco (Ácido acético al 3% Fórmula: C<sub>2</sub>H<sub>4</sub>O<sub>2</sub>)</b></h2>"
  var myHeading ='<div style="background-color:#c5ecf2;border-style:groove;"></p><H2><b>Vinagre blanco</b></H2><p>Es un líquido miscible en agua, con sabor agrio, que proviene de la fermentación acética del alcohol, como la de vino y manzana (mediante las bacterias Mycoderma aceti). El vinagre contiene una concentración que va del 3% al 5% de <b>ácido acético en agua</b>. Los vinagres naturales también contienen pequeñas cantidades de ácido tartárico y ácido cítrico.<p><b>Usos:</b></p>Se usa como conservante de alimentos en la industria alimenticia. El vinagre se emplea como artículo de limpieza para la superficie de cristales. Si se rocía con vinagre el parabrisas del coche no se producirá hielo o escarcha. Es útil para quitar las manchas de transpiración y el óxido de herramientas y tornillos. Es buen repelente de mosquitos, hormigas y también de pulgas en mascotas. Si aplicamos vinagre en una zona servirá como repelente para gatos. Debido a su carácter ácido, reacciona con el carbonato de calcio por lo que también es usado para la limpieza de cal en pequeños electrodomésticos como cafeteras; por el mismo motivo, puede dañar la caliza y el mármol.</p></div><br><div style="float:left;background-color:#e3dac9;border-style:groove;" align="center" ><img id="vaso" src="/images/irritacion_cutanea.webp" /><br><b><i>Toxicidad aguda</b></i><br><img id="vaso" src="/images/inflamable.png"/><br><b><i>Inflamable</b></i><br><img id="vaso" src="/images/corrosivo.png" /><br><b><i>Corrosión cutánea</b></i><br><img id="vaso" src="/images/Peligroso_por_aspiracion.png" /><br><b><i>Nocivo en caso<br>de inhalación</b></i><br><img id="vaso" src="/images/diamanteacidoacetico.png" /><br><b><i>Peligrosidad C<sub>2</sub>H<sub>4</sub>O<sub>2</sub></b></div><H2><b>Ácido acético( C<sub>2</sub>H<sub>4</sub>O<sub>2</sub>) </b></H2><p><b>Propiedades Físicas y Químicas: </b></p><b>Apariencia: </b>cristales<br><b>Densidad: </b>1049 kg/m3; 1,049 g/cm3<br><b>Masa molar: </b>60,021129372 g/mol<br><b>Punto de fusión: </b>290 K (17 ℃)<br><b>Punto de ebullición: </b>391,2 K (118 ℃)<br><b>Acidez: </b>4,76 pKa<br><b>Momento dipolar: </b>1,74 D<p></p><p><b>Indicaciones de peligro:</b><br><b>-.</b>Líquidos y vapores inflamables.<br><b>-.</b>Provoca quemaduras graves en la piel y lesiones oculares graves.<br><b>-.</b>Nocivo en caso de inhalación.</p><p><b>Consejos de prudencia:</b></p><b>-.</b>Mantener alejado de fuentes de calor, superficies calientes, chispas, llamas al descubierto y otras fuentes de ignición. No fumar.<br><b>-.</b>Usar guantes, ropa y equipo de protección para los ojos y la cara.<br><b>-.EN CASO DE INGESTIÓN:</b> Enjuagarse la boca. NO provocar el vómito.<br><b>-.EN CASO DE CONTACTO CON LA PIEL (o el pelo)</b>: Quitarse inmediatamente las prendas contaminadas. Enjuagar la piel con agua o ducharse.<br><b>-.EN CASO DE INHALACIÓN:</b> Transportar a la persona al aire libre y mantenerla en una posición que le facilite la respiración.<br><b>-.EN CASO DE CONTACTO CON LOS OJOS:</b> Aclarar cuidadosamente con agua durante varios minutos. Quitar las lentes de contacto, cuando estén presentes y pueda hacerse con facilidad. Proseguir con el lavado.<br><b>-.EN CASO DE INCENDIO:</b> Utilizar niebla de agua, espuma, polvo químico seco o dióxido de carbono (CO<sub>2</sub>) para la extinción.<br><b>-.</b>Almacenar en un lugar bien ventilado. Mantener fresco.<br><b>-.</b>Guardar bajo llave.<b>-.</b>Eliminar el contenido/ recipiente conforme a la reglamentación nacional/ internacional.';
   $("#modal-title").html(titulo); 
     $("#modal-body").html(myHeading);  
var modal = document.getElementById("modal"); 
modal.style.display = "block";   
}//informacion
}//clase acido1
function poneracido2(){
if(informacion==false){
if(click==true){
  if(acido2==false){
if(goterolleno==true){
  click=false;
  var animacionvasoida = anime({
    targets: '.gotero',translateX:'305%',autoplay: true});
  setTimeout(function(){
document.getElementById('idgotero').src = "/images/practica5/goterocol.gif";
},1300);
  setTimeout(function(){
document.getElementById('idacido2').src = "/images/practica5/acido2.gif";
},1850);
    setTimeout(function(){
var animacionvasoida = anime({targets: '.gotero',translateX:0,autoplay: true});
document.getElementById('idgotero').src = "/images/practica5/goterovacio.png";
click=true;
goterolleno=false;
},2200);
setTimeout(function(){click=true;},3300);
acido2=true;
}
}else{
if(agitadoacido2==false){
  agitadoacido2=true;
document.getElementById('idacido2').src = "/images/practica5/agitaracido2.gif"; 
anime({
  targets: '.acido2',translateX: 20,loop: 3,direction: 'reverse',easing: 'easeInOutSine'});
}}}
}else{
var titulo="<h2><b>Ácido clorhídrico(HCl)</b></h2>"
  var myHeading ='<div style="float:left;background-color:#e3dac9;border-style:groove;" align="center" ></p><img id="vaso" src="/images/corrosivo.png" /><br><b><i>Corrosivo</b></i><br><img id="vaso" src="/images/irritacion_cutanea.webp" /><br><b><i>Toxicidad aguda</b></i><br><img title="alcohol isopropilico" id="quimico" src="/images/diamanteacidoclorhidrico.png"/><br><b><i>Peligrosidad del HCl</i></b></div><p><b>Propiedades físicas y químicas:</b></p><b>Apariencia: </b>líquido incoloro o levemente amarillo<br><b>Densidad: </b>1190 (solución 37 %),1160 solución 32 %,1120 solución 25 % kg/m3; 1,12 g/cm3<br><b>Masa molar: </b>36.458 g/mol<br><b>Punto de fusión: </b>247 K (-26 ℃)<br><b>Punto de ebullición: </b>321 K (48 ℃)<br><b>Viscosidad: </b>1.9<br><b>Acidez: </b>-6.21​ pKa<br><br><b>Indicaciones de peligro:</b><b>-.</b>Provoca quemaduras de graves en la piel y lesiones oculares graves;<br><b>-.</b>Líquidos y vapores inflamables<br><b>-.</b>Nocivo en caso de inhalación<p><b>Consejos de prudencia: </b></p><b>-.</b>Mantener alejado de fuentes de calor, superficies calientes, chispas, llamas al descubierto y otras fuentes de ignición. No fumar.<br><b>-.</b>Usar guantes, ropa y equipo de protección para los ojos y la cara.<br><b>-.EN CASO DE INGESTIÓN: </b> Enjuagarse la boca. NO provocar el vómito.<br><b>-.EN CASO DE CONTACTO CON LA PIEL (o el pelo): </b> Quitarse inmediatamente las prendas contaminadas. Enjuagar la piel con agua o ducharse.<br><b>-.EN CASO DE INHALACIÓN: </b> Transportar a la persona al aire libre y mantenerla en una posición que le facilite la respiración.<br><b>-.EN CASO DE CONTACTO CON LOS OJOS: </b> Aclarar cuidadosamente con agua durante varios minutos. Quitar las lentes de contacto, cuando estén presentes y pueda hacerse con facilidad. Proseguir con el lavado.<br><b>-.EN CASO DE INCENDIO: </b> Utilizar niebla de agua, espuma, polvo químico seco o dióxido de carbono (CO₂) para la extinción.<br><b>-.</b>Almacenar en un lugar bien ventilado. Mantener fresco.<br><b>-.</b>Eliminar el contenido/ recipiente conforme a la reglamentación nacional/ internacional.<br>';
   $("#modal-title").html(titulo); 
     $("#modal-body").html(myHeading);  
var modal = document.getElementById("modal"); 
modal.style.display = "block";    
//Ácido clorhídrico
}//informacion
}//clase acido2

function informacionalcohol(){
 if(informacion==true){
 var titulo="<h2><b>Alcohol isopropilico(C<sub>3</sub>H<sub>8</sub>O)</b></h2>"
  var myHeading ='<div style="float:left;background-color:#e3dac9;border-style:groove;" align="center" ></p><img id="vaso" src="/images/inflamable.png" /><br><b><i>Inflamable</b></i><br><img id="vaso" src="/images/peligroso_para_el_medio_ambiente.png" /><br><b><i>Peligro al medio ambiente</b></i><br><img id="vaso" src="/images/irritacion_cutanea.webp" /><br><b><i>Toxicidad baja</b></i><br><img title="alcohol isopropilico" id="quimico" src="/images/diamantealcohol.png"/><br><b><i>Peligrosidad del C<sub>3</sub>H<sub>8</sub>O </i></b></div><p><b>Propiedades Físicas y Químicas</b></p><p>Líquido incoloro de olor agradable. Su punto de ebullición es de 825 ºC a 760 mm Hg y su punto de fusión de -88.5 ºC. Su densidad relativa es igual a 0.785 a 20 ºC/4 ºC. Su solubilidad en agua es de 1 X 106 a 25 ºC. Su solubilidad en alcohol, éter y acetona es menor del 10 %. Es soluble en benceno. Es miscible con cloroformo y la mayoría de los disolventes orgánicos. Es insoluble en soluciones salinas. Su presión de vapor es igual a 45.4 mm Hg a 25 ºC. Su constante de la ley de Henry es de 8.10 X 10-6 atm m<sub>3</sub>/mol a 25 ºC.</p><b>Indicaciones de peligro:</b><br><b>-.</b>Líquido y vapores muy inflamables.<br><b>-.</b>Provoca irritación ocular grave.<br><b>-.</b>Puede provocar somnolencia o vértigo.<p></p><b>Consejos de prudencia:</b><br><b>-.</b>Mantener alejado del calor, superficies calientes, chispas, llamas al descubierto y otras fuentes de ignición. No fumar.<br><b>-.</b>Lavarse cuidadosamente después de la manipulación.<br><b>-.</b>Usar guantes, ropa y equipo de protección para los ojos y la cara<br><b>-.</b>EN CASO DE CONTACTO CON LA PIEL (o el pelo): Quitar inmediatamente toda la ropa contaminada. Enjuagar la piel con agua o ducharse.<br><b>-.</b>EN CASO DE INHALACIÓN: Transportar a la persona al aire libre y mantenerla en una posición que le facilite la respiración.<br><b>-.</b>EN CASO DE CONTACTO CON LOS OJOS: Enjuagar con agua cuidadosamente durante varios minutos. Quitar las lentes de contacto cuando estén presentes y pueda hacerse con facilidad. Proseguir con el lavado.<br><b>-.</b>Si la irritación ocular persiste, consultar a un médico<br><b>-.</b> En caso de incendio: Utilizar niebla de agua, espuma, polvo químico seco o dióxido de carbono (CO<sub>2</sub>) para la extinción.<br><b>-.</b>Almacenar en lugar bien ventilado. Mantener el recipiente herméticamente cerrado.';
   $("#modal-title").html(titulo); 
     $("#modal-body").html(myHeading);  
var modal = document.getElementById("modal"); 
modal.style.display = "block";    
 } 
}

function pasos(){
  var titulo="<h2><b>Pasos del experimento llamado Ácidos y bases a partir de indicadores naturales</b></h2>"
  var myHeading ='<div style="float:left;background-color:#e3dac9;border-style:groove;"><p><b>Materiales y reactivos</b></p><p><b>-.</b>Mortero</p><p><b>-.</b>5 matraz de 50ml</p><p><b>-.</b>vaso de precipitado de 50ml</p><p><b>-.</b>un gotero</p><p><b>-.</b>alcohol isopropilico</p><p><b>-.</b>bicarbonato de sodio</p><p><b>-.</b>Hidróxido de amoniaco</p><p><b>-.</b>vinagre blanco</p><p><b>-.</b>Ácido clorhídrico (comercial)</p></div><p><b>Fundamento científico</b></p><p>La Cianidina es un compuesto químico natural presente en las plantas, frutas y verduras. Pertenece al grupo de las antocianinas, subclase de los flavonoides, que son metabolitos secundarios vegetales que este tambien es un pigmento que puede ser encontrado en la col morada </p><p>El colorante en cuestión tiene  propiedades  químicas  muy  interesantes  pues  el color azul-violeta que presenta en medio neutro (pH = 7) cambia  a  colores  que  tienden  hacia  el  rojo  en  medio ácido (pH = 1-6), y a colores que en medio básico tienden hacia el verde (pH = 8-12) y al amarillo (pH = 13-14)</p><p><b>Pasos: </b></p><p><b>1.</b>Preparación de la solución indicadora cortar finamente una col morada. Colocar los fragmentos en un mortero. añadir 50ml de alcohol isopropilico.<br><b>2.</b>moler ligeramente la col en el mortero y dejar reposar unos minutos. poner el liquido resultante en el vaso de precipitado y desachar los sólidos.<br><b>3.</b>Preparación de la disolución Hidróxido de amóniaco añadir 5ml de hidróxido de amóniaco a un matraz y despues vertir 30 ml de agua destilada a este<br><b>4.</b>Preparación de la disolución bicarbonato de sodio añadir 5gr de bicarbonato de sodio a un matraz y despues vertir 30 ml de agua destilada a este<br><b>5.</b>añadimos 30ml de agua destilada a un matraz<br><b>6.</b>añadimos 30ml de vinagre blanco a un matraz<br><b>7.</b>Preparación del ácido clorhídrico(comercial) añadir 5ml de ácido clorhídrico a un matraz y despues vertir 30 ml de agua destilada a este<br><b>8.</b>Medición de ph. Usando el extracto preparado, mide el ph de las sustancias puestas en los matraz</p>';
   $("#modal-title").html(titulo); 
     $("#modal-body").html(myHeading);  
var modal = document.getElementById("modal"); 
modal.style.display = "block";     
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
