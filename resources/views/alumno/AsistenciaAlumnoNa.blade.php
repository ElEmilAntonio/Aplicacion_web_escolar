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
      $asistencia=0;
      $Numeroasistenia=0;
       $promedioasistencia=0;
       $obtenerasistencia=0;
 ?>

<div class="container-fluid">

    <p class="row justify-content-center"> Curso Actual: {{$cursoactual->ClaveCurso}} Unidad: {{$cursoactual->Unidad}}</p>
    <div class="panel panel-default">
        <div class="panel-heading">
          
            ASISTENCIAS  DE LA UNIDAD no disponible
        </div>
        <div class="panel-body">
             <div class="table-responsive-sm">
            <table class="table table-striped ">
                <thead>
                   <th>Alumnos</th>
                   <th>Numero Control</th>
                   @if(count($tablaasistencias)>0)
                   @foreach($tablaasistencias as $asistencia)
                   <th> <FONT SIZE=2>{{$asistencia->FechaAsistencia}}</FONT></th>
                   @endforeach
                   @endif
                   <th> %asistencia</th>
               </thead>
               <tbody>
                <tr>
                <td class="table-text"><div>{{ $alumno->Apellidos}} {{$alumno->Nombre}}</div></td>
                 <td class="table-text"><div>{{ $alumno->NumeroControl}}</div></td>
                  @if(count($asistenciaplucks)>0)
                   @foreach($asistenciaplucks as $asistenciapluck)
                   <?php
                    $Numeroasistenia++;
                    if($asistenciapluck->get('Asistencia')==1){
                      $obtenerasistencia++;
                    }
                    $promedioasistencia=ceil(($obtenerasistencia/$Numeroasistenia)*100);
                    ?>
                  <td class="table-text"><div>{{$asistenciapluck->get('Asistencia')}}</div>
                   </td>
                   @endforeach
                   @endif
                   <td>%{{$promedioasistencia}}</td>
                </tr>
               </tbody>
           </table>
         </div>

   </div>
</div>
</div>

</div>
@endsection