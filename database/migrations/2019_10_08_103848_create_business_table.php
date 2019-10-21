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
            $table->string('Ondernemer')->nullable();
            $table->string('Onderneming')->nullable();
            $table->integer('Telefoonnummer')->nullable();
            $table->string('Email')->nullable();
            $table->string('Plaats')->nullable();
            $table->string('Idee')->nullable();
            $table->integer('Jaar')->nullable();
            $table->string('Thema')->nullable();
            $table->string('Doelgroep')->nullable();
            $table->string('Programma')->nullable();
            $table->dateTime('created_at');
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
