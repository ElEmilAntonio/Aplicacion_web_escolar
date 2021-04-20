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
<p class="row justify-content-center"> Curso Actual: {{$cursoactual->ClaveCurso}} Unidad: {{$cursoactual->Unidad}}</p>
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('Examen unidad') }}{{$cursoactual->Unidad}}</div>

        <form  method="POST"  action="{{ url('Actualizar_examen_docente')}}/{{$examen->IdExamen}}" enctype="multipart/form-data">
          @csrf
          {{ csrf_field() }}
          {{ method_field('POST') }}
          <!--ID-->
          <div class="form-group row" style="display: none;">
            <label for="IdExamen" class="col-md-4 col-form-label text-md-right">{{ __('IdExamen') }}</label>

            <div class="col-md-6">
              <input id="IdExamen" type="text" class="form-control @error('IdExamen') is-invalid @enderror" name="IdExamen" value="{{$examen->IdExamen}}" required autocomplete="IdExamen"  autofocus>
            </div>
          </div>
          <!--INGRESAR EL Estado-->
          <div class="form-group row">
            <label for="EstadoExamen" class="col-md-4 col-form-label text-md-right">{{ __('Estado') }}</label>
            <div class="custom-control custom-switch">
              @if($examen->EstadoExamen==0)
              <input type="checkbox" class="custom-control-input" id="EstadoExamen" name="EstadoExamen" value="1">
              @endif
              @if($examen->EstadoExamen==1)
              <input type="checkbox" class="custom-control-input" id="EstadoExamen" name="EstadoExamen" value="1" checked>
              @endif
              <label class="custom-control-label checkbox-md-right" for="EstadoExamen"></label>
              @error('EstadoExamen')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
          </div>
          <!--   FECHA Examen -->
          <div class="form-group row">

           <label for="FechaExamen" class="col-md-4 col-form-label text-md-right">{{ __('Fecha') }}</label>
           <div class="col-md-6">
            <input type="date" name="FechaExamen" id="FechaExamen" value="{{$examen->FechaExamen}}" required>
            @error('FechaExamen')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
        </div>

        <!-- Hora Examen-->
        <div class="form-group row">

          <label for="HoraAsistencia" class="col-md-4 col-form-label text-md-right">{{ __('HORA:') }}</label>
          <div class="col-md-6">
            <input type="time" name="HoraInicioExamen" id="HoraInicioExamen" value="{{$examen->HoraInicioExamen}}" required> -  <input type="time" name="HoraFinExamen" id="HoraFinExamen" value="{{$examen->HoraFinExamen}}" required>
            @error('HoraAsistencia')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
        </div>
        <!-- Numero Preguntas-->
        <?php $NumeroPreguntas=0; ?>
        <div class="form-group row">
         <label for="NumeroPreguntas" class="col-md-4 col-form-label text-md-right">{{ __('Numero de Preguntas:') }}</label>
         <div class="col-md-6">
           <select name="NumeroPreguntas" id="NumeroPreguntas">
            <option  value="{{$examen->CantidadPreguntas}}">{{$examen->CantidadPreguntas}}</option>
            @foreach($preguntas as $pregunta)
            <?php $NumeroPreguntas++; ?>
            <option value="{{$NumeroPreguntas}}">{{$NumeroPreguntas}}</option>
            @endforeach
          </select> 
        </div>
      </div>
      <div class="form-group row mb-0">
        <div class="col-md-6 offset-md-4">
          <button type="submit" class="btn btn-primary">
            {{ __('Editar Examen') }}
          </button>
        </div>
      </div>
    </form>
  </div>
</div>
</div>
<p></p>
<p align="center">  <button 
 type="button" 
 class="btn btn-primary btn-lg" 
 data-toggle="modal" 
 data-target="#FoV">
 Añadir Falso o Verdadero
</button>
<button 
type="button" 
class="btn btn-primary btn-lg" 
data-toggle="modal" 
data-target="#Opciones">
Añadir Opcion Multiple
</button>
<button 
type="button" 
class="btn btn-primary btn-lg" 
data-toggle="modal" 
data-target="#Relacional">
Añadir Relacional
</button>
</p>
<?php $NumeroPreguntastabla=0; ?>
   <div class="table-responsive-sm">
