<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Album;

class AlbumsController extends Controller
{
    public function getList() //получение списка альбомов
    {
        $albums = Album::with('Photos')->get();
        return view('index')-> with('albums', $albums);
    }
    public function getAlbum($id) //зайти в альбом
    {
        $album = Album::with("Photos")->find($id);
        $albums = Album::with('Photos')->get();
        return view('album', ['album' =>$album, 'albums' => $albums]);
    }


    public function getForm()
    {
        return view('createalbum'); //форма создания альбома
    }

    public function postCreate(Request  $request)
    {
        $rules = ['name'=> 'required', 'cover_image' => 'required|image'];  // правила, что без имени нельзя, и нельзя без изображения альбома
        $input = ['name'=>null];
        
        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            return redirect()-> route('create_album_form')->withErrors($validator)-> withInput();
        }
            $file = $request("cover_image");
            $random_name = str_random(8);
            //$random_name = Str::random(8);
            $destinationPath = 'albums/';
            $extension = $file-> getClientOriginalExtension();
            $filename = $random_name."_cover.".$extension;
            $uploadSuccess = $request -> file('cover_image')-> move($destinationPath, $filename);
            $album = Album::create(array(
                'name' => $request->get('name'),
                'description' => $request ->get('description'),
                'cover_image' => $filename,
            ));
            return redirect() -> route('show_album', ['id'=> $album->id]);
        }

        public function getDelete($id)
        {
            $album = Album::find($id);
            $album->delete();
            return Redirect::route('index');
        }


}
