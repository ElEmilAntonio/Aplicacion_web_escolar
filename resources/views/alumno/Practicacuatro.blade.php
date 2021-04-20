
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
  <a style="color: #ffdd42">
   <button type="submit" class="btn btn-secondary" method="POST" onclick = "ActivarInformacion();" href="javascript:void(0);" title="Activar Información" ><i class="fa fa-info-circle"></i></a>
  </div>
 <div  class="col-sm-10">
  <a class="row justify-content-center">
     <button type="submit" class="btn btn-warning " onclick="location.href='/Reaccion_quimica/1'" method="POST">
    <i   class="fa fa-refresh"></i> Reiniciar
   </button> 
 <button type="button" class="btn btn-info" onclick = "pasos();" href="javascript:void(0);">
   <i class="fa fa-sort-numeric-asc"></i> Pasos
 </button>
 <button type="submit" disabled id="botonsiguiente"class="btn btn-success" method="POST" onclick="location.href='/Reaccion_quimica/2'" method="POST">
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
 <div  class="col-sm-2">
    <a class="row justify-content-right">
    <div id="divdes" title="dextrosa" class="dextrosa" onclick = "ponerdextrosa();" href="javascript:void(0);" >
  <img id="iddextrosa" src="/images/practica4/NPo.gif" alt="caida"  width=150 height=150  /></div>
    </a>
  </div>
  <div  class="col-sm-2">
    <a class="row justify-content-right">
    <div class="sosa" onclick = "ponersosa();" href="javascript:void(0);" title="Hidróxido de sodio NaOH al 90%">
  <img id="idsosa" src="/images/practica4/hidroxidodesodio.png" alt="caida"  width=150 height=150  /></div>
    </a>
  </div>
  <div  class="col-sm-2">
    <a class="row justify-content-center">
    <div class="gotero" onclick = "acciongota();" href="javascript:void(0);" title="Azul de metileno al 2%">
  <img id="idgotero" src="/images/practica4/gotero.png" alt="caida"  width=150 height=150  /></div>
    </a>
  </div>
   <div  class="col-sm-2">
    <a class="row justify-content-center">
    <div class="vertiragua" onclick = "vertirelagua();" href="javascript:void(0);" title="Agua destilada templada 100ml (30-37°C)" >
  <img id="idvertiragua" src="/images/practica4/vertiragua.png" alt="caida"  width=150 height=150  /></div>
    </a>
  </div>
  <div  class="col-sm-2">
    <a class="row justify-content-end">
    <div class="matraz" onclick = "ponermatraz();" href="javascript:void(0);" title="Matraz de 100ml">
  <img id="idmatraz" src="/images/practica4/matraz.png" alt="caida"  width=150 height=150  /></div>
    </a>
  </div>
  <div  class="col-sm-2">
    <a class="row justify-content-end">
    <div class="taponmatraz" onclick = "ponercorcho();" href="javascript:void(0);" title="Tapon matraz">
  <img id="idtaponmatraz" src="/images/practica4/matrazcontapon.png" alt="caida"  width=150 height=150  /></div>
    </a>
  </div>
</div>
 <a class="row justify-content-center">
    <div class="vaso" onclick = "accionvaso();" href="javascript:void(0);" title="Vaso de precipitación de 250ml">
  <img id="vaso" src="/images/practica33/vaso.png" alt="caida"  width=200 height=200/></div>
    </a>
    
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

<script src="https://cdn.jsdelivr.net/npm/animejs@3.0.1/lib/anime.min.js"></script>
<script type="text/javascript">
var informacion=false;
var dextrosa=false;
var sosa=false;
var gota=0;
var vertiragua=false;
var matraz=false;
var tapon=false;
var combinado=false;
var combinacion=1;
var revolver=1;
var ingredientescompletos=false;
var probarmezcla=1;
var matrazlleno=false;
var taponpuesto=false;

