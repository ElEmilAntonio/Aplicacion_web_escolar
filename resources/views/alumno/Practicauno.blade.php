@extends('layouts.appAlumno')

@section('content')
@if ($errors->any())
<div class="alert alert-danger">
  <ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif

<body>
<div class="container">
	 <a class="row justify-content-center">
	 <h1><b>MEDIDAS DE SEGURIDAD EN EL LABORATORIO</b></h1>	
	 </a>
 <a class="row justify-content-center">
 <button onclick="document.getElementById('id01').style.display='block'" class="w3-button" style="background-color: transparent; border:0; margin:10px">
<img type="image" id="myimage" style="height:120px;width:180px;" src="{{url('images/libro.png')}}"/><br> <b>Reglamento del laboratorio de química</b></br></button>
</a>
 <a class="row justify-content-center">
 <button onclick="document.getElementById('id02').style.display='block'" class="w3-button" style="background-color: transparent; border:0; margin:10px" >
<img type="image" id="myimage" style="height:120px;width:120px;" src="{{url('images/rombo-de-seguridad.png')}}"/><br> <b>Diamante de seguridad</b></br></button>
<button  onclick="document.getElementById('id03').style.display='block'" class="w3-button" style="background-color: transparent; border:0; margin:10px" >
<img type="image" id="myimage" style="height:120px;width:120px;" src="{{url('images/corrosivo.png')}}"/><br> <b>Corrosivo</b></br></button>
<button onclick="document.getElementById('id04').style.display='block'" class="w3-button" style="background-color: transparent; border:0; margin:10px" >
<img type="image" id="myimage" style="height:120px;width:120px;" src="{{url('images/explosivo.png')}}"/><br> <b>Explosivo</b></br></button>
<button onclick="document.getElementById('id05').style.display='block'" class="w3-button" style="background-color: transparent; border:0; margin:10px" >
<img type="image" id="myimage" style="height:120px;width:120px;" src="{{url('images/comburente.png')}}"/><br> <b>Comburente</b></br></button>
<button onclick="document.getElementById('id06').style.display='block'"  class="w3-button" style="background-color: transparent; border:0; margin:10px" >
<img type="image" id="myimage" style="height:120px;width:120px;" src="{{url('images/inflamable.png')}}"/><br> <b>Inflamable</b></br></button>	
  </a>
  <a class="row justify-content-center">
  	 <button onclick="document.getElementById('id07').style.display='block'"  class="w3-button" style="background-color: transparent; border:0; margin:10px" >
<img type="image" id="myimage" style="height:120px;width:120px;" src="{{url('images/gas.png')}}"/><br> <b>Gas</b></br></button>
<button onclick="document.getElementById('id08').style.display='block'"  class="w3-button" style="background-color: transparent; border:0; margin:10px" >
<img type="image" id="myimage" style="height:120px;width:120px;" src="{{url('images/irritacion_cutanea.webp')}}"/><br> <b>Irritación cutanea</b></br></button>
<button onclick="document.getElementById('id09').style.display='block'" class="w3-button" style="background-color: transparent; border:0; margin:10px" >
<img type="image" id="myimage" style="height:120px;width:120px;" src="{{url('images/toxicidad_aguda.png')}}"/><br> <b>Tóxicidad aguda</b></br></button>
<button onclick="document.getElementById('id10').style.display='block'"  class="w3-button" style="background-color: transparent; border:0; margin:10px" >
<img type="image" id="myimage" style="height:120px;width:120px;" src="{{url('images/Peligroso_por_aspiracion.png')}}"/><br> <b>Peligro por aspiración</b></br></button>
<button onclick="document.getElementById('id11').style.display='block'" class="w3-button" style="background-color: transparent; border:0; margin:10px" >
<img type="image" id="myimage" style="height:120px;width:120px;" src="{{url('images/peligroso_para_el_medio_ambiente.png')}}"/><br> <b>Peligro al medio ambiente </b></br></button>
  </a>
</div>
   <button type="submit" class="btn btn-success" method="POST" onclick="location.href='/Medidas_de_seguridad_en_el_laboratorio/2'" method="POST">
                Terminar Practica
            </button>
<!--REGLAMENTO DEL LABORATORIO-->
<!--REGLAMENTO DEL LABORATORIO-->
<!--REGLAMENTO DEL LABORATORIO-->
<!--REGLAMENTO DEL LABORATORIO-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style>
.city {display:none}
</style>
<body>
	<!--REGLAMENTO DEL LABORATORIO-->
