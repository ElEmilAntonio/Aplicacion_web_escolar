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
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('NUEVA ACTIVIDAD') }}</div>

                <div class="card-body">
                   <form  method="POST" action="{{ route('Guardar_Actividad_docente') }}" enctype="multipart/form-data">
                    @csrf
                    {{ csrf_field() }}
                    {{ method_field('POST') }}
                    <!--ID-->
                    <!--INGRESAR EL NOMBRE-->
                    <div class="form-group row">
                        <label for="NombreActividad" class="col-md-4 col-form-label text-md-right">{{ __('Nombre Actividad') }}</label>

                        <div class="col-md-6">
                            <input id="NombreActividad" type="text" class="form-control @error('NombreActividad') is-invalid @enderror" name="NombreActividad" value="{{ old('NombreActividad') }}" required autocomplete="NombreActividad" autofocus>

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
                          <input type="date" name="FechaActividad" id="FechaActividad" value="<?php echo date('Y-m-d'); ?>" required>
                          @error('FechaActividad')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <!-- ESTADO ACTIVIDAD -->
                <div class="form-group row">
                 <label for="EstadoTema" class="col-md-4 col-form-label text-md-right">{{ __('Estado') }}</label>
                 <div class="custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input" id="EstadoActividad" name="EstadoActividad" value="1">
                    <label class="custom-control-label checkbox-md-right" for="EstadoActividad">  
                    </label>
                    @error('EstadoActividad')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
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
                <label for="InformacionTema" class="col-md-4 col-form-label text-md-right">{{ __('Instrucciones') }}</label>

                <div class="col-md-6">
                    <textarea rows=5 id="InstruccionesActividad" type="text" class="form-control @error('InstruccionesActividad') is-invalid @enderror" name="InstruccionesActividad" ></textarea> 

                    @error('InstruccionesActividad')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Agregar Actividad') }}
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
