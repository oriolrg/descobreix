<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiesObertura extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('dies_obertura', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('idRestaurant')->unsigned();
          $table->boolean('dilluns')->default(False);
          $table->boolean('dimarts')->default(False);
          $table->boolean('dimecres')->default(False);
          $table->boolean('dijous')->default(False);
          $table->boolean('divendres')->default(False);
          $table->boolean('dissabte')->default(False);
          $table->boolean('diumenge')->default(False);
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
        //
    }
}
