<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actividade extends Model
{
    protected $primaryKey = 'IdActividad';
      protected $fillable=[
        'IdActividad',
          'IdUnidad',
        'NombreActividad',
        'FechaActividad',
        'EstadoActividad',
        'ArchivoActividad',
        'InstruccionesActividad',
        ];
            public $timestamps = false;
}
