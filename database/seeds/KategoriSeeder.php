<?php

use Illuminate\Database\Seeder;

use App\Models\Kategori;
use App\Models\Subyek;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sub = new Subyek;
        $sub->nama_subyek = 'Tahanan';
        $sub->save();

        $insert = new Kategori;
        $insert->id_subyek = 1;
        $insert->judul = 'Jumlah Tahanan 15 Tahun';
        $insert->url_route = '/test/url-route';
        $insert->save();

        $insert = new Kategori;
        $insert->id_subyek = 1;
        $insert->judul = 'Jumlah Tahanan 17 Tahun';
        $insert->url_route = '/coba/url-route';
        $insert->save();
    }
}
