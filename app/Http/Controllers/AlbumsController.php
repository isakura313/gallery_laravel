<?php

namespace App\Http\Controllers;

use App\Album;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Validator;

class AlbumsController extends Controller
{
    public function getList() //получение списка альбомов

    {
        $albums = Album::with('Photos')->get();
        return view('index')->with('albums', $albums);
    }
    public function getAlbum($id) //зайти в альбом

    {
        $album = Album::with("Photos")->find($id);
        $albums = Album::with('Photos')->get();
        return view('album', ['album' => $album, 'albums' => $albums]);
    }

    public function getForm()
    {
        return view('createalbum'); //форма создания альбома
    }

    public function postCreate(Request $request)
    {
        $rules = ['name' => 'required', 'cover_image' => 'required|image']; // правила, что без имени нельзя, и нельзя без изображения альбома

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->route('create_album_form')->withErrors($validator)->withInput();
        }

        $destinationPath = 'albums/';

        $fileName = time() . '.' . $request->cover_image->extension();
        $uploadSuccess = $request->cover_image->move($destinationPath, $fileName);
        $album = Album::create(array(
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            'access' => $request->get('access'),
            'created_by' => Auth::user()->name,
            'cover_image' => $fileName,
        ));

        return redirect()->route('show_album', ['id' => $album->id]);
    }

    public function getDelete($id) // возможность удаления альбома

    {
        $album = Album::find($id);
        $album->delete();
        return Redirect::route("index");
    }

}
