
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
  </div>
 <div  class="col-sm-10">
  <a class="row justify-content-center">
     <button type="submit" class="btn btn-warning " onclick="location.href='/El_ph_de_las_sustancias/1'" method="POST">
     <i   class="fa fa-refresh"></i> Reiniciar
   </button> 
 <button type="button" class="btn btn-info" class="btn btn-info">
   <i class="fa fa-sort-numeric-asc"></i> Pasos
 </button>
 <button type="submit" class="btn btn-success" method="POST" onclick="location.href='/El_ph_de_las_sustancias/2'" method="POST">
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
 <H2 class="ph-log" style="color:#C7DB46; display: inline;">PH:</H2><H2 class="battery-log" style="color:#C7DB46; display: inline;">7 </H2>  
 </div> 
 <div class="col-sm-11">
  <div class="demo-content specific-unit-values-demo">
    <div class="barra el" style=" height:33px;width:0px;background-color: #555;"></div>
  </div>
 </div>
</div>
<div class="row">
<div  class="col-sm-2">
   <div id="divgotero0" onclick = "acciongotero(0);" href="javascript:void(0);" title="gotero suministrador de Hidróxido de sodio al 98% (Ph 14.0 alacalino)">
  <img class="gotero0" id="gotero0" src="/images/practica5/goterovacio.png" alt="caida"/></div>
 </div>
 <div  class="col-sm-2">
  <div id="divgotero1" onclick = "acciongotero(1);" href="javascript:void(0);" title="gotero suministrador">
  <img class="gotero1" id="gotero1" src="/images/practica5/goterovacio.png" alt="caida"/></div>
 </div>
 <div  class="col-sm-1">
 </div>
 <div  class="col-sm-2">

 </div>
 <div  class="col-sm-1">
 </div>
 <div  class="col-sm-2">
  <div class="divgotero2" onclick = "acciongotero(2);" href="javascript:void(0);" title="gotero suministrador">
  <img class="gotero2" id="gotero2" src="/images/practica5/goterovacio.png" alt="caida"/></div>
 </div>
 <div  class="col-sm-2">
  <div class="divgotero3" onclick = "acciongotero(3);" href="javascript:void(0);" title="gotero suministrador">
  <img class="gotero3" id="gotero3" src="/images/practica5/goterovacio.png" alt="caida"/></div>
 </div> 
 </div>
 <!--RECIPIENTES PH-->
 <!--RECIPIENTES PH-->
 <!--RECIPIENTES PH-->
 <!--RECIPIENTES PH-->
<div class="row">
 <div  class="col-sm-2">
 
  <div id="recipiente0" disabled class="naoh" title="Hidróxido de sodio al 98% (Ph 14.0 alacalino)" onclick = "informacionrecipiente(0);" href="javascript:void(0);">
  <img class="practicas6" id="idalcalino1" src="/images/practica6/Naoh.png" alt="caida" /></div>
 </div>
<div  class="col-sm-2">
  
   <div id="recipiente0" class="naoh50" title="Hidróxido de sodio en 50ml de agua destilada (Ph 12.0 alcalino)" onclick = "informacionrecipiente(0);" href="javascript:void(0);">
  <img class="practicas6" id="idalcalino1" src="/images/practica6/Naoh50.png" alt="caida"  /></div>
 </div>
 <div  class="col-sm-1"></div>
 <div  class="col-sm-2">
   
    <div id="recipiente1" class="fenol" title="4 gotas de Fenolftaneina en 50 ml de agua destilada (Ph 7.0 neutro)" onclick = "informacionrecipiente(1);" href="javascript:void(0);">
  <img class="practicas6" id="idfenolftaneina" src="/images/practica6/Fenolftaneina.png" alt="caida"  />
 </div>
