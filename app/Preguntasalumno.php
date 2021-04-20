<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Preguntasalumno extends Model
{
   protected $primaryKey = 'ClavePreguntaAlumno';
      protected $fillable=[
        'ClavePreguntaAlumno',
        'IdPregunta',
          'NumeroControl',
        'Resultado',
        ];
         public $timestamps = false;
}
