<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\User;
use App\Docente;
use App\Curso;
use App\Alumno;
use App\Unidade;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //cargar datos para docente
          view()->composer('layouts.nav', function ($view) 
    {
        $Cursos = Curso::where('id', Auth::user()->id)->get();
        $numero = Curso::where('id', Auth::user()->id)->first();
         $numero = Curso::select('ClaveCurso')->where('id',Auth::user()->id)->value('ClaveCurso');
        $Unidades=Unidade::where('ClaveCurso',$numero)->get();
        $view->with('cursos', $Cursos)->with('unidades',$Unidades);    
    });  
          //cargar datos para alumno
           view()->composer('layouts.navAlumno', function ($view) 
    {
        $Curso = Alumno::select('ClaveCurso')->where('id', Auth::user()->id)->value('ClaveCurso');
        $Unidades=Unidade::where('ClaveCurso',$Curso)->get();
        $view->with('unidades',$Unidades);    
    });  
    }
}
