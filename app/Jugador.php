<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jugador extends Model
{
  protected $table = 'jugadores';
  protected $fillable = [
      'name', 'lastname', 'fecha_nacimiento', 'ciudad_origen', 'posicion', 'id_plantilla', 'id_club',
  ];
}
