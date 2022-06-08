<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Caratteristiche extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('caratteristiche', function (Blueprint $table) {
            $table->increments('ID');
            $table->foreign('ID')->references('ID')->on('alloggio')->onDelete('cascade')->onUpdate('cascade');
            $table->boolean('Ripostiglio')->nullable();
            $table->boolean('Sala')->nullable();
            $table->char('SessoRichiesto', 1);
            $table->boolean('WiFi');
            $table->boolean('Garage')->nullable();
            $table->boolean('AngoloStudio');
            $table->tinyInteger('NumeroLocali')->unsigned()->nullable();
            $table->tinyInteger('NumBagni')->unsigned()->nullable();
            $table->tinyInteger('PostiLettoTot')->unsigned()->nullable();
            $table->tinyInteger('EtaMinima')->unsigned()->nullable();
            $table->tinyInteger('NumStanzeLetto')->unsigned()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('caratteristiche');
    }
}
