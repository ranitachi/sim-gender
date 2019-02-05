<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKependudukanKelompokUmursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kependudukan_kelompok_umur', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_kategori')->nullable()->default(0);
            $table->integer('tahun')->nullable()->default(0);
            $table->integer('laki_laki')->nullable()->default(0);
            $table->float('persen_laki_laki')->nullable()->default(0);
            $table->integer('perempuan')->nullable()->default(0);
            $table->float('persen_perempuan')->nullable()->default(0);
            $table->string('kelompok_umur')->nullable();
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
        Schema::dropIfExists('kependudukan_kelompok_umur');
    }
}
