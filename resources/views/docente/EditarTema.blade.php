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
                <div class="card-header">{{ __('Editar Tema') }}</div>

                   <form  method="POST"  action="{{ url('Actualizar_Teoria_Docente')}}/{{$tema->IdTema }}" enctype="multipart/form-data">
                    @csrf
                    {{ csrf_field() }}
                    {{ method_field('POST') }}
                    <!--ID-->
                     <div class="form-group row" style="display: none;">
                        <label for="NombreTema" class="col-md-4 col-form-label text-md-right">{{ __('IdTema') }}</label>

                        <div class="col-md-6">
                            <input id="IdTema" type="text" class="form-control @error('IdTema') is-invalid @enderror" name="NombreTema" value="{{$tema->IdTema}}" required autocomplete="IdTema"  autofocus>

                            @error('NombreTema')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <!--INGRESAR EL NOMBRE-->
                    <div class="form-group row">
                        <label for="NombreTema" class="col-md-4 col-form-label text-md-right">{{ __('Nombre Tema') }}</label>

                        <div class="col-md-6">
                            <input id="NombreTema" type="text" class="form-control @error('NombreTema') is-invalid @enderror" name="NombreTema" value="{{$tema->NombreTema}}" required autocomplete="NombreTema" autofocus>

                            @error('NombreTema')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <!--//DESCARGAR EL ARCHIVO-->
                    @if($tema->ArchivoTema!=null)
                    <a onclick="location.href='/Descargar_Archivo_Docente/{{ $tema->ArchivoTema}}'" method="GET" class="row justify-content-center"><u>{{$tema->ArchivoTema}}</u></a>
                    @endif
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
                            <textarea rows=5 id="InformacionTema" type="text" class="form-control @error('InformacionTema') is-invalid @enderror" name="InformacionTema" >{{$tema->InformacionTema}}
                            </textarea> 

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
                            <input id="LinkVideoTema" type="text" class="form-control @error('LinkVideoTema') is-invalid @enderror" name="LinkVideoTema" value="{{$tema->LinkVideoTema}}">

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
                      @if($tema->EstadoTema==0)
                        <input type="checkbox" class="custom-control-input" id="EstadoTema" name="EstadoTema" value="1">
                        @endif
                          @if($tema->EstadoTema==1)
                        <input type="checkbox" class="custom-control-input" id="EstadoTema" name="EstadoTema" value="1" checked>
                        @endif
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
                            {{ __('Editar Tema') }}
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
