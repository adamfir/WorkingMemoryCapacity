<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateReadingSpanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('reading_span_tasks', function(Blueprint $table){
            $table->renameColumn('word_id','word');
            $table->string('word_result')->after('word_answer')->nullable()->default(null);;
            $table->string('sentence_result')->after('sentence_answer')->nullable()->default(null);;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('reading_span_tasks', function(Blueprint $table){
            $table->renameColumn('word','word_id');
            $table->dropColumn('word_result');
            $table->dropColumn('sentence_result');
        });
    }
}