<!--REGLAMENTO DEL LABORATORIO-->
<!--REGLAMENTO DEL LABORATORIO-->
<!--REGLAMENTO DEL LABORATORIO-->
<div id="id01" class="w3-modal">
 <div class="w3-modal-content w3-card-4 w3-animate-zoom">
  <header class="w3-container w3-amber"> 
   <span onclick="document.getElementById('id01').style.display='none'" 
   class="w3-button w3-amber w3-xlarge w3-display-topright">&times;</span>
   <h2>Reglamento del laboratorio</h2>
  </header>

  <div class="w3-bar w3-border-bottom">
   <button class="tablink w3-bar-item w3-button" onclick="openCity(event, 'Pag1')">Pag.1</button>
   <button class="tablink w3-bar-item w3-button" onclick="openCity(event, 'Pag2')">Pag.2</button>
   <button class="tablink w3-bar-item w3-button" onclick="openCity(event, 'Pag3')">Pag.3</button>
   <button class="tablink w3-bar-item w3-button" onclick="openCity(event, 'Pag4')">Pag.4</button>
   <button class="tablink w3-bar-item w3-button" onclick="openCity(event, 'Pag5')">Pag.5</button>
   <button class="tablink w3-bar-item w3-button" onclick="openCity(event, 'Pag6')">Pag.6</button>
  </div>
  
  <div id="Pag1" class="w3-container city">
   <h2>Página 1</h2>
   <p>1. Sin excepción alguna, al ingresa a hacer uso de las instalaciones del laboratorio, deberá registrar el horario de entrada en la bitácora colocada en la mesa del profesor, así como al terminar su sesión registrar su hora de salida.</p>
   <p>2. Solo se autorizará el uso del laboratorio en horas señaladas en el horario establecido al inicio de cada periodi escolar</p>
    <p>3. las salidas del laboratoio siempre deben estar libres de obstáculos, puertas abiertas, accesibles y ser utilizadas ante cualquier eventualidad.</p>
    <p>4. En todo momento se deberá presentar una conducta apropiada dentro del laboratorio, respetando el trabajo de sus compañeros</p>
    <p>5. Durante el tiempo que el usuario trabaje en el laboratorio, el jefe de éste tiene toda la autoridad para hacer llamdas de atención al usuario por doncuta no apropiada, mal manejo de material, equipo e instalaciones del laboratorio</p>
  </div>
  
  <div id="Pag2" class="w3-container city">
   <h2>Página 2</h2>
   <p>6. Sobre las mesas de trabajo del alumno, únicamente habrá el material requerido por la práctica de laboratorio. Ningún objeto personal podrá estar ahí</p>
   <p>7. Atienda la señalética instalada en el interior del laboratorio, ya que las hay de advertencia, prohibición, obligación y de salvamento y socorro</p>
   <p>8. Es obligatorio mantener el área de trabajo limpia y sin artículos personales</p>
   <p>9. Nunca se debe solplar al interior de lso tubos de ensayo o cualquier otro recipiente</p>
   <p>10. Existe un plan y un programa de prácticas, por lo que no se requiere ractivos químicos y material de laboratorio extra para la realización de ésta</p>
   <p>11. El material que es prestado a los alumnos se debe lavar y secar antes y después de ser usado</p>
  </div>

  <div id="Pag3" class="w3-container city">
   <h2>Página 3</h2>
   <p>12. Sin excepción alguna al ingresar a hacer uso de las instalaciones del laboratorio, deberá utilizar bata de algodón en buen estado, que cubra hasta las rodillas, de manga angosta, mateniéndola cerrada durante toda la sesión, calzado bajo y cerrado</p>
   <p>13. Los instrumentos que se empleen en la realización del trabajo experimenta, deberán dejarse completamente apagados, limpios y cubiertos, así como colocados en el área destinada para su resguardo</p>
   <p>14. Cualquier sustancia química que alcance el cuerpo, se deberá enjuagar durante 15 minutos con agua fría. Si la sustancia química salpica la cara, lavar solo con agua y asegurarse que la mayor parte de la sustencia química se ha removido. Si sospechaque los ojos fueron afectados, debe parpadear continuamente mientras enjuaga los ojos, con el propósito de ayudar a remover la sustancia química.</p>
   <p>15. Evitar el contacto de productos químicos con la piel, especialmente los que sean tóxicos o corrosivos, usando guantes desechables, ya que algunos productos se abosrben a través de la piel y existe peligro de envenenamiento por esta vía</p>
   <p>16. No usar la boca, utilizar siempre un dispositivo auxiliar (perilla) para emplear una pipeta, ni importa qué producto sea</p>
  </div>
   <div id="Pag4" class="w3-container city">
    <h2>Página 4</h2>
    <p>17. Al usar mecheros se debe evitar el uso de gel,aerosol, etc., ta que son materiales flamables t regular la flama a llama azul</p>
    <p>18. Retirar todos los accesorios personales ornamentales, como anillos, pulseras, collares, gorras, sombreros y otros que puedieran implicar algún riesgo de accidentes mecánicos, químicos y por fuego</p>
    <p>19. Evite el shock eléctrico. <b>No</b> manipule objetos eléctricos con las manos húmedas o cuando se encuentre dentro o cerca del agua</p>
    <p>20. El trabajo con materiales volátiles en presencia de calor causa expansión y el confinamiento de la expansión de fases resulta en explosión</p>
    <p>21. Siempre limpie con agua el exterior de botellas que contienen ácido antes de abrirlas</p>
    <p>22. Conserve los recipientes con ácido en bandejas de vidrio o cerámica que tengna un volumen suficiente para contener todo el ácido en caso de que el recipiente se rompa</p>
     </div>
     <div id="Pag5" class="w3-container city">
     	<h2>Página 5</h2>
     	<p>23. Nunca se debe verter agua sobre un ácido conentrado, lo corecto es agregar muy despacio el ácido al agua</p>
     	<p>24. En caso de requerir oler una sustancia, hay que cuidar que no se haga de manera directa, sino abanicnado los vapore con la mano.</p>
     	<p>25. Para calentar un líquido en un tubo de ensayo, éste siempre deve inclinarse en un ángulo de <b>45°</b>, cuidando nunca apuntarlo hace uno mismo o hacia algun compañero</p>
     	<p>26. Reportar material o equipo dañado (vidrio,mangueras de hule, conexiones eléctricas, etcétera)</p>
     	<p>27. Luego de terminar los experimentos hay que lavar y secar todo el material utilizado, así como limpiar los equipos y el área de trabajo usado, para colocarlos en sus charolas respectivamente, las cuales deben ser entregado al responsable del laboratorio</p>
     	<p>28. Al finalizar las actividades en el laboratorio, el responsable de la práctica debe verificar que los controles de suministros de gas, agua y energía eléctrica se hayan apagado</p>
     </div>
     <div id="Pag6" class="w3-container city">
     <h2>Página 6</h2>
     <p>29. Las personas a quienes se sorprenda haciendo masl uso de equipo, materiales, instalaciones y ausstancias propias del laboratorio o dañando la señalética instalada, serán sancionadas conforme a las disposiciones disctadas por la administración del instituto y en la forma en que las autoridades consideren pertinentes</p>
     <p>30. Lavar las manos con frecuencia durante la sesión de laboratorio y después de hacer un experimento y antes de salir del laboratorio. Desarolle el hábito de mantener las manos alejadas de la boca, nariza, ojos y cara, puede provocar intoxicaciónes de leve a agresiva</p>	
     </div>
  <div class="w3-container w3-light-grey w3-padding">
   <button class="w3-button w3-right w3-white w3-border" 
   onclick="document.getElementById('id01').style.display='none'">Cerrar</button>
  </div>
 </div>
