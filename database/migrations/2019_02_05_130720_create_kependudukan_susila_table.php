<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKependudukanSusilaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kependudukan_susila', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_kategori');
            $table->integer('id_kecamatan');
            $table->integer('tahun');
            $table->integer('susila_laki')->default(0);
            $table->integer('susila_perempuan')->default(0);
            $table->integer('napza_laki')->default(0);
            $table->integer('napza_perempuan')->default(0);
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
        Schema::dropIfExists('kependudukan_susila');
    }
}
