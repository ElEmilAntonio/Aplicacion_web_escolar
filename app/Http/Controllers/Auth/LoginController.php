<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Closure;
use App\Curso;
use App\Alumno;
use App\User;
class LoginController extends Controller{
    use AuthenticatesUsers;
protected function authenticated(Request $request, $user){
     $user= Auth::user()->roles->pluck('name');
if ( $user->contains('alumno') ) {
      $id=Auth::User()->id;
        $Usuario=User::findOrFail($id);
        $Alumno=Alumno::where('id',$id)->first();
    $Estado=Curso::where('ClaveCurso',$Alumno->ClaveCurso)->first();
    if($Estado->EstadoCurso==0){
        Auth::logout();
    return view('nopermission');
    }else{
    return redirect()->route('alumno');
}
}elseif ( $user->contains('docente') ) {
   
    return redirect()->route('docente');
}}

    public function __construct(){
        $this->middleware('guest')->except('logout');
    }
}
