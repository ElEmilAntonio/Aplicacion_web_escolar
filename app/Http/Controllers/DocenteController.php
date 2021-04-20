<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Http\Requests\CreateDocentePost;
use App\Http\Traits\TraitEliminarRegistros;
use App\Http\Traits\TraitManejoArchivo;
use App\User;
use App\Docente;
use App\Curso;
use App\seleccioncurso;
use App\Unidade;
use App\Alumno;
use redirect;
class DocenteController extends Controller
{
  use TraitEliminarRegistros;
  use TraitManejoArchivo;

    public function index()
    {   
        $Usuario=Auth::User();
        $Docente=Docente::where('id',Auth::User()->id)->first();
         $CursoActual=seleccioncurso::findOrFail(Auth::User()->id);
        $Curso=Curso::where('ClaveCurso',$CursoActual->ClaveCurso)->first();
        return view('docente.EditarDocente',
          [
          'usuario'=>$Usuario,
            'docente'=>$Docente,
            'curso'=>$Curso,
            'cursoactual'=>$CursoActual
          ]);
    }

    protected function update(CreateDocentePost $request,$id)
    {
       $Usuariover=User::findOrFail($id);
    $Docentever=Docente::findOrFail($id);
     if($Usuariover->email!=$request->email||$Docentever->HomoClave!=$request->Homoclave){
     $validator =$request->validated();
  }
    $Usuario=User::findOrFail($id);
    $Usuario->id = $request->id;
    $Usuario->name = $request->name;
    $Usuario->email = $request->email;
    $Usuario->update();
    $Docente=Docente::findOrFail($id);
    $Docente->HomoClave = $request->Homoclave;
    $Docente->id= $request->id;
    $Docente->nombre= $request->name;
    $Docente->Apellidos = $request->apellidos;
    $Docente->update();
    return redirect('/Editar_docente');
}

   public function CambiarEstadoCurso(){
        $CursoActual=seleccioncurso::findOrFail(Auth::User()->id);
        $Curso=Curso::where('ClaveCurso',$CursoActual->ClaveCurso)->first();
        if($Curso->EstadoCurso) $Curso->EstadoCurso=0;
        else $Curso->EstadoCurso=1;
        $Curso->update();
        return redirect('/Editar_docente');
   }

   public function Reiniciarcurso(){
    
        $Usuario=User::findOrFail(Auth::User()->id);
        $CursoActual=seleccioncurso::findOrFail(Auth::User()->id);
        $curso=Curso::where('ClaveCurso',$CursoActual->ClaveCurso)->first();
        $curso->EstadoCurso=0;
        $curso->update();
        $this->Reiniciarunidad($CursoActual->ClaveCurso);
        $alumnos=Alumno::where('ClaveCurso',$CursoActual->ClaveCurso)->get();
        foreach ($alumnos as $alumno) {
        $this->eliminaralumno($alumno->id);
        }
      return redirect('/Editar_docente');
   }

    public function Eliminardocente()
    {
        $id=Auth::User()->id;
        $Cursosdocente=Curso::where('Id',$id)->get();
        foreach ($Cursosdocente as $CursoActual) {
        $unidades=Unidade::where('ClaveCurso',$CursoActual->ClaveCurso)->get();
        foreach ($unidades as $unidad) {
         $this->eliminarunidad($unidad->IdUnidad);
         $this->eliminarPreguntas($unidad->IdUnidad);
        }
        $unidades=Unidade::where('ClaveCurso',$CursoActual->ClaveCurso)->delete();
        $alumnos=Alumno::where('ClaveCurso',$CursoActual->ClaveCurso)->get();
        foreach ($alumnos as $alumno) {
         $this->eliminaralumno($alumno->id);
        }
      } 
        $this->eliminarregistrodocente($id);
        $this->eliminarcarpeta();
          Auth::logout();
           return view('auth.login');
    }
    
    public function maindocente(){
       $id=Auth::User()->id;
       $Docente=Docente::where('id',$id)->first();
       $Cursos=Curso::where('id',$id)->get();
        $CursoActual=seleccioncurso::findOrFail($id);
       return view('docente.docente',
        ['docente'=>$Docente,
        'cursos'=>$Cursos,
        'cursoactual'=>$CursoActual
        ]);
   }

   public function CambiarCurso($ClaveCurso,$NumeroUnidad){
    $CursoActual=seleccioncurso::findOrFail(Auth::User()->id);
    $CursoActual->ClaveCurso = $ClaveCurso;
    $CursoActual->Unidad = $NumeroUnidad;
    $CursoActual->update();
   return redirect('/Docente');
   }
}
