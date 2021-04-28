<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnggotaDepartemenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anggota_departemen', function (Blueprint $table) {
            $table->id();
            $table->string('nim', 20);
            $table->string('jenis_kelamin');
            $table->string('no_hp');
            $table->text('alamat');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('foto')->nullable();
            $table->foreignId('departemen_id')->constrained('departemen')->onDelete('cascade');
            $table->foreignId('program_studi_id')->constrained('program_studi')->onDelete('cascade');
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
        Schema::dropIfExists('anggota_departemen');
    }
}
