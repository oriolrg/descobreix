<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idRestaurant')->unsigned();
            $table->string('Menu');
            $table->string('MenuInfantil');
            $table->string('Carta');
            $table->string('CuinaCatalana');
            $table->string('Pizza');
            $table->string('PlatsCombinats');
            $table->string('Entrepans');
            $table->string('ApteCeliacs');
            $table->string('Terrasa');
            $table->string('ZonaEsbarjo');
            $table->timestamps();
            $table->foreign('idRestaurant')->references('id')->on('restaurants')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
}
