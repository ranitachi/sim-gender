<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKependudukanMiskinTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kependudukan_miskin', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_kategori');
            $table->integer('id_kecamatan');
            $table->integer('tahun');
            $table->integer('hampir_miskin')->default(0);
            $table->integer('miskin')->default(0);
            $table->integer('sangat_miskin')->default(0);
            $table->integer('jumlah')->default(0);
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
        Schema::dropIfExists('kependudukan_miskin');
    }
}
