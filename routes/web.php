<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'LandpageController@index');
Route::get('/sport/{id}', 'LandpageController@get_sport_detail');
Route::get('details/{id}', 'ArticleController@get_detail');
Route::get('detalle_equipo/{id}', 'ClubController@get_detail');
Route::get('/nosotros', 'LandpageController@nosotros');
Route::get('/contacto', 'LandpageController@contacto');
Route::post('details/{id}', 'ArticleController@register_comment');

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/list_users', 'HomeController@list_users');
Route::get('list_users/{id}', 'HomeController@destroy');

Route::get('/nosotrosconf', 'LandpageController@nosotros_conf');
Route::post('/nosotrosconf', 'LandpageController@nosotros_conf_update');

Route::get('/contactoconf', 'LandpageController@contacto_conf');
Route::post('/contactoconf', 'LandpageController@contacto_conf_update');

Route::get('/banners', 'LandpageController@banner');
Route::post('/banners', 'LandpageController@banner_update');

Route::get('/article','ArticleController@article');
Route::post('/article','ArticleController@create_article');

Route::get('/list_article', 'ArticleController@list_articles');
Route::get('/list_article/{id}', 'ArticleController@destroy');

Route::get('/update_article/{id}','ArticleController@get_article');
Route::post('/update_article', 'ArticleController@update_article');

Route::get('/deporte','DeporteController@deporte');
Route::post('/deporte','DeporteController@create_deporte');

Route::get('/list_sport', 'DeporteController@list_sports');
Route::get('/list_sport/{id}', 'DeporteController@destroy');

Route::get('/list_position', 'PositionController@list_positions');
Route::get('/list_position/{id}', 'PositionController@destroy');

Route::get('/list_club', 'ClubController@list_clubs');
Route::get('/list_club/{id}', 'ClubController@destroy');

Route::get('/list_jugador/{iden}', 'JugadorController@list_jugadores');
Route::get('/list_jugadord/{iden}', 'JugadorController@destroy');

Route::get('/club','ClubController@club');
Route::post('/club','ClubController@create_club');

Route::get('/position/{id}','PositionController@position');
Route::post('/position/{id}','PositionController@create_position');

Route::get('/jugador/{id}/{id_deporte}','JugadorController@jugador');
Route::post('/jugador/{id}','JugadorController@create_jugador');

Route::get('/match','MatchController@match');
Route::post('/match','MatchController@create_match');

Route::get('/list_match', 'MatchController@list_partidos');
Route::get('/list_match/{id}', 'MatchController@destroy');

Route::get('/list_match_ready', 'MatchController@list_partidos_listos');
Route::get('/list_match_ready/{id}', 'MatchController@destroy_listos');

Route::get('/update_match/{id}','MatchController@get_match');
Route::post('/update_match', 'MatchController@update_match');

Route::get('/list_comments/{id}', 'ArticleController@list_comments');
Route::get('/list_comments_destroy/{id}', 'ArticleController@eliminar');
});

Route::get('404',function(){
    abort(404);
});
