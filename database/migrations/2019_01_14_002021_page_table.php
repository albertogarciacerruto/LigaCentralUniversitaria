<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Page;
class PageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('pages', function (Blueprint $table) {
          $table->increments('id');
          $table->string('name',20);
          $table->text('content');
          $table->string('image',255)->default('default.png');
          $table->timestamps();
      });

      Page::create([
          'name' => 'Quienes Somos',
          'content' => 'Ingrese Contenido',
      ]);
      Page::create([
          'name' => 'Contacto',
          'content' => 'Ingrese Contenido',
      ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pages');
    }
}
