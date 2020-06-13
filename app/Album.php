<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
//https://laravel.com/docs/7.x/eloquent-relationships#has-many-through
{
    protected $table = 'albums';

    protected $fillable = array('name', 'description', 'cover_image');


    public function Photos(){
        return $this->hasMany('App\Image');
    }
}
