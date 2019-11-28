<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDropdownQsOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dropdownqs_options', function (Blueprint $table) {
            $table->bigIncrements('dropdownoption_id')->unsigned();
            $table->string('dropdownoption_name');
            $table->bigInteger('dropdown_id')->unsigned()->nullable();
            $table->foreign('dropdown_id')->references('id')->on('dropdownqs')->onDelete('cascade');;
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
