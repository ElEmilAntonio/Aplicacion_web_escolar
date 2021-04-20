<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actividadalumno extends Model
{
  protected $primaryKey = 'ClaveActividadAlumno';
      protected $fillable=[
        'ClaveActividadAlumno',
          'IdActividad',
        'NumeroControl',
        'Calificacion',
        ];
            public $timestamps = false;
}
