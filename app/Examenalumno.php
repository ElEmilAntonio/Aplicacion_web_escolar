<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Examenalumno extends Model
{
   protected $primaryKey = 'ClaveExamenAlumno';
      protected $fillable=[
        'ClaveExamenAlumno',
          'IdExamen',
        'NumeroControl',
        'EstadoExamen',
        'Aciertos',
        'CantidadPreguntas',
        'Calificacion',
        ];
            public $timestamps = false;
}
