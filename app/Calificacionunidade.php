<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class  Calificacionunidade extends Model
{
     protected $primaryKey = 'ClaveCalificacionUnidad';
    protected $fillable=[
        'ClaveCalificacionUnidad',
        'IdUnidad',
        'NumeroControl',
        'Calificacion',
    ];
    public $timestamps = false;
}
