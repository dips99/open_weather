<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWeatherTable extends Migration
{
    public function up()
    {
        Schema::create('weather', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->json('coord');
            $table->json('main');
            $table->json('wind');
            $table->json('clouds');
            $table->json('sys');
            $table->string('timezone');
            $table->string('dt');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('weather');
    }
}