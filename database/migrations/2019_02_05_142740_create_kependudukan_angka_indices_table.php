<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKependudukanAngkaIndicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kependudukan_angka_index', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_kategori')->nullable()->default(0);
            $table->integer('tahun')->nullable()->default(0);
            $table->integer('id_kabupaten')->nullable()->default(0);
            $table->string('nama_wilayah')->nullable();
            $table->float('ipm')->nullable()->default(0);
            $table->float('ipg')->nullable()->default(0);
            $table->float('idg')->nullable()->default(0);
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
        Schema::dropIfExists('kependudukan_angka_index');
    }
}
