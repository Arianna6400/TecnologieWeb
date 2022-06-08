<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Interazione extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interazione', function (Blueprint $table) {
            $table->increments('IDInterazione');
            $table->string('Username', 15)->index();
            $table->foreign('Username')->references('Username')->on('utenti')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('ID')->unsigned()->index();
            $table->foreign('ID')->references('ID')->on('alloggio')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('interazione');
    }
}
