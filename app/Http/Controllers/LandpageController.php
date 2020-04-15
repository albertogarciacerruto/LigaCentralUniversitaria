<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Page;
use App\Banner;
use Twitter;
use App\Club;
use App\Deporte;
use \DB;
use App\Comment;
use App\Count;


class LandpageController extends Controller
{
  public function index()
   {
      $variable = Count::All()->first();
      $count = $variable->contador +1;
      $contador = \DB::table('counts')
      ->where('id', '=', 1)
      ->update(['contador' => $count]);
      $visitas = Count::All()->first();
       $notice = Article::where('section','=','Principal')->where('visibility', '=', 'activo')->orderby('created_at','DESC')->get();
       $novedades = Article::where('section','=','Novedades')->where('visibility', '=', 'activo')->orderby('created_at','DESC')->get();
       $tendencias = Article::where('section','=','Tendencias')->where('visibility', '=', 'activo')->orderby('created_at','DESC')->get();
       $destacados = Article::where('section','=','Destacados')->where('visibility', '=', 'activo')->orderby('created_at','DESC')->get();
       $importantes = Article::where('section','=','Importantes')->where('visibility', '=', 'activo')->orderby('created_at','DESC')->get();
       $ultimate = Article::where('section','=','Principal')->where('visibility', '=', 'activo')->orderby('created_at','DESC')->take(1)->get();
       $banner1 = Banner::where('name', '=', 'image_central')->get();
       $banner2 = Banner::where('name', '=', 'image_lateral1')->get();
       $banner3 = Banner::where('name', '=', 'image_lateral2')->get();
       $banner4 = Banner::where('name', '=', 'image_lateral3')->get();
       $data = Twitter::getUserTimeline(['count' => 6, 'format' => 'array']);
       $partidos = \DB::select('SELECT m.id, m.fecha, m.status, l.name As primero, v.name As segundo, l.image As imagen1, v.image As imagen2 FROM matches m, clubs l, clubs v WHERE l.name = m.local AND v.name = m.visita AND m.status = "Por Iniciar"');
       $disciplinas = Club::select('id','name')->get();
       $deportes = Deporte::Select('id','name')->get();

       return view('index',compact('notice','novedades', 'tendencias','destacados', 'importantes','ultimate','banner1', 'banner2', 'banner3', 'banner4','data', 'partidos', 'disciplinas','deportes', 'visitas'));
   }

   public function get_sport_detail($id)
   {
        $sports = Deporte::findOrFail($id); 
        $sport = Deporte::select('id', 'name')->where('id', '=', $id)->get();
        $notice = Article::where('section','=','Principal')->where('sport', '=', $sport[0]->id)->where('visibility', '=', 'activo')->orderby('created_at','DESC')->get();
        $novedades = Article::where('section','=','Novedades')->where('sport', '=', $sport[0]->id)->where('visibility', '=', 'activo')->orderby('created_at','DESC')->get();
        $tendencias = Article::where('section','=','Tendencias')->where('sport', '=', $sport[0]->id)->where('visibility', '=', 'activo')->orderby('created_at','DESC')->get();
        $destacados = Article::where('section','=','Destacados')->where('sport', '=', $sport[0]->id)->where('visibility', '=', 'activo')->orderby('created_at','DESC')->get();
        $importantes = Article::where('section','=','Importantes')->where('sport', '=', $sport[0]->id)->where('visibility', '=', 'activo')->orderby('created_at','DESC')->get();
        $ultimate = Article::where('section','=','Principal')->where('sport', '=', $sport[0]->id)->where('visibility', '=', 'activo')->orderby('created_at','DESC')->take(1)->get();
        $banner1 = Banner::where('name', '=', 'image_central')->get();
        $banner2 = Banner::where('name', '=', 'image_lateral1')->get();
        $banner3 = Banner::where('name', '=', 'image_lateral2')->get();
        $banner4 = Banner::where('name', '=', 'image_lateral3')->get();
        $data = Twitter::getUserTimeline(['count' => 6, 'format' => 'array']);
        $partidos = \DB::select('SELECT m.id, m.fecha, m.status, l.name As primero, v.name As segundo, l.image As imagen1, v.image As imagen2 FROM matches m, clubs l, clubs v WHERE l.name = m.local AND v.name = m.visita AND m.status = "Por Iniciar"');
        $disciplinas = Club::select('id','name')->get();
        $deportes = Deporte::Select('id','name')->get();
        return view('sport',compact('notice','novedades', 'tendencias','destacados', 'importantes','ultimate','banner1', 'banner2', 'banner3', 'banner4','data', 'partidos', 'disciplinas','deportes'));
   }

