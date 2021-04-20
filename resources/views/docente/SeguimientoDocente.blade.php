@extends('layouts.app')

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

<div class="container-fluid">
<?php
if($ver!=null){
echo'<script type="text/javascript">
   $(document).ready(function() {
    $("#modalactividad").modal("show");
  });
</script>';
}
$arrayactividades=array();
$cantidadactividades=0;
$promedioactividadalumno=0;
?>
  <p class="row justify-content-center"> Curso Actual: {{$cursoactual->ClaveCurso}} Unidad: {{$cursoactual->Unidad}}</p>
   <p><h3>Porcentajes de evaluación: Actividades: {{$porcentajes->Actividades}}, Prácticas: {{$porcentajes->Practicas}},Examen:{{$porcentajes->Examen}}  <button 
    type="button" class="btn btn-primary" data-toggle="modal" 
    data-target="#modaleditar">
     <i class="fa fa-btn fa-pencil"></i> Editar 
  </button></h3> </p>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h3><b>ACTIVIDADES ALUMNOS</b></h3>
    </div>
    <div class="panel-body">
      <div class="table-responsive-sm">
      <table class="table table-striped ">
        <thead>
         <th style="padding:1px">Alumnos</th>
         <th style="padding:1px">Numero Control</th>
         @if(count($tablaactividades)>0)
         @foreach($tablaactividades as $actividad)
         <?php $cantidadactividades++; ?>
        <th style="padding:1px"><FONT SIZE=2> {{$actividad->FechaActividad}}<br>{{$actividad->NombreActividad}}</br></FONT></th>
         @endforeach
         @endif
         <th style="padding:1px"><FONT SIZE=2>Promedio<br>Actividades</FONT></th>
       </thead>
       <tbody>
        @if(count($alumnos)>0)
        @foreach($alumnos as $alumno)
          <?php
         $promedioactividades=0;
         $totalactividades=0;
         ?>
        <tr>
          <td class="table-text" style="padding:1px"><div>{{ $alumno->Apellidos}} {{$alumno->Nombre}}</div></td>
          <td class="table-text" style="padding:1px"><div>{{ $alumno->NumeroControl}}</div></td>
           @foreach($alumnospluck as $alumnopluck)
        @foreach($alumnopluck as $registroactividad)
        @if($registroactividad->get('NumeroControl')==$alumno->NumeroControl)
        <?php 
           $totalactividades+=$registroactividad->get('Calificacion');
                    if($totalactividades>0){
                      $promedioactividades=ceil($totalactividades/$cantidadactividades);
                  }
        ?>  
         <td class="table-text" style="padding:1px"><div><a style="color:black" onclick="location.href='/Seguimiento_docente_actividad/{{$registroactividad->get('ClaveActividadalumno')}}'" method="POST">{{$registroactividad->get('Calificacion')}}</a></div></td>
        @endif
        @endforeach
        @endforeach
        <td class="table-text" style="padding:1px"><div>{{$promedioactividades}}</div></td>
        </tr>
        <?php  array_push($arrayactividades,$promedioactividades);?>
        @endforeach
        @endif
      </tbody>
    </table>
  </div>

