<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asistencia extends Model
{
   protected $primaryKey = 'IdAsistencia';
      protected $fillable=[
        'IdAsistencia',
          'IdUnidad',
        'FechaAsistencia',
        'HoraAsistencia',
        ];
         public $timestamps = false;

}
