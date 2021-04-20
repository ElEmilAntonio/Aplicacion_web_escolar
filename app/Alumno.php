<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
	    protected $fillable=[
        'NumeroControl',
          'ClaveCurso',
            'id',
        'Nombre',
        'Apellidos'
        ];
            public $timestamps = false;

}
