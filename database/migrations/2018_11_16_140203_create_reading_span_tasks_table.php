<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReadingSpanTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reading_span_tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->string('serial');
            $table->string('iteration');
            $table->string('word_id');
            $table->string('word_answer')->nullable()->default(null);
            $table->unsignedInteger('sentence_id');
            $table->string('sentence_answer')->nullable()->default(null);;
            $table->unsignedInteger('image_id')->nullable()->default(null);
            

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('sentence_id')->references('id')->on('sentences');
            $table->foreign('image_id')->references('id')->on('images');
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
        Schema::dropIfExists('reading_span_tasks');
    }
}
