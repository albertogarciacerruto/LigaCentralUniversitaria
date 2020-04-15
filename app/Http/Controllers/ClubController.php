<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Club;
use App\Deporte;
use App\Article;
use App\Jugador;
use App\Match;
use Twitter;
use App\Http\Requests\ClubRequest;

class ClubController extends Controller
{
  public function club()
 {
     $deportes = Deporte::select('id','name')->get();
     return view('club',compact('deportes'));
 }

  public function create_club(ClubRequest $request)
 {
     if ($request->hasFile('image')) {
      $foto = $request->file('image')->store('clubs');
     }

       Club::create([
       'image' => $foto,
       'name' => $request->name,
       'universidad' => $request->universidad,
       'siglas' => $request->siglas,
       'dt' => $request->dt,
       'id_deporte' => $request->id_deporte,
       ]);

     $deportes = Deporte::select('id','name')->get();
     return view('club',compact('deportes'));
 }

 public function list_clubs()
 {
   $list_clubs = Club::select('id','name', 'universidad', 'image', 'id_deporte')->paginate(5);
   return view('list_clubs', compact('list_clubs'));
 }

 public function destroy($list_clubs)
 {
     $var = Club::select('name')->where('id', '=', $list_clubs)->get();
     $matches = Match::where('local', '=', $var[0]->name)->orwhere('visita', '=', $var[0]->name)->delete();
     $player = Jugador::where('id_club','=', $list_clubs)->delete();
     $club = Club::where('id','=', $list_clubs)->delete();
     \DB::commit();

     $list_clubs = Club::select('id','name', 'universidad', 'image', 'id_deporte')->paginate(5);
   return view('list_clubs', compact('list_clubs'));
 }

 public function get_detail($id)
 {
     $clube = Club::findOrFail($id); 
     $club = Club::select('id', 'name', 'image', 'id_deporte')->where('id', '=', $id)->get();
     $disciplinas = Club::select('id','name')->get();
     $deportes = Deporte::Select('id','name')->get();
     $data = Twitter::getUserTimeline(['count' => 6, 'format' => 'array']);
     $team = Jugador::Select('name', 'lastname', 'fecha_nacimiento', 'posicion', 'ciudad_origen')->where('id_club', '=', $club[0]->id )->orderby('name','ASC')->get();
     $tabla = Club::select('image', 'name', 'victorias', 'derrotas', 'puntos')->where('id_deporte', '=', $club[0]->id_deporte)->orderBy('puntos', 'golesFavor', 'DESC')->get();
     $var = $club[0]->id;
     $partidos = \DB::select("SELECT m.id, m.fecha, m.status, l.siglas As primero, v.siglas As segundo, l.image As imagen1, v.image As imagen2 FROM matches m, clubs l, clubs v WHERE l.name = m.local AND v.name = m.visita AND l.id = '$var' AND m.status = 'Por Iniciar' UNION SELECT m.id, m.fecha, m.status, l.siglas As primero, v.siglas As segundo, l.image As imagen1, v.image As imagen2 FROM matches m, clubs l, clubs v WHERE l.name = m.local AND v.name = m.visita AND v.id = '$var' AND m.status = 'Por Iniciar'");
     return view('detalle_equipo', compact('deportes', 'disciplinas', 'data', 'team', 'club', 'tabla', 'partidos'));
 }

}
