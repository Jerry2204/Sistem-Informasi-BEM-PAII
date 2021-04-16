<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKadepTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kadep', function (Blueprint $table) {
            $table->id();
            $table->string("nim", 20);
            $table->string('jenis_kelamin');
            $table->string('no_hp');
            $table->text('alamat');
            $table->integer('user_id');
            $table->string('foto')->nullable();
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
        Schema::dropIfExists('kadep');
    }
}
