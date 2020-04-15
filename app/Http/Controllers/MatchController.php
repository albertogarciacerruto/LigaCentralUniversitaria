<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Club;
use App\Match;
use App\Http\Requests\MatchRequest;

class MatchController extends Controller
{
    public function match()
    {
      $equipos = \DB::select('SELECT c.id, c.name As club, c.image, d.name As sport FROM clubs c, deportes d WHERE c.id_deporte = d.id');
      return view('match',compact('equipos'));
    }

  public function create_match(MatchRequest $request)
  {
    Match::create([
    'local' => $request->id_local,
    'visita' => $request->id_visita,
    'fecha' => $request->fecha,
    'jornada' => $request->jornada,
    ]);

    $equipos = \DB::select('SELECT c.id, c.name As club, c.image, d.name As sport FROM clubs c, deportes d WHERE c.id_deporte = d.id');
    return view('match',compact('equipos'));
  }

   public function list_partidos()
  {
    $list_partidos = \DB::select('SELECT m.id, m.fecha, l.name As primero, v.name As segundo, l.image As imagen1, v.image As imagen2 FROM matches m, clubs l, clubs v WHERE l.name = m.local AND v.name = m.visita AND m.status = "Por Iniciar"');
    return view('list_matches', compact('list_partidos'));
  }

 public function destroy($list_partidos)
  {
    $user = \DB::table('matches')->where('id', '=', $list_partidos)->delete();
    return redirect('list_match');
  }

  public function get_match($match)
 {
     $part = \DB::select('SELECT m.id, m.fecha, m.status, m.jornada, l.name As primero, v.name As segundo FROM matches m, clubs l, clubs v WHERE l.name = m.local AND v.name = m.visita');
     $partido = collect($part)->where('id', '=', $match);

     return view('update_match', compact('partido'));
 }

 public function update_match(MatchRequest $request)
 {

     $id = $request->id;
     $gol_visita = $request->gol_visita;
     $gol_local = $request->gol_local;
     $local = $request->primero;
     $visita = $request->segundo;

     $golLocal = \DB::table('matches')
         ->where('id', '=', $id)
         ->update(['gol_local' => $gol_local]);

      $golVisita = \DB::table('matches')
         ->where('id', '=', $id)
         ->update(['gol_visita' => $gol_visita]);

      $estatus = \DB::table('matches')
         ->where('id', '=', $id)
         ->update(['status' => 'Finalizado']);

         if  ($gol_local > $gol_visita)
         {
            $home= Club::where('name', '=', $local)->get();
            $ganador = \DB::table('clubs')
            ->where('name', '=', $local)
            ->update(['victorias' => $home[0]->victorias + 1, 'puntos' => $home[0]->puntos + 3, 'golesFavor' => $home[0]->golesFavor + $gol_local, 'golesContra' => $home[0]->golesContra + $gol_visita ]);
   
            $visit= Club::where('name', '=', $visita)->get();
            $perdedor = \DB::table('clubs')
            ->where('name', '=', $visita)
            ->update(['derrotas' => $visit[0]->derrotas + 1, 'golesFavor' => $visit[0]->golesFavor + $gol_visita, 'golesContra' => $visit[0]->golesContra + $gol_local ]);
         
         }
          else if  ($gol_visita > $gol_local) 
           {
           $visit= Club::where('name', '=', $visita)->get();
           $ganador = \DB::table('clubs')
            ->where('name', '=', $visita)
            ->update(['victorias' => $visit[0]->victorias + 1, 'puntos' => $visit[0]->puntos + 3, 'golesFavor' => $visit[0]->golesFavor + $gol_visita, 'golesContra' => $visit[0]->golesContra + $gol_local ]);
   
            $home= Club::where('name', '=', $local)->get();
            $perdedor = \DB::table('clubs')
            ->where('name', '=', $local)
            ->update(['derrotas' => $home[0]->derrotas + 1, 'golesFavor' => $home[0]->golesFavor + $gol_local, 'golesContra' => $home[0]->golesContra + $gol_visita ]);
         } 
          else if ($gol_local == $gol_visita) 
           {
              $var3= Club::where('name', '=', $local)->get();
              $empate1 = \DB::table('clubs')
              ->where('name', '=', $local)
              ->update(['empates' => $var3[0]->empates + 1, 'puntos' => $var3[0]->puntos + 1,  'golesFavor' => $var3[0]->golesFavor + $gol_local, 'golesContra' => $var3[0]->golesContra + $gol_visita ]);
   
              $var4= Club::where('name', '=', $visita)->get();
              $empate2 = \DB::table('clubs')
              ->where('name', '=', $visita)
              ->update(['empates' => $var4[0]->empates + 1, 'puntos' => $var4[0]->puntos + 1, 'golesFavor' => $var4[0]->golesFavor + $gol_visita, 'golesContra' => $var4[0]->golesContra + $gol_local ]);
         } 
          else {
           echo 'No Exite Registro';
         }
    
      return redirect('list_match');
 }

