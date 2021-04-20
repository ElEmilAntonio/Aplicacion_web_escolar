<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\CreatePracticaPost;
use App\Http\Traits\TraitObtenerDatosGenerales;
use Response;
use App\Practica;
use App\Practicaalumno;
use redirect;

class PracticaController extends Controller
{
use TraitObtenerDatosGenerales;

public function index(){
$CursoActual=$this->ObtenerCursoActual();
$Practicas=$this->ObtenerPracticas();
return view('docente.PracticasDocente',['cursoactual'=>$CursoActual,'practicas'=>$Practicas]);
}
public function indexalumno(){
$Alumno=$this->ObtenerAlumno();
$CursoActual=$this->ObtenerCursoActual();
$Practicas=$this->ObtenerPracticas();
$Practicasalumno=collect();
foreach ($Practicas as $practica) {
$Practicaalumno=collect(Practicaalumno::where('NumeroControl',$Alumno->NumeroControl)->where('IdPractica',$practica->IdPractica)->first());
 $Practicasalumno->push($Practicaalumno);
}
 $Values=$Practicasalumno->values();
 $Practicaspluck=$Values->all();
return view('alumno.PracticasAlumno',['cursoactual'=>$CursoActual,'practicas'=>$Practicas,'practicaspluck'=>$Practicaspluck]);
}

public function practica1($NumeroModelo){
if($NumeroModelo==1){
 return view('alumno.Practicauno');
}
if($NumeroModelo==2){
return  $this->Marcarpractica1();
}}

public function practica2($NumeroModelo){
if($NumeroModelo==1){return view('modelos.refrigerante');}
if($NumeroModelo==2){return view('modelos.embudo');}
if($NumeroModelo==3){return view('modelos.mechero');} 
if($NumeroModelo==4){return view('modelos.agitadores');}
if($NumeroModelo==5){return view('modelos.mortero');}
if($NumeroModelo==6){return view('modelos.redesilla');}
if($NumeroModelo==7){return view('modelos.pizeta');}
if($NumeroModelo==8){return view('modelos.tubo');}
if($NumeroModelo==9){return view('modelos.tubosensayo');}
if($NumeroModelo==10){return view('modelos.vasodepricipitacion');}
if($NumeroModelo==11){return $this->Marcarpractica2();}
}

public function practica3($NumeroModelo){
if($NumeroModelo==1){return view('practica3.Practicatres');}
if($NumeroModelo==2){return view('practica3.Practicatres2');}
if($NumeroModelo==3){return view('practica3.Practicatres3');}
if($NumeroModelo==4){return view('practica3.Practicatres4');}
if($NumeroModelo==5){
return $this->Marcarpractica1();
}}

public function practica4($NumeroModelo){
if($NumeroModelo==1){return view('alumno.Practicacuatro');
}elseif ($NumeroModelo==2) {
return $this->Marcarpractica2();
}}

public function practica5($NumeroModelo){
 if($NumeroModelo==1){return view('alumno.Practicacinco');
}elseif ($NumeroModelo==2) {
return $this->Marcarpractica1();
}}

public function practica6($NumeroModelo){
 if($NumeroModelo==1){return view('alumno.Practicaseis');
}elseif ($NumeroModelo==2) {
return $this->Marcarpractica2();
}}

public function practica7($NumeroModelo){
 if($NumeroModelo==1){return view('alumno.Practicasiete');
}elseif ($NumeroModelo==2) {
return $this->Marcarpractica1();
}}

public function practica8($NumeroModelo){
 if($NumeroModelo==1){return view('alumno.Practicaocho');
}elseif ($NumeroModelo==2) {
return $this->Marcarpractica2();
}}

public function edit($IdPractica){
$CursoActual=$this->ObtenerCursoActual();
$Practica=Practica::findOrFail($IdPractica);
return view('docente.PracticaDocente',['practica'=>$Practica,'cursoactual'=>$CursoActual]);
}


public function update(CreatePracticaPost $request,$IdPractica){ 
$validator =$request->validated();
$EstadoPractica=0;
if ($request->EstadoPractica==1) $EstadoPractica=1;  
$Practica=Practica::findOrFail($IdPractica);
$Practica->EstadoPractica = $EstadoPractica;
$Practica->FechaPractica = $request->FechaPractica;
$Practica->HoraInicioPractica = $request->HoraInicioPractica;
$Practica->HoraFinPractica = $request->HoraFinPractica;
$Practica->update();
return redirect('/Editar_Practica_docente/'.$IdPractica);
}

public function Marcarpractica1(){
$Alumno=$this->ObtenerAlumno();
$idunidad =$this->ObtenerIdUnidad();
$Practicaalumno=Practicaalumno::where('NumeroControl',$Alumno->NumeroControl)
->where('IdPractica',$practica->IdPractica)->first();
 $Practicaalumno->EstadoPractica=1;
 $Practicaalumno->update();
 return redirect()->action('PracticaController@indexalumno');
}
 public function Marcarpractica2(){
$Alumno=$this->ObtenerAlumno();
$Practicaalumno=Practicaalumno::where('NumeroControl',$Alumno->NumeroControl)
->where('IdPractica',$practica->IdPractica)
->orderBy('IdPractica','ASC')->first();
 $Practicaalumno->EstadoPractica=1;
 $Practicaalumno->update();
return redirect()->action('PracticaController@indexalumno');
}


public function ObtenerPracticas(){
$idunidad=$this->ObtenerIdUnidad();
return $Practicas=Practica::where('IdUnidad',$idunidad)->get();
}
}
