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
@if ($errors->any())
<div class="alert alert-danger">
  <ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif
<p class="row justify-content-center"> Curso Actual: {{$cursoactual->ClaveCurso}} Unidad: {{$cursoactual->Unidad}}</p>
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('Practica unidad') }}{{$cursoactual->Unidad}}</div>

        <form  method="POST"  action="{{ url('Actualizar_Practica_docente')}}/{{$practica->IdPractica}}" enctype="multipart/form-data">
          @csrf
          {{ csrf_field() }}
          {{ method_field('POST') }}
          <!--ID-->
          @if($practica->NumeroPractica==1)
          <p class="row justify-content-center">Practica:{{$NombrePractica1}}</p>
          @endif
          @if($practica->NumeroPractica==2)
          <p class="row justify-content-center">Practica:{{$NombrePractica2}}</p>
          @endif
          <div class="form-group row" style="display: none;">
            <label for="IdPractica" class="col-md-4 col-form-label text-md-right">{{ __('IdPractica') }}</label>

            <div class="col-md-6">
              <input id="IdExamen" type="text" class="form-control @error('IdExamen') is-invalid @enderror" name="IdPractica" value="{{$practica->IdPractica}}" required autocomplete="IdExamen"  autofocus>
            </div>
          </div>
          <!--INGRESAR EL Estado-->
          <div class="form-group row">
            <label for="EstadoPractica" class="col-md-4 col-form-label text-md-right">{{ __('Estado') }}</label>
            <div class="custom-control custom-switch">
              @if($practica->EstadoPractica==0)
              <input type="checkbox" class="custom-control-input" id="EstadoPractica" name="EstadoPractica" value="1">
              @endif
              @if($practica->EstadoPractica==1)
              <input type="checkbox" class="custom-control-input" id="EstadoPractica" name="EstadoPractica" value="1" checked>
              @endif
              <label class="custom-control-label checkbox-md-right" for="EstadoPractica"></label>
            </div>
          </div>
          <!--   FECHA Examen -->
          <div class="form-group row">

           <label for="FechaPractica" class="col-md-4 col-form-label text-md-right">{{ __('Fecha') }}</label>
           <div class="col-md-6">
            <input type="date" name="FechaPractica" id="FechaPractica" value="{{$practica->FechaPractica}}" required>
            @error('FechaPractica')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
        </div>

        <!-- Hora Practica-->
        <div class="form-group row">

          <label for="HoraInicioPractica" class="col-md-4 col-form-label text-md-right">{{ __('HORA:') }}</label>
          <div class="col-md-6">
            <input type="time" name="HoraInicioPractica" id="HoraInicioPractica" value="{{$practica->HoraInicioPractica}}" required> -  <input type="time" name="HoraFinPractica" id="HoraFinPractica" value="{{$practica->HoraFinPractica}}" required>
            @error('HoraInicoPractica')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
        </div>
   
      <div class="form-group row mb-0">
        <div class="col-md-6 offset-md-4">
          <button type="submit" class="btn btn-primary">
            {{ __('Editar Practica') }}
          </button>
        </div>
      </div>
    </form>
  </div>
</div>
</div>
</div>
@endsection

