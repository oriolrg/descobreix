<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRestaurantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurants', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom');
            $table->integer('telefon');
            $table->string('direccio');
            $table->string('poblacio');
            $table->string('preu');
            $table->integer('obertura_dia');
            $table->integer('tancament_dia');
            $table->integer('obertura_nit');
            $table->integer('tancament_nit');
            $table->boolean('actiu')->default(True);
            $table->string('imatgePrincipal');
            $table->string('imatgeSecundaria');
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
        Schema::dropIfExists('restaurants');
    }
}
