<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKesehatanKbsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kesehatan_kb', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_kategori')->nullable()->default(0);
            $table->integer('id_kecamatan')->nullable()->default(0);
            $table->string('jenis')->nullable();
            $table->float('laki_laki')->nullable()->default(0);
            $table->float('perempuan')->nullable()->default(0);
            $table->integer('tahun')->nullable()->default(0);
            $table->float('kuintil_1')->nullable()->default(0);
            $table->float('kuintil_2')->nullable()->default(0);
            $table->float('kuintil_3')->nullable()->default(0);
            $table->float('kuintil_4')->nullable()->default(0);
            $table->float('kuintil_5')->nullable()->default(0);
            $table->float('krt_tidak_sekolah')->nullable()->default(0);
            $table->float('krt_sd')->nullable()->default(0);
            $table->float('krt_smp')->nullable()->default(0);
            $table->float('krt_sma')->nullable()->default(0);
            $table->float('kab_tangerang')->nullable()->default(0);
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
        Schema::dropIfExists('kesehatan_kb');
    }
}
