<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UploadRequest;
use App\Http\Traits\TraitObtenerDatosGenerales;
use App\Http\Request\CreateFoVPost;
use App\Http\Request\CreateOpcionPost;
use App\Http\Request\CreateRelacionalPost;
use Response;
use App\seleccioncurso;
use App\Examene;
use App\Examenalumno;
use App\Preguntasexamene;
use App\Fovpregunta;
use App\Preguntasopcione;
use App\Preguntascolumna;
use App\Respuestascolumna;
use App\Preguntasalumno;
use redirect;
use Illuminate\Http\Request;
class ExamenController extends Controller{

use TraitObtenerDatosGenerales;

  public function index(){
   $CursoActual=$this->ObtenerCursoActual();
   $idunidad =$this->ObtenerIdUnidad();
   $Examen=Examene::where('IdUnidad',$idunidad)->first();
   $preguntas=Preguntasexamene::where('IdExamen',$Examen->IdExamen)->get();
   return view('docente.ExamenDocente',[
    'cursoactual'=>$CursoActual,
    'examen'=>$Examen,
    'preguntas'=>$preguntas
  ]);
 }

 public function CreateRegistroPregunta($pregunta,$IdExamen){
 $PreguntaExamen=Preguntasexamene::create([
'IdPregunta'=>null,
'IdExamen'=>$IdExamen,
'TipoPregunta'=>1,
'Pregunta'=>$pregunta,
]);
 }

