<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePolitikkeamananJeniskejahatanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('politikkeamanan_jeniskejahatan', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_kategori');
            $table->string('jenis_kejahatan');
            $table->integer('tindak_pidana');
            $table->integer('penyelesaian');
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
        Schema::dropIfExists('politikkeamanan_jeniskejahatan');
    }
}
