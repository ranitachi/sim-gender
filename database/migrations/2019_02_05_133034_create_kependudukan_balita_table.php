<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKependudukanBalitaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kependudukan_balita', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_kategori');
            $table->integer('id_kecamatan');
            $table->integer('tahun');
            $table->integer('balita_l')->default(0);
            $table->integer('balita_p')->default(0);
            $table->integer('terlantar_l')->default(0);
            $table->integer('terlantar_p')->default(0);
            $table->integer('bermasalah_l')->default(0);
            $table->integer('bermasalah_p')->default(0);
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
        Schema::dropIfExists('kependudukan_balita');
    }
}
