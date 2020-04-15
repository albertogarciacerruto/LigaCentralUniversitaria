<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\User;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',40);
            $table->string('lastname',50);
            $table->string('cedula',12)->unique();
            $table->string('email',100)->unique();
            $table->string('password',100);
            $table->string('type',50);
            $table->rememberToken();
            $table->timestamps();
        });

        return User::create([
            'name' => 'Administrador',
            'lastname' => 'Admin',
            'email' => 'admin@lcu.com',
            'password' => bcrypt('admin'),
            'cedula' => '10000000000',
            'type' => 'Administrador',
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
