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
            $table->integer('bayi_terlantar')->default(0);
            $table->integer('anak_terlantar')->default(0);
            $table->integer('anak_perlindungan_khusus')->default(0);
            $table->integer('anak_berhadapan_hukum')->default(0);
            $table->integer('anak_jalanan')->default(0);
            $table->integer('anak_disabilitas')->default(0);
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
