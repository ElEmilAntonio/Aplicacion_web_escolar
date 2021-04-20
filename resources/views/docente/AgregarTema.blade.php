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
                <div class="card-header">{{ __('Nuevo Tema') }}</div>

                <div class="card-body">
                     <form  method="POST" action="{{ route('Guardar_Teoria_docente') }}" enctype="multipart/form-data">
                        @csrf
                         {{ csrf_field() }}
                         {{ method_field('POST') }}
                        <!--ID-->
                        <!--INGRESAR EL NOMBRE-->
                        <div class="form-group row">
                            <label for="NombreTema" class="col-md-4 col-form-label text-md-right">{{ __('Nombre Tema') }}</label>

                            <div class="col-md-6">
                                <input id="NombreTema" type="text" class="form-control @error('NombreTema') is-invalid @enderror" name="NombreTema" value="{{ old('NombreTema') }}" required autocomplete="NombreTema" autofocus>

                                @error('NombreTema')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                     <!--   //INGRESAR EL ARCHIVO-->
                     <div class="form-group row">
                            <label for="ArchivoTema" class="col-md-4 col-form-label text-md-right">{{ __('Archivo') }}</label>

                            <div class="col-md-6">
                                <input id="ArchivoTema" type="file" class="form-control-file" name="ArchivoTema"></input> 

                                @error('ArchivoTema')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                       <!--  //INGRESAR LA INFORMACION -->
                        <div class="form-group row">
                            <label for="InformacionTema" class="col-md-4 col-form-label text-md-right">{{ __('Informacion') }}</label>

                            <div class="col-md-6">
                                <textarea rows=5 id="InformacionTema" type="text" class="form-control @error('InformacionTema') is-invalid @enderror" name="InformacionTema" ></textarea> 

                                @error('InformacionTema')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                     <!--    //INGRESAR EL LINK DE YOUTUBE-->
                        <div class="form-group row">
                            <label for="LinkVideoTema" class="col-md-4 col-form-label text-md-right">{{ __('Video Youtube') }}</label>

                            <div class="col-md-6">
                                <input id="LinkVideoTema" type="text" class="form-control @error('LinkVideoTema') is-invalid @enderror" name="LinkVideoTema">

                                @error('LinkVideoTema')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                
                     <!--   ESTADO Tema -->
                        <div class="form-group row">
                              <label for="EstadoTema" class="col-md-4 col-form-label text-md-right">{{ __('Estado') }}</label>
                           <div class="custom-control custom-switch">
    <input type="checkbox" class="custom-control-input" id="EstadoTema" name="EstadoTema" value="1">
    <label class="custom-control-label checkbox-md-right" for="EstadoTema"></label>
    @error('EstadoTema')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
  </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Agregar Tema') }}
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

 <script>
    var msg = '{{Session::get('alert')}}';
    var exist = '{{Session::has('alert')}}';
    if(exist){
      alert(msg);
    }
  </script>
