<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClubTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clubs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',50);
            $table->string('universidad',100);
            $table->string('siglas',8);
            $table->string('image',255)->default('default.png');
            $table->string('dt',50);
            $table->integer('victorias')->default(0);
            $table->integer('empates')->default(0);
            $table->integer('derrotas')->default(0);
            $table->integer('puntos')->default(0);
            $table->integer('golesFavor')->default(0);
            $table->integer('golesContra')->default(0);
            $table->unsignedInteger('id_deporte');
            $table->foreign('id_deporte')->references('id')->on('deportes');
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
        Schema::dropIfExists('clubs');
    }
}
