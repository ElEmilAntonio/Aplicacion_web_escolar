<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Traits\TraitObtenerDatosGenerales;
use Response;
use App\Asistencia;
use App\Asistenciaalumno;
use redirect;

class AsistenciaController extends Controller{

use TraitObtenerDatosGenerales;

public function index(){
$CursoActual=$this->ObtenerCursoActual();
$idunidad=$this->ObtenerIdUnidad();
$Alumnos=$this->ObtenerAlumnos();
$TablaAsistencias=Asistencia::where('IdUnidad',$idunidad)
->orderBy('FechaAsistencia','ASC')->get();
return view('docente.AsistenciaDocente',[
'ver'=>null,
'cursoactual'=>$CursoActual,
'tablaasistencias'=>$TablaAsistencias,
'alumnos'=>$Alumnos,
'asistenciaedit'=>null,
'alumnospluck'=>$this->AsistenciasAlumnoGrupo($Alumnos,$TablaAsistencias)
]);
}

 public function indexAlumno(){
 $CursoActual=$this->ObtenerCursoActual();
   $Alumno=$this->ObtenerAlumno();
   $TablaAsistencias=Asistencia::where('IdUnidad',$idunidad)
   ->orderBy('FechaAsistencia','ASC')->get();
   $IdAsistenciaActual=$this->IdAsistenciaActual();
  $Asistenciaplucks=$this->AsistenciasAlumno($Alumno->NumeroControl,$TablaAsistencias);
  if($IdAsistenciaActual){
    $TomarAsistenciaAlumno=Asistenciaalumno::where('NumeroControl',$Alumno->NumeroControl)
    ->where('IdAsistencia',$IdAsistenciaActual)->first();
    return view('alumno.AsistenciaAlumno',[
      'cursoactual'=>$CursoActual,
      'tablaasistencias'=>$TablaAsistencias,
      'alumno'=>$Alumno,
      'asistenciaactual'=>$AsistenciaActual,
      'asistenciaplucks'=> $Asistenciaplucks,
      'tomarasistencialumno'=>$TomarAsistenciaAlumno
    ]);
  }else{
    return view('alumno.AsistenciaAlumnoNa',[
      'cursoactual'=>$CursoActual,
      'tablaasistencias'=>$TablaAsistencias,
      'alumno'=>$Alumno,
      'asistenciaplucks'=> $Asistenciaplucks
    ]);
  }
}

public function edit(Request $request,$IdAsistencia)
 {
  $CursoActual=$this->ObtenerCursoActual();
  $idunidad=$this->ObtenerIdUnidad();
  $Alumnos=$this->ObtenerAlumnos();
  $TablaAsistencias=Asistencia::where('IdUnidad',$idunidad)
  ->orderBy('FechaAsistencia','ASC')->get();
  $Asistenciaedit=Asistencia::findOrFail($IdAsistencia);
  $Alumnosplucks=$this->AsistenciasAlumnoGrupo($Alumnos,$TablaAsistencias);
  return view('docente.AsistenciaDocente',[
    'ver'=>1,
    'cursoactual'=>$CursoActual,
    'tablaasistencias'=>$TablaAsistencias,
    'alumnos'=>$Alumnos,
    'asistenciaedit'=>$Asistenciaedit,
    'alumnospluck'=>$Alumnosplucks
  ]);
}
 //Funcion para obtener las asistencias de la unidad de un alumno.
 public function AsistenciasAlumno($NumeroControl,$TablaAsistencias){
 $CollectAsistencias=collect();
foreach ($TablaAsistencias as $asistencia) {
$Asistenciaconcact=collect(Asistenciaalumno::where('NumeroControl',$NumeroControl)
->where('IdAsistencia',$asistencia->IdAsistencia)->first());
$CollectAsistencias->push($Asistenciaconcact);
  }
  $Values=$CollectAsistencias->values();
  return $Values->all(); 
 }

