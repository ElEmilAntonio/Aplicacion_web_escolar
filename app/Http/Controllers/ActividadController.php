<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Traits\TraitManejoArchivo;
use App\Http\Requests\CreateActividadPost;
use App\Http\Traits\TraitObtenerDatosGenerales;
use App\Actividade;
use App\Actividadalumno;
use redirect;

class ActividadController extends Controller{
	
use TraitManejoArchivo;
use TraitObtenerDatosGenerales;

public function index(){
$CursoActual=$this->ObtenerCursoActual();
$Actividades=$this->ObtenerActividades($CursoActual);
return view('docente.ActividadesDocente',['cursoactual'=>$CursoActual,'actividades'=>$Actividades]);
}
public function indexalumno(){
$CursoActual=$this->ObtenerCursoActual();
$Actividades=$this->ObtenerActividades($CursoActual);
return view('alumno.ActividadesAlumno',['cursoactual'=>$CursoActual,'actividades'=>$Actividades]);
}

public function irAgregar(){
$CursoActual=$this->ObtenerCursoActual();
return view('docente.AgregarActividad',['cursoactual'=>$CursoActual]);
}

public function edit(Request $request, $IdActividad){
$CursoActual=$this->ObtenerCursoActual();
$Actividad=Actividade::where('IdActividad',$IdActividad)->first();
return view('docente.EditarActividad',['actividad'=>$Actividad,'cursoactual'=>$CursoActual]);
}

public function ObtenerActividades($CursoActual){
$idunidad =$this->ObtenerIdUnidad();
return $Actividades=Actividade::where('IdUnidad',$idunidad)
->orderBy('FechaActividad','ASC')->get();
}

public function create(CreateActividadPost $request){
$validator =$request->validated();
$CursoActual=$this->ObtenerCursoActual();
$idunidad =$this->ObtenerIdUnidad();
$filename=null;
if(File::exists($request->ArchivoActividad)){
$this->GuardarArchivo($request->ArchivoActividad);
}
$EstadoActividad=1;
if($request->EstadoActividad===null) $EstadoActividad=0;
$Actividad=Actividade::create([
'IdActividad'=>null,
'IdUnidad'=>$idunidad,
'NombreActividad' =>  $request->NombreActividad,
'FechaActividad' => $request->FechaActividad,
'EstadoActividad' =>$EstadoActividad,
'ArchivoActividad' =>$filename,
'InstruccionesActividad' =>$request->InstruccionesActividad
]);
$this->CreateActividadAlumno();
return redirect('/Actividades_docente');
}

public function CreateActividadAlumno(){
$UltimaActividad=Actividade::where('IdUnidad',$idunidad)->max('IdActividad');
$Alumnos=$this->ObtenerAlumnos();
foreach ($Alumnos as $Alumno) {
$ClaveActividadAlumno=$UltimaActividad."-".$Alumno->NumeroControl;
$ActividadAlumno=ActividadAlumno::create([
	'ClaveActividadAlumno'=>$ClaveActividadAlumno,
	'IdActividad'=>$UltimaActividad,
	'NumeroControl'=>$Alumno->NumeroControl,
	'Calificacion'=>0
]);
}
}

public function update(CreateActividadPost $request, $IdActividad){
$validator =$request->validated();
$EstadoActividad=1;
if ($request->EstadoActividad===null)$EstadoActividad=0;
$Actividad=Actividade::findOrFail($IdActividad);
$Actividad->NombreActividad = $request->NombreActividad;
$Actividad->FechaActividad = $request->FechaActividad;
$Actividad->EstadoActividad = $EstadoActividad;
$Actividad->InstruccionesActividad = $request->InstruccionesActividad;
if($request->ArchivoActividad){
$this->eliminararchivo($Archivo->ArchivoActividad);
$filename=$this->GuardarArchivo($request->ArchivoTema);
$Actividad->ArchivoActividad = $filename;
}
$Actividad->update();
return redirect('/Actividades_docente');
}

public function destroy($IdActividad){
$ActividadesAlumnos=ActividadAlumno::where('IdActividad',$IdActividad)->delete();
$Actividad=Actividade::findOrFail($IdActividad);
$this->eliminararchivo($Actividad->ArchivoActividad);
$Actividad->delete();
return redirect('/Actividades_docente');
}

public function mostrarActividad(Request $request,$IdActividad){
$CursoActual=$this->ObtenerCursoActual();
$Actividad=Actividade::where('IdActividad',$IdActividad)->first();
return view('alumno.ActividadAlumno',['actividad'=>$Actividad,'cursoactual'=>$CursoActual]);
}

}