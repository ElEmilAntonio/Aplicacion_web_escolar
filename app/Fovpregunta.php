<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fovpregunta extends Model
{
	 protected $primaryKey = 'IdPregunta';
   protected $fillable=[
        'IdPregunta',
         'Pregunta' ,
        'Respuesta',
    ];
    public $timestamps = false;
}
