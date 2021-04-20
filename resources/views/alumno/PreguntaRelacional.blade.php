@extends('layouts.appdeshabilitado')

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
        <div class="card-header">Pregunta Relacional</div>
        <div class="card-body">

         <form  method="POST"  action="{{ url('Responder_Pregunta_Relacional')}}" enctype="multipart/form-data">
          <?php $NumeroPregunta=0 ?>
          <?php $NumeroRespuesta=0 ?>
          @csrf
          {{ csrf_field() }}
          {{ method_field('POST') }}
          @foreach($preguntas as $pregunta)
          <?php $NumeroPregunta++ ?>
          <?php $NumeroRespuesta++ ?>
          <!--Pregunta 1-->
           <div class="form-group row" style="display: none;">
            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

            <div class="col-md-6">
              <input id="IdPregunta" type="text" class="form-control @error('IdPregunta') is-invalid @enderror" name="IdPregunta" value="{{$pregunta->IdPregunta}}" required autocomplete="IdPregunta" autofocus>

              @error('name')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
          </div>
          <div class="form-group row">
            <label for="Pregunta1" class="col-md-4 col-form-label text-md-right">{{ __($pregunta->Pregunta."(".$pregunta->ClavePregunta.")") }}</label>
            <?php $Numero=0 ?>
            @foreach($respuestas as $respuesta)
            <?php $Numero++ ?>
            @if($NumeroRespuesta===$Numero)
            <a>{{$respuesta->Respuesta}}</a>
            <div class="col-md-2">
              <input id="Pregunta1" type="text" class="form-control @error('Pregunta1') is-invalid @enderror" name="Respuesta{{$NumeroRespuesta}}">

              @error('Pregunta{{$NumeroPregunta}}')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
            @endif
            @endforeach
          </div>
          @endforeach

          <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
              <button type="submit" class="btn btn-primary">
                {{ __('Responder pregunta') }}
              </button>
            </div>
          </div>
        </form>

      </div> 
    </div>
  </div>
</div>
</div>
@endsection
