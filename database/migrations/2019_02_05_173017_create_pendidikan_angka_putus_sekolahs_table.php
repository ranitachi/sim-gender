<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePendidikanAngkaPutusSekolahsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendidikan_angka_putus_sekolah', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_kategori')->nullable()->default(0);
            $table->integer('id_kecamatan')->nullable()->default(0);
            $table->string('jenjang')->nullable();
            $table->float('laki_laki')->nullable()->default(0);
            $table->float('perempuan')->nullable()->default(0);
            $table->integer('tahun')->nullable()->default(0);
            $table->float('persentase')->nullable()->default(0);
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
        Schema::dropIfExists('pendidikan_angka_putus_sekolah');
    }
}
