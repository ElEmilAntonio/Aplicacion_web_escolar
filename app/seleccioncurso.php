<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class seleccioncurso extends Model
{
	protected $fillable=[
      'id',
   'ClaveCurso',
        'Unidad' 
    ];
    public $timestamps = false;
}
