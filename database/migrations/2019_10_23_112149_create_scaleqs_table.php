<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScaleqsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scaleqs', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->bigInteger('scaleq_id')->unsigned();
            $table->string('scaleq_name');
            $table->integer('scaleq_score')->default(0);
            $table->bigInteger('survey_id')->unsigned();
            $table->foreign('survey_id')->references('id')->on('surveys');
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
        Schema::dropIfExists('scaleqs');
    }
}
