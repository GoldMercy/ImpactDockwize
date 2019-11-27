<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qoptions', function (Blueprint $table) {
            $table->bigIncrements('qoption_id');
            $table->string('option_name');
            $table->bigInteger('dropdownq_fk')->unsigned();
            $table->foreign('dropdownq_fk')->references('id')->on('dropdownqs');
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
        Schema::dropIfExists('qoptions');
    }
}