</div>
 <div  class="col-sm-1"></div>
 <div  class="col-sm-2">
    <div id="recipiente2" class="naoh50" title="vinagre blanco de cocina(Ph 2.0 acido)" onclick = "informacionrecipiente(2);" href="javascript:void(0);">
  <img  class="practicas6" id="idalcalino1" src="/images/practica6/vinagre.png" alt="caida"  /></div> 
 </div>
 <div  class="col-sm-2">
    <div id="recipiente3" class="naoh50" title="Ácido clorhidrico(Ph<0.0 acido)" onclick = "informacionrecipiente(3);" href="javascript:void(0);">
  <img class="practicas6" id="idalcalino1" src="/images/practica6/hcl.png" alt="caida"  /></div> 
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
var Estadogotero = [false,false,false,false];
var phs=[7,.76,-.76,-7];
var cambio=0;
var ph=7;
var alcalino1=false;
var alcalino2=false;
var neutro=false;
var acido1=false;
var acido2=false;
var informacion=false;


function acciongotero(gotero){
if(informacion==false){
   if(Estadogotero[gotero]==false){
   llenargotero(gotero);
   Estadogotero[gotero]=true;
   }else{
   soltargota(gotero);
   Estadogotero[gotero]=false;
   }}else{
mostrarinformaciongotero(gotero);
}
}

function llenargotero(gotero){  
var animacionvasoida = anime({targets: '.gotero'+gotero,translateY:110,autoplay: true});
setTimeout(function(){
document.getElementById('gotero'+gotero).src = "/images/practica6/llenadogotero.gif";},250);
 setTimeout(function(){
document.getElementById('gotero'+gotero).src = "/images/practica6/gotero.png";},830);
 setTimeout(function(){
var animacionvasoida = anime({targets: '.gotero'+gotero,translateY:0,autoplay: true});},1250);
}


function soltargota(gotero){
 var trasladosx=['320%','200%','-150%','-280%'];
 var animacionvasoida = anime({targets: '.gotero'+gotero,translateX:trasladosx[gotero],autoplay: true});
setTimeout(function(){
document.getElementById('gotero'+gotero).src = "/images/practica6/gotero.gif";
},250);
setTimeout(function(){
document.getElementById('gotero'+gotero).src = "/images/practica6/goterovacio.png";
},1250);
 setTimeout(function(){
var animacionvasoida = anime({targets: '.gotero'+gotero,translateX:'0%',autoplay: true});
if(gotero==1||gotero==2){
cambioph(gotero);
}else{
cambiophconcentrado(gotero);
}},1350); 
}

function rangodecambio(ph,phanterior){
if(ph<7.76&&ph>0){
cambio=0;
}else if(ph>7.76&&ph<=8.2){
cambio=1;
}else if(ph>8.2&&ph<=8.96){
cambio=2;
}else if(ph>8.96&&ph<=9.72){
cambio=3;
}else if(ph>9.72&&ph<=10.48){
cambio=4;
}else if(ph>10.48&&ph<=11.24){
cambio=5;
}else if(ph>11.24&&ph<=12){
cambio=6;  
}else if(ph>12&&ph<=14){
cambio=0;
}
//valores invertidos
if(phanterior==0&&ph>0){
cambio=7;  
}else if(ph==0&&phanterior==0){
cambio=8;
}else if(phanterior>0&&ph==0){
}
}

function cambioph(gotero){
var repeticion=false;
var phanterior=ph;
ph+=phs[gotero];
if(phs[gotero]==.76){
if(ph>=7.7&&ph<=8.2){
ph=8.2;
}else if(ph>11.24&&ph<12&&phanterior<=12){
ph=12;
}else if(ph>12&&phanterior<=12){
ph=12;
repeticion=true;
}else if(ph>12&&phanterior>12){
phanterior=ph-phs[gotero];
ph-=(phs[gotero])*2;
if(ph>=11.7&&phanterior>12&&phanterior==12.48){
ph=12;
}}
rangodecambio(ph,phanterior);
if(repeticion==true){
 cambio=0;
 repeticion=false; 
}
document.getElementById('idfenolftaneina').src = "/images/practica6/cambio"+cambio+".gif";
}else{
if(ph<=7.5&&ph>7){
ph=7;
}else if(ph>7.6&&ph<8.2){
phanterior=8.2;
}else if(ph>11.24&&ph<12){
ph=11.24;
}if(ph<2&&phanterior>=2){
ph=2;
}else if(ph<2&&phanterior<2){
phanterior=ph-phs[gotero];
ph-=(phs[gotero])*2;
}
rangodecambio(phanterior,ph);
document.getElementById('idfenolftaneina').src = "/images/practica6/cambioi"+cambio+".gif";
}
animacionvalorph(phanterior,ph);
}