</div>
<!--DIAMANTE DE SEGURIDAD-->
<!--DIAMANTE DE SEGURIDAD-->
<!--DIAMANTE DE SEGURIDAD-->
<!--DIAMANTE DE SEGURIDAD-->
<div id="id02" class="w3-modal">
 <div class="w3-modal-content w3-card-4 w3-animate-zoom">
  <header class="w3-container w3-red"> 
   <span onclick="document.getElementById('id02').style.display='none'" 
   class="w3-button w3-red w3-xlarge w3-display-topright">&times;</span>
   <h2>Diamante de seguridad</h2>
  </header>
  <div class="w3-bar w3-border-bottom">
   <button class="tablink w3-bar-item w3-button w3-gray" onclick="openCity(event, 'main')">Diamante de seguridad</button>
   <button class="tablink w3-bar-item w3-button w3-blue" onclick="openCity(event, 'azul')">Azul</button>
   <button class="tablink w3-bar-item w3-button w3-red" onclick="openCity(event, 'rojo')">Rojo</button>
   <button class="tablink w3-bar-item w3-button w3-yellow" onclick="openCity(event, 'amarillo')">Amarillo</button>
   <button class="tablink w3-bar-item w3-button w3-sand" onclick="openCity(event, 'blanco')">Blanco</button>
  </div>
   <div id="main" class="w3-container city">
   <h2>Diamante de seguridad</h2>
   <img type="image" id="myimage" style="height:400px;width:400px; float:left;" src="{{url('images/rombo-de-seguridad.png')}}" />El diagrama conocido como "rombo o diamante de seguridad" es un sencillo, fácil de comprender y útil sistema de identificación de productos químicos peligrosos, cuyo fin es alertar en forma apriada acerca del grado de peligrosidad de las sustancias químicas, con el objetivo de salvaguardar la integridad física y la vida, tanto de la comunidad como del personal que labora dentro de un laboratorio químico
   <p>
