@extends('layouts.appAlumno')

@section('content')
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
 <body style="background-color: gray" background="{{url('images/back.png')}}">
<div class="container">
   <div class="row">
  <div  class="col-sm-1">
  <a style="color: #ffdd42">
   <button type="submit" class="btn btn-secondary" method="POST" onclick = "ActivarInformacion();" href="javascript:void(0);" title="Activar Información" ><i class="fa fa-info-circle"></i></a>
  </div>
 <div  class="col-sm-10">
  <a class="row justify-content-center">
     <button type="submit" class="btn btn-warning " onclick="location.href='/Metodos_fisicos_de_separacion_de_mezclas/1'" method="POST"><i class="fa fa-arrow-left"></i>
     Anterior
   </button> 
 <button disabled id="botonsiguiente" type="submit" class="btn btn-success" method="POST" onclick="location.href='/Metodos_fisicos_de_separacion_de_mezclas/2'" method="POST">
  Siguiente <i class="fa fa-arrow-right"></i>
</button>
  </a>
 </div>
 <div  class="col-sm-1">  
  </div>
</div>
     <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tamizado</div>
               
                <div class="card-body">
                  <a style="border:0; margin:128px" > </a>
                  <button  id="revealBtn" class="yes" type="button" class="w3-button" style="background-color: transparent; border:0; margin:0px" onclick = "caida();" href="javascript:void(0);" >
                 <img src="/images/practica3/caida1.gif" alt="caida"  width=256/>
               </button>
                 <br>
                 <button  id="revealBtn" class="yes" type="button" class="w3-button" style="background-color: transparent; border:0; margin:0px" onclick = "revealDiv();" href="javascript:void(0);" >
                   <img src="/images/practica3/filtro1.png" alt="filtro1" width=256 Height=256/>
                 </button>
                
                    <img id="gif1" src="/images/practica3/caida1.gif" alt="caida"  width=256/>
                    <br>
                    <button  id="revealBtn" class="yes" type="button" class="w3-button" style="background-color: transparent; border:0; margin:0px" onclick = "revealDiv2();" href="javascript:void(0);" >
                   <img src="/images/practica3/filtro2.png" alt="filtro1" width=256 Height=256/>
                 </button>
                     <img id="gif2" src="/images/practica3/caida1.gif" alt="caida"  width=256/>
             </div>
         </div>
     </div>
 </div>   
</div>
</body>
@endsection
<script type="text/javascript">
var revealBtn = document.getElementById('revealBtn');
 var ArrayGIF = ['/images/practica3/caida1.gif', '/images/practica3/caida2.gif', '/images/practica3/filtro1.gif', '/images/practica3/filtro2.gif'];
var filtro1=false;
var filtro2=false;
var informacion=false;
var x=-1;

function verificarfiltros(){
if(filtro2==true&&filtro1==true){
    document.getElementById("botonsiguiente").disabled =false;
}else{
    document.getElementById("botonsiguiente").disabled =true;  
}
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

function revealDiv() {
if (informacion==false){
if(filtro1==false){
document.getElementById('gif1').src = ArrayGIF[2];
if(filtro2==false){
document.getElementById('gif2').src = ArrayGIF[1];
}
filtro1=true;
}else{
document.getElementById('gif1').src = ArrayGIF[0]; 
filtro1=false;
if(filtro2==false){
document.getElementById('gif2').src = ArrayGIF[0];
}
}
verificarfiltros();
}else{
  var titulo="<h2><b>Tamizado </b></h2>"
  var myHeading ='<div style="float:left;"><img id="vaso" src="/images/practica3/filtro1.gif" width=200 height=200/><br><small><b>(Filtro de particulas grandes)</b></small></div>es un método mecánico para separar dos sólidos formados por partículas de tamaños diferentes. Consiste en pasar una mezcla de partículas de diferentes tamaños por un tamiz, criba o herramienta de colador (en función del uso podrán ser metálicos, vegetales -tejidos- o de nailon). Las partículas de menor tamaño atraviesan el filtro por los poros, y las de mayor tamaño quedan retenidas.​ Un ejemplo de tamizado es el realizado con el cedazo (que cuando es muy tupido puede llamarse también tamiz) utilizado para la determinación de curvas granulométricas en varios materiales. En los laboratorios de suelos se utilizan series estandarizadas de tamices.<p>El cribado o tamizado es un método ancestral y elemental usado en la mezclas de sólidos heterogéneos. Los orificios del tamiz suelen ser de diferentes tamaños y se utilizan de acuerdo al grueso de las partículas de una solución homogénea. Para aplicar el método de la tamización es necesario que los materiales se presenten al estado sólido. Se utilizan tamices de metal o plástico, que retienen las partículas de mayor tamaño y dejan pasar las de menor diámetro.</p>';
   $("#modal-title").html(titulo); 
     $("#modal-body").html(myHeading);  
var modal = document.getElementById("modal"); 
modal.style.display = "block";
}
}
function revealDiv2() {
if(informacion==false){
if(filtro2==false){
document.getElementById('gif2').src = ArrayGIF[3];
filtro2=true;

}else{
if(filtro1==true){
document.getElementById('gif2').src = ArrayGIF[1];
}else{
document.getElementById('gif2').src = ArrayGIF[0];
} 
filtro2=false;
}
verificarfiltros();
}else{
 var titulo="<h2><b>Tamizado </b></h2>"
  var myHeading ='<div style="float:left;"><img id="vaso" src="/images/practica3/filtro2.gif" width=200 height=200/><br><small><b>(Filtro de particulas medianas)</b></small></div>es un método mecánico para separar dos sólidos formados por partículas de tamaños diferentes. Consiste en pasar una mezcla de partículas de diferentes tamaños por un tamiz, criba o herramienta de colador (en función del uso podrán ser metálicos, vegetales -tejidos- o de nailon). Las partículas de menor tamaño atraviesan el filtro por los poros, y las de mayor tamaño quedan retenidas.​ Un ejemplo de tamizado es el realizado con el cedazo (que cuando es muy tupido puede llamarse también tamiz) utilizado para la determinación de curvas granulométricas en varios materiales. En los laboratorios de suelos se utilizan series estandarizadas de tamices.<p>El cribado o tamizado es un método ancestral y elemental usado en la mezclas de sólidos heterogéneos. Los orificios del tamiz suelen ser de diferentes tamaños y se utilizan de acuerdo al grueso de las partículas de una solución homogénea. Para aplicar el método de la tamización es necesario que los materiales se presenten al estado sólido. Se utilizan tamices de metal o plástico, que retienen las partículas de mayor tamaño y dejan pasar las de menor diámetro.</p>';
   $("#modal-title").html(titulo); 
     $("#modal-body").html(myHeading);  
var modal = document.getElementById("modal"); 
modal.style.display = "block"; 
}
}

function caida(){
 if(informacion==true){
  var titulo="<h2><b>Tamizado </b></h2>"
  var myHeading ='<div style="float:left;"><img id="vaso" src="/images/practica3/caida1.gif" width=200 height=200/><br><small><b>(Ejemplo caida particulas de arena)</b></small></div><p><b>Homogeneización de la arena</b></p> Este procedimiento se lleva a cabo en el sector construcción, para uniformar el tamaño de las partículas de arena, que a menudo pueden aglutinarse en estructuras más grandes. Se la hace pasar por un tamiz y así toda queda del mismo tamaño.';
   $("#modal-title").html(titulo); 
     $("#modal-body").html(myHeading);  
var modal = document.getElementById("modal"); 
modal.style.display = "block";  
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
