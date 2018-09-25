<?php

use Illuminate\Database\Seeder;
use App\Models\Subyek;

class SubyekTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sub = new Subyek;
        $sub->nama_subyek = "Politik Keamanan";
        $sub->save();

        $sub = new Subyek;
        $sub->nama_subyek = "Tenaga Kerja";
        $sub->save();

        $sub = new Subyek;
        $sub->nama_subyek = "Kesehatan";
        $sub->save();

        $sub = new Subyek;
        $sub->nama_subyek = "Pendidikan";
        $sub->save();

        $sub = new Subyek;
        $sub->nama_subyek = "Kependudukan";
        $sub->save();
    }
}
