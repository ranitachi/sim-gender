<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePolitikTingkatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('politik_tingkat', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_kategori');
            $table->string('tahun');
            $table->string('jenis_kelamin');
            $table->integer('tidak_sekolah');
            $table->integer('sd');
            $table->integer('sltp');
            $table->integer('slta');
            $table->integer('pt');
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
        Schema::dropIfExists('politik_tingkat');
    }
}
