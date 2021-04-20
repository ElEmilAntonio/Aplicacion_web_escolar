<?php
namespace App\Http\Traits;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Asistenciaalumno;
use App\Actividadalumno;
use App\Preguntasalumno;
use App\Practicaalumno;
use App\Examenalumno;
use App\Calificacionunidade;
use App\Role_user;
use App\User;
use App\Curso;
use App\seleccioncurso;
use App\Unidade;
use App\Actividade;
use App\Asistencia;
use App\Examene;
use App\Alumno;
use App\Practica;
use App\Tema;
use App\Preguntasexamene;
use App\Fovpregunta;
use App\Preguntasopcione;
use App\Preguntascolumna;
use App\Respuestascolumna;
use App\Porcentaje;
trait TraitEliminarRegistros{

public function eliminarunidad($id){
$porcentajes=Porcentaje::where('IdUnidad',$id)->delete();
$asistencias=Asistencia::where('IdUnidad',$id)->delete();
$actividades=Actividade::where('IdUnidad',$id)->delete();
$examen=Examene::where('IdUnidad',$id)->delete();
$practicas=Practica::where('IdUnidad',$id)->delete();
$temas=Tema::where('IdUnidad',$id)->delete();
}

public function eliminarpreguntas($idunidad){
 $Examen=Examene::where('IdUnidad',$idunidad)->first();
 $Preguntas=Preguntasexamene::where('IdExamen',$Examen->IdExamen)->get();
 foreach ($Preguntas as $pregunta) {
 $preguntafov=Fovpregunta::where('IdPregunta',$pregunta->IdPregunta)->delete();
 $preguntaopcion=Preguntasopcione::where('IdPregunta',$pregunta->IdPregunta)->delete();
 $preguntasrelacional=Preguntascolumna::where('IdPregunta',$pregunta->IdPregunta)->get();
 foreach ($preguntasrelacional as $preguntarelacional) {
 $respuestas=Respuestascolumna::where('IdPreguntaColumna',$preguntarelacional->IdPreguntaColumna)->delete();
           }
 $preguntasrelacional=Preguntascolumna::where('IdPregunta',$pregunta->IdPregunta)->delete();
         }
 $Preguntas=Preguntasexamene::where('IdExamen',$Examn->IdExamen)->delete();
        }


public function eliminaralumno($id){
$Alumno=Alumno::where('id',$id)->first();
$AsistenciasAlumno=Asistenciaalumno::where('NumeroControl',$Alumno->NumeroControl)->delete();
$Actividadalumno=Actividadalumno::where('NumeroControl',$Alumno->NumeroControl)->delete();
$Examenalumno=Examenalumno::where('NumeroControl',$Alumno->NumeroControl)->delete();
$Preguntasalumno=Preguntasalumno::where('NumeroControl',$Alumno->NumeroControl)->delete();
$Calificacionunidades=Calificacionunidade::where('NumeroControl',$Alumno->NumeroControl)->delete();
$practica=Practicaalumno::where('NumeroControl',$Alumno->NumeroControl)->delete();
$EliminarAlumno=Alumno::findOrFail($id)->delete();
$this->eliminarusuario($id);
}

public function eliminarregistrodocente($id){
 $Cursosdocente=Curso::where('Id',$id)->delete();
 $docente=Docente::findOrFail($id)->delete();
 $this->eliminarusuario($id);	
}

public function eliminarusuario($id){
$seleccioncurso=seleccioncurso::where('Id',$id)->delete();
$EliminarUsuario=User::findOrFail($id)->delete();
$role=Role_user::where('user_id',$id)->delete();
}

   public function Reiniciarunidad($clavecurso){
       $unidades=Unidade::where('ClaveCurso',$CursoActual->ClaveCurso)->get();
        foreach ($unidades as $unidad) {
         $asistencias=Asistencia::where('IdUnidad',$unidad->IdUnidad)->delete();
         $actividades=Actividade::where('IdUnidad',$unidad->IdUnidad)->get();
         foreach ($actividades as $actividad) {
          $actividad->EstadoActividad=0;
          $actividad->update();
         }
         $examen=Examene::where('IdUnidad',$unidad->IdUnidad)->first();
         $examen->EstadoExamen=0;
         $practicas=Practica::where('IdUnidad',$unidad->IdUnidad)->get();
         foreach ($practicas as $practica) {
          $practica->EstadoPractica=0;
          $practica->update();
         }
         $temas=Tema::where('IdUnidad',$unidad->IdUnidad)->get();
         foreach ($temas as $tema) {
          $tema->EstadoTema=0;
          $tema->update();
         }
        }
   }

}