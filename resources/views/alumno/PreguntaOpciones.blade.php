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
        <div class="card-header">Pregunta Opcion Multiple</div>
        <div class="card-body">

          <form  method="POST"  action="{{ url('Responder_Pregunta_Opciones')}}" enctype="multipart/form-data">
            @csrf
            {{ csrf_field() }}
            {{ method_field('POST') }}
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
            <label for="Aplicaciones" class="col-md-4 col-form-label text-md-right">{{ __('Pregunta:') }}</label>

            <div class="col-md-6">
              <p>{{$pregunta->Pregunta}}</p> 

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
                <input type="radio" id="Respuesta" name="Respuesta" value=1>{{$pregunta->OpcionA}}    
               <input type="radio" id="Respuesta" name="Respuesta" value=2>{{$pregunta->OpcionB}} 
               <input type="radio" id="Respuesta" name="Respuesta" value=3>{{$pregunta->OpcionC}}
               @error('Respuesta')
               <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
          </div>

          <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
              <button type="submit" class="btn btn-primary">
                {{ __('Responder Pregunta') }}
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
