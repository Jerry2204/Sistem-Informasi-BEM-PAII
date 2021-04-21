<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDepartemenIdToKadepTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kadep', function (Blueprint $table) {
            // $table->integer('departemen_id')->unique();
            $table->foreignId('departemen_id')->unique()->constrained('departemen')->onDlete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kadep', function (Blueprint $table) {
            // $table->dropColumn('departemen_id');
            $table->dropForeign(['departemen_id']);
        });
    }
}
