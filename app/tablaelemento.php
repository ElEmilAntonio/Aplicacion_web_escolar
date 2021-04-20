<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tablaelemento extends Model
{
   // protected $primaryKey = 'Numero';
   protected $fillable=[
      'id',
   'Numero',
   'Nombre',
        'Simbolo',
        'Grupo',
        'Periodo',
        'Bloque',
        'MasaAtomica',
        'ConfElectronica',
        'DurezaMohs',
        'Electrones',
        'Aplicaciones',
        'Precauciones',
        'link' 
    ];
    public $timestamps = false;
}
