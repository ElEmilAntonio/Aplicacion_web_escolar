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
                <div class="card-header">{{ __('Editar Actividad') }}</div>

                   <form  method="POST"  action="{{ url('Actualizar_Actividad_Docente')}}/{{$actividad->IdActividad }}" enctype="multipart/form-data">
                    @csrf
                    {{ csrf_field() }}
                    {{ method_field('POST') }}
                    <!--ID-->
                     <div class="form-group row" style="display: none;">
                        <label for="NombreActividad" class="col-md-4 col-form-label text-md-right">{{ __('IdActividad') }}</label>

                        <div class="col-md-6">
                            <input id="IdActividad" type="text" class="form-control @error('IdActividad') is-invalid @enderror" name="NombreTema" value="{{$actividad->IdActividad}}" required autocomplete="IdActividad"  autofocus>

                            @error('NombreActividad')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <!--INGRESAR EL NOMBRE-->
                    <div class="form-group row">
                        <label for="NombreActividad" class="col-md-4 col-form-label text-md-right">{{ __('Nombre Actividad') }}</label>

                        <div class="col-md-6">
                            <input id="NombreActividad" type="text" class="form-control @error('NombreActividad') is-invalid @enderror" name="NombreActividad" value="{{$actividad->NombreActividad}}" required autocomplete="NombreActividad" autofocus>

                            @error('NombreActividad')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <!--   FECHA ACTIVIDAD -->
                    <div class="form-group row">

                       <label for="FechaActividad" class="col-md-4 col-form-label text-md-right">{{ __('Fecha') }}</label>
                       <div class="col-md-6">
                          <input type="date" name="FechaActividad" id="FechaActividad" value="{{$actividad->FechaActividad}}" required>
                          @error('FechaActividad')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                    <!--INGRESAR EL Estado-->
                    <div class="form-group row">
                      <label for="EstadoActividad" class="col-md-4 col-form-label text-md-right">{{ __('Estado') }}</label>
                      <div class="custom-control custom-switch">
                      @if($actividad->EstadoActividad==0)
                        <input type="checkbox" class="custom-control-input" id="EstadoActividad" name="EstadoActividad" value="1">
                        @endif
                          @if($actividad->EstadoActividad==1)
                        <input type="checkbox" class="custom-control-input" id="EstadoActividad" name="EstadoActividad" value="1" checked>
                        @endif
                        <label class="custom-control-label checkbox-md-right" for="EstadoActividad"></label>
                        @error('EstadoActividad')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                    <!--//DESCARGAR EL ARCHIVO-->
                    @if($actividad->ArchivoActividad!=null)
                    <a onclick="location.href='/Descargar_Archivo_Docente/{{ $actividad->ArchivoActividad}}'" method="GET" class="row justify-content-center"><u>{{$actividad->ArchivoActividad}}</u></a>
                    @endif
                    <!--   //INGRESAR EL ARCHIVO-->
                    <div class="form-group row">
                        <label for="ArchivoActividad" class="col-md-4 col-form-label text-md-right">{{ __('Archivo') }}</label>

                        <div class="col-md-6">
                            <input id="ArchivoActividad" type="file" class="form-control-file" name="ArchivoActividad"></input> 

                            @error('ArchivoActividad')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <!--  //INGRESAR LA INFORMACION -->
                    <div class="form-group row">
                        <label for="InstruccionesActividad" class="col-md-4 col-form-label text-md-right">{{ __('Informacion') }}</label>

                        <div class="col-md-6">
                            <textarea rows=5 id="InstruccionesActividad" type="text" class="form-control @error('InstruccionesActividad') is-invalid @enderror" name="InstruccionesActividad" >{{$actividad->InstruccionesActividad}}
                            </textarea> 

                            @error('InstruccionesActividad')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <!--    //INGRESAR EL LINK DE YOUTUBE-->

                    <!--   ESTADO Tema -->
                    
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

<script>
    var msg = '{{Session::get('alert')}}';
    var exist = '{{Session::has('alert')}}';
    if(exist){
      alert(msg);
  }
</script>
