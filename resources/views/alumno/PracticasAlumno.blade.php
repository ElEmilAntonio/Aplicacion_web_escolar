@extends('layouts.appAlumno')

@section('content')
@if($cursoactual->Unidad==1)
<?php
$NombrePractica1="Medidas de seguridad en el laboratorio";
$LinkPractica1="Medidas_de_seguridad_en_el_laboratorio";
$NombrePractica2="Conocimiento y manejo del material";
$LinkPractica2="Conocimiento_y_manejo_del_material";
?>
@endif
@if($cursoactual->Unidad==2)
<?php
$NombrePractica1="Métodos físicos de separación de mezclas";
$LinkPractica1="Metodos_fisicos_de_separacion_de_mezclas";
$NombrePractica2="Reacción quimica";
$LinkPractica2="Reaccion_quimica";
?>
@endif
@if($cursoactual->Unidad==3)
<?php
$NombrePractica1="Tipos de compuestos";
$LinkPractica1="Tipos_de_compuestos_Acidos_y_bases_a_partir_de_indicadores_naturales";
$NombrePractica2="El ph de las sustancias";
$LinkPractica2="El_ph_de_las_sustancias";
?>
@endif
@if($cursoactual->Unidad==4)
<?php
$NombrePractica1="Proceso de catalización";
$LinkPractica1="proceso_de_catalizacion";
$NombrePractica2="Reacción de saponificación";
$LinkPractica2="Reaccion_de_saponificacion";
?>
@endif
<?php 
$NumeroEstado= 0;
$NumeroPractica= 0;
$NombrePractica="";
$LinkPractica="";
?>
<div class="container">
  <p class="row justify-content-center"> Curso Actual: {{$cursoactual->ClaveCurso}} Unidad: {{$cursoactual->Unidad}}</p>

  <div class="panel panel-default">
    <div class="panel-heading">
      PRACTICAS DE LA UNIDAD
    </div>
    <div class="panel-body">
      <table class="table table-striped ">
        <thead>
         <th>Practica</th>
         <th>Numero</th>
         <th>Fecha</th>
         <th>HoraInicio</th>
         <th>HoraFin</th>
         <th>Estado</th>
         <th>Opciones</th>
       </thead>
       @if (count($practicas) > 0)
       <tbody>
        @foreach ($practicas as $practica)
        <?php $NumeroPractica++;
               $Numero=0 ?>
        @foreach($practicaspluck as $practicapluck)
         <?php $Estado=$practicapluck->get('EstadoPractica');
        $Numero++; ?>
  
        @if($NumeroPractica===$Numero)
        @if($practica->EstadoPractica==1)
        <tr>
          @if($NumeroPractica==1)<td class="table-text"><div>{{$NombrePractica1}}</div></td>
          <?php  $NombrePractica=$NombrePractica1;
                 $LinkPractica=$LinkPractica1;
           ?>
          @endif
          @if($NumeroPractica==2)<td class="table-text"><div>{{$NombrePractica2}}</div></td> 
          <?php  $NombrePractica=$NombrePractica2;
                   $LinkPractica=$LinkPractica2;
           ?>
          @endif
          <td class="table-text"><div>{{$NumeroPractica}}</div></td>
          <td class="table-text"><div>{{$practica->FechaPractica}}</div></td>
          <td class="table-text"><div>{{$practica->HoraInicioPractica}}</div></td>
          <td class="table-text"><div>{{$practica->HoraFinPractica}}</div></td>
          
          @if($Estado==1)
          <td class="table-text"><div>Realizado</div></td>
          @endif
          @if($Estado==0)
          <td class="table-text"><div>Sin Realizar</div></td>
          @endif

          <!--opciones-->
          <?php $Numeromodelo=1 ?>
          <td>
             @if(date("Y-m-d")===date("Y-m-d",strtotime($practica->FechaPractica)))
          @if(date("H:i")<=date("H:i",strtotime($practica->HoraFinPractica))
         &&date("H:i")>=date("H:i",strtotime($practica->HoraInicioPractica)))
            <button type="submit" class="btn btn-success" onclick="location.href='/{{$LinkPractica}}/{{$Numeromodelo}}'" method="POST">
             Realizar Practica
            </button>
            @endif
            @endif
          </td>
        </tr>
        @endif
        @endif
        @endforeach
        @endforeach
      </tbody>
    </table>
    @endif
    @endsection
  </div>
</div>
</div>