<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntregasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entregas', function (Blueprint $table) {
            $table->increments('identrega');
            $table->date('fecha');
            $table->decimal('cantidad',45,0);
            $table->integer('lote_id')->unsigned();
            $table->foreign('lote_id')->references('idlote')->on('lotes');
            $table->integer('producto_id')->unsigned();
            $table->foreign('producto_id')->references('idproducto')->on('productos');
            $table->integer('miembro_id')->unsigned();
            $table->foreign('miembro_id')->references('idmiembro')->on('miembros');
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
        Schema::dropIfExists('entregas');
    }
}
