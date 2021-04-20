<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\CreateTemaPost;
use App\Tema;
use App\Http\Traits\TraitEliminarRegistros;
use App\Http\Traits\TraitManejoArchivo;
use App\Http\Traits\TraitObtenerDatosGenerales;
use redirect;
class TemaController extends Controller{ 
	
use TraitEliminarRegistros;
use TraitManejoArchivo;
use TraitObtenerDatosGenerales;

public function index(){
$CursoActual=$this->ObtenerCursoActual();;
$Temas=$this->obtenertemas($CursoActual);
return view('docente.TemasDocente',['cursoactual'=>$CursoActual,'temas'=>$Temas]);
}

public function indexalumno(){
$CursoActual=$this->ObtenerCursoActual();
$Temas=$this->obtenertemas($CursoActual);
return view('alumno.TemasAlumno',['cursoactual'=>$CursoActual,'temas'=>$Temas]);
}

public function irAgregar(){
$CursoActual=$this->ObtenerCursoActual();
return view('docente.AgregarTema',['cursoactual'=>$CursoActual]);
}

public function edit($IdTema){
$CursoActual=$this->ObtenerCursoActual();
$Tema=Tema::where('IdTema',$IdTema)->first();
return view('docente.EditarTema',['tema'=>$Tema,'cursoactual'=>$CursoActual]);
}

public function obtenertemas($CursoActual){
$idunidad =$this->ObtenerIdUnidad();
 return $Temas=Tema::where('IdUnidad',$idunidad)->get();
}

public function create(CreateTemaPost $request){
$validator =$request->validated();
$CursoActual=$this->ObtenerCursoActual();
$idunidad =$this->ObtenerIdUnidad(); 
$filename=null;
if(File::exists($request->ArchivoTema)){
$filename=$this->GuardarArchivo($request->ArchivoTema);
}
$EstadoTema=1;
if($request->Estadotema===null) $EstadoTema=0;
$Tema=Tema::create([
	'IdTema'=>null,
	'IdUnidad'=>$idunidad,
	'NombreTema'=>$request->NombreTema,
	'ArchivoTema'=>$filename,
	'InformacionTema'=>$request->InformacionTema,
	'LinkVideoTema'=>$request->LinkVideoTema,
	'EstadoTema'=>$EstadoTema
]);
return redirect('/Teoria_docente');
}

public function update(CreateTemaPost $request, $IdTema){
$validator =$request->validated();
$EstadoTema=1;
if($request->Estadotema===null) $EstadoTema=0;
$Tema=Tema::findOrFail($IdTema);
$Tema->NombreTema = $request->NombreTema;
$Tema->InformacionTema = $request->InformacionTema;
$Tema->LinkVideoTema = $request->LinkVideoTema;
$Tema->EstadoTema = $EstadoTema;
if($request->ArchivoTema){
$this->eliminararchivo($Tema->ArchivoTema);
$filename=$this->GuardarArchivo($request->ArchivoTema);
$Tema->ArchivoTema = $filename;
}
$Tema->update();
return redirect('/Teoria_docente');
}

public function destroy($IdTema) {
$Tema=Tema::where('IdTema',$IdTema)->first();
$this->eliminararchivo($Tema->ArchivoTema);
$Tema->delete();
return redirect('Teoria_docente');
}

public function mostrartema($IdTema){
$CursoActual=$this->ObtenerCursoActual();
$Tema=Tema::where('IdTema',$IdTema)->first();
return view('alumno.TemaAlumno',['tema'=>$Tema,'cursoactual'=>$CursoActual]);
}

public function descargarArchivo($ArchivoTema){
return $this->DescargaDeArchivo($ArchivoTema);
}

}