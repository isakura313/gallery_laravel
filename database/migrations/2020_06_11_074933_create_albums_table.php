<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlbumsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('albums', function (Blueprint $table) {
            $table->increments('id')->unsigned(); //это то самое id как primary key
            $table->string("name"); //имя нашего альбома
            $table->text("description"); //описание нашего альбома
            $table->string("cover_image"); //картинка на превью 
            $table->timestamps(); //дата создания альбома
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('albums');
    }
}
