<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePendidikanJumlahMuridsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendidikan_jumlah_murid', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_kategori')->nullable()->default(0);
            $table->integer('tahun')->nullable()->default(0);
            $table->integer('id_kecamatan')->nullable()->default(0);
            $table->string('jenjang')->nullable();
            $table->integer('jumlah_laki')->nullable()->default(0);
            $table->integer('jumlah_perempuan')->nullable()->default(0);
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
        Schema::dropIfExists('pendidikan_jumlah_murid');
    }
}
