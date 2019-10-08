<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Raparaciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reparaciones', function (Blueprint $table) {
            $table->increments('id_reparacion');
            $table->unsignedInteger('id_usuario');
            $table->foreign('id_usuario')->references('id_usuario')->on('users');
            $table->unsignedInteger('id_equipo');
            $table->foreign('id_equipo')->references('id_equipo')->on('equipos');
            $table->date('fecha_ingreso');
            $table->date('fecha_egreso');
            $table->integer('plazo_estimado');
            $table->double('total', 7, 2);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reparaciones');
    }
}