El hecho de señalar el nivel de peligrosidad de una sustancia, sirve también para:
Distinguir con facilidad los productos peligrosos.
Informar de forma rápida la naturaleza del riesgo que representa el producto.
Facilitar las labores de rescate o auxilio en casos de emergencia.
Cuidar la vida de quienes prestan auxilio en casos de emergencia.
Dar información orientadora para el momento de limpieza y remoción de la sustancia.
   </p>
  </div>
  <div id="azul" class="w3-container city">
  	<h2><b>Azul</b></h2>
  	<p>Significa que la sustancia representa un riesgo para la salud</p>
  	<p><b>0</b>=<b>sin riesgo:</b> Esta código se usa en materiales de bajo riesgo en condiciones de incendio, como el cloruro de sodio </p>
  	<p><b>1</b>=<b>Ligeramente peligroso:</b> Se trata de materiales que solo causan daños residuales menores, incluso no hay tratamiento médico, como es el caso de la glicerina</p>
  	<p><b>2</b>=<b>Peligroso:</b> Es el código asignado a aquellos materiales que peuden causar incapacidad termporal o daños permanentes, en caso de exposición continua, como el cloroformo</p>
  	<p><b>3</b>=<b>Extremadamente peligroso:</b> Son materiales que pueden causar daños temporales o permanentes aun con poca exposición. El hidróxido de potasio es un ejemplo de este tipo de sustancias</p>
  	<p><b>4</b>=<b>Mortal:</b> Se trata de sustancias que peuden causar la muerte o aun daño permanente, como es el caso del cianuro de hidrógeno </p>
  </div>
  <div id="rojo" class="w3-container city">
  	<h2><b>Rojo</b></h2>
  	<p>Significa que la sustancia representa un riesgo de incendio. Es decir, que es inflamable o puede serlo. Su escala quiere decir:</p>
  	<p><b>0</b>=<b>No se inflama:</b> Es el caso de susteancias que no se queman, aun cunado estén expuestas por mas de 5 minutos a temperaturas de 815°C, como el agua</p>
  	<p><b>1</b>=<b>Sobre 93°C</b> Este tipo de materiales requieren una especia de precalentamiento para que ocurra la ignición. Se calcula un punto de inflamabilidad de 93°C</p>
  	<p><b>2</b>=<b>Debajo 93°C</b> No requiere temperaturas muy altas para llegar el punto de ignición, el cual oscila entre los 38°C y los 93°C. El petrodiésel, es un ejemplo de esta sustancia</p>
  	<p><b>3</b>=<b>Debajo 37°C</b> Se le asigna este código a aquellos materiales que pueden encenderse en caso cualquier temperatura ambiental, como la gasolina</p>
  	<p><b>4</b>=<b>Debajo 25°C</b> Se trata de sustancias como el propano, que se vaporizan con la presión atmosférica ambiental o se queman fácilmente en le aire</p>
  </div>
  <div id="amarillo" class="w3-container city">
  	<h2><b>Amarillo</b></h2>
  	<p>El rombo de este color indica que la sustancia representa un riesgo reactivo. En cuanto a la escala de este rombo, el significado es el siguiente:</p>
  	<p><b>0</b>=<b>Estable:</b>  Es un material que se mantiene estable aun bajo exposición al fuego. El helio es un buen ejemplo</p>
  	<p><b>1</b>=<b>Inestable en caso de calentamiento:</b>Es un material que puede ser inestable ante temperaturas y presión elevadas. Por ejemplo, el acetileno</p>
  	<p><b>2</b>=<b>Inestable en cambio químico violento:</b> Sustancias que pueden reaccionar violentamente frente al agua o frente a temperaturas y presión elevadas. El fósforo es una de las sutancias que entra en esta categoría</p>
  	<p><b>3</b>=<b>Puede explotar en caso de choque o calentamiento:</b> Puede detonar con una fuente de ignición, como agua o una descarga eléctrica fuerte, como es el caso del flúor, por ejemplo</p>
  	<p><b>4</b>=<b>Puede explotar súbitamente:</b>Tiende a detonar muy fácilmente. Es el caso de la nitroglicerina, por ejemplo</p>
  </div>
  <div id="blanco" class="w3-container city">
  	<h2><b>Blanco</b></h2>
  	<p>Es el color utilizado para las sustancias que constituyen un riesgo muy específico. En este caso el código de la escala no es de números sino de letras y significan:</p>
  	<p><b>OX:</b>materiales oxidantes como el perclorato de potasio</p>
  	<p><b>ACID:</b>sustancias ácidas</p>
  	<p><b>ALC:</b>materiales alcalinos</p>
  	<p><b>COR:</b>materiales corrosivos</p>
  	<p><b>W:</b>refiere a sustancias que reaccionan con agua de manera peligrosa, como el cianuro de sodio</p>
  	<p><b>R:</b> es la letra usada para material con radiación como el plutonio</p>
  	<p><b>BIO:</b>alude a riesgo biológico. Se usa en caso de virus</p>
  	<p><b>CRYO:</b>significa que se está frente a material criogénico</p>
  	<p><b>Xn Nocivo:</b>presenta riesgos epidemiológicos o de propagación importante</p>
  </div>
   <div class="w3-container w3-light-grey w3-padding">
   <button class="w3-button w3-right w3-white w3-border" 
   onclick="document.getElementById('id02').style.display='none'">Cerrar</button>
  </div>
 </div>
