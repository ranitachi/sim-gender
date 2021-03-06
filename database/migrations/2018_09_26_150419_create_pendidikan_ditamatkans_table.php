<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePendidikanDitamatkansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendidikan_ditamatkan', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_kategori')->default(0)->nullable();
            $table->integer('id_kecamatan')->default(0)->nullable();
            $table->integer('bawah_sd')->default(0)->nullable();
            $table->integer('sd')->default(0)->nullable();
            $table->integer('smp')->default(0)->nullable();
            $table->integer('sma')->default(0)->nullable();
            $table->integer('pt')->default(0)->nullable();
            $table->integer('jumlah')->default(0)->nullable();
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
        Schema::dropIfExists('pendidikan_ditamatkan');
    }
}
