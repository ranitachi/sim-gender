<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePolitikPelayananTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('politik_pelayanan', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_kategori');
            $table->string('tahun');
            $table->string('jenis_kelamin');
            $table->string('penanganan');
            $table->integer('penegakan');
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
        Schema::dropIfExists('politik_pelayanan');
    }
}
