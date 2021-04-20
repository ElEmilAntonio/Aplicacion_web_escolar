<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Preguntasopcione extends Model
{
   protected $primaryKey = 'IdPregunta';
   protected $fillable=[
        'IdPregunta',
         'Pregunta' ,
        'OpcionA',
        'OpcionB',
        'OpcionC',
        'Respuesta',
    ];
    public $timestamps = false;
}
