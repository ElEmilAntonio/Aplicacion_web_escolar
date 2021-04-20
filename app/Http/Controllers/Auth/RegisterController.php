<?php
namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use App\User;
use App\Usuario;
use App\Docente;
use App\Alumno;
use App\Role_user;
use App\Curso;
use App\Unidade;
use App\Examene;
use App\Porcentaje;
use App\Practica;
use App\seleccioncurso;
use App\Asistencia;
use App\Actividade;
use App\Actividadalumno;
use App\Asistenciaalumno;
use App\Practicaalumno;
use App\Examenalumno;
use redirect;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
class RegisterController extends Controller{
use RegistersUsers;
protected $redirectTo = '/Bienvenida';
public function __construct() {
$this->middleware('guest');
}
protected function formulario_alumno(){
return View('Auth\registaralumno');
}
protected function validator(array $data){
return Validator::make($data, ['name' => ['required', 'string', 'max:50'],'apellidos' => ['required', 'string', 'max:50'],'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],'Homoclave' => ['required', 'string','min:13', 'max:13','unique:docentes'],'NumeroControl' => ['required', 'string','min:8', 'max:8','unique:alumnos'],'Token'=>['required', 'string','min:4', 'max:4','exists:docentes'],'ClaveCurso' => ['required', 'string','min:4', 'max:4','exists:cursos'],'password' => ['required', 'string', 'min:8', 'confirmed'],'tipo' => ['required', 'String']]);
}
protected function create(array $data){
$tipo=$data['tipo'];        
$user=User::create(['name' => $data['name'],'email' => $data['email'],
'password' => Hash::make($data['password']),
]);
$userid = User::select('id')->where('email',$data['email'])->value('id');
if ($userid !== null) {
if($tipo==="1"){
$Token=$this->claveToken();
$docente = Docente::create(['HomoClave'=>$data['Homoclave'],'id'=>$userid,
'Nombre'=>$data['name'],'Apellidos'=>$data['apellidos'],'Token'=>$Token
]);
$Role_user = Role_user::create(['role_id'=>1,'user_id'=>$userid]);
for ($a=0; $a <3; $a++) {
$cadena_base =  'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
$cadena_base .= '0123456789' ;
$ClaveCursoNuevo = '';
$limite = strlen($cadena_base) - 1;
$ClaveCursoNuevo=$this->claveAleatoria();
$curso = Curso::create(['ClaveCurso'=>$ClaveCursoNuevo,'id'=>$userid,
'EstadoCurso'=>0]);
for ($c=1; $c< 5; $c++) {
$unidad = Unidade::create(['IdUnidad'=>null,'ClaveCurso'=>$ClaveCursoNuevo,
'NumeroUnidad'=>$c]);
$IdUnidad=Unidade::select('IdUnidad')->where('NumeroUnidad',$c)->where('ClaveCurso',$ClaveCursoNuevo)->value('IdUnidad');
$path = public_path($userid.'/'.$ClaveCursoNuevo.'/'.$c);
if(!File::isDirectory($path))File::makeDirectory($path, 0777, true, true);
$dia= date("Y-m-d");
$HoraInicio=date("H:i");
$HoraFin=date("H:i");
$examen= Examene::create(['IdExamen'=>null,'IdUnidad'=>$IdUnidad,'NumeroExamen'=>$c,
'FechaExamen'=>$dia,'HoraInicioExamen'=>$HoraInicio,'HoraFinExamen'=>$HoraFin,
'CantidadPreguntas'=>0,'EstadoExamen'=>0 ]);
$porcentaje =Porcentaje::create(['IdUnidad'=>$IdUnidad,'Actividades'=>30,'Practicas'=>30,
'Examen'=>40]);
for ($p=1; $p< 3; $p++) {
$practica= Practica::create(['IdPractica'=>null,'IdUnidad'=>$IdUnidad,'FechaPractica'=>$dia,'HoraInicioPractica'=>$HoraInicio,'HoraFinPractica'=>$HoraFin,'EstadoPractica'=>0 ]);
}  } }
$CursoActual = Curso::select('ClaveCurso')->where('id',$userid)->value('ClaveCurso');
$seleccioncurso= seleccioncurso::create(['id'=>$userid,'ClaveCurso'=>$CursoActual,'Unidad'=>1]);
}else if($tipo==="2"){
$alumno = Alumno::create(['NumeroControl'=>$data['NumeroControl'],'ClaveCurso'=>$data['ClaveCurso'],'id'=>$userid,'Nombre'=>$data['name'],
'Apellidos'=>$data['apellidos']]);
$CursoActual = Alumno::select('ClaveCurso')->where('id',$userid)->value('ClaveCurso');
$seleccioncurso= seleccioncurso::create(['id'=>$userid,'ClaveCurso'=>$CursoActual,'Unidad'=>1]);
$Role_user = Role_user::create(['role_id'=>2,'user_id'=>$userid]);
$IdUnidades=Unidade::where('ClaveCurso',$CursoActual)->get();
foreach ($IdUnidades as $IdUnidad) {
$Actividades=Actividade::where('IdUnidad',$IdUnidad->IdUnidad)->get();
$Practicas=Practica::where('IdUnidad',$IdUnidad->IdUnidad)->get();
if($Actividades!=null){
foreach ($Actividades as $Actividad) {
if($Actividad!=null){
$ClaveActividadAlumno=$Actividad->IdActividad."-".$data['NumeroControl'];    
$ActividadAlumno=Actividadalumno::create(['ClaveActividadAlumno'=>$ClaveActividadAlumno,'IdActividad'=>$Actividad->IdActividad,'NumeroControl'=>$data['NumeroControl'],'Calificacion'=>0]);
}}}
if($Practicas!=null){
foreach ($Practicas as $practica) {
$ClavePracticaAlumno=$practica->IdPractica."-".$data['NumeroControl'];
$ActividadAlumno=Practicaalumno::create(['ClavePracticaAlumno'=>$ClavePracticaAlumno,'IdPractica'=>$practica->IdPractica,'NumeroControl'=>$data['NumeroControl'],'EstadoPractica'=>0]);
}}
$Asistencias=Asistencia::where('IdUnidad',$IdUnidad->IdUnidad)->get();
if($Asistencias!=null){
foreach ($Asistencias as $Asistencia) {
if($Asistencia!=null){
  $ClaveAsistenciaAlumno=$Asistencia->IdAsistencia."-".$data['NumeroControl'];    
  $AsistenciaAlumno=Asistenciaalumno::create(['ClaveAsistenciaAlumno'=>$ClaveAsistenciaAlumno,'IdAsistencia'=>$Asistencia->IdAsistencia,'NumeroControl'=>$data['NumeroControl'],'Asistencia'=>0]);
}}}
$elExamen=Examene::where('IdUnidad',$IdUnidad->IdUnidad)->first();
$ClaveExamenAlumno=$elExamen->IdExamen."-".$data['NumeroControl'];  
$ExamenAlumno=Examenalumno::create(['ClaveExamenAlumno'=>$ClaveExamenAlumno,'IdExamen'=>$elExamen->IdExamen,'NumeroControl'=>$data['NumeroControl'],'Calificacion'=>0,'EstadoExamen'=>0,'Aciertos'=>0,'CantidadPreguntas'=>0,'Calificacion'=>0]);
}}}
return $user;
}
public function claveAleatoria(){
do{
$cadena_base =  'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
$cadena_base .= '0123456789' ;
$ClaveCursoNuevo = '';
$limite = strlen($cadena_base) - 1;
for ($i=0; $i < 4; $i++) {
$ClaveCursoNuevo .= $cadena_base[rand(0, $limite)];
}
$checkcurso = Curso::select('ClaveCurso')->where('ClaveCurso',$ClaveCursoNuevo)->value('ClaveCurso');
}while($checkcurso!==null);
return $ClaveCursoNuevo;
}
public function claveToken(){
do{
$cadena_base =  'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
$cadena_base .= '0123456789' ;
$Token = '';
$limite = strlen($cadena_base) - 1;
for ($i=0; $i < 4; $i++) {
$Token .= $cadena_base[rand(0, $limite)];
}
$checktoken = Docente::select('Token')->where('Token',$Token)->value('Token');
}while($checktoken!==null);
return $Token;
}}