@extends('layouts.app')

@section('content')
<?php $NumeroActividad = 0; ?>
<div class="container-fluid">
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
             <th>FechaEntrega</th>
             <th>Estado</th>
              <th></th>
              <th></th>
         </thead>
         @if (count($actividades) > 0)
         <tbody>
            @foreach ($actividades as $actividad)
             <?php $NumeroActividad++; ?>   
            <tr>
                <td class="table-text"><div>{{ $actividad->NombreActividad}}</div></td>
                @if($actividad->EstadoActividad==0)
                <td class="table-text"><div>Sin numero</div></td>
                 @if($NumeroActividad>0) <?php $NumeroActividad--; ?> @endif
                 @endif
                  @if($actividad->EstadoActividad==1)
                <td class="table-text"><div>{{$NumeroActividad}}</div></td>
                 @endif
                <td class="table-text"><div>{{ $actividad->FechaActividad}}</div></td>
                @if($actividad->EstadoActividad==0)
                <td class="table-text"><div>Deshabilitado</div></td>
                @endif
                @if($actividad->EstadoActividad==1)
                 <td class="table-text"><div>Habilitado</div></td>
                 @endif
                <!--opciones-->
                <td>

                    <button type="submit" class="btn btn-success" onclick="location.href='/Editar_Actividad_docente/{{$actividad->IdActividad}}'" method="POST">
                        <i class="fa fa-btn fa-pencil"></i>Editar
                    </button>
            </td>
            <td>
                    <button type="submit" class="btn btn-danger" onclick="location.href='/Eliminar_Actividad_Docente/{{$actividad->IdActividad}}'" method="POST">
                        <i class="fa fa-btn fa-trash"></i>Eliminar
                    </button>
                </form>
               
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endif
<button type="submit" class="btn btn-primary" onclick="location.href='/Agregar_Actividad_docente'" method="POST">
    <i class="fa fa-btn fa-pencil"></i>AGREGAR ACTIVIDAD
</button>
@endsection
</div>
</div>
</div>

