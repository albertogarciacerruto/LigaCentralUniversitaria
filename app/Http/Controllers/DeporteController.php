<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Deporte;
use App\Position;
use App\Article;
use App\Comment;
use App\Club;
use App\Match;
use App\Jugador;
use App\Http\Requests\DeporteRequest;

class DeporteController extends Controller
{
  public function deporte()
 {
     return view('deporte');
 }

  public function create_deporte(DeporteRequest $request)
 {

         Deporte::create([
         'name' => $request->name,
     ]);
     $list_sports = Deporte::select('id','name')->paginate(5);
     return view('list_sports', compact('list_sports'));
 }

 public function list_sports()
 {
   $list_sports = Deporte::select('id','name')->paginate(5);
   return view('list_sports', compact('list_sports'));
 }

 public function destroy($list_sports)
 {

     $position = Position::where('id_deporte', '=', $list_sports)->delete();
     $article = Article::where('sport', '=', $list_sports)->get();
     foreach($article as $noticia){
        $comment = Comment::where('id_post','=', $noticia->id)->delete();
      } 
     $blog = Article::where('sport','=', $list_sports)->delete();
      
     $var = Club::select('name')->where('id_deporte', '=', $list_sports)->get();
     foreach($var as $club){
      $match = Match::where('local', '=', $club->name)->orWhere('visita', '=', $club->name)->delete();
    }
     $equipos = Club::where('id_deporte','=', $list_sports)->get();
     foreach($equipos as $team){
      $player = Jugador::where('id_club','=', $team->id)->delete(); 
    }
     $club = Club::where('id_deporte','=', $list_sports)->delete();
     $sport = Deporte::where('id','=', $list_sports)->delete();
     \DB::commit();

     $list_sports = Deporte::select('id','name')->paginate(5);
     return view('list_sports', compact('list_sports'));
 }
}
