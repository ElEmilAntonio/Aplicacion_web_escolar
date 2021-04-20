<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    protected $fillable=[
        'ClaveCurso',
        'id',
        'EstadoCurso' 
    ];
    public $timestamps = false;
}
