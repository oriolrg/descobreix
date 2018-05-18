<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCircuits extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('circuits', function (Blueprint $table) {
          $table->increments('id');
          $table->string('nom');
          $table->float('latitud');
          $table->float('longitud');
          $table->string('poblacio');
          $table->boolean('actiu')->default(True);
          $table->string('imatgePrincipal');
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
        Schema::dropIfExists('circuits');
    }
}
