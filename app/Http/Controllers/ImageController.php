<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Album;
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
            $file = $request("image");
            $random_name = str_random(8);
            //$random_name = Str::random(8);
            $destinationPath = 'albums/';
            $extension = $file-> getClientOriginalExtension();
            $filename = $random_name."_cover.".$extension;
            $uploadSuccess = $request -> file('cover_image')-> move($destinationPath, $filename);
            Image::create(array(
                // 'name' => $request->get('name'),
                'description' => $request ->get('description'),
                'image' => $filename, 
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

