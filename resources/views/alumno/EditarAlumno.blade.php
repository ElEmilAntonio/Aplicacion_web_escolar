@extends('layouts.appAlumno')

@section('content')
<ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
</ul>
<div class="container">
    <p class="row justify-content-center"> Curso Actual: {{$cursoactual->ClaveCurso}} Unidad: {{$cursoactual->Unidad}}</p>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <tr>
              <td>
                 <div class="card">
                    <div class="card-header">{{ __('Datos Alumno') }}</div>

                    <div class="card-body">
                        <form name="_method" value="PUT" action="{{ url('Editar_alumno_guardado')}}/{{$usuario->id }}">
                            @csrf
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <!--ID-->
                            <div class="form-group row" style="display: none;">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$usuario->id}}" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <!--INGRESAR EL NOMBRE-->
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$usuario->name}}" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <!--   //INGRESAR LOS APELLIDOS-->
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Apellidos') }}</label>

                                <div class="col-md-6">
                                    <input id="apellidos" type="text" class="form-control @error('name') is-invalid @enderror" name="apellidos" value="{{$alumno->Apellidos}}" required autocomplete="apellidos" autofocus>

                                    @error('apellidos')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <!--  //INGRESAR EL CORREO -->
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Correo') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$usuario->email}}" required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <!--    //INGRESAR La Homoclave -->
                            <div class="form-group row" style="display: none;">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('HomoCLave') }}</label>

                                <div class="col-md-6">
                                    <input id="Homoclave" type="text" class="form-control @error('name') is-invalid @enderror" name="Homoclave" value="{{$alumno->NumeroControl}}" required autofocus>

                                    @error('Homoclave')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row" >
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Numero de control') }}</label>

                                <div class="col-md-6">
                                    <input id="NumeroControl" type="text" class="form-control @error('name') is-invalid @enderror" name="NumeroControl" 
                                    value="{{$alumno->NumeroControl}}" required autofocus>

                                    @error('NumeroControl')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row" style="display: none;">
                                <label for="tipo" class="col-md-4 col-form-label text-md-right">{{ __('tipo') }}</label>

                                <div class="col-md-6">
                                    <input id="tipo" type="text" class="form-control @error('name') is-invalid @enderror" name="tipo" value="1" required autocomplete="tipo" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-0 offset-md-4">

                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Guardar Cambios') }}
                                    </button>
                                    <button type="button" class="btn btn-danger" data-toggle="modal"
                                    data-target="#EliminarCuenta" class="btn btn-danger">
                                    Eliminar Cuenta
                                </button>

                            </div>
                        </div>
                    </form>
                </div>
            </div> 
        </div>
    </div>
</div>
<div class="modal fade" id="EliminarCuenta" 
     tabindex="-1" role="dialog" 
     aria-labelledby="favoritesModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" 
          data-dismiss="modal" 
          aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" 
        id="favoritesModalLabel"></h4>
      </div>
      <div class="modal-body">
        <p>
        Confirmacion, Seguro que quieres 
        <b><span id="fav-title">Eliminar tu cuenta</span></b> 
        los datos no podran ser restaurados.
        </p>
      </div>
      <div class="modal-footer">
        <button type="button" 
           class="btn btn-default" 
           data-dismiss="modal">Cancelar</button>
        <span class="pull-right">
          <button type="button" class="btn btn-danger" onclick="location.href='/Eliminar_cuenta_alumno'" method="POST">
            Si, Eliminar Cuenta
          </button>
        </span>
      </div>
    </div>
  </div>
</div>
@endsection
