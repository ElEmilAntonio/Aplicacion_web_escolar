@extends('layouts.app')

@section('content')
@if($cursoactual->Unidad==1)
<?php
$NombrePractica1="Medidas de seguridad en el laboratorio";
$NombrePractica2="Conocimiento y manejo del material"
?>
@endif
@if($cursoactual->Unidad==2)
<?php
$NombrePractica1="Métodos físicos de seperación de mezclas";
$NombrePractica2="Reacción quimica"
?>
@endif
@if($cursoactual->Unidad==3)
<?php
$NombrePractica1="Tipos de compuestos";
$NombrePractica2="El ph de la sustancia"
?>
@endif
@if($cursoactual->Unidad==4)
<?php
$NombrePractica1="Catalizador: utilizando materia orgánica";
$NombrePractica2="Reacción de saponificación"
?>
@endif
<?php $NumeroPractica= 0;
      $NombrePractica="";
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
                <?php $NumeroPractica++; ?>   
           
                <tr>
        @if($NumeroPractica==1)<td class="table-text"><div>{{$NombrePractica1}}</div></td>
          <?php  $NombrePractica=$NombrePractica1 ?>
         @endif
        @if($NumeroPractica==2)<td class="table-text"><div>{{$NombrePractica2}}</div></td> 
            <?php  $NombrePractica=$NombrePractica2 ?>
        @endif
                    <td class="table-text"><div>{{$NumeroPractica}}</div></td>
                    <td class="table-text"><div>{{$practica->FechaPractica}}</div></td>
                    <td class="table-text"><div>{{$practica->HoraInicioPractica}}</div></td>
                    <td class="table-text"><div>{{$practica->HoraFinPractica}}</div></td>
                    @if($practica->EstadoPractica==1)
                    <td class="table-text"><div>Habilitado</div></td>
                    @endif
                     @if($practica->EstadoPractica==0)
                    <td class="table-text"><div>Deshabilitado</div></td>
                    @endif
                    <!--opciones-->
                    <td>
                        <button type="submit" class="btn btn-success" onclick="location.href='/Editar_Practica_docente/{{$practica->IdPractica}}'" method="POST">
                            <i class="fa fa-btn fa-pencil"></i>Editar
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
        @endsection
    </div>
</div>
</div>

