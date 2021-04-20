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
<?php 
      $NumeroActividad = 0; 
      $promedio=0;
      $promedioactividades=0;
      $NumeroPractica=0;
      $promediopracticas=0;
      $promediounidad=0;

?>
<div class="container-fluid">

    <p class="row justify-content-center"> Curso Actual: {{$cursoactual->ClaveCurso}} Unidad: {{$cursoactual->Unidad}}</p>
    <div class="panel panel-default">
        <div class="panel-heading">
          
            ACTIVIDADES
        </div>
        <div class="panel-body">
             <div class="table-responsive-sm">
            <table class="table table-striped ">
                <thead>
                   <th style="padding:1px"><FONT SIZE=3>Alumno</FONT></th>
                   <th style="padding:1px">Numero Control</th>
                   @if(count($tablaactividades)>0)
                   @foreach($tablaactividades as $actividad)
                    <?php $NumeroActividad++; ?>   
                   <th style="padding:1px">
                      <FONT SIZE=2>{{$actividad->FechaActividad}}<br>{{$actividad->NombreActividad}}</br></FONT>
                   
                    </th>
                   @endforeach
                   @endif
                   <th style="padding:1px">Actividades<br> promedio</th>
               </thead>
               <tbody>
                <tr>
                <td class="table-text"><div>{{ $alumno->Apellidos}} {{$alumno->Nombre}}</div></td>
                 <td class="table-text"><div>{{ $alumno->NumeroControl}}</div></td>
                  @if(count($actividadplucks)>0)
                   @foreach($actividadplucks as $actividadpluck)
                  <td class="table-text"><div>{{$actividadpluck->calificacion}}</div></td>
                  <?php  
                    $promedio+=$actividadpluck->calificacion; 
                    $total=$NumeroActividad;         
                           ?>
                   @endforeach
                   <?php if($promedio>0){$promedioactividades=ceil($promedio/$total);}?>
                   @endif
                    <td>{{$promedioactividades}} </td>
                </tr>
               </tbody>
           </table>
         </div>

   </div>
   
   <div class="panel-heading">
          
          PROMEDIO DE LA UNIDAD
        </div>
        <div class="panel-body">
            <table class="table table-striped ">
                <thead>
                   <th><FONT SIZE=3>Alumno</FONT></th>
                   <th>Numero Control</th>
                   <th>Practica 1</th>
                   <th>Practica 2</th>
                   <th>Examen</th>
                   <th>Promedio Unidad</th>
               </thead>
               <tbody>
                <tr>
                <td class="table-text"><div>{{ $alumno->Apellidos}} {{$alumno->Nombre}}</div></td>
                 <td class="table-text"><div>{{ $alumno->NumeroControl}}</div></td>
                 @foreach($practicaspluck as $practica)
                  @if( $practica->get('EstadoPractica')==0)
                 <td class="table-text"><div>Sin Realizar</div></td> @endif
                 @if( $practica->get('EstadoPractica')==1)
                 <td class="table-text"><div>Realizado</div></td>
                           <?php $NumeroPractica++;
                     if($NumeroPractica>0){
                      $promediopracticas=($NumeroPractica/2)*100;
                    }
                  ?>
                  @endif
                 @endforeach
                       <td class="table-text"><div>{{$promedioexamen}}</div></td>
                         <?php 
          $porcentajeactividades=0;
           $porcentajepracticas=0;
           $porcentajeexamen=0;
           if($promedioexamen>0){
            $porcentajeexamen=($porcentajes->Examen/100)*$promedioexamen;
           }
           if($promedioactividades>0){
            $porcentajeactividades=($porcentajes->Actividades/100)*$promedioactividades;
           }
           if($promediopracticas>0){
            $porcentajepracticas=($porcentajes->Practicas/100)*$promediopracticas;
           }        
             $promediototal=$porcentajeactividades+$porcentajepracticas+$porcentajeexamen;         
            ?>
                  
                              <td class="table-text"><div>{{$promediototal}} </div></td>
                </tr>
               
               </tbody>
           </table>
</div>
</div>

</div>
@endsection