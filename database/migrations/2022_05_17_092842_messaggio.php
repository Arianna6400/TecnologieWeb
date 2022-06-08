<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Messaggio extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messaggio', function (Blueprint $table) {
            $table->increments('ID');
            $table->string('Mittente', 15)->index();
            $table->foreign('Mittente')->references('Username')->on('utenti')->onDelete('cascade')->onUpdate('cascade');
            $table->string('Destinatario', 15)->index();
            $table->foreign('Destinatario')->references('Username')->on('utenti')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('IdAlloggio')->unsigned()->index();
            $table->foreign('IdAlloggio')->references('ID')->on('alloggio')->onDelete('cascade')->onUpdate('cascade');
            $table->date('Data');
            $table->time('Orario');
            $table->text('Contenuto');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('messaggio');
    }
}
