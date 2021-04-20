<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Traits\TraitEliminarRegistros;
use App\Http\Requests\CreateAlumnoPost;
use App\User;
use App\Usuario;
use App\Alumno;
use App\seleccioncurso;
use redirect;

class AlumnoController extends Controller
{

 use TraitEliminarRegistros;

public function index(){
$id=Auth::User()->id;
$Usuario=User::findOrFail($id);
$Alumno=Alumno::where('id',$id)->first();
$CursoActual=seleccioncurso::findOrFail($id);
return view('alumno.EditarAlumno',['usuario'=>$Usuario,'alumno'=>$Alumno,'cursoactual'=>$CursoActual]);     }

public function mainalumno(){
$Alumno=Alumno::where('id',Auth::User()->id)->first();
  $CursoActual=seleccioncurso::findOrFail($id);
return view('alumno.alumno',['alumno'=>$Alumno,'cursoactual'=>$CursoActual]);
}


public function update(CreateAlumnoPost $request, $id){
$verificador=User::findOrFail($id);
$verificadorNumeroControl=Alumno::findOrFail($id);

if($verificador->email!=$request->email||$verificadorNumeroControl->NumeroControl!=$request->NumeroControl){
 $validator =$request->validated();
}
$Usuario=User::findOrFail($id);
$Usuario->id = $request->id;
$Usuario->name = $request->name;
$Usuario->email = $request->email;
$Usuario->update();
$Alumno=Alumno::findOrFail($id);
$Alumno->NumeroControl = $request->NumeroControl;
$Alumno->id= $request->id;
$Alumno->nombre= $request->name;
$Alumno->Apellidos = $request->apellidos;
$Alumno->update();
return redirect('/Editar_alumno');
}


public function destroy(){
$this->eliminaralumno(Auth::User()->id);
 Auth::logout();
 return view('Auth.login');        
}

public function CambiarCurso($NumeroUnidad){
$CursoActual=seleccioncurso::findOrFail(Auth::User()->id);
$CursoActual->Unidad = $NumeroUnidad;
$CursoActual->update();
return back();
}

}