      public function nosotros()
       {
         $disciplinas = Club::select('id','name')->get();
         $deportes = Deporte::Select('id','name')->get();
         $ours = Page::select('content','image')->where('name', '=', 'Quienes Somos')->get();
         $data = Twitter::getUserTimeline(['count' => 6, 'format' => 'array']);
         return view('nosotros', compact('ours', 'deportes', 'disciplinas', 'data'));
       }

       public function contacto()
       {
         $disciplinas = Club::select('id','name')->get();
         $deportes = Deporte::Select('id','name')->get();
         $cont = Page::select('content','image')->where('name', '=', 'Contacto')->get();
         $data = Twitter::getUserTimeline(['count' => 6, 'format' => 'array']);
         return view('contacto', compact('disciplinas', 'deportes', 'cont', 'data'));
       }

       public function nosotros_conf()
       {
         $ours = Page::select('content','image')->where('name', '=', 'Quienes Somos')->get();
         return view('nosotrosconf', compact('ours'));
       }

       public function nosotros_conf_update(Request $request)
        {
          $content = $request->content;

          if ($request->hasFile('image'))
              {
                 $nuevaFoto = $request->file('image')->store('public');
                 $image = \DB::table('pages')->where('name','=', 'Quienes Somos')->update(['image' => $nuevaFoto]);
              }

          $contenido = \DB::table('pages')
              ->where('name', '=', 'Quienes Somos')
              ->update(['content' => $content]);


          $ours = Page::select('content','image')->where('name', '=', 'Quienes Somos')->get();
          return view('nosotrosconf', compact('ours'));
        }

        public function contacto_conf()
       {
         $cont = Page::select('content','image')->where('name', '=', 'Contacto')->get();
         return view('contactoconf', compact('cont'));
       }

       public function contacto_conf_update(Request $request)
        {
          $content = $request->content;

          if ($request->hasFile('image'))
              {
                 $nuevaFoto = $request->file('image')->store('public');
                 $image = \DB::table('pages')->where('name','=', 'Contacto')->update(['image' => $nuevaFoto]);
              }

          $contenido = \DB::table('pages')
              ->where('name', '=', 'Contacto')
              ->update(['content' => $content]);


          $cont = Page::select('content','image')->where('name', '=', 'Contacto')->get();
          return view('contactoconf', compact('cont'));
        }

        public function banner()
        {
          $banner1 = Banner::where('name', '=', 'image_central')->get();
          $banner2 = Banner::where('name', '=', 'image_lateral1')->get();
          $banner3 = Banner::where('name', '=', 'image_lateral2')->get();
          $banner4 = Banner::where('name', '=', 'image_lateral3')->get();
          return view('banners', compact('banner1', 'banner2', 'banner3', 'banner4'));
        }

        public function banner_update(Request $request)
         {

           $link1 = $request->link1;
           $link2 = $request->link2;
           $link3 = $request->link3;
           $link4 = $request->link4;

           if ($request->hasFile('image_central'))
               {
                  $nuevaFoto1 = $request->file('image_central')->store('banners');
                  $image1 = \DB::table('banners')->where('name','=', 'image_central')->update(['image' => $nuevaFoto1]);
               }

           if ($request->hasFile('image_lateral1'))
               {
                 $nuevaFoto2 = $request->file('image_lateral1')->store('banners');
                 $image2 = \DB::table('banners')->where('name','=', 'image_lateral1')->update(['image' => $nuevaFoto2]);
               }

           if ($request->hasFile('image_lateral2'))
               {
                 $nuevaFoto3 = $request->file('image_lateral2')->store('banners');
                 $image3 = \DB::table('banners')->where('name','=', 'image_lateral2')->update(['image' => $nuevaFoto3]);
               }

           if ($request->hasFile('image_lateral3'))
               {
                 $nuevaFoto4 = $request->file('image_lateral3')->store('banners');
                 $image4 = \DB::table('banners')->where('name','=', 'image_lateral3')->update(['image' => $nuevaFoto4]);
               }

           $link11 = \DB::table('banners')
               ->where('name', '=', 'image_central')
               ->update(['link' => $link1]);

           $link12 = \DB::table('banners')
               ->where('name', '=', 'image_lateral1')
               ->update(['link' => $link2]);

           $link13 = \DB::table('banners')
               ->where('name', '=', 'image_lateral2')
               ->update(['link' => $link3]);

           $link14 = \DB::table('banners')
               ->where('name', '=', 'image_lateral3')
               ->update(['link' => $link4]);


               $banner1 = Banner::where('name', '=', 'image_central')->get();
               $banner2 = Banner::where('name', '=', 'image_lateral1')->get();
               $banner3 = Banner::where('name', '=', 'image_lateral2')->get();
               $banner4 = Banner::where('name', '=', 'image_lateral3')->get();
               return view('banners', compact('banner4', 'banner1', 'banner2', 'banner3'));
         }

}
