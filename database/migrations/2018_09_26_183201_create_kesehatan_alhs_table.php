<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKesehatanAlhsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kesehatan_alh', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_kecamatan')->default(0)->nullable();
            $table->integer('id_kategori')->default(0)->nullable();
            $table->integer('anak_lahir_hidup')->default(0)->nullable();
            $table->integer('penolong')->default(0)->nullable();
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
        Schema::dropIfExists('kesehatan_alh');
    }
}
