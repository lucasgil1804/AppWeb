<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id_usuario');
            $table->unsignedInteger('id_tipoUsuario');
            $table->foreign('id_tipoUsuario')->references('id_tipoUsuario')->on('tipoUsuarios');
            $table->string('nombre',40);
            $table->string('apellido',40);
            $table->integer('dni');
            $table->string('email',40)->unique();
            //$table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->boolean('estado')->default(1);
            //$table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
