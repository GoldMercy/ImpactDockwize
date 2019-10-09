<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBusinessTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('Ondernemer');
            $table->string('Onderneming');
            $table->integer('Telefoonnummer');
            $table->string('Email');
            $table->string('Plaats');
            $table->string('Idee');
            $table->integer('Jaar');
            $table->string('Thema');
            $table->string('Doelgroep');
            $table->string('Programma');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('business');
    }
}