 public function list_partidos_listos()
 {
  $partidos = \DB::select('SELECT m.id, m.fecha, m.gol_local, m.gol_visita, l.name As primero, v.name As segundo, l.image As imagen1, v.image As imagen2 FROM matches m, clubs l, clubs v WHERE l.name = m.local AND v.name = m.visita AND m.status = "Finalizado"');
   return view('list_matches_listos', compact('partidos'));
 }

public function destroy_listos($partido)
 {
  
  $partidos = \DB::select("SELECT m.id, m.fecha, m.gol_local, m.gol_visita, l.name As primero, v.name As segundo, l.image As imagen1, v.image As imagen2 FROM matches m, clubs l, clubs v WHERE l.name = m.local AND v.name = m.visita AND m.id = '$partido'");
  
  $local = $partidos[0]->primero;
  $visita = $partidos[0]->segundo;
  $gol_local = $partidos[0]->gol_local;
  $gol_visita = $partidos[0]->gol_visita;

  if  ($gol_local > $gol_visita)
         {
            $home= Club::where('name', '=', $local)->get();
            $ganador = \DB::table('clubs')
            ->where('name', '=', $local)
            ->update(['victorias' => $home[0]->victorias - 1, 'puntos' => $home[0]->puntos - 3, 'golesFavor' => $home[0]->golesFavor - $gol_local, 'golesContra' => $home[0]->golesContra - $gol_visita ]);
   
            $visit= Club::where('name', '=', $visita)->get();
            $perdedor = \DB::table('clubs')
            ->where('name', '=', $visita)
            ->update(['derrotas' => $visit[0]->derrotas - 1, 'golesFavor' => $visit[0]->golesFavor - $gol_visita, 'golesContra' => $visit[0]->golesContra - $gol_local ]);
         
         }
          else if  ($gol_visita > $gol_local) 
           {
           $home= Club::where('name', '=', $visita)->get();
           $ganador = \DB::table('clubs')
            ->where('name', '=', $visita)
            ->update(['victorias' => $home[0]->victorias - 1, 'puntos' => $home[0]->puntos - 3, 'golesFavor' => $home[0]->golesFavor - $gol_visita, 'golesContra' => $home[0]->golesContra - $gol_local ]);
   
            $visit= Club::where('name', '=', $local)->get();
            $perdedor = \DB::table('clubs')
            ->where('name', '=', $local)
            ->update(['derrotas' => $visit[0]->derrotas - 1, 'golesFavor' => $visit[0]->golesFavor - $gol_local, 'golesContra' => $visit[0]->golesContra - $gol_visita ]);
         } 
          else if ($gol_local == $gol_visita) 
           {
              $var3= Club::where('name', '=', $local)->get();
              $empate1 = \DB::table('clubs')
              ->where('name', '=', $local)
              ->update(['empates' => $var3[0]->empates - 1, 'puntos' => $var3[0]->puntos - 1,  'golesFavor' => $var3[0]->golesFavor - $gol_local, 'golesContra' => $var3[0]->golesContra - $gol_visita ]);
   
              $var4= Club::where('name', '=', $visita)->get();
              $empate2 = \DB::table('clubs')
              ->where('name', '=', $visita)
              ->update(['empates' => $var4[0]->empates - 1, 'puntos' => $var4[0]->puntos - 1, 'golesFavor' => $var4[0]->golesFavor - $gol_visita, 'golesContra' => $var4[0]->golesContra + $gol_local ]);
         } 
          else {
           echo 'No Exite al menos un registro';
  }
   $user = \DB::table('matches')->where('id', '=', $partido)->delete();
   $partidos = \DB::select('SELECT m.id, m.fecha, m.gol_local, m.gol_visita, l.name As primero, v.name As segundo, l.image As imagen1, v.image As imagen2 FROM matches m, clubs l, clubs v WHERE l.name = m.local AND v.name = m.visita AND m.status = "Finalizado"');
   return view('list_matches_listos', compact('partidos'));
 }
}
