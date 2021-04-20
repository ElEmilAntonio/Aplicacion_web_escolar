<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Practica extends Model
{
    protected $primaryKey = 'IdPractica';
    protected $fillable=[
        'IdPractica',
        'IdUnidad',
        'FechaPractica',
        'HoraInicioPractica',
        'HoraFinPractica',
         'EstadoPractica'

    ];
    public $timestamps = false;
}
