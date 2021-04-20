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
<div class="container">
  <p class="row justify-content-center"> Curso Actual: {{$cursoactual->ClaveCurso}} Unidad: {{$cursoactual->Unidad}}</p>
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Examen Unidad {{$cursoactual->Unidad}}</div>
        <div class="card-body">
          @if($examen->EstadoExamen===1)
          <p class="row justify-content-center">El Examen de la unidad {{$cursoactual->ClaveCurso}} esta disponible</p>
          <p class="row justify-content-center">Fecha de realizacion: {{$examen->FechaExamen}}</p>
          <p class="row justify-content-center">Horaio de realizacion de  {{$examen->HoraInicioExamen}} a {{$examen->HoraFinExamen}}</p>
           @if(date("Y-m-d")===date("Y-m-d",strtotime($examen->FechaExamen)))
         
          @if(date("H:i")<=date("H:i",strtotime($examen->HoraFinExamen))
         &&date("H:i")>=date("H:i",strtotime($examen->HoraInicioExamen)))
          @if($examenalumno->EstadoExamen===0)
           <p class="row justify-content-center">
          <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" 
          data-target="#MensajeExamen">
          Iniciar Examen
        </button></p>
        @endif
         @if($examenalumno->EstadoExamen===1)
           <p class="row justify-content-center">
          <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" 
          data-target="#MensajeExamen">
          Continuar Examen
        </button></p>
        @endif
         @if(date("H:i",strtotime($examen->HoraInicioExamen))>date("H:i"))
             <p class="row justify-content-center">Aun no es tiempo para realizar el examen</p>>
         @endif
          @if(date("H:i")>date("H:i",strtotime($examen->HoraFinExamen)))
             <p class="row justify-content-center">Ah pasado el tiempo para realizar el examen</p>>
         @endif
        @endif
        @if($examenalumno->EstadoExamen===2)
         <p class="row justify-content-center">Usted ya ah realizado el examen</p>
        @endif
        @endif
        @endif
          @if($examen->EstadoExamen===0)
           <p class="row justify-content-center">Examen no esta disponible</p>
           @endif
      </div>
    </div>
  </div>
</div>
</div>
</div>

<div class="modal fade" id="MensajeExamen" 
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
        <p class="row justify-content-center">
        Antes de comenzar el examen, se le recuerda que debe leer con antención las preguntas.
        </p>
      </div>
      <div class="modal-footer">
        <button type="button" 
           class="btn btn-default" 
           data-dismiss="modal">Cancelar</button>
        <span class="pull-right">
          <button type="button" class="btn btn-primary" onclick="location.href='/tomar_examen_alumno'" method="POST">
            Iniciar Examen
          </button>
        </span>
      </div>
    </div>
  </div>
</div>

@endsection