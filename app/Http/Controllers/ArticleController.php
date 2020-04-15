<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Deporte;
use App\Club;
use Twitter;
use App\Banner;
use App\Comment;
use App\Http\Requests\ArticleRequest;
use App\Http\Requests\CommentRequest;

class ArticleController extends Controller
{
  public function article()
 {
    $list_deportes = Deporte::select('id','name')->get();
     return view('article', compact('list_deportes'));
 }

  public function create_article(ArticleRequest $request)
 {

         if ($request->hasFile('image'))
         {
            $nuevaFotoBlog = $request->file('image')->store('public');
            $size = $request->file('image')->getClientSize();
         }

         Article::create([
         'title' => $request->title,
         'subtitle' => $request->subtitle,
         'description' => $request->description,
         'content' => $request->content,
         'visibility' => $request->visibility,
         'image' => $nuevaFotoBlog,
         'sport' => $request->sport,
         'section' => $request->section,
     ]);
     $list_deportes = Deporte::select('id','name')->get();
     return view('article', compact('list_deportes'));
 }

 public function list_articles()
 {
   $list_blogs = Article::select('id','title','created_at')->paginate(5);
   return view('list_articles', compact('list_blogs'));
 }

 public function destroy($list_blogs)
 {

     $comment = Comment::where('id_post', '=', $list_blogs)->delete();
     $blog = Article::where('id','=', $list_blogs)->delete();

     $list_blogs = Article::select('id','title','created_at')->paginate(5);
     return view('list_articles', compact('list_blogs'));
 }

 public function get_article($blog)
 {
     $blog = Article::where('id','=',$blog)->get();
     $list_deportes = Deporte::select('id','name')->get();
     return view('update_article', compact('blog', 'list_deportes'));
 }

 public function update_article(ArticleRequest $request)
 {

     $titulo = $request->title;
     $subtitulo = $request->subtitle;
     $description = $request->description;
     $contenido = $request->content;
     $visibility = $request->visibility;
     $section = $request->section;
     $sport = $request->sport;
     $code = $request->code;

     if ($request->hasFile('image'))
         {
            $nuevaFotoBlog = $request->file('image')->store('public');
            $image = \DB::table('articles')->where('id','=', $code)->update(['image' => $nuevaFotoBlog]);
         }

     $tituloBlog = \DB::table('articles')
         ->where('id', '=', $code)
         ->update(['title' => $titulo]);

     $tituloBlog = \DB::table('articles')
         ->where('id', '=', $code)
         ->update(['subtitle' => $subtitulo]);

     $descriptionBlog = \DB::table('articles')
         ->where('id', '=', $code)
         ->update(['description' => $description]);

     $contenidoBlog = \DB::table('articles')
         ->where('id', '=', $code)
         ->update(['content' => $contenido]);

     $estatusBlog = \DB::table('articles')
         ->where('id', '=', $code)
         ->update(['visibility' => $visibility]);

     $sectionBlog = \DB::table('articles')
          ->where('id', '=', $code)
          ->update(['section' => $section]);

     $sportBlog = \DB::table('articles')
           ->where('id', '=', $code)
           ->update(['sport' => $sport]);


     $list_blogs = Article::select('id','title','created_at')->paginate(5);
     return view('list_articles', compact('list_blogs'));
 }

 public function get_detail($id_article)
 {
     $articulo = Article::findOrFail($id_article); 
     $data = Twitter::getUserTimeline(['count' => 6, 'format' => 'array']);
     $disciplinas = Club::select('id','name')->get();
     $deportes = Deporte::Select('id','name')->get();
     $post = Article::where('id','=', $id_article)->get();
     $banner1 = Banner::where('name', '=', 'image_central')->get();
     $banner2 = Banner::where('name', '=', 'image_lateral1')->get();
     $banner3 = Banner::where('name', '=', 'image_lateral2')->get();
     $banner4 = Banner::where('name', '=', 'image_lateral3')->get();
     $comment = Comment::where('id_post','=', $id_article)->paginate(5);
     return view('details', compact('post', 'deportes', 'disciplinas', 'data', 'banner1', 'banner2', 'banner3', 'banner4', 'comment'));
 }

 public function register_comment(CommentRequest $data, $id_article)
        {
        $content = $data->content;
        $email = $data->email;
        $user = $data->name;
        $ultimo = Comment::All()->last();
        if(is_null($ultimo)){
            Comment::create([
                'name' => $data->name,
                'email' => $data->email,
                'content' => $data->content,
                'id_post' => $id_article,
            ]);
            return $this->get_detail($id_article);
        }
        else if($content === $ultimo->content && $email === $ultimo->email && $user === $ultimo->name){
            return $this->get_detail($id_article);
        }
        else {
            Comment::create([
                'name' => $data->name,
                'email' => $data->email,
                'content' => $data->content,
                'id_post' => $id_article,
            ]);
            return $this->get_detail($id_article);
        }
        return $this->get_detail($id_article);
        }

public function list_comments($id_article)
        {
        $list_comments = Comment::where('id_post','=', $id_article)->paginate(10);
        return view('list_comments', compact('list_comments'));
        }

public function eliminar($list_comments)
        {
            $id_article = Comment::select('id_post')->where('id', '=', $list_comments)->get();
            $comment = Comment::where('id','=', $list_comments)->delete();
            
            $list_comments = Comment::where('id_post','=', $id_article[0]->id_post)->paginate(10);
            return view('list_comments', compact('list_comments'));
        }

}
