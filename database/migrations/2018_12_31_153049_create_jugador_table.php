<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJugadorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jugadores', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',50);
            $table->string('lastname',50);
            $table->date('fecha_nacimiento');
            $table->string('ciudad_origen',50)->nulleable();
            $table->string('posicion',50);
            $table->unsignedInteger('id_club');
            $table->foreign('id_club')->references('id')->on('clubs');
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
        Schema::dropIfExists('jugadores');
    }
}
