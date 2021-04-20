<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CreateTablaPeriodicaPost;
use App\tablaelemento;
use App\Role_user;
use Response;
use redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Collection;
class HomeController extends Controller
{
public function __construct() {
$this->middleware('auth');
}
public function alumnoTP(){
$elemento=tablaelemento::where('Numero',1)->first();
return view('alumno/TablaPeriodicaAlumno',['ver'=>null,'elemento'=>$elemento]); 
}
public function docenteTP(){
$elemento=tablaelemento::where('Numero',1)->first();
return view('docente/TablaPeriodica',['ver'=>null,'elemento'=>$elemento]); 
}

public function create($Numero){
$elmento=tablaelemento::create(['Id'=>null,'Numero'=>$Numero,'Nombre' =>null,'Simbolo' =>null,'Grupo' =>null,'Periodo' =>null,'Bloque' =>null,'MasaAtomica' =>null,'ConfElectronica' =>null,'DurezaMohs' =>null,'Electrones' =>null,'Aplicaciones' =>null,'Precauciones' =>null,'Link' =>null]);
return $elemento;
}

public function MostrarElemento(Request $request,$Numero){
$elemento=tablaelemento::where('Numero',$Numero)->first();
if($elemento===null){
$elemento=$this->create($Numero);
}
return view('docente/TablaPeriodica',['ver'=>1,'elemento'=>$elemento]);  
}

public function MostrarElementoAlumno(Request $request,$Numero){
$elemento=tablaelemento::where('Numero',$Numero)->first();
if($elemento==null){
$elemento=$this->Create($Numero); 
}
return view('alumno/TablaPeriodicaAlumno',['ver'=>1,'elemento'=>$elemento]);  
}
public function update(CreateTablaPeriodicaPost $request,$Numero){
$validator =$request->validated();
$Tabla=tablaelemento::where('Numero',$Numero)->first();
$Tabla->Nombre= $request->Nombre;
$Tabla->Simbolo = $request->Simbolo;
$Tabla->Grupo = $request->Grupo;
$Tabla->Periodo = $request->Periodo;
$Tabla->Bloque = $request->Bloque;
$Tabla->MasaAtomica = $request->MasaAtomica;
$Tabla->ConfElectronica = $request->ConfElectronica;
$Tabla->DurezaMohs = $request->DurezaMohs;
$Tabla->Electrones = $request->Electrones;
$Tabla->Aplicaciones = $request->Aplicaciones;
$Tabla->Precauciones = $request->Precauciones;
$Tabla->Link = $request->Link;
$Tabla->update();
$elelemento=tablaelemento::where('Numero',$Numero)->first();
return view('docente/TablaPeriodica',['ver'=>1,'elemento'=>$elelemento]);  
}

//Funcion para checar estado del curso 1 o 0
//si el curso esta en 0 no permite la entrada a alumnos
public function redirigir(){

$id= Auth::user()->id;
$rol=Role_user::findOrFail($id);
if ($rol->role_id==2) {
$Alumno=Alumno::where('id',$id)->first();
$Estado=Curso::where('ClaveCurso',$Alumno->ClaveCurso)->first();
if($Estado->EstadoCurso==0){
    Auth::logout();
return view('nopermission');
}else{
return redirect()->route('alumno');
}
}elseif ($rol->role_id==1) {  
return redirect()->route('docente');
}
}


}