<table class="table table-striped ">
  <thead>
   <th style="padding:1px">Numero</th>
   <th style="padding:1px">Pregunta</th>
   <th style="padding:1px">Tipo</th>
   <th style="padding:1px">Opciones</th>
   <th style="padding:1px"></th>
 </thead>
 @if (count($preguntas) > 0)
 <tbody>
  @foreach ($preguntas as $pregunta)  
  <tr>
    <?php $NumeroPreguntastabla++; ?>
    <td class="table-text" style="padding:1px"><div> {{$NumeroPreguntastabla}} </div></td>
    <td class="table-text"><div>{{$pregunta->Pregunta}}</div></td>
    @if($pregunta->TipoPregunta===1)
    <td class="table-text" style="padding:1px"><div>Falso - Verdadero</div></td>
    @endif
    @if($pregunta->TipoPregunta===2)
    <td class="table-text" style="padding:1px"><div>Opcion Multiple</div></td>
    @endif
    @if($pregunta->TipoPregunta===3)
    <td class="table-text" style="padding:1px"><div>Relaciones</div></td>
    @endif
      @if($pregunta->TipoPregunta===1)
    <td style="padding:1px">     
      <button type="submit" class="btn btn-success btn-sm" onclick="location.href='/Editar_Pregunta_FoV/{{$pregunta->IdPregunta}}'" method="POST">
        <i class="fa fa-btn fa-pencil"></i>Editar
      </button>
    </td>
    <td style="padding:1px">
      <button type="submit" class="btn btn-danger  btn-sm" onclick="location.href='/Eliminar_Pregunta_FoV/{{$pregunta->IdPregunta}}/{{$examen->IdExamen}}/{{$NumeroPreguntas}}'" method="POST">
        <i class="fa fa-btn fa-trash"></i>Eliminar
      </button>
    </form>
  </td>
     @endif

      @if($pregunta->TipoPregunta===2)
    <td style="padding:1px">     
      <button type="submit" class="btn btn-success btn-sm" onclick="location.href='/Editar_Pregunta_Opciones/{{$pregunta->IdPregunta}}'" method="POST">
        <i class="fa fa-btn fa-pencil"></i>Editar
      </button>
    </td>
    <td style="padding:1px">
      <button type="submit" class="btn btn-danger btn-sm" onclick="location.href='/Eliminar_Pregunta_Opciones/{{$pregunta->IdPregunta}}/{{$examen->IdExamen}}/{{$NumeroPreguntas}}'" method="POST">
        <i class="fa fa-btn fa-trash"></i>Eliminar
      </button>
    </form>
  </td>
     @endif

      @if($pregunta->TipoPregunta===3)
    <td style="padding:1px">     
      <button type="submit" class="btn btn-success btn-sm" onclick="location.href='/Editar_Pregunta_Relacional/{{$pregunta->IdPregunta}}'" method="POST">
        <i class="fa fa-btn fa-pencil"></i>Editar
      </button>
    </td>
    <td style="padding:1px">
      <button type="submit" class="btn btn-danger btn-sm" onclick="location.href='/Eliminar_Pregunta_Relacional/{{$pregunta->IdPregunta}}/{{$examen->IdExamen}}/{{$NumeroPreguntas}}'" method="POST">
        <i class="fa fa-btn fa-trash"></i>Eliminar
      </button>
    </form>
  </td>
     @endif
