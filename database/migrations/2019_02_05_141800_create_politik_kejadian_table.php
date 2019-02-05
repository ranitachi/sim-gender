<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePolitikKejadianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('politik_kejadian', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_kategori');
            $table->string('tahun');
            $table->string('jenis_kelamin');
            $table->integer('rumah_tangga');
            $table->integer('tempat_kerja');
            $table->integer('lainnya');
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
        Schema::dropIfExists('politik_kejadian');
    }
}
