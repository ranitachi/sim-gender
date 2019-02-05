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
        Subyek::query()->truncate();
        $array = array('Politik Keamanan','Tenaga Kerja','Kesehatan','Pendidikan','Kependudukan');
        
        foreach($array as $item)
        {
            $sub = new Subyek;
            $sub->nama_subyek = $item;
            $sub->slug = str_slug($item);
            $sub->save();
        }
    }
}
