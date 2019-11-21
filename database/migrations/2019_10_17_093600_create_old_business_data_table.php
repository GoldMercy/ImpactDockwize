<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOldBusinessDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('old_business_data', function (Blueprint $table) {
            $table->BigIncrements('id');
            $table->integer('business_id');
            $table->string('Ondernemer')->nullable();
            $table->string('Onderneming')->nullable();
            $table->string('Telefoonnummer')->nullable();
            $table->string('Email')->nullable();
            $table->string('Plaats')->nullable();
            $table->string('Idee')->nullable();
            $table->integer('Jaar')->nullable();
            $table->string('Thema')->nullable();
            $table->string('Doelgroep')->nullable();
            $table->string('Programma')->nullable();
            $table->string('Huisvesting')->nullable();
            $table->date('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('old_business_data');
    }
}
