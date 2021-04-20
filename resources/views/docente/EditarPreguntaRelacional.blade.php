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
                <div class="card-header">Pregunta Relacional</div>
                <div class="card-body">
                
               <form  method="POST"  action="{{ url('Actualizar_Pregunta_Relacional')}}/{{$identificador->IdPregunta}}" enctype="multipart/form-data">
                  <?php $NumeroPregunta=0 ?>
                  <?php $NumeroRespuesta=0 ?>
      @csrf
      {{ csrf_field() }}
      {{ method_field('POST') }}
      @foreach($preguntas as $pregunta)
        <?php $NumeroPregunta++ ?>
        <?php $NumeroRespuesta++ ?>
               <!--Pregunta 1-->
        <div class="form-group row">
        <label for="Pregunta1" class="col-md-4 col-form-label text-md-right">{{ __('Pregunta'.$NumeroPregunta) }}</label>

        <div class="col-md-6">
          <input id="Pregunta1" type="text" class="form-control @error('Pregunta1') is-invalid @enderror" name="Pregunta{{$NumeroPregunta}}" value="{{$pregunta->Pregunta}}" >

          @error('Pregunta{{$NumeroPregunta}}')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
      </div>
      <?php $Numero=0 ?>
         <!--Respuesta 1-->
           @foreach($respuestas as $respuesta)
           <?php $Numero++ ?>
           @if($NumeroRespuesta===$Numero)
          <div class="form-group row">
        <label for="Respuesta1" class="col-md-4 col-form-label text-md-right">{{ __('Respuesta'.$NumeroRespuesta) }}</label>

        <div class="col-md-6">
          <input id="Respuesta1" type="text" class="form-control @error('Respuesta1') is-invalid @enderror" name="Respuesta{{$NumeroRespuesta}}" value="{{$respuesta->Respuesta}}" >

          @error('Respuesta{{$NumeroRespuesta}}')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
      </div>
      @endif
      @endforeach
        <hr>
         @endforeach

       <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Editar Pregunta') }}
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
