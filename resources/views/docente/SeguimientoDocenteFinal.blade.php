@extends('layouts.app')

@section('content')

<div class="container-fluid">
<?php

$cantidadactividades=0;
$promedioactividadalumno=0;
?>
  <p class="row justify-content-center"><H2><b> Calificaciones Finales Curso: {{$cursoactual->ClaveCurso}}</b></H2></p>

  <div class="panel panel-default">
    <div class="panel-heading">
      <h3><b>Calificaciones Alumnos</b></h3>
    </div>
    <div class="panel-body">
      <div class="table-responsive-sm">
      <table class="table table-striped ">
        <thead>
         <th style="padding:1px">Alumnos</th>
         <th style="padding:1px">Numero Control</th>
        <th style="padding:1px">Unidad 1</th>
         <th style="padding:1px">Unidad 2</th>
          <th style="padding:1px">Unidad 3</th>
           <th style="padding:1px">Unidad 4</th>
            <th style="padding:1px">Calificación Final</th>
        
       </thead>
       <tbody>
        @if(count($alumnos)>0)
        @foreach($alumnos as $alumno)
          <?php
      
         $numerounidad=0;
         $total=0;
         $unidad1=0;
         $unidad2=0;
         $unidad3=0;
         $unidad4=0;
         ?>
        <tr>
          <td class="table-text" style="padding:1px"><div>{{ $alumno->Apellidos}} {{$alumno->Nombre}}</div></td>
          <td class="table-text" style="padding:1px"><div>{{ $alumno->NumeroControl}}</div></td>
           @foreach($calificacionesplucks as $calificacionpluck)
        @foreach($calificacionpluck as $calificacion)
        @if($calificacion->get('NumeroControl')==$alumno->NumeroControl)
        <?php 
          $numerounidad++;
          $total+=$calificacion->get('Calificacion');
          if($numerounidad==1){
          $unidad1=$calificacion->get('Calificacion');
          }elseif ($numerounidad==2) {
           $unidad2=$calificacion->get('Calificacion'); 
          }elseif ($numerounidad==3) {
           $unidad3=$calificacion->get('Calificacion');
          }elseif ($numerounidad==4) {
           $unidad4=$calificacion->get('Calificacion');
          }
        ?> 
           @endif
            @endforeach
           @endforeach
          @if($unidad1<70)
            <td class="table-text" style="padding:1px"><div><font color="red">{{$unidad1}}</font></div></td>
          @endif
          @if($unidad1>=70)
           <td class="table-text" style="padding:1px"><div>{{$unidad1}}</div></td>
          @endif
          @if($unidad2<70)
           <td class="table-text" style="padding:1px"><div><font color="red">{{$unidad2}}</font></div></td>
          @endif
          @if($unidad2>=70)
           <td class="table-text" style="padding:1px"><div>{{$unidad2}}</div></td>
          @endif
          @if($unidad3<70)
          <td class="table-text" style="padding:1px"><div><font color="red">{{$unidad3}}</font></div></td>
          @endif
          @if($unidad3>=70)
          <td class="table-text" style="padding:1px"><div>{{$unidad3}}</div></td>
          @endif
          @if($unidad4<70)
           <td class="table-text" style="padding:1px"><div><font color="red">{{$unidad4}}</font></div></td>
          @endif
          @if($unidad4>=70)
          <td class="table-text" style="padding:1px"><div>{{$unidad4}}</div></td>
          @endif

              <?php
               $total=($unidad1+$unidad2+$unidad3+$unidad4)/4;
               ?>
               @if($total<70||$unidad1<70||$unidad2<70||$unidad3<70||$unidad4<70)
                <td class="table-text" style="padding:1px"><div><font color="red">{{$total}}</font></div></td>
                @endif
                @if($total>=70&&$unidad1>=70&&$unidad2>=70&&$unidad3>=70&&$unidad4>=70)
                <td class="table-text" style="padding:1px"><div><b>{{$total}}</b></div></td>
                @endif
        </tr>

        @endforeach
        @endif
      </tbody>
    </table>
  </div>

@endsection