<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePolitikFraksiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('politik_fraksi', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_kategori');
            $table->string('tahun');
            $table->string('partai');
            $table->integer('laki');
            $table->integer('perempuan');
            $table->integer('jumlah');
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
        Schema::dropIfExists('politik_fraksi');
    }
}
