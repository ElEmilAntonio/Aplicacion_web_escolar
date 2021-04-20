@extends('layouts.app')

@section('content')
 <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <tr>
              <td>
                 <div class="card">
                <div class="card-header">{{ __('Datos Docente') }}</div>

                <div class="card-body">
                    <form name="_method" value="PUT" action="{{ url('Editar_docente_guardado')}}">
                        @csrf
                         {{ csrf_field() }}
                         {{ method_field('PUT') }}
                        <!--ID-->
                        <div class="form-group row" style="display: none;">
                            <div class="col-md-6">
                                <input id="id" type="text" class="form-control @error('name') is-invalid @enderror" name="id" value="{{$usuario->id}}" required autocomplete="id" autofocus></div></div>
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
                                <input id="apellidos" type="text" class="form-control @error('name') is-invalid @enderror" name="apellidos" value="{{$docente->Apellidos}}" required autocomplete="apellidos" autofocus>

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
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('HomoCLave') }}</label>

                            <div class="col-md-6">
                                <input id="Homoclave" type="text" class="form-control @error('name') is-invalid @enderror" name="Homoclave" value="{{$docente->HomoClave}}" required autofocus>

                                @error('Homoclave')
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
              </td>
            <td>
             <div class="card">
              <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Curso:') }}</label>

                            <div class="col-md-6">
                                <input id="Curso" type="text" class="form-control @error('name') is-invalid @enderror" name="Curso" value="{{$cursoactual->ClaveCurso}}"  readonly="readonly" required autofocus>

                                @error('Curso')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Estado del curso:') }}</label>
                             <?php $Estado =""; ?>
                             @if($curso->EstadoCurso==0)  <?php $Estado ="Deshabilitado"; ?>
                             @endif
                             @if($curso->EstadoCurso==1)  <?php $Estado ="Habilitado"; ?>
                             @endif
                            <div class="col-md-6">
                                <input id="Homoclave" type="text" class="form-control @error('name') is-invalid @enderror" name="Homoclave" value="{{$Estado}}"  readonly="readonly" required autofocus>
                            </div>
                        </div>
                          <div class="form-group row mb-0">
                            <div class="col-md-0 offset-md-4">
                            
                               <button type="button"  data-toggle="modal"
                                    data-target="#EstadoCurso" class="btn btn-primary">
                                        @if($curso->EstadoCurso==0) {{ __('Habilitar Curso') }}
                             @endif
                             @if($curso->EstadoCurso==1) {{ __('Deshabilitar Curso') }}
                             @endif
                                    </button>
                                    <button type="button" data-toggle="modal"
                                    data-target="#ReiniciarCurso" class="btn btn-danger">
                                    Reiniciar Curso
                                </button>
                      
                            </div>
                        </div>
                <div class="card-body">
                </div>
            </div> <!--card-->   
            </td>   
            </tr>
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
        Se borraran todos los temas,actividades,preguntas de examen registros de asistencia, actividades,examenes y practicas y todos los datos y usuarios de los alumnos registrados en los 3 cursos.
        </p>
      </div>
      <div class="modal-footer">
        <button type="button" 
           class="btn btn-default" 
           data-dismiss="modal">Cancelar</button>
        <span class="pull-right">
          <button type="button" class="btn btn-danger" onclick="location.href='/Eliminar_docente'" method="POST">
            Si, Eliminar Cuenta
          </button>
        </span>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="ReiniciarCurso" 
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
        Confirmacion, Seguro que quiere 
        <b><span id="fav-title">
         Reiniciar el curso
        </span></b> 
        Se borraran todos los temas,actividades,preguntas de examen registros de asistencia, actividades,examenes y practicas y todos los datos y usuarios de los alumnos del Curso {{$cursoactual->ClaveCurso}}
        </p>
      </div>
      <div class="modal-footer">
        <button type="button" 
           class="btn btn-default" 
           data-dismiss="modal">Cancelar</button>
        <span class="pull-right">
          <button type="button" class="btn btn-danger"  onclick="location.href='/Reiniciar_curso'" method="POST">
            Si, Reiniciar Curso
          </button>
        </span>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="EstadoCurso" 
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
        Confirmacion, Seguro que quiere 
        <b><span id="fav-title">
         @if($curso->EstadoCurso==0) habilitar   @endif
        @if($curso->EstadoCurso==1) Deshabilitar @endif
        </span></b> 
        el curso {{$cursoactual->ClaveCurso}}
        </p>
      </div>
      <div class="modal-footer">
        <button type="button" 
           class="btn btn-default" 
           data-dismiss="modal">Cancelar</button>
        <span class="pull-right">
          <button type="button" class="btn btn-primary" onclick="location.href='/Cambiar_estado_curso'" method="POST">
            Si,  @if($curso->EstadoCurso==0) habilitar   @endif
        @if($curso->EstadoCurso==1) Deshabilitar @endif curso
          </button>
        </span>
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
