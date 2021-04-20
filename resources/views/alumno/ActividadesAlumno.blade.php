@extends('layouts.appAlumno')

@section('content')
<?php $NumeroActividad = 0; ?>
<div class="container">
    <p class="row justify-content-center"> Curso Actual: {{$cursoactual->ClaveCurso}} Unidad: {{$cursoactual->Unidad}}</p>
<div class="panel panel-default">
    <div class="panel-heading">
        ACTIVIDADES DE LA UNIDAD
    </div>
    <div class="panel-body">
        <table class="table table-striped ">
            <thead>
             <th>Actividad</th>
             <th>Numero</th>
             <th>Fecha de Entrega</th>
              <th></th>
         </thead>
         @if (count($actividades) > 0)
         <tbody>
            @foreach ($actividades as $actividad)
            @if($actividad->EstadoActividad==1)
             <?php $NumeroActividad++; ?>   
            <tr>
                <td class="table-text"><div>{{ $actividad->NombreActividad}}</div></td>
                <td class="table-text"><div>{{$NumeroActividad}}</div></td>
                <td class="table-text"><div>{{ $actividad->FechaActividad}}</div></td>
                <!--opciones-->
                <td>

                    <button type="submit" class="btn btn-success" onclick="location.href='/Ver_Actividad_alumno/{{$actividad->IdActividad}}'" method="POST">
                        Ver
                    </button>
            </td>
        </tr>
        @endif
        @endforeach
    </tbody>
</table>

@endif
@endsection
</div>
</div>
</div>

