<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePendidikanBacaTulisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendidikan_baca_tulis', function (Blueprint $table) {
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
        Schema::dropIfExists('pendidikan_baca_tulis');
    }
}
