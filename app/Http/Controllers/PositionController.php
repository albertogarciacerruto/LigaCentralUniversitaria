<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Deporte;
use App\Position;
use App\Http\Requests\PositionRequest;

class PositionController extends Controller
{
  public function position($id)
 {
   $deportes = Deporte::select('id','name')->get();
   $iden = $id;
   return view('position',compact('deportes', 'iden'));
 }

  public function create_position(PositionRequest $request, $iden)
 {
         Position::create([
         'name' => $request->name,
         'id_deporte' => $iden,
     ]);
     $list_sports = Deporte::select('id','name')->paginate(5);
     return view('list_sports', compact('list_sports'));
 }

 public function list_positions()
 {
   $list_positions = Position::select('id','name')->paginate(10);
   return view('list_positions', compact('list_positions'));
 }

 public function destroy($list_positions)
 {

     $position = Position::where('id','=', $list_positions)->delete();

     $list_positions = Position::select('id','name')->paginate(10);
     return view('list_positions', compact('list_positions'));
 }
}