<div class="modal fade" id="modalactividad" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-keyboard="false" data-backdrop="static">
   <div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h4><b>Calificación actividad: {{$cursoactual->Unidad}}</b></h4>
      <button type="button" class="close" onclick="location.href='/Seguimiento_docente'" method="POST"
      data-dismiss="modal" 
      aria-label="Close">
      <span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title" 
      id="favoritesModalLabel"></h4>
    </div>
    <div class="modal-body">
    @if($ver!=null)
     <form  method="POST"  action="{{ url('/Seguimiento_Actualizar_Actividad_docente')}}/{{$actividadeditar->ClaveActividadalumno}}" enctype="multipart/form-data">
      @csrf
      {{ csrf_field() }}
      {{ method_field('POST') }}
      <!--IDAsistencia-->
      <div class="form-group row">

        <label for="Actividades" class="col-md-4 col-form-label text-md-right">{{ __('Calificación:') }}</label>
        <div class="col-md-6">
          <input type="text" onkeyup="rango();" name="calificacionactividadedit" id="calificacionactividadedit" value="{{$actividadeditar->Calificacion}}" required >
          @error('CalificacionActividad')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>  
      </div>
      <div class="modal-footer">
        <button type="button" 
        class="btn btn-default" 
        data-dismiss="modal" onclick="location.href='/Seguimiento_docente'">Cancelar</button>
        <span class="pull-right">
          <button id="botonmodalactividad" disabled type="submit" class="btn btn-primary">
            Guardar Cambios
          </button>
          </form>
          @endif
        </span>
      </div>
    </div>
  </div>
</div>
</div>


<div class="panel-heading">
          
          <h3><b>PROMEDIO DE LA UNIDAD</b></h3>
        </div>
        <div class="panel-body">
            <table class="table table-striped ">
                <thead>
                    <th style="padding:1px">Alumnos</th>
         <th style="padding:1px">Numero Control</th>
          <th style="padding:1px">Práctica 1</th>
           <th style="padding:1px">Práctica 2</th>
            <th style="padding:1px">Examen</th>
             <th style="padding:1px">Promedio Unidad</th>
               </thead>
               <tbody>
                @if(count($alumnos)>0)
        @foreach($alumnos as $alumno)
        <?php 
      $NumeroPractica=0;
      $promediopracticas=0;
      $promediounidad=0;
      $examen=0;
?>              <tr>
                 <td class="table-text" style="padding:1px"><div>{{ $alumno->Apellidos}} {{$alumno->Nombre}}</div></td>
          <td class="table-text" style="padding:1px"><div>{{ $alumno->NumeroControl}}</div></td>
            @foreach($alumnospracticaplucks as $alumnopluck)
        @foreach($alumnopluck as $registropractica)
        @if($registropractica->get('NumeroControl')==$alumno->NumeroControl)
        <?php ?>
        @if($registropractica->get('EstadoPractica')==1)
        <td class="table-text" style="padding:1px"><div><a style="color:black" >Realizado</a></div></td>
           <?php $NumeroPractica++;
                     if($NumeroPractica>0){
                      $promediopracticas=($NumeroPractica/2)*100;
                    }
                      ?>
        @endif
        @if($registropractica->get('EstadoPractica')==0)
        <td class="table-text" style="padding:1px"><div><a style="color:black" ><font color="red">Sin Realizar</font></a></div></td>
        @endif
        @endif
        @endforeach
        @endforeach
         @foreach($alumnosexamenplucks as $alumnoexamenpluck)
        @foreach($alumnoexamenpluck as $registroexamen)
        @if($registroexamen->get('NumeroControl')==$alumno->NumeroControl)
        <?php 
        $examen=$registroexamen->get('Calificacion');
         ?>
        @if($registroexamen->get('Calificacion')<70)
        <td class="table-text" style="padding:1px"><div><a style="color:black" ><font color="red">{{$registroexamen->get('Calificacion')}}</font></a></div></td>
        @endif
        @if($registroexamen->get('Calificacion')>=70)
        <td class="table-text" style="padding:1px"><div><a style="color:black" >{{$registroexamen->get('Calificacion')}}</a></div></td>
        @endif
        @endif
        @endforeach
        @endforeach
        
        <?php 
          $porcentajeactividades=0;
           $porcentajepracticas=0;
           $porcentajeexamen=0;
           if($examen>0){
            $porcentajeexamen=($porcentajes->Examen/100)*$examen;
           }
           if($arrayactividades[$promedioactividadalumno]>0){
            $porcentajeactividades=($porcentajes->Actividades/100)*$arrayactividades[$promedioactividadalumno];
           }
           if($promediopracticas>0){
            $porcentajepracticas=($porcentajes->Practicas/100)*$promediopracticas;
           }        
             $promediototal=$porcentajeactividades+$porcentajepracticas+$porcentajeexamen;         
            ?>
        @if($promediototal<70)
       <td class="table-text" style="padding:1px"><div><a style="color:black" ><font color="red">{{$promediototal}}</font></a></div></td>
        @endif
          @if($promediototal>=70)
       <td class="table-text" style="padding:1px"><div><a style="color:black" >{{$promediototal}}</a></div></td>
       </tr>
        @endif
        <?php $promedioactividadalumno++; ?>
        @endforeach
        @endif
            
               </tbody>
           </table>
           <button type="submit" class="btn btn-info" onclick="location.href='/Seguimiento_Registrar_Unidad'" method="POST">
  Registrar Calificaciones Unidad
   </button> <button type="submit" class="btn btn-info" onclick="location.href='/Seguimiento_docente_final'" method="POST">
  Calificacion Final
   </button>
