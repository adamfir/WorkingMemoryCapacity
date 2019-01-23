<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdatArraySpanTaskAddPertanyaan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('array_span_tasks', function (Blueprint $table) {
            $table->string('pertanyaan');
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
        Schema::table('array_span_tasks', function (Blueprint $table) {
            $table->dropColumn('pertanyaan');
        
        });
    }
}
