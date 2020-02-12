<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DetalleReparaciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalleReparaciones', function (Blueprint $table) {
            $table->increments('id_detalleReparacion');
            $table->unsignedInteger('id_reparacion');
            $table->foreign('id_reparacion')->references('id_reparacion')->on('reparaciones');
            $table->unsignedInteger('id_problema');
            $table->foreign('id_problema')->references('id_problema')->on('problemas');
            $table->string('observacion',180)->nullable();
            $table->double('costo',7,2);
            $table->boolean('realizado')->default(0);
            $table->timestamps();
            //$table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalleReparaciones');
    }
}