</tr>
@endforeach
@endif
</tbody>
</table>
</div>
</div>
</div>
<!-- Falso o Verdadero-->
<!-- Falso o Verdadero-->
<!-- Falso o Verdadero-->
<!-- Falso o Verdadero-->
<!-- Falso o Verdadero-->
<div class="modal fade" id="FoV" 
tabindex="-1" role="dialog" 
aria-labelledby="AgregarAsistenciaModalLabel">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" 
      data-dismiss="modal" 
      aria-label="Close">
      <span aria-hidden="true">&times;</span></button>
    </div>
    <a class="row justify-content-center">NUEVA PREGUNTA</a>
    <form  method="POST" action="{{ route('Guardar_PreguntaFoV_docente') }}" enctype="multipart/form-data">
      @csrf
      {{ csrf_field() }}
      {{ method_field('POST') }}
      <div class="modal-body">
        <div class="form-group row">
          <label for="Aplicaciones" class="col-md-4 col-form-label text-md-right">{{ __('Pregunta:') }}</label>

          <div class="col-md-6">
            <textarea rows=3 id="Pregunta" type="text" class="form-control @error('Pregunta') is-invalid @enderror" name="Pregunta" ></textarea> 

            @error('Pregunta')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
        </div>
        <div class="form-group row">
          <label for="Aplicaciones" class="col-md-4 col-form-label text-md-right">{{ __('Respuesta:') }}</label>

          <div class="col-md-6">

           <input type="radio" id="Respuesta" name="Respuesta" value="0">Falso     
           <input type="radio" id="Respuesta" name="Respuesta" value="1">Verdadero  
           @error('Respuesta')
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
        {{ __('Agregar Pregunta') }}
      </button>
    </form>
  </span>
</div>
</div>
</div>
</div>
<!-- Opcion Multiple-->
<!-- Opcion Multiple-->
<!-- Opcion Multiple-->
<!-- Opcion Multiple-->
<!-- Opcion Multiple-->
<div class="modal fade" id="Opciones" 
tabindex="-1" role="dialog" 
aria-labelledby="AgregarAsistenciaModalLabel">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" 
      data-dismiss="modal" 
      aria-label="Close">
      <span aria-hidden="true">&times;</span></button>
    </div><a class="row justify-content-center">NUEVA PREGUNTA</a>
    <form  method="POST" action="{{ route('Guardar_PreguntaOpciones_docente') }}" enctype="multipart/form-data">
      @csrf
      {{ csrf_field() }}
      {{ method_field('POST') }}
      <div class="modal-body">
      <div class="form-group row">
          <label for="Aplicaciones" class="col-md-4 col-form-label text-md-right">{{ __('Pregunta:') }}</label>

          <div class="col-md-6">
            <textarea rows=3 id="Pregunta" type="text" class="form-control @error('Pregunta') is-invalid @enderror" name="Pregunta" ></textarea> 

            @error('Pregunta')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
        </div>
      <div class="form-group row">
        <label for="OpcionA" class="col-md-4 col-form-label text-md-right">{{ __('OpcionA') }}</label>

        <div class="col-md-6">
          <input id="OpcionA" type="text" class="form-control @error('OpcionA') is-invalid @enderror" name="OpcionA" >

          @error('OpcionA')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
      </div>
       <div class="form-group row">
        <label for="OpcionB" class="col-md-4 col-form-label text-md-right">{{ __('OpcionB') }}</label>

        <div class="col-md-6">
          <input id="OpcionB" type="text" class="form-control @error('OpcionB') is-invalid @enderror" name="OpcionB" >

          @error('OpcionB')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
      </div>
       <div class="form-group row">
        <label for="OpcionC" class="col-md-4 col-form-label text-md-right">{{ __('OpcionC') }}</label>

        <div class="col-md-6">
          <input id="OpcionC" type="text" class="form-control @error('OpcionC') is-invalid @enderror" name="OpcionC" >

          @error('OpcionC')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
      </div>
        <div class="form-group row">
          <label for="Aplicaciones" class="col-md-4 col-form-label text-md-right">{{ __('Respuesta:') }}</label>

          <div class="col-md-6">

           <input type="radio" id="Respuesta" name="Respuesta" value="1">A      
           <input type="radio" id="Respuesta" name="Respuesta" value="2">B 
             <input type="radio" id="Respuesta" name="Respuesta" value="3">C  
           @error('Respuesta')
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
        {{ __('Agregar Pregunta') }}
      </button>
    </form>
  </span>
</div>
</div>
</div>
</div>

