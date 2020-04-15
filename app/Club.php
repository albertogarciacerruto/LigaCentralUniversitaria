<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Club extends Model
{
  protected $fillable = [
      'name', 'universidad', 'siglas', 'image', 'dt', 'victorias', 'empates', 'derrotas', 'puntos', 'golesFavor', 'golesContra', 'id_deporte',
  ];
}