</div>
<!--CORROSIVO-->
<!--CORROSIVO-->
<!--CORROSIVO-->
 <div id="id03" class="w3-modal">
    <div class="w3-modal-content w3-animate-zoom" >
      <header class="w3-container w3-red"> 
        <span onclick="document.getElementById('id03').style.display='none'" 
        class="w3-button w3-display-topright">&times;</span>
        <h2><b>Corrosivo</b></h2>
      </header>
      <div class="w3-container">
      	<img type="image" id="myimage" style="height:125px;width:125px; float:left;" src="{{url('images/corrosivo.png')}}" />
        <p><b>Definición:</b> Estos productos químicos causan destrucción de tejidos vivos y/o materiales inertes</p>
        <p><b>Precaución:</b> No inhalar y evitar el contacto con la piel, ojos y ropas</p>
        <p><b>Ejemplos:</b> Ácido clorhídrico,
Ácido fluorhídrico,
Hidróxido de potasio,
Ácido sulfúrico</p>
      </div>
      <footer class="w3-container w3-red">
      	<p><b>Pictograma</b></p>
      </footer>
    </div>
  </div>
  <!--Explosivo-->
   <!--Explosivo-->
    <!--Explosivo-->
    <div id="id04" class="w3-modal">
    <div class="w3-modal-content w3-animate-zoom" >
      <header class="w3-container w3-red"> 
        <span onclick="document.getElementById('id04').style.display='none'" 
        class="w3-button w3-display-topright">&times;</span>
        <h2><b>Explosivo</b></h2>
      </header>
      <div class="w3-container">
      	<img type="image" id="myimage" style="height:125px;width:125px; float:left;" src="{{url('images/explosivo.png')}}" />
        <p><b>Definición:</b> Sustancias y preparaciones que pueden explotar bajo efecto de una llama o que son más sensibles a los choques o fricciones que el dinitrobenceno</p>
        <p><b>Precaución:</b> Evitar golpes, sacudidas, fricción, flamas o fuentes de calor</p>
        <p><b>Ejemplos:</b> Nitroglirecirina, Fluor</p>
      </div>
      <footer class="w3-container w3-red">
      	<p><b>Pictograma</b></p>
      </footer>
    </div>
  </div>