 public function createFoV(CreateFoVPost $request){
  $validator =$request->validated();
  $CursoActual=$this->ObtenerCursoActual();
  $idunidad =$this->ObtenerIdUnidad();
  $Examen=Examene::where('IdUnidad',$idunidad)->first();
  $this->CreateRegistroPregunta($request->Pregunta,$Examen->IdExamen);
  $idPregunta=Preguntasexamene::where('IdExamen',$Examen->IdExamen)->max('IdPregunta');
  $PreguntaFoV=Fovpregunta::create([
    'IdPregunta'=>$idPregunta,
    'Pregunta'=>$request->Pregunta,
    'Respuesta'=>$request->Respuesta
  ]);
  return redirect('/Examen_docente');
}

public function createOpciones(CreateOpcionPost $request){
$validator =$request->validated();
$CursoActual=$this->ObtenerCursoActual();
$idunidad =$this->ObtenerIdUnidad();
$Examen=Examene::where('IdUnidad',$idunidad)->first();
$this->CreateRegistroPregunta($request->Pregunta,$Examen->IdExamen);
$idPregunta=Preguntasexamene::where('IdExamen',$Examen->IdExamen)->max('IdPregunta');
$PreguntaFoV=Preguntasopcione::create([
'IdPregunta'=>$idPregunta,
'Pregunta'=>$request->Pregunta,
'OpcionA'=>$request->OpcionA,
'OpcionB'=>$request->OpcionB,
'OpcionC'=>$request->OpcionC,
'Respuesta'=>$request->Respuesta,
]);
return redirect('/Examen_docente');
}

public function createRelacional(CreateRelacionalPost $request){
$validator =$request->validated();
$CursoActual=$this->ObtenerCursoActual();
$idunidad =$this->ObtenerIdUnidad();
$Examen=Examene::where('IdUnidad',$idunidad)->first();
$this->CreateRegistroPregunta($request->Pregunta,$Examen->IdExamen);
$idPregunta=Preguntasexamene::where('IdExamen',$Examen->IdExamen)->max('IdPregunta');
for($Numero=1;$Numero<5;$Numero++){
$ClavePregunta=$this->claveAleatoria();
$PreguntaColumna=Preguntascolumna::create([
  'IdPreguntaColumna'=>null,
  'IdPregunta'=>$idPregunta,
  'Pregunta'=>$request->input('Pregunta'.$Numero),
  'ClavePregunta'=>$ClavePregunta]);
$IdPreguntaColumna=Preguntascolumna::where('IdPregunta',$idPregunta)->max('IdPreguntaColumna');
$RespuestaColumna=Respuestascolumna::create([
  'IdPreguntaColumna'=>$IdPreguntaColumna,
  'Respuesta'=>$request->input('Respuesta'.$Numero),
  'ClavePregunta'=>$ClavePregunta]);
}
return redirect('/Examen_docente');
}

public function claveAleatoria(){
  do{
   $cadena_base =  'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
   $cadena_base .= '0123456789' ;
   $Clave = '';
   $limite = strlen($cadena_base) - 1;
   for ($i=0; $i < 4; $i++) {
    $Clave .= $cadena_base[rand(0, $limite)];
  }
  $check = Preguntascolumna::select('ClavePregunta')->where('ClavePregunta',$Clave)->value('ClavePregunta');
}while($check!==null);
return $Clave;
}

public function editFoV($IdPregunta){
  $id=Auth::User()->id;
  $CursoActual=seleccioncurso::findOrFail($id);
  $Pregunta=Fovpregunta::findOrFail($IdPregunta);
  return view('docente.EditarPreguntaFoV',['cursoactual'=>$CursoActual,'pregunta'=>$Pregunta]);
}

public function updateFoV(CreateFoVPost $request, $IdPregunta){
  $validator =$request->validated();
  $Pregunta=Preguntasexamene::findOrFail($IdPregunta);
  $Pregunta->Pregunta=$request->Pregunta;
  $Pregunta->update();
  $PreguntaFoV=Fovpregunta::findOrFail($IdPregunta);
  $PreguntaFoV->Pregunta = $request->Pregunta;
  $PreguntaFoV->Respuesta = $request->Respuesta;
  $PreguntaFoV->update();
  return redirect('/Examen_docente');
}

public function destroyFoV($IdPregunta,$IdExamen,$NumeroPregunta){  
  $this->eliminarcantidadpreguntas($IdPregunta,$IdExamen,$NumeroPregunta);
  $PreguntaFoV=Fovpregunta::findOrFail($IdPregunta)->delete();
  $Pregunta=Preguntasexamene::findOrFail($IdPregunta)->delete();
  return redirect('/Examen_docente');
}

public function editOpciones($IdPregunta){
  $CursoActual=$this->ObtenerCursoActual();
  $Pregunta=Preguntasopcione::findOrFail($IdPregunta);
  return view('docente.EditarPreguntaOpciones',['cursoactual'=>$CursoActual,'pregunta'=>$Pregunta]);
}

public function updateOpciones(CreateOpcionPost $request, $IdPregunta){
$validator =$request->validated();
$Pregunta=Preguntasexamene::findOrFail($IdPregunta);
$Pregunta->Pregunta=$request->Pregunta;
$Pregunta->update();
$Preguntaopcion=Preguntasopcione::findOrFail($IdPregunta);
$Preguntaopcion->Pregunta=$request->Pregunta;
$Preguntaopcion->OpcionA=$request->OpcionA;
$Preguntaopcion->OpcionB=$request->OpcionB;
$Preguntaopcion->OpcionC=$request->OpcionC;
$Preguntaopcion->Respuesta=$request->Respuesta;
$Preguntaopcion->update();
  return redirect('/Examen_docente');
}

public function destroyOpciones($IdPregunta,$IdExamen,$NumeroPregunta){
  $this->eliminarcantidadpreguntas($IdPregunta,$IdExamen,$NumeroPregunta);    
  $Preguntaopcion=Preguntasopcione::findOrFail($IdPregunta)->delete();
  $Pregunta=Preguntasexamene::findOrFail($IdPregunta)->delete();
  return redirect('/Examen_docente');
}

public function PushRelacionalRespuestas($Preguntas){
   $Respuestapush=collect();
 foreach ($Preguntas as $Pregunta ) {
  $Respuesta=Respuestascolumna::findOrFail($Pregunta->IdPreguntaColumna);
  $Respuestapush->push($Respuesta);
}
$Values=$Respuestapush->values();
return $Values->all();
}

public function editRelacional($IdPregunta){   
 $CursoActual=seleccioncurso::findOrFail($id);
 $Identificador=Preguntasexamene::findOrFail($IdPregunta);
 $Preguntas=Preguntascolumna::where('IdPregunta',$IdPregunta)->get();
$Respuestas=$this->PushRelacionalRespuestas();
return view('docente.EditarPreguntaRelacional',['cursoactual'=>$CursoActual,'preguntas'=>$Preguntas,'respuestas'=>$Respuestas,'identificador'=>$Identificador]);
}

public function updateRelacional(CreateRelacionalPost $request, $IdPregunta){
$validator =$request->validated();
$NumeroPregunta=0;
$PreguntasRelacionales=Preguntascolumna::where('IdPregunta',$IdPregunta)->get();
foreach ($PreguntasRelacionales as $PreguntaRelacional) {
$NumeroPregunta++;
$Preguntacolumna=Preguntascolumna::where('IdPreguntaColumna',$PreguntaRelacional->IdPreguntaColumna)->first();
$Preguntacolumna->Pregunta=$request->input('Pregunta'.$NumeroPregunta);
$Preguntacolumna->update();
$Respuestacolumna=Respuestascolumna::where('IdPreguntaColumna',$PreguntaRelacional->IdPreguntaColumna)->first();
$Respuestacolumna->Respuesta=$request->input('Respuesta'.$NumeroPregunta);
$Respuestacolumna->update();
}
$Pregunta=Preguntasexamene::findOrFail($IdPregunta);
$Pregunta->Pregunta=$request->Pregunta1;
$Pregunta->update();
return redirect('/Examen_docente');
}

public function destroyRelacional($IdPregunta,$IdExamen,$NumeroPregunta){
 $PreguntasRelacionales=Preguntascolumna::where('IdPregunta',$IdPregunta)->get();
 $this->eliminarcantidadpreguntas($IdPregunta,$IdExamen,$NumeroPregunta);
 foreach ($PreguntasRelacionales as $PreguntaRelacional) {
$Respuestas=Respuestascolumna::where('IdPreguntaColumna',$PreguntaRelacional->IdPreguntaColumna)->delete();
}
$PreguntasRelacionales=Preguntascolumna::where('IdPregunta',$IdPregunta)->delete();
$Pregunta=Preguntasexamene::findOrFail($IdPregunta)->delete();  
return redirect('/Examen_docente');
}

public function update(Request $request,$IdExamen){ 
  $validator = Validator::make($request->all(), [
  'EstadoExamen' => ['boolean'],
  'FechaExamen' => ['required','date'],
  'HoraInicioExamen' => ['required'],
  'HoraFinExamen' => ['required'],
  'NumeroPreguntas' => ['required']]);
if ($validator->fails())
return redirect('/Examen_docente')->withInput()->withErrors($validator);
  $EstadoExamen=0;
  if ($request->EstadoExamen==1) $EstadoExamen=1;
 $Examen=Examene::findOrFail($IdExamen);
 $Examen->EstadoExamen = $EstadoExamen;
 $Examen->FechaExamen = $request->FechaExamen;
 $Examen->HoraInicioExamen = $request->HoraInicioExamen;
 $Examen->HoraFinExamen = $request->HoraFinExamen;
 $Examen->CantidadPreguntas = $request->NumeroPreguntas;
 $Examen->update();
 return redirect('/Examen_docente');
}

public function AsignarPreguntas($IdExamen,$NumeroControl){
$Examen=Examene::findOrFail($IdExamen);
$borrarpreguntas=Preguntasexamene::where('IdExamen',$IdExamen)->get();
foreach ($borrarpreguntas as $borrar) {
$borrarpreguntaalumno=Preguntasalumno::where('IdPregunta',$borrar->IdPregunta)->where('NumeroControl',$NumeroControl)->delete();
}
$Preguntas=Preguntasexamene::where('IdExamen',$IdExamen)
->orderByRaw('RAND()')
->take($Examen->CantidadPreguntas)->get();
$CantidadPreguntas=Examenalumno::findOrFail($IdExamen."-".$NumeroControl);
$CantidadPreguntas->CantidadPreguntas=$Examen->CantidadPreguntas;
$CantidadPreguntas->update();
foreach ($Preguntas as $pregunta) {
$preguntaalumno=Preguntasalumno::create([
  'ClavePreguntaAlumno'=>$pregunta->IdPregunta."-".$NumeroControl,
  'NumeroControl'=>$NumeroControl,
  'IdPregunta'=>$pregunta->IdPregunta,
  'Resultado'=>0]);
}
}


public function eliminarcantidadpreguntas($IdPregunta,$IdExamen,$NumeroPregunta){
 $NumeroPreguntas=(int)$NumeroPregunta;
 $Preguntasalumno=Preguntasalumno::where('IdPregunta',$IdPregunta)->get();
 if($Preguntasalumno!=null){
   $Preguntasalumno=Preguntasalumno::where('IdPregunta',$IdPregunta)->delete();
   $Examen=Examene::where('IdExamen',$IdExamen)->first();
 if($Examen->CantidadPreguntas===$NumeroPreguntas){
     $Preguntas=Examene::where('IdExamen',$IdExamen)->first();
     $Preguntas->CantidadPreguntas=$Examen->CantidadPreguntas-1;
     $Preguntas->update();
   }
 }
 }


public function indexalumno(){
  $CursoActual=$this->ObtenerCursoActual();
  $idunidad =$this->ObtenerIdUnidad();
  $Alumno=Alumno::findOrFail(Auth::User()->id);
  $Examen=Examene::where('IdUnidad',$idunidad)->first();
  $ExamenAlumno=ExamenAlumno::where('IdExamen',$Examen->IdExamen)
  ->where('NumeroControl',$Alumno->NumeroControl)->first();
  return view('alumno.ExamenAlumno',['cursoactual'=>$CursoActual,'examen'=>$Examen,'examenalumno'=>$ExamenAlumno,'alumno'=>$Alumno]);
}

public function EnviarPregunta($CursoActual,$Examen,$PreguntaExamen){
  if($PreguntaExamen->TipoPregunta==1){
   $preguntafov=Fovpregunta::where('IdPregunta',$Pregunta->IdPregunta)->first();
return view('alumno.PreguntaFoV',['cursoactual'=>$CursoActual,'pregunta'=>$preguntafov,'examen'=>$examen]);
 }
 if($PreguntaExamen->TipoPregunta==2){
   $Preguntaopciones=Preguntasopcione::where('IdPregunta',$Pregunta->IdPregunta)->first();
   return view('alumno.PreguntaOpciones',['cursoactual'=>$CursoActual,'pregunta'=>$Preguntaopciones,'examen'=>$examen]);
 }
 if($PreguntaExamen->TipoPregunta==3){
   $Preguntas=Preguntascolumna::where('IdPregunta',$Pregunta->IdPregunta)->orderByRaw('RAND()')->get();
  $Respuestas=$this->PushRelacionalRespuestas($Preguntas);
  return view('alumno.PreguntaRelacional',['identificador'=>$Pregunta,'cursoactual'=>$CursoActual,'preguntas'=>$Preguntas,'respuestas'=>$Respuestas]);
}
}

public function tomarexamen(){
 $CursoActual=$this->ObtenerCursoActual();
 $idunidad =$this->ObtenerIdUnidad();
 $Alumno=Alumno::findOrFail(Auth::User()->id);
 $examen=Examene::where('IdUnidad',$idunidad)->first();
 $RevisarPreguntas=Preguntasalumno::where('NumeroControl',$Alumno->NumeroControl)->first();
 if($RevisarPreguntas==null)
$this->AsignarPreguntas($examen->IdExamen,$Alumno->NumeroControl);
$Pregunta=Preguntasalumno::where('NumeroControl',$Alumno->NumeroControl)
->where('Resultado',0)->first();
if($Pregunta!=null){
  $examenalumno=Examenalumno::where('IdExamen',$examen->IdExamen)
  ->where('NumeroControl',$Alumno->NumeroControl)->first();
  $examenalumno->EstadoExamen=1;
  $examenalumno->update();
  $PreguntaExamen=Preguntasexamene::where('IdPregunta',$Pregunta->IdPregunta)->first();
  return $this->enviarpregunta($CursoActual,$examen,$PreguntaExamen);
}else{
  $examenalumno=Examenalumno::where('IdExamen',$examen->IdExamen)
  ->where('NumeroControl',$Alumno->NumeroControl)->first();
  $examenalumno->EstadoExamen=2;
 $examenalumno->Calificacion=ceil(($examenalumno->Aciertos/$examenalumno->CantidadPreguntas)*100);
  $examenalumno->update();
  $Preguntasalumno=Preguntasalumno::where('NumeroControl',$Alumno->NumeroControl)->delete();
  return view('alumno.ExamenAlumno',['cursoactual'=>$CursoActual,'examen'=>$examen,'examenalumno'=>$examenalumno,'alumno'=>$Alumno]);
}
}

public function RegistrarRespuestaCorrecta($Alumno,$Examen){
  $PreguntaAlumno=Preguntasalumno::where('NumeroControl',$Alumno->NumeroControl)->where('IdPregunta',$request->IdPregunta)->first();
  $PreguntaAlumno->Resultado=2;
  $PreguntaAlumno->update();
  $ExamenAlumno=ExamenAlumno::where('IdExamen',$Examen->IdExamen)
  ->where('NumeroControl',$Alumno->NumeroControl)->first();
  $NumeroPreguntas=(int)$ExamenAlumno->Aciertos+1;
  $ExamenAlumno->Aciertos=$NumeroPreguntas;
  $ExamenAlumno->update();
}

public function RegistrarRespuestaIncorrecta($Alumno){
 $PreguntaAlumno=Preguntasalumno::where('NumeroControl',$Alumno->NumeroControl)->where('IdPregunta', $request->IdPregunta)->first();
 $PreguntaAlumno->Resultado=1;
 $PreguntaAlumno->update();
}

public function RegistroRespuesta($Respuesta,$Request){
$idunidad =$this->ObtenerIdUnidad();
$Alumno=Alumno::findOrFail(Auth::User()->id);
$Examen=Examene::where('IdUnidad',$idunidad)->first();
if($Respuesta->Respuesta===$request->Respuesta){
$this->RegistrarRespuestaCorrecta($Alumno,$Examen);
}else{
$this->RegistrarRespuestaIncorrecta($Alumno);
}
}

public function ResponderFoV(Request $request){
 $validator = Validator::make($request->all(), ['IdPregunta' => ['required'],'Respuesta'=>['required']]);
 if ($validator->fails()) {
  return redirect('/tomar_examen_alumno')->withInput()->withErrors($validator);
}   
$Respuesta=Fovpregunta::where('IdPregunta',$request->IdPregunta)->first();
$this->RegistroRespuesta($Respuesta,$request);
return $this->tomarexamen();
}


public function ResponderOpciones(Request $request){
 $validator = Validator::make($request->all(), ['IdPregunta' => ['required'],'Respuesta'=>['required']]);
 if ($validator->fails()) {
  return redirect('/tomar_examen_alumno')->withInput()->withErrors($validator);
}

$Respuesta=Preguntasopcione::where('IdPregunta',$request->IdPregunta)->first();
$this->RegistroRespuesta($Respuesta,$request);
return $this->tomarexamen();
}

public function ResponderRelacional(Request $request){
  $validator = Validator::make($request->all(),[
    'IdPregunta'=>['required'],
    'Respuesta1'=>['String','required','max:4','min:4'],
    'Respuesta2'=>['String','required','max:4','min:4'],
    'Respuesta3'=>['String','required','max:4','min:4'],
    'Respuesta4'=>['String','required','max:4','min:4']]);
  if ($validator->fails()) {
    return redirect('/tomar_examen_alumno')->withInput()->withErrors($validator);
  }
  $NumeroPregunta=0;
  $Correctas=0;
  $CursoActual=$this->ObtenerCursoActual();
  $idunidad =$this->ObtenerIdUnidad();
  $Alumno=Alumno::findOrFail(Auth::User()->id);
  $Examen=Examene::where('IdUnidad',$idunidad)->first();
  $PreguntasRelacionales=Preguntascolumna::where('IdPregunta',$request->IdPregunta)->get();
  foreach ($PreguntasRelacionales as $PreguntaRelacional) {
   $NumeroPregunta++;
   if($PreguntaRelacional->ClavePregunta===$request->input('Respuesta'.$NumeroPregunta)){
     $Correctas++;
   }}
 if($Correctas==4) $this->RegistrarRespuestaCorrecta($Alumno,$Examen);
else $this->RegistrarRespuestaIncorrecta($Alumno);
return $this->tomarexamen();
}


}