 //funcion para obtener las asistencias de la unidad de los alumnos de un grupo.
 public function AsistenciasAlumnoGrupo($Alumnos,$TablaAsistencias){
$CollectAsistenciasAlumnos=collect();
foreach ($Alumnos as $alumno) {
$AsistenciasAlumno=$this->AsistenciasAlumno($alumno->NumeroControl,$TablaAsistencias);
$CollectAsistenciasAlumnos->push($AsistenciasAlumno);
}  
$Valuesalumnos=$CollectAsistenciasAlumnos->values();
return $Valuesalumnos->all();
 }

//Busca la asistencia en un rango de tiempo
// entre 15 minutos antes y despues de la hora actual
  public function IdAsistenciaActual(){
   $idunidad=$this->ObtenerIdUnidad();
   $newTime = date("H:i",strtotime(date("H:i")." +15 minutes"));
   $oldTime = date("H:i",strtotime(date("H:i")." -15 minutes"));
   $IdAsistenciaActual=Asistencia::where('IdUnidad',$idunidad)
   ->where('FechaAsistencia',date('Y-m-d'))
   ->where('HoraAsistencia','<',$newTime)
   ->where('HoraAsistencia','>',$oldTime)
   ->value('IdAsistencia')->first();
   return $IdAsistenciaActual;
  }

public function create(CreateAsistenciaPost $request)
{
$validator =$request->validated();
$idunidad=$this->ObtenerIdUnidad();
  $Asistencia=Asistencia::create([
    'IdAsistencia'=>null,
    'IdUnidad'=>$idunidad,
    'FechaAsistencia'=>$request->FechaAsistencia,
    'HoraAsistencia'=>$request->HoraAsistencia
  ]);
   $this->CreateAsistenciaAlumno();
   return redirect('/Asistencias_docente');
 }

 public function CreateAsistenciaAlumno(){
$CursoActual=$this->ObtenerCursoActual();
$idunidad=$this->ObtenerIdUnidad();
 $UltimaAsistencia=Asistencia::where('IdUnidad',$idunidad)->max('IdAsistencia');
  $Alumnos=$this->ObtenerAlumnos();
  foreach ($Alumnos as $Alumno) {
   $ClaveAsistenciaAlumno=$UltimaAsistencia."-".$Alumno->NumeroControl;
   $AsistenciaAlumno=Asistenciaalumno::create([
    'ClaveAsistenciaAlumno'=>$ClaveAsistenciaAlumno,
    'IdAsistencia'=>$UltimaAsistencia,
    'NumeroControl'=>$Alumno->NumeroControl,
    'Asistencia'=>0,
  ]); }
 }


public function update(CreateAsistenciaPost $request,$IdAsistencia){
$validator =$request->validated();
$asistencia=Asistencia::findOrFail($IdAsistencia);
$asistencia->FechaAsistencia=$request->Fechaasistenciaedit;
$asistencia->HoraAsistencia=$request->Horaasistenciaedit;
$asistencia->update();
return redirect('/Asistencias_docente');
}

public function destroy($IdAsistencia){
  $asistencia=Asistencia::findOrFail($IdAsistencia)->delete();
  $asistenciasalumno=Asistenciaalumno::where('IdAsistencia',$IdAsistencia)->delete();
  return redirect('/Asistencias_docente');
}

public function PasarListaAlumno(Request $request, $ClaveAsistenciaAlumno){
  $Asistenciaalumno=Asistenciaalumno::findOrFail($ClaveAsistenciaAlumno);
  $Asistenciaalumno->Asistencia =1;
  $Asistenciaalumno->update();
  return redirect('/Asistencias_alumno');
}

public function editarasistenciaalumno(Request $request, $ClaveAsistenciaAlumno){
 $Asistenciaalumno=Asistenciaalumno::findOrFail($ClaveAsistenciaAlumno);
 if($Asistenciaalumno->Asistencia===0)
 $Asistenciaalumno->Asistencia=1;
 else
 $Asistenciaalumno->Asistencia=0;
  $Asistenciaalumno->update();
  return redirect('/Asistencias_docente');
}
}