<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Album;
use App\Image;
use Illuminate\Support\Str;


class ImageController extends Controller
{
    public function getForm($id)
    {
        $album = Album::find($id);
        return view('addimage')->with('album', $album);
    }

    public function postAdd(Request $request)
    {
        $rules = [
            'album_id'=> 'required|numeric|exists:albums,id',
            'image'=> 'required|image'
        ];

        $input = ['name'=>null];


        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            return redirect()-> route('add_image',['id'=> $request->get('album_id')])->withErrors($validator)-> withInput();
        }

            $destinationPath = 'albums/';
            $fileName = time().'.'.$request->image->extension();
            $uploadSuccess = $request -> file('image')-> move($destinationPath, $fileName);
            Image::create(array(
                // 'name' => $request->get('name'),
                'description' => $request ->get('description'),
                'image' => $fileName, 
                'album_id' => $request-> get('album_id')
            ));
            return redirect() -> route('show_album', ['id'=> $request ->get('album_id')]);
        }

        public function getDelete($id)
        {
            $image = Image::find($id);
            $image-> delete();
            return redirect()-> route('show_album', ['id'=> $image-> album_id]);
        }

        public function postMove(Request $request)
        {
            $rules = array(
                'new_album' => 'required|numeric|exists:albums,id',
                'photo' => 'required|numeric|exists:images, id'
            );


            $validator= Validator::make($request->all(), $rules);
            if($validator ->fails){
                return redirect()->route('index');
            }
            $image = Image::find($request ->get('photo'));
            $image -> album_id = $request ->get('new_album');
            $image -> save();
            return redirect()->route('show_album', ['id'=>$request->get('new_album')]);

        }

    }

