<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Club;
use App\Deporte;
use App\Jugador;
use App\Position;
use App\Http\Requests\JugadorRequest;

class JugadorController extends Controller
{
 public function jugador($id, $id_deporte)
    {
      $iden = $id;
      $sport = $id_deporte;
      $position = Position::select('id','name')->where('id_deporte', '=', $sport)->get();
      return view('jugador',compact('position', 'iden'));
    }

  public function create_jugador(JugadorRequest $request, $iden)
 {
       Jugador::create([
       'name' => $request->name,
       'lastname' => $request->lastname,
       'fecha_nacimiento' => $request->fecha_nacimiento,
       'ciudad_origen' => $request->ciudad_origen,
       'posicion' => $request->posicion,
       'id_club' => $iden,
       ]);

       $list_clubs = Club::select('id','name', 'universidad', 'image', 'id_deporte')->paginate(5);
       return view('list_clubs', compact('list_clubs'));
 }

  public function list_jugadores($club)
 {
   $list_jugadores = Jugador::select('id','name', 'lastname', 'posicion')->where('id_club', '=', $club)->paginate(10);
   return view('list_jugadores', compact('list_jugadores'));
 }

  public function destroy($list_jugadores)
 {
     $jugador = Jugador::where('id','=', $list_jugadores)->delete();

     $list_jugadores = Jugador::select('id','name', 'lastname', 'posicion')->paginate(10);
     return view('list_jugadores', compact('list_jugadores'));
 }

}