function cambiophconcentrado(gotero){
var phanterior=ph;
ph+=phs[gotero];
/////acido
if(phs[gotero]==-7){
if(ph<0){
ph=0;
}  
rangodecambio(phanterior,ph);
if(phanterior<=7){
document.getElementById('idfenolftaneina').src = "/images/practica6/cambioacido"+cambio+".gif";
}else{
document.getElementById('idfenolftaneina').src = "/images/practica6/cambioneutro"+cambio+".gif";
}}else{
if(ph>14){
ph=14; 
}
if(phanterior>7){
  rangodecambio(phanterior,ph);
document.getElementById('idfenolftaneina').src = "/images/practica6/cambioneutro"+cambio+".gif";
}else{
  rangodecambio(ph,phanterior);
  document.getElementById('idfenolftaneina').src = "/images/practica6/cambioalcalino"+cambio+".gif";
}}
animacionvalorph(phanterior,ph);
}

function animacionvalorph(phanterior,ph){
var porcentaje=(Math.floor((ph/14) * 100));
var Arraycolor=['#BA2B38','#F17824','#F2A233','#F2C42A','#F6D439','#F6E83F','#C7DB46','#9ACA5C','#74AA93','#3B9BC6','#3E7EC7','#5A56AB','#543E86','#533E8D','#48006E'];
var colorchooser=Math.trunc(ph);
var logEl = document.querySelector('.battery-log');
anime({targets: logEl,innerHTML: [phanterior,ph],easing: 'linear',round: 10});
var colorsExamples = anime.timeline({
  endDelay: 1000,easing: 'linear',direction: 'alternate',loop:false})
.add({ targets: '.battery-log',color:Arraycolor[colorchooser] }, 0)
.add({ targets: '.ph-log',color:Arraycolor[colorchooser]}, 0);

anime({
  targets: '.specific-unit-values-demo .el',width: porcentaje+"%",easing: 'easeInOutQuad',direction: 'alternate',backgroundColor:Arraycolor[colorchooser],loop: false});
}

window.onload=animacionvalorph(7,7);

