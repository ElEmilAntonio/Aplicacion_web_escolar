<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asistenciaalumno extends Model
{
protected $primaryKey = 'ClaveAsistenciaAlumno';
      protected $fillable=[
        'ClaveAsistenciaAlumno',
          'IdAsistencia',
        'NumeroControl',
        'Asistencia',
        ];
            public $timestamps = false;
}
