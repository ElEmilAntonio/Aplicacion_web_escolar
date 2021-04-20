<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unidade extends Model
{
    protected $fillable=[
    'IdUnidad',
        'ClaveCurso',
        'NumeroUnidad' 
    ];
    public $timestamps = false;
}
