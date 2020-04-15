<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Banner;

class BannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('banners', function (Blueprint $table) {
          $table->increments('id');
          $table->string('name',20);
          $table->string('image',255)->default('default.png');
          $table->string('link',255)->nullable();
          $table->timestamps();
      });

       Banner::create([
         'name' => 'image_central',
         'link' => null,
       ]);
       Banner::create([
         'name' => 'image_lateral1',
         'link' => null,
       ]);
       Banner::create([
         'name' => 'image_lateral2',
         'link' => null,
       ]);
       Banner::create([
         'name' => 'image_lateral3',
         'link' => null,
       ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('banners');
    }
}
