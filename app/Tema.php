<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tema extends Model
{
  protected $primaryKey = 'IdTema';
  protected $fillable=[
      'IdTema',
   'IdUnidad',
        'NombreTema', 
          'ArchivoTema',
   'InformacionTema',
        'LinkVideoTema', 
        'EstadoTema'
    ];
    public $timestamps = false;
}
