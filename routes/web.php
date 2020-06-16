<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', array('as'=>'index', 'uses' => 'AlbumsController@getList'));

//получение списка альбомов на главной странице
Route::get("/createalbum", array('as'=> 'create_album_form', 'uses'=>'AlbumsController@getForm' ));

//создание альбома из формы
Route::post("/createalbum", array('as'=> 'create_album', 'uses'=>'AlbumsController@postCreate' ));

Route::get("/album/{id}", array('as'=> 'show_album', 'uses'=>'AlbumsController@getAlbum' ));

//само удаление альбома
Route::get("/deletealbum/{id}", array('as'=> 'delete_album', 'uses'=>'AlbumsController@getDelete' ));


//Пути связанные с обработкой самих фотографий

Route::get('/addimage/{id}', array('as'=> 'add_image', 'uses' => "ImageController@getForm"));

//добавление изображений через форму
Route::post('/addimage', array('as'=> 'add_image_to_album', 'uses' => "ImageController@postAdd"));

//удаление
Route::get("/deleteimage/{id}", array('as'=> 'delete_image', 'uses'=> "ImageController@getDelete"));


Route::post("/moveimage", array('as'=> 'move_image', 'uses'=> "ImageController@postMove"));


//перемещение