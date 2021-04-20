@extends('layouts.appAlumno')

@section('content')
<div class="container">
<p class="row justify-content-center"> Curso Actual: {{$cursoactual->ClaveCurso}} Unidad: {{$cursoactual->Unidad}}</p>
<div class="panel panel-default">
    <div class="panel-heading">
        LISTA DE TEMAS
    </div>

    <div class="panel-body">
        <table class="table table-striped task-table">
            <thead>
             <th>Nombre</th>
             <th></th>
         </thead>
         @if (count($temas) > 0)
         <tbody>
            @foreach ($temas as $tema)
            <tr>
                <td class="table-text"><div>{{ $tema->NombreTema }}</div></td>

                <!--opciones-->
                <td>

                    <button type="submit" class="btn btn-success" onclick="location.href='/Ver_Teoria_Alumno/{{ $tema->IdTema }}'" method="POST">
                        Ver
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

</div>
</div>
</div>
@endif
@endsection
