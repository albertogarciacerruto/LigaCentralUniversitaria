<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
  protected $fillable = [
      'name','id_deporte',
  ];
}
