<?php
namespace App\Http\Traits;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Curso;
use App\Alumno;
use App\SeleccionCurso;
use App\Unidade;

use Response;
trait TraitObtenerDatosGenerales{

public function ObtenerCursoActual(){
return seleccioncurso::findOrFail(Auth::User()->id);	
}

public function ObtenerIdUnidad(){
$CursoActual=$this->ObtenerCursoActual();
$idunidad = Unidade::select('IdUnidad')
->where('ClaveCurso',$CursoActual->ClaveCurso)
->where('NumeroUnidad',$CursoActual->Unidad)
->value('IdUnidad');
return $idunidad;
}

public function ObtenerAlumnos(){
$CursoActual=$this->ObtenerCursoActual();
$Alumnos=Alumno::where('ClaveCurso',$CursoActual->ClaveCurso)
->orderBy('Nombre','ASC')->get();
return $Alumnos;	
}

public function ObtenerAlumno(){
 return $Alumno=Alumno::findOrFail(Auth::User()->id);	
}

}