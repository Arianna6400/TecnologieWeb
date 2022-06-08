<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Riferimento extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('riferimento', function (Blueprint $table) {
            $table->increments('IDRiferimento');
            $table->integer('IDMessaggio')->unsigned()->index();
            $table->foreign('IDMessaggio')->references('ID')->on('messaggio')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('IDAlloggio')->unsigned()->index();
            $table->foreign('IDAlloggio')->references('ID')->on('alloggio')->onDelete('cascade')->onUpdate('cascade');
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
