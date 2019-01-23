<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddArraySpanTaskTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('array_span_task', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id');
            $table->string('seri');
            $table->string('iterasi');
            $table->string('pertanyaan');
            $table->string('penyusunan');
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
    }
}
