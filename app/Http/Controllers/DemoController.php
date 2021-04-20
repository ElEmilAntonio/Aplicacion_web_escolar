<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\UploadRequest;
class DemoController extends Controller
{
    public function alumnoDemo(){
        return view('alumno/alumno');
    }
    public function docenteDemo(){
        return view('docente/docente');
    }
    public function permissionDenied(){
        return view ('nopermission');
    }
  
}
