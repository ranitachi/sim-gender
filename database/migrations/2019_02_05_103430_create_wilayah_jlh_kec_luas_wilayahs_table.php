<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWilayahJlhKecLuasWilayahsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wilayah_jlh_kec_luas_wilayah', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_kecamatan')->nullable()->default(0);
            $table->integer('id_kategori')->nullable()->default(0);
            $table->integer('jumlah_desa')->nullable()->default(0);
            $table->integer('jumlah_kelurahan')->nullable()->default(0);
            $table->double('luas_wilayah')->nullable()->default(0);
            $table->integer('tahun')->nullable()->default(0);
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
        Schema::dropIfExists('wilayah_jlh_kec_luas_wilayah');
    }
}