function habilitarboton(){
if(ingredientescompletos==true){
  document.getElementById("botonsiguiente").disabled = false; 
}else{
  document.getElementById("botonsiguiente").disabled = true; 
}
}
function pasos(){
  var titulo="<h2><b>Pasos del experimento llamado Botella Azul</b></h2>"
  var myHeading ='<div style="float:left;background-color:#e3dac9;border-style:groove;"><p><b>Materiales y reactivos</b></p><p><b>-.</b>Vaso de precipitado</p><p><b>-.</b>Matraz</p><p><b>-.</b>tapon de matraz</p><p><b>-.</b>agitador</p><p><b>-.</b>100ml de agua templada</p><p><b>-.</b>6gr de dextrosa</p><p><b>-.</b>3gr de Hidróxido de sodio</p><p><b>-.</b>Azul de metileno al 2%</p></div><p><b>Fundamento científico</b></p><p>Este experimento se basa en el comportamiento reducción-oxidación (redox) de una molécula ampliamente utilizada como colorante en la actualidad y antiguamente usada como antiséptico: el azul de metileno. Este compuesto presenta en su forma oxidada un color azul muy intenso, mientras que en su forma reducida es incoloro.Las reacciones redox son aquellas donde hay movimiento de electrones desde una sustancia que cede electrones (reductor) a una sustancia que capta electrones (oxidante).</p><p>La sustancia que cede electrones, se oxida y la que gana electrones, se reduce.</p><p>En la práctica se emplea también dextrosa como reductor y el oxígeno del aire como oxidante. En una mezcla en agua con la dextrosa y azul de metileno se produce la decoloración de la mezcla según tiene lugar una reacción redox</p><p>Sin embargo, cuando este equilibrio se rompe por la agitación de la mezcla (entra oxígeno en el medio) se produce la reoxidación del azul de leucometileno, volviendo al color azul inicial. Cuando cesa la agitación y la incorporación de oxígeno a la mezcla, la reacción de reducción del azul de metileno vuelve a producirse (siempre y cuando haya exceso de dextrosa) y la disolución vuelve a perder el color.</p><p><b>Pasos:</b></p><p><b>1.</b>añadimos 6gr de dextrosa al vaso de precipitado<br><b>2.</b>despues le añadimos 3gr de Hidróxido de sodio<br><b>3.</b>se vierte con cuidado los 100ml de agua templada<br><b>4.</b>mezclamos con el agitador asta que este completamente disuelto podran notar que la mezcla de estar ligeramente gris se tornara transparente<br><b>5.</b>añadimos 2 gotas de azul de metileno al 2%<br><b>6.</b>agitamos de nuevo la mezcla, durante el agitado se notara como la mezcla se vuelve azul y al terminarlo de mezclar este lentamente volvera a ser incoloro<br><b>7.</b>ponemos la mezcla en el matraz<br><b>8.</b>le ponemos el tapon al matraz<br><b>9.</b>agitamos el matraz hasta que la mezcla sea completamente azul asegurandose de sujetar firmemente el tapon<br><b>10.</b>dejamos reposar el matraz para que vuelva a su estado incoloro(los ultimos dos pasos podran repetirse varias veces)';
   $("#modal-title").html(titulo); 
     $("#modal-body").html(myHeading);  
var modal = document.getElementById("modal"); 
modal.style.display = "block";     
}
function ActivarInformacion(){
if(informacion==false){
  informacion=true;
  alert("Estas en modo de información: dale click a los componentes y mostrara información relevante a esta");
}else{
  informacion=false;
  alert("Saliste de modo de información ya puedes interactuar con los componentes");
}  
}

