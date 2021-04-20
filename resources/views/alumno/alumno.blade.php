@extends('layouts.appAlumno')

@section('content')
<p class="row justify-content-center"> Curso Actual: {{$cursoactual->ClaveCurso}} Unidad: {{$cursoactual->Unidad}}</p>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                @csrf
                {{ csrf_field() }}
                <div class="card-body">
                 <p> Hola: {{$alumno->Nombre}} con numero de control {{$alumno->NumeroControl }}</p>
                 <p>  Ingresaste como alumno al curso: {{$alumno->ClaveCurso }}</p>
             </div>
         </div>
     </div>
 </div>
</div>
@endsection