<!-- Comburante-->
<!-- Comburante-->
<!-- Comburante-->

  <div id="id05" class="w3-modal">
    <div class="w3-modal-content w3-animate-zoom" >
      <header class="w3-container w3-red"> 
        <span onclick="document.getElementById('id05').style.display='none'" 
        class="w3-button w3-display-topright">&times;</span>
        <h2><b>Comburente</b></h2>
      </header>
      <div class="w3-container">
      	<img type="image" id="myimage" style="height:125px;width:125px; float:left;" src="{{url('images/Comburente.png')}}" />
        <p><b>Definición:</b> Sustancias que tienen la capacidad de incendiar otras sustancias, facilitando la combustión e impidiendo el combate del fuego</p>
        <p><b>Precaución:</b> Evitar su contacto con materiales combustibles</p>
        <p><b>Ejemplos:</b> Oxígeno, Nitrato de potasio, Peróxido de hidrógeno</p>
      </div>
      <footer class="w3-container w3-red">
      	<p><b>Pictograma</b></p>
      </footer>
    </div>
  </div>
  <!--Inflamable-->
  <!--Inflamable-->
  <!--Inflamable-->
   <div id="id06" class="w3-modal">
    <div class="w3-modal-content w3-animate-zoom" >
      <header class="w3-container w3-red"> 
        <span onclick="document.getElementById('id06').style.display='none'" 
        class="w3-button w3-display-topright">&times;</span>
        <h2><b>Inflamable</b></h2>
      </header>
      <div class="w3-container">
      	<img type="image" id="myimage" style="height:125px;width:125px; float:left;" src="{{url('images/inflamable.png')}}" />
        <p><b>Definición:</b>  Sustancias y preparaciones que pueden calentarse y finalmente inflamarse en contacto con el aire a una temperatura normal sin necesidad de energía, o que pueden inflamarse fácilmente por una breve acción de una fuente de inflamación y que continúan ardiendo o consumiéndose después de haber apartado la fuente de inflamación, o inflamables en contacto con el aire a presión normal, o que, en contacto con el agua o el aire húmedo, emanan gases fácilmente inflamables en cantidades peligrosas</p>
        <p><b>Precaución:</b> Evitar contacto con materiales ignitivos (aire, agua)</p>
        <p><b>Ejemplos:</b> Hidrógeno, Etino, Éter etílico, Etanol, Acetona</p>
      </div>
      <footer class="w3-container w3-red">
      	<p><b>Pictograma</b></p>
      </footer>
    </div>
  </div>
  <!--Gas-->
  <!--Gas-->
  <!--Gas-->
  <div id="id07" class="w3-modal">
    <div class="w3-modal-content w3-animate-zoom" >
      <header class="w3-container w3-red"> 
        <span onclick="document.getElementById('id07').style.display='none'" 
        class="w3-button w3-display-topright">&times;</span>
        <h2><b>Gas</b></h2>
      </header>
      <div class="w3-container">
      	<img type="image" id="myimage" style="height:125px;width:125px; float:left;" src="{{url('images/gas.png')}}" />
        <p><b>Definición:</b> Sustancias gaseosas comprimidas, líquidas o disueltas, contenidas a presión de 200 kPa o superior, en un recipiente que pueden explotar con el calor</p>
        <p><b>Precaución:</b> No lanzarlas nunca al fuego</p>
        <p><b>Ejemplos:</b> Botellas de gas a presión, Insecticidas caseros, Ambientadores caseros</p>
      </div>
      <footer class="w3-container w3-red">
      	<p><b>Pictograma</b></p>
      </footer>
    </div>
  </div>
 <!--Irritacion cutanea-->
  <!--Irritacion cutanea-->
   <!--Irritacion cutanea-->
   <div id="id08" class="w3-modal">
    <div class="w3-modal-content w3-animate-zoom" >
      <header class="w3-container w3-red"> 
        <span onclick="document.getElementById('id08').style.display='none'" 
        class="w3-button w3-display-topright">&times;</span>
        <h2><b>Irritación cutánea</b></h2>
      </header>
      <div class="w3-container">
      	<img type="image" id="myimage" style="height:125px;width:125px; float:left;" src="{{url('images/irritacion_cutanea.webp')}}" />
        <p><b>Definición:</b>  Sustancias y preparaciones que por penetración cutánea, pueden implicar riesgos graves, agudos o crónicos en la salud</p>
        <p><b>Precaución:</b> Todo el contacto con el cuerpo humano debe ser evitado</p>
        <p><b>Ejemplos:</b> Amoniaco, Lejia</p>
      </div>
      <footer class="w3-container w3-red">
      	<p><b>Pictograma</b></p>
      </footer>
    </div>
  </div>
