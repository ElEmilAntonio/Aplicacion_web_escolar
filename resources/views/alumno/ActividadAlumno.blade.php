@extends('layouts.appAlumno')

@section('content')
<div class="container">
<p class="row justify-content-center"> Curso Actual: {{$cursoactual->ClaveCurso}} Unidad: {{$cursoactual->Unidad}}</p>
<hr>
<p style="font-size:30px" class="row justify-content-center">{{$actividad->NombreActividad}}</p>
@if($actividad->ArchivoActividad!=null)
<a onclick="location.href='/Descargar_Archivo/{{ $actividad->ArchivoActividad}}'" method="GET" class="row justify-content-center"><u>{{$actividad->ArchivoActividad}}</u></a>
@endif
<p></p>
<p  class="row justify-content-center">Fecha de entrega:{{$actividad->FechaActividad}}</p>
<p  class="row justify-content-center">{{$actividad->InstruccionesActividad}}</p>

@endsection
