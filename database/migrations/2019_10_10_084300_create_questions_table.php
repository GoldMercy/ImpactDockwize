<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('questionName');
            //query: ALTER TABLE `questions` ADD FOREIGN KEY (`answer_type_fk`) REFERENCES `answer_type`(`answer_type_id`) ON DELETE RESTRICT ON UPDATE CASCADE;
            //datatypes have to be identical, bigint(20) and UNSIGNED
            $table->integer('answer_type_fk');
            $table->foreign('answer_type_fk')->references('answer_type_id')->on('answer_type')->onUpdate('cascade');
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
        Schema::dropIfExists('questions');
    }
}
