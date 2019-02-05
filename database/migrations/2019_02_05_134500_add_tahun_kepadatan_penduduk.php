<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTahunKepadatanPenduduk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kependudukan_kepadatan', function (Blueprint $table) {
            $table->integer('tahun')->nullable()->default(0);
            $table->float('persentase_penduduk')->default(0)->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kependudukan_kepadatan', function (Blueprint $table) {
            $table->dropColumn('tahun');
        });
    }
}
