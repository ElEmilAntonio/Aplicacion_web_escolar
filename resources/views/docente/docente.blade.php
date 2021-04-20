@extends('layouts.app')

@section('content')
@if (count($cursos) > 0)
 <p class="row justify-content-center"> Curso Actual: {{$cursoactual->ClaveCurso}} Unidad: {{$cursoactual->Unidad}}</p>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Entrada Docente</div>

                <div class="card-body">
                  <p> Hola: {{$docente->Nombre}} con Homoclave {{$docente->HomoClave}}</p>
                  <p>su token es: <b>{{$docente->Token}}</b>
                 <p>  Clave de los cursos a tu cargo:</p>
                 <table class="table table-striped task-table">
            <thead>
                <th>Cursos</th>
            </thead>
            <tbody>
                @foreach ($cursos as $curso)
                <tr>
                    <td class="table-text"><div>{{ $curso->ClaveCurso}}</div></td>
                
            </tr>
            @endforeach
        </tbody>
    </table>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection
