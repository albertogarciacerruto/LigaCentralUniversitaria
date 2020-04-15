<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title',50);
            $table->string('subtitle',80);
            $table->text('description');
            $table->text('content');
            $table->string('image',255)->default('default.png');
            $table->string('visibility',10)->default('Visible');
            $table->unsignedInteger('sport');
            $table->foreign('sport')->references('id')->on('deportes');
            $table->string('section',20);
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
        Schema::dropIfExists('articles');
    }
}
