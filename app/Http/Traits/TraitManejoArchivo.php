<?php
namespace App\Http\Traits;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Curso;
use App\SeleccionCurso;
use Response;
trait TraitManejoArchivo{

public function DescargaDeArchivo($ArchivoNombre){
$file=$this->GetPath().'/'.$ArchivoNombre;
$headers = array('Content-Type: application/pdf',);
return Response::download($file,$ArchivoNombre,$headers);
}

public function GuardarArchivo($Archivo){
$filename = time().$Archivo->getClientOriginalName();
Storage::disk('local')->putFileAs($this->GetPath(),$Archivo,$filename);
return $filename;
}


public function GetPath(){
$CursoActual=seleccioncurso::findOrFail(Auth::User()->id);
$IdDocente = Curso::select('id')->where('ClaveCurso',$CursoActual->ClaveCurso)->value('id');
$path =base_path('public/'.$IdDocente.'/'.$CursoActual->ClaveCurso.'/'.$CursoActual->Unidad);
return $path;	
}

public function eliminararchivo($ArchivoNombre){
$file=$this->GetPath().'/'.$ArchivoNombre;
return File::delete($file);
}

public function eliminarcarpeta(){
$carpeta =base_path('public/'.Auth::user()->id);
return File::deleteDirectory($carpeta);
   }
}