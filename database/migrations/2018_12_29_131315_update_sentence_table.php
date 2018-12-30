<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateSentenceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sentences', function(Blueprint $table){
            $table->longText('sentences')->after('id');
            $table->integer('iterasi')->after('id')->nullable()->default(null);
            $table->integer('seri')->after('id')->nullable()->default(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sentences', function(Blueprint $table){
            $table->dropColumn('sentences');
            $table->dropColumn('seri');
            $table->dropColumn('iterasi');
        });
    }
}
