<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Preguntascolumna extends Model
{
   protected $primaryKey = 'IdPreguntaColumna';
   protected $fillable=[
   	     'IdPreguntaColumna',
        'IdPregunta',
         'Pregunta' ,
        'Respuesta',
        'ClavePregunta',
    ];
    public $timestamps = false;
}
