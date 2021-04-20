<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Examene extends Model
{
     protected $primaryKey = 'IdExamen';
    protected $fillable=[
        'IdExamen',
         'IdUnidad' ,
        'NumeroExamen',
        'FechaExamen',
        'HoraInicioExamen',
        'HoraFinExamen',
        'CantidadPreguntas',
        'EstadoExamen',
    ];
    public $timestamps = false;
}