<!-- Toxicidad aguda-->
  <!-- Toxicidad aguda-->
  <!-- Toxicidad aguda-->
  <div id="id09" class="w3-modal">
    <div class="w3-modal-content w3-animate-zoom" >
      <header class="w3-container w3-red"> 
        <span onclick="document.getElementById('id09').style.display='none'" 
        class="w3-button w3-display-topright">&times;</span>
        <h2><b>Tóxicidad aguda</b></h2>
      </header>
      <div class="w3-container">
      	<img type="image" id="myimage" style="height:125px;width:125px; float:left;" src="{{url('images/toxicidad_aguda.png')}}" />
        <p><b>Definición:</b> Sustancias y preparaciones que por inhalación, ingesta o absorción a través de la piel, provoca graves problemas de salud e incluso la muerte</p>
        <p><b>Precaución:</b> Todo el contacto con el cuerpo humano debe ser evitado</p>
        <p><b>Ejemplos:</b> Cianuro, Trióxido de arsénico ,Metanol</p>
      </div>
      <footer class="w3-container w3-red">
      	<p><b>Pictograma</b></p>
      </footer>
    </div>
  </div>
   <!-- Peligro por aspiracion-->
  <!-- Peligro por aspiracion-->
  <!-- Peligro por aspiracion-->
  <div id="id10" class="w3-modal">
    <div class="w3-modal-content w3-animate-zoom" >
      <header class="w3-container w3-red"> 
        <span onclick="document.getElementById('id10').style.display='none'" 
        class="w3-button w3-display-topright">&times;</span>
        <h2><b>Peligro por aspiración</b></h2>
      </header>
      <div class="w3-container">
      	<img type="image" id="myimage" style="height:125px;width:125px; float:left;" src="{{url('images/Peligroso_por_aspiracion.png')}}" />
        <p><b>Definición:</b> Sustancias y preparaciones que, por inhalación, ingestión o penetración cutánea, pueden implicar riesgos a la salud graves o agudos</p>
        <p><b>Precaución:</b> Debe ser evitado el contacto con el cuerpo humano, así como la inhalación de los vapores</p>
        <p><b>Ejemplos:</b> Metanol, Monóxido de carbono, Cloro</p>
      </div>
      <footer class="w3-container w3-red">
      	<p><b>Pictograma</b></p>
      </footer>
    </div>
  </div>
  <!--peligro al medio ambiente-->
   <!--peligro al medio ambiente-->
    <!--peligro al medio ambiente-->
    <div id="id11" class="w3-modal">
    <div class="w3-modal-content w3-animate-zoom" >
      <header class="w3-container w3-red"> 
        <span onclick="document.getElementById('id11').style.display='none'" 
        class="w3-button w3-display-topright">&times;</span>
        <h2><b>Peligro al medio ambiente</b></h2>
      </header>
      <div class="w3-container">
      	<img type="image" id="myimage" style="height:125px;width:125px; float:left;" src="{{url('images/peligroso_para_el_medio_ambiente.png')}}" />
        <p><b>Definición:</b> El contacto de esa sustancia con el medio ambiente puede provocar daños al ecosistema a corto o largo plazo.</p>
        <p><b>Precaución:</b> Debido a su riesgo potencial, no debe ser liberado en las cañerías, en el suelo o el medio ambiente</p>
        <p><b>Ejemplos:</b> Benceno, Cianuro de potasio, Lindano</p>
      </div>
      <footer class="w3-container w3-red">
      	<p><b>Pictograma</b></p>
      </footer>
    </div>
  </div>
</div><!--DIV DE LOS MODALS CON PAGINAS-->
<script>
document.getElementsByClassName("tablink")[0].click();

function openCity(evt, cityName) {
  var i, x, tablinks;
  x = document.getElementsByClassName("city");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < x.length; i++) {
    tablinks[i].classList.remove("w3-light-grey");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.classList.add("w3-light-grey");
}
</script>
</body>
@endsection