function informacionrecipiente(numero){
if(numero==0){
var titulo="<h2><b>Hidróxido de sodio</b>    <i class='fa fa-warning'></i>  <b>ATENCIÓN</b>  <i class='fa fa-warning'></i></h2>"
  var myHeading ='<div style="float:left;background-color:#e3dac9;border-style:groove;" align="center" ><img id="vaso" src="/images/corrosivo.png" /><br><small><b><i>Corrosivo</i></b></small><p></p><img id="vaso" src="/images/diamantehidroxidosodio.png" /><br><small><b><i>Peligrosidad del NaOH</i></b></small><br><img id="vaso" src="/images/practica4/hidroxidodesodio.png" style="float:left;" width=150 height=150/></div><p>hidróxido sódico o hidrato de sodio, también conocido como soda cáustica, es un hidróxido cáustico usado en la industria (principalmente como una base química) en la fabricación de papel, tejidos, y detergentes. Además, se utiliza en la industria petrolera en la elaboración de lodos de perforación base agua. A nivel doméstico, son reconocidas sus utilidades para desbloquear tuberías de desagües de cocinas y baños, fabricar jabón casero, entre otros.A temperatura ambiente, el hidróxido de sodio es un sólido blanco cristalino sin olor que absorbe la humedad del aire (higroscópico). Es una sustancia manufacturada. Cuando se disuelve en agua o se neutraliza con un ácido libera una gran cantidad de calor que puede ser suficiente como para encender materiales combustibles. El hidróxido de sodio es muy corrosivo. Generalmente se usa en forma sólida o como una solución de 50%.</p><p>Fórmula:<b>NaOH</b></p><p>Densidad:<b>2100 kg/m3; 2,1 g/cm3</b></p><p>Masa molecular UMA Unidad de Masa Atómica, Dalton:<b>39,99713 g/mol</b></p><p>Punto de fusión Temperatura del momento en el cual una sustancia pasa del estado sólido al estado líquido:<b>318 ℃</b></p><p><b>MANEJO:</b></p><p><b>Equipo de protección personal:</b>Para el manejo del NaOH es necesario el uso de lentes de seguridad, bata y guantes deneopreno, nitrilo o vinilo. Siempre debe manejarse en una campana y no deben utilizarse lentes decontacto al trabajar con este compuesto.En el caso de trasvasar pequeñas cantidades de disoluciones de sosa con pipeta, utilizar unapropipeta, NUNCA ASPIRAR CON LA BOCA.</p><p><b>RIESGOS:</b>Riesgos de fuego o explosión:Este compuesto no es inflamable sin embargo, puede provocar fuego si se encuentra en contactocon materiales combustibles. Por otra parte, se generan gases inflamables al ponerse en contacto conalgunos metales. Es soluble en agua generando calor.</p><p><b>Riesgos a la salud:</b></p><p>El hidróxido de sodio es irritante y corrosivo de los tejidos. Los casos mas comunes de accidenteson por contacto con la piel y ojos, así como inhalación de neblinas o polvo.Inhalación: La inhalación de polvo o neblina causa irritación y daño del tracto respiratorio. En casode exposición a concentraciones altas, se presenta ulceración nasal.A una concentración de 0.005-0.7 mg/m3, se ha informado de quemaduras en la nariz y tracto. Enestudios con animales, se han reportado daños graves en el tracto respiratorio, después de unaexposición crónica.</p><p><b>Contacto con ojos:</b> El NaOH es extremadamente corrosivo a los ojos por lo que las salpicadurasson muy peligrosas, pueden provocar desde una gran irritación en la córnea, ulceración, nubosidades y,finalmente, su desintegración. En casos mas severos puede haber ceguera permanente, por lo que losprimeros auxilios inmediatos son vitales.</p><p><b>Contacto con la piel:</b> Tanto el NaOH sólido, como en disoluciones concentradas es altamentecorrosivo a la piel.Se han hecho biopsias de piel en voluntarios a los cuales se aplicó una disolución de NaOH 1Nen los brazos de 15 a 180 minutos, observándose cambios progresivos, empezando con disolución decélulas en las partes callosas, pasando por edema y llegar hasta una destrucción total de la epidermis en60 minutos. Las disoluciones de concentración menor del 0.12 % dañan la piel en aproximadamente 1hora. Se han reportado casos de disolución total de cabello, calvicie reversible y quemaduras del cuerocabelludo en trabajadores expuestos a disoluciones concentradas de sosa por varias horas. Por otro lado,una disolución acuosa al 5% genera necrosis cuando se aplica en la piel de conejos por 4 horas.</p><p><b>Ingestión:</b> Causa quemaduras severas en la boca, si se traga el daño es, además, en el esófagoproduciendo vómito y colapso.</p><p><b>Carcinogenicidad:</b> Este producto está considerado como posible causante de cáncer de esófago,aún después de 12 a 42 años de su ingestión. La carcinogénesis puede deberse a la destrucción deltejido y formación de costras, mas que por el producto mismo.</p><p><b>Mutagenicidad:</b> Se ha encontrado que este compuesto es no mutagénico.</p><p><b>Peligros reproductivos:</b> No hay imformación disponible a este respecto.</p><p><b>ACCIONES DE EMERGENCIA:</p></b><p><b>Primeros Auxilios:</p></b><p><b>Inhalación:</b> Retirar del área de exposición hacia una bien ventilada. Si el accidentado seencuentra inconciente, no dar a beber nada, dar respiración artificial y rehabilitación cardiopulmonar. Si seencuentra conciente, levantarlo o sentarlo lentamente, suministrar oxígeno, si es necesario.</p><p><b>Ojos:</b> Lavar con abundante agua corriente, asegurándose de levantar los párpados, hastaeliminación total del producto.</p><p><b>Piel:</b> Quitar la ropa contaminada inmediatamente. Lavar el área afectada con abundante aguacorriente.</p><p><b>Ingestión:</b> No provocar vómito. Si el accidentado se encuentra inconciente, tratar como en el casode inhalación. Si está conciente, dar a beber una cucharada de agua inmediatamente y después, cada10 minutos.</p>EN TODOS LOS CASOS DE EXPOSICION, EL PACIENTE DEBE SER TRANSPORTADO ALHOSPITAL TAN PRONTO COMO SEA POSIBLE.<p><b>Control de fuego:</b>Pueden usarse extinguidores de agua en las áreas donde haya fuego y se almacene NaOH,evitando que haya contacto directo con el compuesto.</p><p><b>Fugas o derrames:</b>En caso de derrame, ventilar el área y colocarse la ropa de protección necesaria como lentes deseguridad, guantes, overoles quimicamente resistentes, botas de seguridad. Mezclar el sólido derramadocon arena seca, neutralizar con HCl diluido, diluir con agua, decantar y tirar al drenaje. La arena puededesecharse como basura doméstica.Si el derrame es de una disolución, hacer un dique y neutralizar con HCl diluido, agregar grancantidad de agua y tirar al drenaje.</p><p> <b>Desechos:</b>Para pequeñas cantidades, agregar lentamente y con agitación, agua y hielo. Ajustar el pH aneutro con HCl diluido. La disolución acuosa resultante, puede tirarse al drenaje diluyéndola con agua.Durante la neutralización se desprende calor y vapores, por lo que debe hacerse lentamente y en un lugarventilado adecuadamente.</p><p><b>ALMACENAMIENTO:</b>El hidróxido de sodio debe ser almacenado en un lugar seco, protegido de la humedad, agua,daño físico y alejado de ácidos, metales, disolventes clorados, explosivos, peróxidos orgánicos ymateriales que puedan arder facilmente.</p>';
}else if(numero==1){
var titulo="<h2><b>Fenolftaleína(C<sub>20</sub>H<sub>14</sub>O<sub>4</sub>)</b></h2>"
  var myHeading ='<div style="float:left;background-color:#e3dac9;border-style:groove;" align="center" ></p><img id="vaso" src="/images/inflamable.png" /><br><b><i>Inflamable</b></i><br><img  id="quimico" src="/images/diamantefenoftaleina.png"/><br><b><i>Peligrosidad del C<sub>20</sub>H<sub>14</sub>O<sub>4</sub></i></b></div>Indicador de pH en el rango de 8.2 a 12, reactivo de análisis para laboratorio.<p><b>Propiedades físicas y químicas</b></p><b>Estado físico: </b> Sólido<br><b>Color: </b>Blanco<br> <b>Olor: </b> Inodoro<br><b>Umbral olfativo: </b> No disponible<br><b>pH Intervalo de transición visual: </b> pH: 8 (incoloro) - pH: 12 (rojo-violeta)<br><b>pKa: </b> 9<br><b>Punto de fusión: </b> 262 °C<br><b>Punto de ebullición: </b> > 450 ºC<br><b>Punto de inflamación: </b> 8 - 13ºC<br><b>Tasa de evaporación: </b> No disponible<br><b>Límites de explosión: </b> No disponible<br><b>Presión de vapor a 20°C: </b> No disponible<br><b>Densidad relativa de vapor: </b> (aire=1)<br><b>Densidad relativa:</b> (agua=1) 1,299 <br><b>Solubilidad en agua:</b> < a 0,1% <p><b>Consejos de prudencia:</b></p>-.Mantener alejado de fuentes de calor, chispas, llama abierta o superficies calientes.<br>-.No fumar;Mantener el recipiente herméticamente cerrado.<br>-.Conectar a tierra/enlace equipotencial del recipiente y del equipo de recepción.<br>-.Utilizar un material eléctrico, de ventilación o de iluminación antideflagrante.<br>-.Utilizar únicamente herramientas que no produzcan chispas.<br>-.Llevar guantes/prendas/gafas/máscara de protección.<br>-.EN CASO DE CONTACTO CON LA PIEL (o el pelo): Quitarse inmediatamente las prendas contaminadas. Aclararse la piel con agua o ducharse.<br>-.En caso de incendio: Polvo químico seco, espuma para alcohol, dióxido de carbono o agua en forma de rocío.<br>';
}else if(numero==2){
var titulo="<h2><b>Vinagre blanco (Ácido acético al 3% Fórmula: C<sub>2</sub>H<sub>4</sub>O<sub>2</sub>)</b></h2>"
  var myHeading ='<div style="background-color:#c5ecf2;border-style:groove;"></p><H2><b>Vinagre blanco</b></H2><p>Es un líquido miscible en agua, con sabor agrio, que proviene de la fermentación acética del alcohol, como la de vino y manzana (mediante las bacterias Mycoderma aceti). El vinagre contiene una concentración que va del 3% al 5% de <b>ácido acético en agua</b>. Los vinagres naturales también contienen pequeñas cantidades de ácido tartárico y ácido cítrico.<p><b>Usos:</b></p>Se usa como conservante de alimentos en la industria alimenticia. El vinagre se emplea como artículo de limpieza para la superficie de cristales. Si se rocía con vinagre el parabrisas del coche no se producirá hielo o escarcha. Es útil para quitar las manchas de transpiración y el óxido de herramientas y tornillos. Es buen repelente de mosquitos, hormigas y también de pulgas en mascotas. Si aplicamos vinagre en una zona servirá como repelente para gatos. Debido a su carácter ácido, reacciona con el carbonato de calcio por lo que también es usado para la limpieza de cal en pequeños electrodomésticos como cafeteras; por el mismo motivo, puede dañar la caliza y el mármol.</p></div><br><div style="float:left;background-color:#e3dac9;border-style:groove;" align="center" ><img id="vaso" src="/images/irritacion_cutanea.webp" /><br><b><i>Toxicidad aguda</b></i><br><img id="vaso" src="/images/inflamable.png"/><br><b><i>Inflamable</b></i><br><img id="vaso" src="/images/corrosivo.png" /><br><b><i>Corrosión cutánea</b></i><br><img id="vaso" src="/images/Peligroso_por_aspiracion.png" /><br><b><i>Nocivo en caso<br>de inhalación</b></i><br><img id="vaso" src="/images/diamanteacidoacetico.png" /><br><b><i>Peligrosidad C<sub>2</sub>H<sub>4</sub>O<sub>2</sub></b></div><H2><b>Ácido acético( C<sub>2</sub>H<sub>4</sub>O<sub>2</sub>) </b></H2><p><b>Propiedades Físicas y Químicas: </b></p><b>Apariencia: </b>cristales<br><b>Densidad: </b>1049 kg/m3; 1,049 g/cm3<br><b>Masa molar: </b>60,021129372 g/mol<br><b>Punto de fusión: </b>290 K (17 ℃)<br><b>Punto de ebullición: </b>391,2 K (118 ℃)<br><b>Acidez: </b>4,76 pKa<br><b>Momento dipolar: </b>1,74 D<p></p><p><b>Indicaciones de peligro:</b><br><b>-.</b>Líquidos y vapores inflamables.<br><b>-.</b>Provoca quemaduras graves en la piel y lesiones oculares graves.<br><b>-.</b>Nocivo en caso de inhalación.</p><p><b>Consejos de prudencia:</b></p><b>-.</b>Mantener alejado de fuentes de calor, superficies calientes, chispas, llamas al descubierto y otras fuentes de ignición. No fumar.<br><b>-.</b>Usar guantes, ropa y equipo de protección para los ojos y la cara.<br><b>-.EN CASO DE INGESTIÓN:</b> Enjuagarse la boca. NO provocar el vómito.<br><b>-.EN CASO DE CONTACTO CON LA PIEL (o el pelo)</b>: Quitarse inmediatamente las prendas contaminadas. Enjuagar la piel con agua o ducharse.<br><b>-.EN CASO DE INHALACIÓN:</b> Transportar a la persona al aire libre y mantenerla en una posición que le facilite la respiración.<br><b>-.EN CASO DE CONTACTO CON LOS OJOS:</b> Aclarar cuidadosamente con agua durante varios minutos. Quitar las lentes de contacto, cuando estén presentes y pueda hacerse con facilidad. Proseguir con el lavado.<br><b>-.EN CASO DE INCENDIO:</b> Utilizar niebla de agua, espuma, polvo químico seco o dióxido de carbono (CO<sub>2</sub>) para la extinción.<br><b>-.</b>Almacenar en un lugar bien ventilado. Mantener fresco.<br><b>-.</b>Guardar bajo llave.<b>-.</b>Eliminar el contenido/ recipiente conforme a la reglamentación nacional/ internacional.';
}else if(numero==3){
var titulo="<h2><b>Ácido clorhídrico(HCl)</b></h2>"
  var myHeading ='<div style="float:left;background-color:#e3dac9;border-style:groove;" align="center" ></p><img id="vaso" src="/images/corrosivo.png" /><br><b><i>Corrosivo</b></i><br><img id="vaso" src="/images/irritacion_cutanea.webp" /><br><b><i>Toxicidad aguda</b></i><br><img title="alcohol isopropilico" id="quimico" src="/images/diamanteacidoclorhidrico.png"/><br><b><i>Peligrosidad del HCl</i></b></div><p><b>Propiedades físicas y químicas:</b></p><b>Apariencia: </b>líquido incoloro o levemente amarillo<br><b>Densidad: </b>1190 (solución 37 %),1160 solución 32 %,1120 solución 25 % kg/m3; 1,12 g/cm3<br><b>Masa molar: </b>36.458 g/mol<br><b>Punto de fusión: </b>247 K (-26 ℃)<br><b>Punto de ebullición: </b>321 K (48 ℃)<br><b>Viscosidad: </b>1.9<br><b>Acidez: </b>-6.21​ pKa<br><br><b>Indicaciones de peligro:</b><b>-.</b>Provoca quemaduras de graves en la piel y lesiones oculares graves;<br><b>-.</b>Líquidos y vapores inflamables<br><b>-.</b>Nocivo en caso de inhalación<p><b>Consejos de prudencia: </b></p><b>-.</b>Mantener alejado de fuentes de calor, superficies calientes, chispas, llamas al descubierto y otras fuentes de ignición. No fumar.<br><b>-.</b>Usar guantes, ropa y equipo de protección para los ojos y la cara.<br><b>-.EN CASO DE INGESTIÓN: </b> Enjuagarse la boca. NO provocar el vómito.<br><b>-.EN CASO DE CONTACTO CON LA PIEL (o el pelo): </b> Quitarse inmediatamente las prendas contaminadas. Enjuagar la piel con agua o ducharse.<br><b>-.EN CASO DE INHALACIÓN: </b> Transportar a la persona al aire libre y mantenerla en una posición que le facilite la respiración.<br><b>-.EN CASO DE CONTACTO CON LOS OJOS: </b> Aclarar cuidadosamente con agua durante varios minutos. Quitar las lentes de contacto, cuando estén presentes y pueda hacerse con facilidad. Proseguir con el lavado.<br><b>-.EN CASO DE INCENDIO: </b> Utilizar niebla de agua, espuma, polvo químico seco o dióxido de carbono (CO₂) para la extinción.<br><b>-.</b>Almacenar en un lugar bien ventilado. Mantener fresco.<br><b>-.</b>Eliminar el contenido/ recipiente conforme a la reglamentación nacional/ internacional.<br>';
}
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
