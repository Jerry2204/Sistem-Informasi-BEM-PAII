<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProgramStudiIdToBphTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bph', function (Blueprint $table) {
            // $table->integer('program_studi_id');
            $table->foreignId('program_studi_id')->constrained('program_studi')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bph', function (Blueprint $table) {
            // $table->dropColumn('program_studi_id');
            $table->dropForeign(['program_studi_id']);
        });
    }
}