<!--Relacional-->
<!--Relacional-->
<!--Relacional-->
<!--Relacional-->
<!--Relacional-->
<div class="modal fade" id="Relacional" 
tabindex="-1" role="dialog" 
aria-labelledby="AgregarAsistenciaModalLabel">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" 
      data-dismiss="modal" 
      aria-label="Close">
      <span aria-hidden="true">&times;</span></button>
    </div><a class="row justify-content-center">NUEVA PREGUNTA</a>
    <form  method="POST" action="{{ route('Guardar_PreguntaRelacional_docente') }}" enctype="multipart/form-data">
      @csrf
      {{ csrf_field() }}
      {{ method_field('POST') }}
      <div class="modal-body">
       <!--Pregunta 1-->
        <div class="form-group row">
        <label for="Pregunta1" class="col-md-4 col-form-label text-md-right">{{ __('Pregunta1:') }}</label>

        <div class="col-md-6">
          <input id="Pregunta1" type="text" class="form-control @error('Pregunta1') is-invalid @enderror" name="Pregunta1" >

          @error('Pregunta1')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
      </div>
         <!--Respuesta 1-->
          <div class="form-group row">
        <label for="Respuesta1" class="col-md-4 col-form-label text-md-right">{{ __('Respuesta1:') }}</label>

        <div class="col-md-6">
          <input id="Respuesta1" type="text" class="form-control @error('Respuesta1') is-invalid @enderror" name="Respuesta1" >

          @error('Respuesta1')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
      </div>
        <hr>
         <!--Pregunta 2-->
        <div class="form-group row">
        <label for="Pregunta2" class="col-md-4 col-form-label text-md-right">{{ __('Pregunta2:') }}</label>

        <div class="col-md-6">
          <input id="Pregunta2" type="text" class="form-control @error('Pregunta2') is-invalid @enderror" name="Pregunta2" >

          @error('Pregunta2')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
      </div>
         <!--Respuesta 2-->
          <div class="form-group row">
        <label for="Respuesta2" class="col-md-4 col-form-label text-md-right">{{ __('Respuesta2:') }}</label>

        <div class="col-md-6">
          <input id="Respuesta2" type="text" class="form-control @error('Respuesta2') is-invalid @enderror" name="Respuesta2" >

          @error('Respuesta2')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
      </div>
        <hr>
       <!--Pregunta 3-->
        <div class="form-group row">
        <label for="Pregunta3" class="col-md-4 col-form-label text-md-right">{{ __('Pregunta3:') }}</label>

        <div class="col-md-6">
          <input id="Pregunta3" type="text" class="form-control @error('Pregunta3') is-invalid @enderror" name="Pregunta3" >

          @error('Pregunta3')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
      </div>
         <!--Respuesta 3-->
          <div class="form-group row">
        <label for="Respuesta3" class="col-md-4 col-form-label text-md-right">{{ __('Respuesta3:') }}</label>

        <div class="col-md-6">
          <input id="Respuesta3" type="text" class="form-control @error('Respuesta3') is-invalid @enderror" name="Respuesta3" >

          @error('Respuesta3')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
      </div>
      <hr>
       <!--Pregunta 4-->
        <div class="form-group row">
        <label for="Pregunta4" class="col-md-4 col-form-label text-md-right">{{ __('Pregunta4:') }}</label>

        <div class="col-md-6">
          <input id="Pregunta4" type="text" class="form-control @error('Pregunta4') is-invalid @enderror" name="Pregunta4" >

          @error('Pregunta4')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
      </div>
         <!--Respuesta 4-->
          <div class="form-group row">
        <label for="Respuesta4" class="col-md-4 col-form-label text-md-right">{{ __('Respuesta4:') }}</label>

        <div class="col-md-6">
          <input id="Respuesta4" type="text" class="form-control @error('Respuesta4') is-invalid @enderror" name="Respuesta4" >

          @error('Respuesta4')
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
          {{ __('Agregar Pregunta') }}
        </button>
      </form>
    </span>
  </div>
</div>
</div>
</div>
@endsection
