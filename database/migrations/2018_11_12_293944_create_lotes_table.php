<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lotes', function (Blueprint $table) {
            $table->increments('idlote');
            $table->date('date');
            $table->integer('numero_lote');
            $table->decimal('cantidad',45,0);
            $table->integer('proveedor_id')->unsigned();
            $table->foreign('proveedor_id')->references('idproveedor')->on('proveedores');
            $table->integer('producto_id')->unsigned();
            $table->foreign('producto_id')->references('idproducto')->on('productos');
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
        Schema::dropIfExists('lotes');
    }
}
