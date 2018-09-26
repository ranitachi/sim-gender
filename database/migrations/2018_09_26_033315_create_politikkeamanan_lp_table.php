<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePolitikkeamananLpTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('politikkeamanan_lp', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_kategori');
            $table->string('jenis');
            $table->integer('laki_laki')->default(0);
            $table->integer('perempuan')->default(0);
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
        Schema::dropIfExists('politikkeamanan_lp');
    }
}
