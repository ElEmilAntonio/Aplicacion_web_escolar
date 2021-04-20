<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Respuestascolumna extends Model
{
    protected $primaryKey = 'IdPreguntaColumna';
   protected $fillable=[
   	     'IdPreguntaColumna',
        'Respuesta',
        'ClavePregunta',
    ];
    public $timestamps = false;
}
