<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMultiplechoiceOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('multiplechoice_options', function (Blueprint $table) {
            $table->bigIncrements('multiplechoice_options_id')->unsigned();
            $table->string('multiplechoice_option');
            $table->bigInteger('multiplechoice_id')->unsigned()->nullable();
            $table->foreign('multiplechoice_id')->references('multiplechoice_id')->on('multiplechoice')->onDelete('cascade');
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
        Schema::dropIfExists('multiplechoice_options');
    }
}
