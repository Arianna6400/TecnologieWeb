<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Alloggio extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alloggio', function (Blueprint $table) {
            $table->increments('ID');
            $table->string('Citta', 25);
            $table->string('Via', 25);
            $table->smallInteger('NumCivico')->unsigned();
            $table->integer('Costo')->unsigned();
            $table->date('PeriodoInizio');
            $table->date('PeriodoFine');
            $table->float('Metratura')->unsigned();
            $table->integer('NumOpzionate')->unsigned()->default(0); //rappresenta il contatore delle persone che hanno opzionato un alloggio, questo attributo andrà confrontato con numpostiletto e quando è uguale la disponibilità sarà false
            $table->boolean('Disponibilita');
            $table->text('Descrizione');
            $table->string('Tipo', 14); //appartamento, stanza singola o stanza doppia
            $table->string('Foto', 150); //percorso della foto
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
        Schema::dropIfExists('alloggio');
    }
}
