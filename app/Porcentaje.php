<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Porcentaje extends Model
{
	 protected $primaryKey = 'IdUnidad';
     protected $fillable=[
    'IdUnidad',
        'Actividades',
        'Practicas',
        'Examen',
    ];
    public $timestamps = false;
}
