<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Image extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('images',function($table){

          $table->increments('id');
          $table->string('img_link',500)->nullable();
          $table->text('content')->nullable();
          $table->string('href')->nullable();
          $table->string('color')->nullable();
          $table->string('brightness')->nullable();
          $table->string('time')->nullable();
          $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::drop('images');
    }
}
