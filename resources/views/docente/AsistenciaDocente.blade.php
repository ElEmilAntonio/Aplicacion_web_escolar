@extends('layouts.app')

@section('content')
@if($ver!=null)
<script type="text/javascript">
  $(document).ready(function() {
    $('#modaleditar').modal('show');
  });
</script>
@endif
@if ($errors->any())
<div class="alert alert-danger">
  <ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif
<div class="container-fluid">
<?php
$Numeroasistencia=0;
?>
  <p class="row justify-content-center"> Curso Actual: {{$cursoactual->ClaveCurso}} Unidad: {{$cursoactual->Unidad}}</p>
  <div class="panel panel-default">
    <div class="panel-heading">
      ASISTENCIAS  DE LA UNIDAD
    </div>
    <div class="panel-body">
       <div class="table-responsive-sm">
      <table class="table table-striped ">
        <thead>
         <th style="padding:1px">Alumnos</th>
         <th style="padding:1px">Numero Control</th>
         @if(count($tablaasistencias)>0)
         @foreach($tablaasistencias as $asistencia)
        <th style="padding:1px"><FONT SIZE=2> {{$asistencia->FechaAsistencia}}</FONT></th>
        <?php 
        $Numeroasistencia++;
        ?>
         @endforeach
         @endif
         <th style="padding:1px"><FONT SIZE=2>Porcentaje</FONT></th>
       </thead>
       <tbody>
        <tr>
         <td></td>
         <td></td>
         @if(count($tablaasistencias)>0)
         @foreach($tablaasistencias as $opcion)
         <td style="padding:1px">
            <button type="submit" class="btn btn-success btn-sm" onclick="location.href='/Editar_Asistencia_docente/{{$opcion->IdAsistencia}}'" method="POST">
                        <i class="fa fa-btn fa-pencil"></i>
                    </button>
                    <button type="submit" class="btn btn-danger btn-sm" onclick="location.href='/Eliminar_Asistencia_docente/{{$opcion->IdAsistencia}}'" method="POST">
                        <i class="fa fa-btn fa-trash"></i>
                    </button>
         </td>
         @endforeach
         @endif 
        </tr>
        @if(count($alumnos)>0)
        @foreach($alumnos as $alumno)
        <tr>
          <td class="table-text" style="padding:1px"><div>{{ $alumno->Apellidos}} {{$alumno->Nombre}}</div></td>
          <td class="table-text" style="padding:1px"><div>{{ $alumno->NumeroControl}}</div></td>
        <?php
         $promedioasistencia=0;
         $obtenerasistencia=0;
         ?>
        @foreach($alumnospluck as $alumnopluck)
        @foreach($alumnopluck as $registroasistencia)
        @if($registroasistencia->get('NumeroControl')==$alumno->NumeroControl)
        <?php
           if($registroasistencia->get('Asistencia')==1){
                      $obtenerasistencia++;
                    }
                    if($obtenerasistencia>0){
                    $promedioasistencia=ceil(($obtenerasistencia/$Numeroasistencia)*100);
                  }
         ?>          
         <td class="table-text" style="padding:1px"><div><a style="color:black" href="{{ url('Actualizar_Asistencia_desde_docente')}}/{{$registroasistencia->get('IdAsistencia')}}-{{$registroasistencia->get('NumeroControl')}}">{{$registroasistencia->get('Asistencia')}}</a></div></td>
        @endif
        @endforeach
        @endforeach
        @if($promedioasistencia<80)
         <td class="table-text" style="padding:1px"><div><font color="red">{{$promedioasistencia}}%</font></div></td>
        @endif
        @if($promedioasistencia>=80)
        <td class="table-text" style="padding:1px"><div>{{$promedioasistencia}}%</div></td>
        @endif
        </tr>
        @endforeach
        @endif
      </tbody>
    </table>
  </div>

    <button 
    type="button" 
    class="btn btn-primary btn-lg" 
    data-toggle="modal" 
    data-target="#AgregarAsistencia">
    AÑADIR ASISTENCIA
  </button>

</div>
</div>
</div>

<div class="modal fade" id="AgregarAsistencia" 
tabindex="-1" role="dialog" 
aria-labelledby="AgregarAsistenciaModalLabel">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" 
      data-dismiss="modal" 
      aria-label="Close">
      <span aria-hidden="true">&times;</span></button>
    </div><a class="row justify-content-center">NUEVA ASISTENCIA</a>
    <form  method="POST" action="{{ route('Guardar_Asistencia_docente') }}" enctype="multipart/form-data">
      @csrf
      {{ csrf_field() }}
      {{ method_field('POST') }}
      <div class="modal-body">
        <div class="form-group row">

          <label for="FechaAsistencia" class="col-md-4 col-form-label text-md-right">{{ __('FECHA:') }}</label>
          <div class="col-md-6">
            <input type="date" name="FechaAsistencia" id="FechaAsistencia" value="<?php echo date('Y-m-d'); ?>" required>
            @error('FechaAsistencia')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
        </div>
        <div class="form-group row">

          <label for="HoraAsistencia" class="col-md-4 col-form-label text-md-right">{{ __('HORA:') }}</label>
          <div class="col-md-6">
            <input type="time" name="HoraAsistencia" id="HoraAsistencia" value="<?php echo date('H:i'); ?>" required>
            @error('HoraAsistencia')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
        </div>
      </div>
      <div class="modal-footer">
       <span class="pull-left">
        <button type="button" 
        class="btn btn-default" 
        data-dismiss="modal">Cancelar</button>
      </span>
      <span class="pull-right">
        <button type="submit" class="btn btn-primary">
          {{ __('Agregar Asistencia') }}
        </button>
      </form>
    </span>
  </div>
</div>
</div>
</div>
<!--MODAL PARA EDITAR-->
<!--MODAL PARA EDITAR-->
<!--MODAL PARA EDITAR-->

<div class="modal fade" id="modaleditar" 
tabindex="-1" role="dialog" 
aria-labelledby="favoritesModalLabel">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" 
      data-dismiss="modal" 
      aria-label="Close">
      <span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title" 
      id="favoritesModalLabel"></h4>
    </div>
    <div class="modal-body">
     @if($asistenciaedit!=null)
     <form  method="POST"  action="{{ url('Actualizar_Asistencia_docente')}}/{{$asistenciaedit->IdAsistencia}}" enctype="multipart/form-data">
      @csrf
      {{ csrf_field() }}
      {{ method_field('POST') }}
      <!--IDAsistencia-->
      <div class="form-group row">

        <label for="FechaAsistencia" class="col-md-4 col-form-label text-md-right">{{ __('FECHA:') }}</label>
        <div class="col-md-6">
          <input type="date" name="Fechaasistenciaedit" id="Fechaasistenciaedit" value="{{$asistenciaedit->FechaAsistencia}}" required>
          @error('FechaAsistencia')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
      </div>
      <div class="form-group row">

        <label for="HoraAsistencia" class="col-md-4 col-form-label text-md-right">{{ __('HORA:') }}</label>
        <div class="col-md-6">
          <input type="time" name="Horaasistenciaedit" id="Horaasistenciaedit" value="{{$asistenciaedit->HoraAsistencia}}" required>
          @error('HoraAsistencia')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
      </div>

      <div class="modal-footer">
        <button type="button" 
        class="btn btn-default" 
        data-dismiss="modal">Cancelar</button>
        <span class="pull-right">
          <button type="submit" class="btn btn-primary">
            Guardar Cambios
          </button>
          </form>
          @endif
        </span>
      </div>
    </div>
  </div>
</div>


@endsection