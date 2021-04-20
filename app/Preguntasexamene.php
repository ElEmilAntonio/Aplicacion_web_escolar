<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Preguntasexamene extends Model
{
  protected $primaryKey = 'IdPregunta';
      protected $fillable=[
        'IdPregunta',
          'IdExamen',
        'TipoPregunta',
        'Pregunta',
        ];
            public $timestamps = false;
}
