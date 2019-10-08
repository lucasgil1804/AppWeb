<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Equipos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipos', function (Blueprint $table) {
            $table->increments('id_equipos');
            $table->unsignedInteger('id_marca');
            $table->foreign('id_marca')->references('id_marca')->on('marcas');
            $table->unsignedInteger('id_tipoEquipo');
            $table->foreign('id_tipoEquipo')->references('id_tipoEquipo')->on('tipoequipos');
            $table->string('modelo',30)->nulable();
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
        Schema::dropIfExists('equipos');
    }
}
