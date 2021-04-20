<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    protected $fillable=[
        'HomoClave' ,
        'id',
        'Nombre',
        'Apellidos',
        'Token'  
    ];
    public $timestamps = false;
}
