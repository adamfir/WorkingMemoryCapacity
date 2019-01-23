<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateReadingSpanTaskAddRecallMethod extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('reading_span_tasks', function(Blueprint $table){
            $table->string('recall_method')->default('free');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('reading_span_tasks', function(Blueprint $table){
            $table->dropColumn('recall_method');
        });
    }
}
