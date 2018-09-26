<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKependudukanPmksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kependudukan_pmks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_kategori');
            $table->integer('id_kecamatan');
            $table->integer('bayi_terlantar');
            $table->integer('anak_terlantar');
            $table->integer('anak_perlindungan_khusus');
            $table->integer('anak_berhadapan_hukum');
            $table->integer('anak_jalanan');
            $table->integer('anak_disabilitas');
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
        Schema::dropIfExists('kependudukan_pmks');
    }
}