<!--MODAL PARA EDITAR-->
<!--MODAL PARA EDITAR-->
<!--MODAL PARA EDITAR-->

<div class="modal fade" id="modaleditar" 
tabindex="-1" role="dialog" 
aria-labelledby="favoritesModalLabel">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h4><b>Porcentajes de la unidad: {{$cursoactual->Unidad}}</b></h4>
      <button type="button" class="close" 
      data-dismiss="modal" 
      aria-label="Close">
      <span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title" 
      id="favoritesModalLabel"></h4>
    </div>
    <div class="modal-body">
     <form  method="POST"  action="{{ url('/Actualizar_Porcentajes_docente')}}" enctype="multipart/form-data">
      @csrf
      {{ csrf_field() }}
      {{ method_field('POST') }}
      <!--IDAsistencia-->
      <div class="form-group row">

        <label for="Actividades" class="col-md-4 col-form-label text-md-right">{{ __('Actividades:') }}</label>
        <div class="col-md-6">
          <input type="text" onkeyup="sumar();" name="PorcentajeActividades" id="PorcentajeActividades" value="{{$porcentajes->Actividades}}" required >
          @error('Actividades')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        <label for="Prácticas" class="col-md-4 col-form-label text-md-right">{{ __('Prácticas:') }}</label>
        <div class="col-md-6">
          <input type="text" onkeyup="sumar();" name="PorcentajePracticas" id="PorcentajePracticas" value="{{$porcentajes->Practicas}}" required>
          @error('Practicas')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        <label for="Prácticas" class="col-md-4 col-form-label text-md-right">{{ __('Examen:') }}</label>
        <div class="col-md-6">
          <input type="text" onkeyup="sumar();" name="PorcentajeExamen" id="PorcentajeExamen" value="{{$porcentajes->Examen}}" required >
          @error('Examen')
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
          <button id="botonmodaleditar"  type="submit" class="btn btn-primary">
            Guardar Cambios
          </button>
          </form>
        </span>
      </div>
    </div>
  </div>
</div>




@endsection

<script type="text/javascript">
    function sumar(){
       var valor=0;
       var var1=parseInt(document.getElementById("PorcentajeActividades").value);
        var var2=parseInt(document.getElementById("PorcentajePracticas").value);
         var var3=parseInt(document.getElementById("PorcentajeExamen").value);
         valor=var1+var2+var3;
        if(valor==100){
         document.getElementById("botonmodaleditar").disabled = false; 
        }else{
          document.getElementById("botonmodaleditar").disabled = true; 
        }
    }
    function rango(){
      
       var var1=parseInt(document.getElementById("calificacionactividadedit").value);
        
        if(var1<=100&&var1>=0){
         document.getElementById("botonmodalactividad").disabled = false; 
        }else{
          document.getElementById("botonmodalactividad").disabled = true; 
        }
    }
</script>