function ponerdextrosa(){
 if(informacion==false){ 
if(dextrosa==false){
  var animacionvasoida = anime({
    targets: '.vaso',translateX:-500,autoplay: true });
 document.getElementById('vaso').src = "/images/practica33/llenarnpo.gif";
  setTimeout(function(){var animacionvasoregreso = anime({
    targets: '.vaso',translateX:0,autoplay: true});},1250);dextrosa=true;}
}else{
  var titulo="<h2><b>Dextrosa(C<sub>6</sub>H<sub>12</sub>O<sub>6</sub>)</b></h2>"
  var myHeading ='<div style="float:left;background-color:#e3dac9;border-style:groove;" align="center" ><img id="vaso" src="/images/diamantedextrosa.png" /><br><small><b><i>"Peligrosidad" C<sub>6</sub>H<sub>12</sub>O<sub>6</sub></i></b></small><p></div><p>Es un hidrato de carbono. Incluimos en este grupo el almidón, los azúcares (sacarosa, glucosa o dextrosa y lactosa) y los ácidos orgánicos (cítrico, fumárico y propiónico). Como se ve la dextrosa es glucosa, nada mas que es el nombre que le da la industria farmacéutica o alimenticia en sus productos; incluso en algunos países la palabra glucosa no existe y se utiliza “dextrosa” por ella.</p><p>Fórmula semidesarrollada:<b>C6H12O6</b></p><p>Densidad:<b>1.56 g/cm 3</b></p><p>Masa molecular UMA Unidad de Masa Atómica, Dalton:<b>180.16 g/mol</b></p><p>Punto de fusión Temperatura del momento en el cual una sustancia pasa del estado sólido al estado líquido:<b>146 °C</b></p><p><b>Efectos potenciales para la salud</b></p><b>Inhalación: </b> No se espera que sea un peligro para la salud.<br><b>Ingestión: </b> Extremadamente grandes dosis orales pueden producir trastornos gastrointestinales.<br><b>Contacto con la piel: </b> No se esperan efectos adversos.<br><b>Contacto con los ojos: </b> No se esperan efectos adversos pero el polvo puede causar irritación mecánica.<br><br><p><b>MEDIDAS DE PRIMEROS AUXILIOS</b></p><b>Inhalación: </b> No se requieren medidas de primeros auxilios<br><b>Ingestión: </b> No se espera que se requieran primeros auxilios<br><b>Contacto con la piel: </b> No se espera que se requieran primeros auxilios<br><b>Contacto con los ojos: </b> Lavar abundantemente con agua corriente. Obtener consejo médico si se desarrolla irritación.';
   $("#modal-title").html(titulo); 
     $("#modal-body").html(myHeading);  
var modal = document.getElementById("modal"); 
modal.style.display = "block";
}
}
function ponersosa(){
if(informacion==false){
if(dextrosa==true){
if(sosa==false){
  var animacionvasoida = anime({targets: '.vaso',translateX:-270,autoplay: true});
var animacionsosa = anime({targets: '.sosa', rotate: {value: 180,duration: 300,easing: 'easeInOutSine'
  } });
 document.getElementById('vaso').src = "/images/practica4/ponersosa.gif";
  setTimeout(function(){var animacionvasoregreso = anime({targets: '.vaso',translateX:0,autoplay: true});
  var animacionsosa = anime({targets: '.sosa',rotate: {value: 360,duration: 300,easing: 'easeInOutSine'}});},1250);
 sosa=true;
}
}
}else{
var titulo="<h2><b>Hidróxido de sodio</b>    <i class='fa fa-warning'></i>  <b>ATENCIÓN</b>  <i class='fa fa-warning'></i></h2>"
  var myHeading ='<div style="float:left;background-color:#e3dac9;border-style:groove;" align="center" ><img id="vaso" src="/images/Corrosivo.png" /><br><small><b><i>Corrosivo</i></b></small><p></p><img id="vaso" src="/images/diamantehidroxidosodio.png" /><br><small><b><i>Peligrosidad del NaOH</i></b></small><br><img id="vaso" src="/images/practica4/hidroxidodesodio.png" style="float:left;" width=150 height=150/></div><p>hidróxido sódico o hidrato de sodio, también conocido como soda cáustica, es un hidróxido cáustico usado en la industria (principalmente como una base química) en la fabricación de papel, tejidos, y detergentes. Además, se utiliza en la industria petrolera en la elaboración de lodos de perforación base agua. A nivel doméstico, son reconocidas sus utilidades para desbloquear tuberías de desagües de cocinas y baños, fabricar jabón casero, entre otros.A temperatura ambiente, el hidróxido de sodio es un sólido blanco cristalino sin olor que absorbe la humedad del aire (higroscópico). Es una sustancia manufacturada. Cuando se disuelve en agua o se neutraliza con un ácido libera una gran cantidad de calor que puede ser suficiente como para encender materiales combustibles. El hidróxido de sodio es muy corrosivo. Generalmente se usa en forma sólida o como una solución de 50%.</p><p>Fórmula:<b>NaOH</b></p><p>Densidad:<b>2100 kg/m3; 2,1 g/cm3</b></p><p>Masa molecular UMA Unidad de Masa Atómica, Dalton:<b>39,99713 g/mol</b></p><p>Punto de fusión Temperatura del momento en el cual una sustancia pasa del estado sólido al estado líquido:<b>318 ℃</b></p><p><b>MANEJO:</b></p><p><b>Equipo de protección personal:</b>Para el manejo del NaOH es necesario el uso de lentes de seguridad, bata y guantes deneopreno, nitrilo o vinilo. Siempre debe manejarse en una campana y no deben utilizarse lentes decontacto al trabajar con este compuesto.En el caso de trasvasar pequeñas cantidades de disoluciones de sosa con pipeta, utilizar unapropipeta, NUNCA ASPIRAR CON LA BOCA.</p><p><b>RIESGOS:</b>Riesgos de fuego o explosión:Este compuesto no es inflamable sin embargo, puede provocar fuego si se encuentra en contactocon materiales combustibles. Por otra parte, se generan gases inflamables al ponerse en contacto conalgunos metales. Es soluble en agua generando calor.</p><p><b>Riesgos a la salud:</b></p><p>El hidróxido de sodio es irritante y corrosivo de los tejidos. Los casos mas comunes de accidenteson por contacto con la piel y ojos, así como inhalación de neblinas o polvo.Inhalación: La inhalación de polvo o neblina causa irritación y daño del tracto respiratorio. En casode exposición a concentraciones altas, se presenta ulceración nasal.A una concentración de 0.005-0.7 mg/m3, se ha informado de quemaduras en la nariz y tracto. Enestudios con animales, se han reportado daños graves en el tracto respiratorio, después de unaexposición crónica.</p><p><b>Contacto con ojos:</b> El NaOH es extremadamente corrosivo a los ojos por lo que las salpicadurasson muy peligrosas, pueden provocar desde una gran irritación en la córnea, ulceración, nubosidades y,finalmente, su desintegración. En casos mas severos puede haber ceguera permanente, por lo que losprimeros auxilios inmediatos son vitales.</p><p><b>Contacto con la piel:</b> Tanto el NaOH sólido, como en disoluciones concentradas es altamentecorrosivo a la piel.Se han hecho biopsias de piel en voluntarios a los cuales se aplicó una disolución de NaOH 1Nen los brazos de 15 a 180 minutos, observándose cambios progresivos, empezando con disolución decélulas en las partes callosas, pasando por edema y llegar hasta una destrucción total de la epidermis en60 minutos. Las disoluciones de concentración menor del 0.12 % dañan la piel en aproximadamente 1hora. Se han reportado casos de disolución total de cabello, calvicie reversible y quemaduras del cuerocabelludo en trabajadores expuestos a disoluciones concentradas de sosa por varias horas. Por otro lado,una disolución acuosa al 5% genera necrosis cuando se aplica en la piel de conejos por 4 horas.</p><p><b>Ingestión:</b> Causa quemaduras severas en la boca, si se traga el daño es, además, en el esófagoproduciendo vómito y colapso.</p><p><b>Carcinogenicidad:</b> Este producto está considerado como posible causante de cáncer de esófago,aún después de 12 a 42 años de su ingestión. La carcinogénesis puede deberse a la destrucción deltejido y formación de costras, mas que por el producto mismo.</p><p><b>Mutagenicidad:</b> Se ha encontrado que este compuesto es no mutagénico.</p><p><b>Peligros reproductivos:</b> No hay imformación disponible a este respecto.</p><p><b>ACCIONES DE EMERGENCIA:</p></b><p><b>Primeros Auxilios:</p></b><p><b>Inhalación:</b> Retirar del área de exposición hacia una bien ventilada. Si el accidentado seencuentra inconciente, no dar a beber nada, dar respiración artificial y rehabilitación cardiopulmonar. Si seencuentra conciente, levantarlo o sentarlo lentamente, suministrar oxígeno, si es necesario.</p><p><b>Ojos:</b> Lavar con abundante agua corriente, asegurándose de levantar los párpados, hastaeliminación total del producto.</p><p><b>Piel:</b> Quitar la ropa contaminada inmediatamente. Lavar el área afectada con abundante aguacorriente.</p><p><b>Ingestión:</b> No provocar vómito. Si el accidentado se encuentra inconciente, tratar como en el casode inhalación. Si está conciente, dar a beber una cucharada de agua inmediatamente y después, cada10 minutos.</p>EN TODOS LOS CASOS DE EXPOSICION, EL PACIENTE DEBE SER TRANSPORTADO ALHOSPITAL TAN PRONTO COMO SEA POSIBLE.<p><b>Control de fuego:</b>Pueden usarse extinguidores de agua en las áreas donde haya fuego y se almacene NaOH,evitando que haya contacto directo con el compuesto.</p><p><b>Fugas o derrames:</b>En caso de derrame, ventilar el área y colocarse la ropa de protección necesaria como lentes deseguridad, guantes, overoles quimicamente resistentes, botas de seguridad. Mezclar el sólido derramadocon arena seca, neutralizar con HCl diluido, diluir con agua, decantar y tirar al drenaje. La arena puededesecharse como basura doméstica.Si el derrame es de una disolución, hacer un dique y neutralizar con HCl diluido, agregar grancantidad de agua y tirar al drenaje.</p><p> <b>Desechos:</b>Para pequeñas cantidades, agregar lentamente y con agitación, agua y hielo. Ajustar el pH aneutro con HCl diluido. La disolución acuosa resultante, puede tirarse al drenaje diluyéndola con agua.Durante la neutralización se desprende calor y vapores, por lo que debe hacerse lentamente y en un lugarventilado adecuadamente.</p><p><b>ALMACENAMIENTO:</b>El hidróxido de sodio debe ser almacenado en un lugar seco, protegido de la humedad, agua,daño físico y alejado de ácidos, metales, disolventes clorados, explosivos, peróxidos orgánicos ymateriales que puedan arder facilmente.</p>';
   $("#modal-title").html(titulo); 
     $("#modal-body").html(myHeading);  
var modal = document.getElementById("modal"); 
modal.style.display = "block"; 
}
}
function vertirelagua(){
if(informacion==false){
if(vertiragua==false){  
if(sosa==true){
  var animacionvertir = anime({ targets: '.vaso',translateX:50,autoplay: true});
   document.getElementById('idvertiragua').src = "/images/practica4/vertiragua.gif";
   document.getElementById('vaso').src = "/images/practica4/diluir.gif";
      setTimeout(function(){
var animacionvasoregreso = anime({targets: '.vaso',translateX:0,autoplay: true });
document.getElementById('vaso').src = "/images/practica4/revolver/revolver-1.png.png";
},1000);
      vertiragua=true;
}
}
}else{
 var titulo="<h2><b>Agua destilada(H<sub>2</sub>O)</b></h2>"
  var myHeading ='<div style="float:left;background-color:#e3dac9;border-style:groove;" align="center" ></p><img id="vaso" src="/images/diamanteagua.png" /><br><b><i>Peligrosidad H<sub>2</sub></i></b>O</div><p>El agua destilada es aquella sustancia cuya composición se basa en la unidad de moléculas de H<sub>2</sub>O y ha sido purificada o limpiada mediante destilación.</p><p><b>OLOR Y APARIENCIA: </b> Líquido incoloro e inodoro<br><b>FORMULA: </b> H<sub>2</sub>O<br><b>MASA MOLAR: </b> 18,02 g/mol</br><b>GRAVEDAD ESPECÍFICA: </b> 0,9982 a 20 °C<br><b>SOLUBILIDAD EN AGUA Y OTROS DISOLVENTES: </b> No aplicable<br><b>PUNTO DE FUSIÓN: </b> 0 °C<br><b>PUNTO DE EBULLICIÓN: </b> 100 °C<br><b>PH: </b> (Solución acuosa al 1%) 4,5 - 8<br><b>ESTADO DE AGREGACIÓN A 25°C Y 1 ATM. Líquido</p><p><b>Riesgos y efectos por exposición</b><b>Inhalación: </b>El producto no es peligroso<br><b>Ingestión: </b>El producto no es peligroso<br><b>Contacto con los ojos: </b>El producto no es peligroso<br><b>Contacto con la piel: </b>El producto no es peligroso<br></p>';
   $("#modal-title").html(titulo); 
     $("#modal-body").html(myHeading);  
var modal = document.getElementById("modal"); 
modal.style.display = "block";       
}
}
function accionvaso(){
if(taponpuesto==false){
if(ingredientescompletos==false){
if(gota==0){
if(vertiragua==true){
if(revolver<=14){
 document.getElementById('vaso').src = "/images/practica4/revolver/revolver-"+revolver+".png.png";
 revolver++; 
}else{
   document.getElementById('vaso').src = "/images/practica4/revolver/transparente.gif";
   combinado=true;
}}}
if(gota>=2){
if(combinacion<=14){
document.getElementById('vaso').src = "/images/practica4/combinacion/combinacion-"+combinacion+".png.png"; 
 combinacion++;
}else{
document.getElementById('vaso').src = "/images/practica4/combinacion/volvertransparente.gif"; 
ingredientescompletos=true;
}}}else{
if(probarmezcla<=14){document.getElementById('vaso').src = "/images/practica4/combinacion/combinacion-"+probarmezcla+".png.png"; 
probarmezcla++;
}else{
document.getElementById('vaso').src = "/images/practica4/combinacion/volvertransparente.gif"; 
probarmezcla=1;
}}}else{
document.getElementById('vaso').src = "/images/practica4/agitarcontapon.gif"; 
anime({targets: '.vaso',translateX: 50,loop: 3,direction: 'reverse',easing: 'easeInOutSine'});
}
habilitarboton();
}
////////////////////////////
////////////////////////////
////////////////////////////
function acciongota(){
if(informacion==false){
if(combinado==true){
if(gota<2){
document.getElementById('idgotero').src = "/images/practica4/elgotero.gif";
var animacionvertir = anime({targets: '.vaso',translateX:-100,autoplay: true});
  setTimeout(function(){
document.getElementById('vaso').src = "/images/practica4/primeragota.gif"; 
},1000);
 gota++; 
}
}
}else{
  var titulo="<h2><b>Azul de metileno</b></h2>"
  var myHeading ='<div style="float:left;background-color:#e3dac9;border-style:groove;" align="center" ></p><img id="vaso" src="/images/irritacion_cutanea.webp" /><br><b><i>Irritación baja</i></b><br><img id="vaso" src="/images/diamanteazulmetileno.png" /><br><small><b><i>Peligrosidad del C<sub>13</sub>H<sub>18</sub>N<sub>3</sub>CIS</i></b></small></div><p>Esta sustancia tiene forma de cristales o polvo cristalino y presenta un color verde oscuro, con brillo bronceado. Es inodoro y estable al aire. Sus disoluciones en agua o en alcohol son de color azul intenso. Es fácilmente soluble en el agua y en cloroformo; también es moderadamente soluble en alcohol.</p><p>Fórmula semidesarrollada:<b>C<sub>13</sub>H<sub>18</sub>N<sub>3</sub>CIS</b></p><p>Densidad:<b>1.9 g/cm3</b></p><p>Masa molecular UMA Unidad de Masa Atómica, Dalton:<b>373.9 g/mol</b></p><p>Punto de fusión Temperatura del momento en el cual una sustancia pasa del estado sólido al estado líquido:<b>190 °C</b></p><p><b>Precauciones:</b></p><p><b>Manejo:</b> Evítese el contacto con los ojos y piel. Evítese la formación de polvo y aerosoles. Debe disponer una extracción adecuada en aquellos lugares donde se forma polvo. Conservar alejado de toda llama o fuente de chispas. No fumar. Tomar medidas para impedir la acumulación de cargas electrostáticas.</p><p><b>Almacenamiento Seguro:</b> Almacenar en un lugar fresco. Conservar el envase herméticamente cerrado en un lugar seco y bien ventilado.</p>';
   $("#modal-title").html(titulo); 
     $("#modal-body").html(myHeading);  
var modal = document.getElementById("modal"); 
modal.style.display = "block";
}}
function ponermatraz(){
 if(ingredientescompletos==true){
  document.getElementById('idvertiragua').src = "/images/practica4/vertiraguavacio.png";
  document.getElementById('vaso').src = "/images/practica4/llenarmatras.gif";
  var animacionvertir = anime({targets: '.vaso',translateX:250,autoplay: true});
  document.getElementById('idmatraz').src = "/images/practica4/vertiragua.gif";
   setTimeout(function(){
var animacionvertir = anime({targets: '.vaso',translateX:0,autoplay: true});
},1000);
   matrazlleno=true;
 }}
 
function ponercorcho(){
if(taponpuesto==false){
if(matrazlleno==true){
taponpuesto=true;
 var animacionvertir = anime({ targets: '.vaso',translateX:500,autoplay: true});
 setTimeout(function(){document.getElementById('vaso').src = "/images/practica4/ponertapon.gif";
},500);
 ponertapon=true;
 setTimeout(function(){var animacionvertir = anime({targets: '.vaso',translateX:0,autoplay: true});});
}}}

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
         <div class="modal-body text-justify" id= "modal-body">
      </div>
       </div>
      <footer class="w3-container w3-red">
        <p></p>
      </footer>
    </div>
  </div>
