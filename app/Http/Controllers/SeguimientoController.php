<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Traits\TraitObtenerDatosGenerales;
use App\Http\Request\CreatePorcentajePost;
use App\Actividade;
use App\Actividadalumno;
use App\Practica;
use App\Practicaalumno;
use App\Examene;
use App\Examenalumno;
use App\Porcentaje;
use App\Calificacionunidade;
use redirect;

class SeguimientoController extends Controller{

use TraitObtenerDatosGenerales;

public function pluckActividadesAlumno($alumno,$idunidad){
$TablaActividades=Actividade::where('IdUnidad',$idunidad)
->where('EstadoActividad',1)
->orderBy('FechaActividad','ASC')->get();
$CollectActividades=collect();
 foreach ($TablaActividades as $actividades) {
   $Actividadconcact=collect(Actividadalumno::where('NumeroControl',$alumno->NumeroControl)
   	->where('IdActividad',$actividades->IdActividad)->first());
   $CollectActividades->push($Actividadconcact);
 }
$ActividadesAlumno=$CollectActividades->values();
return $ActividadesAlumno->all();
}

public function pluckPracticasAlumno($alumno,$idunidad){
$TablaPracticas=Practica::where('IdUnidad',$idunidad)->get();
$CollectPracticas=collect();
foreach ($TablaPracticas as $practica) {
  $Practicaconcact=collect(Practicaalumno::where('NumeroControl',$alumno->NumeroControl)
  	->where('IdPractica',$practica->IdPractica)->first());
  $CollectPracticas->push($Practicaconcact);
}
 $PracticasAlumno=$CollectPracticas->values();
 return $PracticasAlumno->all();
}

public function pluckExamenesAlumno($alumno,$idunidad){
$TablaExamen=Examene::where('IdUnidad',$idunidad)->get();
 $CollectExamen=collect();
foreach ($TablaExamen as $examen) {
  $Examenconcact=collect(Examenalumno::where('NumeroControl',$alumno->NumeroControl)
  	->where('IdExamen',$examen->IdExamen)->first());
  $CollectExamen->push($Examenconcact);
}
$ExamenesAlumno=$CollectExamen->values();
return $ExamenesAlumno->all();
}

public function index(){
$CursoActual=$this->ObtenerCursoActual();
$idunidad=$this->ObtenerIdUnidad();
$Alumnos=$this->ObtenerAlumnos();  
$porcentajes=Porcentaje::where('IdUnidad',$idunidad)->first();
$CollectActividadesAlumnos=collect();
$CollectPracticasAlumnos=collect();
$CollectExamenAlumnos=collect();
$TablaActividades=Actividade::where('IdUnidad',$idunidad)
->where('EstadoActividad',1)
->orderBy('FechaActividad','ASC')->get();
foreach ($Alumnos as $alumno) {
$CollectActividadesAlumnos->push($this->pluckActividadesAlumno($alumno,$idunidad));
$CollectPracticasAlumnos->push($this->pluckPracticasAlumno($alumno,$idunidad));
$CollectExamenAlumnos->push($this->pluckExamenesAlumno($alumno,$idunidad));
}  
$Valuesalumno=$CollectActividadesAlumnos->values();
$Alumnosplucks=$Valuesalumno->all();
$Valuesalumnopractica=$CollectPracticasAlumnos->values();
$Alumnospracticaplucks=$Valuesalumnopractica->all();
$Valuesalumnoexamen=$CollectExamenAlumnos->values();
$Alumnosexamenplucks=$Valuesalumnoexamen->all();
return view('docente.SeguimientoDocente',
['ver'=>null,
'actividadeditar'=>null,
'cursoactual'=>$CursoActual,
'tablaactividades'=>$TablaActividades,
'alumnos'=>$Alumnos,
'alumnospluck'=>$Alumnosplucks,
'alumnospracticaplucks'=>$Alumnospracticaplucks,
'alumnosexamenplucks'=>$Alumnosexamenplucks,
'porcentajes'=>$porcentajes]);
}


public function indexAlumno(){
$promedioExamen=0;
$CursoActual=$this->ObtenerCursoActual();
$idunidad =$this->ObtenerIdUnidad();
$Alumno=$this->ObtenerAlumno();
$TablaActividades=Actividade::where('IdUnidad',$idunidad)->where('EstadoActividad',1)->orderBy('FechaActividad','ASC')->get();
$Actividadplucks=$this->pluckActividadesAlumno($Alumno,$idunidad);
$Practicaspluck=$this->pluckPracticasAlumno($Alumno,$idunidad);
$examen=Examenalumno::where('NumeroControl',$Alumno->NumeroControl)->where('IdExamen',$idunidad)->first();
$porcentajes=Porcentaje::where('IdUnidad',$idunidad)->first();
$promedioExamen=$examen->Calificacion;
return view('alumno.SeguimientoAlumno',[
'cursoactual'=>$CursoActual,
'tablaactividades'=>$TablaActividades,
'alumno'=>$Alumno,
'actividadplucks'=> $Actividadplucks,
'practicaspluck'=>$Practicaspluck,
'promedioexamen'=>$promedioExamen,
'porcentajes'=>$porcentajes
]);
}


protected function update(CreatePorcentajePost $request){
$validator =$request->validated();
$idunidad =$this->ObtenerIdUnidad();
$porcentajes=Porcentaje::where('IdUnidad',$idunidad)->first();
$porcentajes->Actividades= $request->PorcentajeActividades;
$porcentajes->Practicas= $request->PorcentajePracticas;
$porcentajes->Examen = $request->PorcentajeExamen;
$porcentajes->update();
return redirect('/Seguimiento_docente');
}


public function editaractividad(Request $request, $ClaveActividadAlumno){
$actividadeditar=Actividadalumno::findOrFail($ClaveActividadAlumno);
$CursoActual=$this->ObtenerCursoActual();
$idunidad =$this->ObtenerIdUnidad();
$Alumnos=$this->ObtenerAlumnos();
$TablaActividades=Actividade::where('IdUnidad',$idunidad)->where('EstadoActividad',1)->orderBy('FechaActividad','ASC')->get();
$CollectActividadesAlumnos=collect();
$CollectPracticasAlumnos=collect();
$CollectExamenAlumnos=collect();
foreach ($Alumnos as $alumno) {
$CollectActividadesAlumnos->push($this->pluckActividadesAlumno($alumno,$idunidad));
$CollectPracticasAlumnos->push($this->pluckPracticasAlumno($alumno,$idunidad));
$CollectExamenAlumnos->push($this->pluckExamenesAlumno($alumno,$idunidad));
}  
$Valuesalumno=$CollectActividadesAlumnos->values();
$Alumnosplucks=$Valuesalumno->all();
$Valuesalumnopractica=$CollectPracticasAlumnos->values();
$Alumnospracticaplucks=$Valuesalumnopractica->all();
$Valuesalumnoexamen=$CollectExamenAlumnos->values();
$Alumnosexamenplucks=$Valuesalumnoexamen->all();
return view('docente.SeguimientoDocente',[
'ver'=>1,
'verexamen'=>null,
'actividadeditar'=>$actividadeditar,
'cursoactual'=>$CursoActual,
'tablaactividades'=>$TablaActividades,
'alumnos'=>$Alumnos,
'alumnospluck'=>$Alumnosplucks,
'alumnospracticaplucks'=>$Alumnospracticaplucks,
'alumnosexamenplucks'=>$Alumnosexamenplucks,
'porcentajes'=>$porcentajes
]);
}

public function verificardatosactividad(Request $request,$ClaveActividadAlumno){
$validator = Validator::make($request->all(), ['calificacionactividadedit' => ['required'],]);
if ($validator->fails()) {
return redirect('/Seguimiento_docente')->withInput()->withErrors($validator);
}
Actividadalumno::where('ClaveActividadAlumno',$clave)->update(['Calificacion' =>$calificacion]);
return redirect('Seguimiento_docente');
}

public function updateexamen(Request $request,$ClaveExamenAlumno){
$validator = Validator::make($request->all(), [ 'calificacionexamenedit' => ['required'], ]);
if ($validator->fails()) {
return redirect('/Seguimiento_docente')->withInput()->withErrors($validator);
}
$examenalumno=Examenalumno::findOrFail($ClaveExamenAlumno);
$examenalumno->Calificacion=$request->calificacionaexamenedit;
$examenalumno->update();
return redirect('/Seguimiento_docente');
}

public function registrarcalificaciounidad(){

$CursoActual=$this->ObtenerCursoActual();
$idunidad =$this->ObtenerIdUnidad();
$Alumnos=$this->ObtenerAlumnos();
$TablaActividades=Actividade::where('IdUnidad',$idunidad)->where('EstadoActividad',1)->orderBy('FechaActividad','ASC')->get();
$Practicas=Practica::where('IdUnidad',$idunidad)->get();
$porcentajes=Porcentaje::where('IdUnidad',$idunidad)->first();
foreach ($Alumnos as $Alumno) {
$cantidadactividades=0;$totalactividades=0;$totalpracticas=0;
$examen=0;$porcentajeactividades=0;$porcentajepracticas=0;$porcentajeexamen=0;$totalunidad=0;
foreach ($Practicas as $practica) {
$practicaalumno=Practicaalumno::findOrFail($practica->IdPractica."-".$Alumno->NumeroControl);
$totalpracticas+=$practicaalumno->EstadoPractica;
}
foreach ($TablaActividades as $actividad) {
$actividadalumno=Actividadalumno::findOrFail($actividad->IdActividad."-".$Alumno->NumeroControl);
$cantidadactividades++;
$totalactividades+=$actividadalumno->Calificacion;
}
$examenalumno=Examenalumno::findOrFail($idunidad."-".$Alumno->NumeroControl);
$examen=$examenalumno->Calificacion;
if($totalactividades>0){
$porcentajeactividades=($porcentajes->Actividades/100)*($totalactividades/$cantidadactividades);
}
if($totalpracticas>0){
$porcentajepracticas=($porcentajes->Practicas)*($totalpracticas/2);
}
if($examen>0){
$porcentajeexamen=($porcentajes->Examen/100)*$examen;
}
$totalunidad=$porcentajeactividades+$porcentajepracticas+$porcentajeexamen;

$Calificacionunidad=Calificacionunidade::where('ClaveCalificacionUnidad',$idunidad."-".$Alumno->NumeroControl)->first();
if($Calificacionunidad){
$Calificacionunidad->Calificacion=$totalunidad;
$Calificacionunidad->update();
}else{
$CalificacionNueva=Calificacionunidade::create([
'ClaveCalificacionUnidad'=>$idunidad."-".$Alumno->NumeroControl,
'IdUnidad'=>$idunidad,
'NumeroControl'=>$Alumno->NumeroControl,
'Calificacion'=>$totalunidad
]);
}}
return redirect('/Seguimiento_docente_final');
}


public function calificacionfinal(){
$CursoActual=$this->ObtenerCursoActual();
$idunidad =$this->ObtenerIdUnidad();
$unidades=Unidade::where('ClaveCurso',$CursoActual->ClaveCurso)->get();
$Alumnos=$this->ObtenerAlumnos();
$CollectCalificacionesAlumnos=Collect();
foreach ($Alumnos as $Alumno) {
$CollectCalificaciones=collect();
foreach ($unidades as $unidad) {
 $Calificacionconcact=collect(Calificacionunidade::where('NumeroControl',$Alumno->NumeroControl)->where('IdUnidad',$unidad->IdUnidad)->first());
$CollectCalificaciones->push($Calificacionconcact);
}
$Valuescalificaciones=$CollectCalificaciones->values();
$Calificacionplucks=$Valuescalificaciones->all();
$CollectCalificacionesAlumnos->push($Calificacionplucks);
}
$Values=$CollectCalificacionesAlumnos->values();
$Calificacionesplucks=$Values->all();
return view('docente.SeguimientoDocenteFinal',['cursoactual'=>$CursoActual,'alumnos'=>$Alumnos,'calificacionesplucks'=>$Calificacionesplucks]);
}

}