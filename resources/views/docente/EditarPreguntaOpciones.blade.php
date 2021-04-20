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
<p class="row justify-content-center"> Curso Actual: {{$cursoactual->ClaveCurso}} Unidad: {{$cursoactual->Unidad}}</p>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Pregunta Opcion Multiple</div>
                <div class="card-body">
                
              <form  method="POST"  action="{{ url('Actualizar_Pregunta_Opciones')}}/{{$pregunta->IdPregunta }}" enctype="multipart/form-data">
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
        <label for="OpcionA" class="col-md-4 col-form-label text-md-right">{{ __('OpcionA') }}</label>

        <div class="col-md-6">
          <input id="OpcionA" type="text" class="form-control @error('OpcionA') is-invalid @enderror" name="OpcionA" value="{{$pregunta->OpcionA}}">

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
          <input id="OpcionB" type="text" class="form-control @error('OpcionB') is-invalid @enderror" name="OpcionB" value="{{$pregunta->OpcionB}}">

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
          <input id="OpcionC" type="text" class="form-control @error('OpcionC') is-invalid @enderror" name="OpcionC" value="{{$pregunta->OpcionA}}" >

          @error('OpcionC')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
      </div>
        <div class="form-group row">
             @if($pregunta->Respuesta===1)
          <label for="Aplicaciones" class="col-md-4 col-form-label text-md-right">{{ __('Respuesta:') }}</label>
          <div class="col-md-6">
           <input type="radio" id="Respuesta" name="Respuesta" value="1" checked>A      
           <input type="radio" id="Respuesta" name="Respuesta" value="2">B 
             <input type="radio" id="Respuesta" name="Respuesta" value="3">C  
           @error('Respuesta')
           <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        @endif

         @if($pregunta->Respuesta===2)
          <label for="Aplicaciones" class="col-md-4 col-form-label text-md-right">{{ __('Respuesta:') }}</label>
          <div class="col-md-6">
           <input type="radio" id="Respuesta" name="Respuesta" value="1">A      
           <input type="radio" id="Respuesta" name="Respuesta" value="2" checked>B 
             <input type="radio" id="Respuesta" name="Respuesta" value="3">C  
           @error('Respuesta')
           <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        @endif

         @if($pregunta->Respuesta===3)
          <label for="Aplicaciones" class="col-md-4 col-form-label text-md-right">{{ __('Respuesta:') }}</label>
          <div class="col-md-6">
           <input type="radio" id="Respuesta" name="Respuesta" value="1">A      
           <input type="radio" id="Respuesta" name="Respuesta" value="2">B 
             <input type="radio" id="Respuesta" name="Respuesta" value="3" checked>C  
           @error('Respuesta')
           <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        @endif
      </div>

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
