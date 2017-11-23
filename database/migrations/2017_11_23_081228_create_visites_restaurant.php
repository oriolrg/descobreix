<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVisitesRestaurant extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('visites_restaurant', function (Blueprint $table) {
        $table->increments('id');
        $table->integer('idRestaurant')->unsigned();
        $table->boolean('countVisitaRestaurant')->default(0);
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
        Schema::dropIfExists('visites_restaurant');
    }
}
