<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKesehatanJumlahBblrsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kesehatan_jumlah_bblr', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_kecamatan')->nullable()->default(0);
            $table->integer('id_kategori')->nullable()->default(0);
            $table->integer('bayi_lahir')->nullable()->default(0);
            $table->integer('bblr_jumlah')->nullable()->default(0);
            $table->integer('bblr_dirujuk')->nullable()->default(0);
            $table->integer('gizi_buruk')->nullable()->default(0);
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
        Schema::dropIfExists('kesehatan_jumlah_bblr');
    }
}
