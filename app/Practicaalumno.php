<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Practicaalumno extends Model
{
     protected $primaryKey = 'ClavePracticaAlumno';
    protected $fillable=[
        'ClavePracticaAlumno',
        'IdPractica',
        'NumeroControl',
        'EstadoPractica',
    ];
    public $timestamps = false;
}
