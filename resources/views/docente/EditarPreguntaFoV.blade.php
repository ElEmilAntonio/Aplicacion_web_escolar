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
                <div class="card-header">Pregunta Falo o Verdero</div>
                <div class="card-body">
                
               <form  method="POST"  action="{{ url('Actualizar_Pregunta_FoV')}}/{{$pregunta->IdPregunta }}" enctype="multipart/form-data">
      @csrf
      {{ csrf_field() }}
      {{ method_field('POST') }}
        <div class="form-group row">
          <label for="Aplicaciones" class="col-md-4 col-form-label text-md-right">{{ __('Pregunta:') }}</label>

          <div class="col-md-6">
            <textarea rows=3 id="Pregunta" type="text" class="form-control @error('Pregunta') is-invalid @enderror" name="Pregunta" >{{$pregunta->Pregunta}}</textarea> 

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
           @if($pregunta->Respuesta===0)
           <input type="radio" id="Respuesta" name="Respuesta" value="0" checked>Falso     
           <input type="radio" id="Respuesta" name="Respuesta" value="1">Verdadero  
           @endif
             @if($pregunta->Respuesta===1)
           <input type="radio" id="Respuesta" name="Respuesta" value="0" checked>Falso     
           <input type="radio" id="Respuesta" name="Respuesta" value="1" checked>Verdadero  
           @endif
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
                            {{ __('Editar Actividad') }}
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
