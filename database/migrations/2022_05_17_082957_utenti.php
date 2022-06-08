<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Utenti extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('utenti', function (Blueprint $table) {
 
            $table->string('Username', 15);
            $table->primary('Username');
            $table->string('Nome', 25);
            $table->string('Cognome', 25);
            $table->char('Sesso', 1);
            $table->date('DataNascita');
            $table->string('role', 14); //tipo utente: amministratore, locatore, locatario.
            $table->string('password', 100);
            //$table->date('updated_at');
            //$table->date('created_at');
            //$table->rememberToken();
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
        Schema::dropIfExists('utenti');
    }
}
