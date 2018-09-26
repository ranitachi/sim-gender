<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTenagakerjaBekerjaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tenagakerja_bekerja', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_kategori');
            $table->string('status_pekerjaan_utama');
            $table->integer('laki_laki');
            $table->integer('perempuan');
            $table->integer('jumlah');
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
        Schema::dropIfExists('tenagakerja_bekerja');
    }
}