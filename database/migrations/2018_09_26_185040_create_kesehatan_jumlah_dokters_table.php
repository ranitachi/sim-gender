<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKesehatanJumlahDoktersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kesehatan_jumlah_dokter', function (Blueprint $table) {
            $table->increments('id');
            $table->string('unit_kerja')->nullable();
            $table->integer('id_kecamatan')->nullable()->default(0);
            $table->integer('id_kategori')->nullable()->default(0);
            $table->integer('dokter_spesialis')->nullable()->default(0);
            $table->integer('dokter_umum')->nullable()->default(0);
            $table->integer('dokter_gigi')->nullable()->default(0);
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
        Schema::dropIfExists('kesehatan_jumlah_dokter');
    }
}
