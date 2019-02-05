<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePendidikanAngkaPartisipasiSekolahsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendidikan_angka_partisipasi_sekolah', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_kategori')->nullable()->default(0);
            $table->integer('id_kecamatan')->nullable()->default(0);
            $table->string('jenjang')->nullable();
            $table->float('laki_laki')->nullable()->default(0);
            $table->float('perempuan')->nullable()->default(0);
            $table->integer('tahun')->nullable()->default(0);
            $table->float('rata_rata')->nullable()->default(0);
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
        Schema::dropIfExists('pendidikan_angka_partisipasi_sekolah');
    }
}
