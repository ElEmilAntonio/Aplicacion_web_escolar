@extends('layouts.appAlumno')

@section('content')
<div class="container">
<p class="row justify-content-center"> Curso Actual: {{$cursoactual->ClaveCurso}} Unidad: {{$cursoactual->Unidad}}</p>
<hr>
<p style="font-size:30px" class="row justify-content-center">{{$tema->NombreTema}}</p>
@if($tema->ArchivoTema!=null)
<a onclick="location.href='/Descargar_Archivo/{{ $tema->ArchivoTema}}'" method="GET" class="row justify-content-center"><u>{{$tema->ArchivoTema}}</u></a>
@endif
<p  class="row justify-content-center">{{$tema->InformacionTema}}</p>
<div class="row justify-content-center">
	@if($tema->LinkVideoTema!=null)
<iframe  id="iframevideo" width="560" height="315" src="" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>
<script type="text/javascript">
var elem = document.getElementById("iframevideo");
var link="https://www.youtube.com/embed/"
var id=youtube_parser("{{$tema->LinkVideoTema}}");
var linkcompleto= link.concat(id);
  elem.src =linkcompleto;
</script>
@endif
</div>
@endsection
<script type="text/javascript">
function youtube_parser(url){
	var regExp = /^.*((youtu.be\/)|(v\/)|(\/u\/\w\/)|(embed\/)|(watch\?))\??v?=?([^#\&\?]*).*/;
	var match = url.match(regExp);
	if (match&&match[7].length==11){
	    var b=match[7];
	   return b;
	}else{
	    alert("Url incorrecta");
	}
}
</script>
