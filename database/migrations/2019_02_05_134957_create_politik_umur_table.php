<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePolitikUmurTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('politik_umur', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_kategori');
            $table->string('tahun');
            $table->string('jenis_kelamin');
            $table->integer('umur_17');
            $table->integer('umur_24');
            $table->integer('umur_59');
            $table->integer('umur_60');
            $table->timestamps();
            $table->softdeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('politik_umur');
    }
}
