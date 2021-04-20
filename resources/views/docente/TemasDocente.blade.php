@extends('layouts.app')

@section('content')

<div class="container">
    <p class="row justify-content-center"> Curso Actual: {{$cursoactual->ClaveCurso}} Unidad: {{$cursoactual->Unidad}}</p>
<div class="panel panel-default">
    <div class="panel-heading">
        LISTA DE TEMAS
    </div>
    <div class="panel-body">
        <table class="table table-striped ">
            <thead>
             <th>Nombre</th>
             <th>Estado</th>
             <th></th>
             <th></th>
         </thead>
         @if (count($temas) > 0)
         <tbody>
            @foreach ($temas as $tema)
            <tr>
                <td class="table-text"><div>{{ $tema->NombreTema }}</div></td>
                @if($tema->EstadoTema==0)
                <td class="table-text"><div>Deshabilitado</div></td>
                @endif
                @if($tema->EstadoTema==1)
                 <td class="table-text"><div>Habilitado</div></td>
                 @endif
                <!--opciones-->
                <td>

                    <button type="submit" class="btn btn-success" onclick="location.href='/Editar_Teoria_Docente/{{$tema->IdTema}}'" method="POST">
                        <i class="fa fa-btn fa-pencil"></i>Editar
                    </button>
            </td>
            <td>
                    <button type="submit" class="btn btn-danger" onclick="location.href='/Eliminar_Teoria_Docente/{{$tema->IdTema}}'" method="POST">
                        <i class="fa fa-btn fa-trash"></i>Eliminar
                    </button>
                </form>
                </form>
               
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endif
<button type="submit" class="btn btn-primary" onclick="location.href='/Agregar_Teoria_docente'" method="POST">
    <i class="fa fa-btn fa-pencil"></i>AGREGAR TEMA
</button>
@endsection
</div>
</div>
</div>

