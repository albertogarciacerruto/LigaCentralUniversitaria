<?php

namespace App;
use App\Club;

use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
    protected $fillable = [
        'local', 'visita', 'status', 'fecha', 'jornada', 'gol_local', 'gol_visita',
    ];
    
}
