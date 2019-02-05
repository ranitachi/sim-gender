<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Eloquent::unguard();
        // $path = storage_path('master/kecamatan.sql');
        // DB::unprepared(file_get_contents($path));
        // $this->command->info('Table Kecamatan seeded!');
        Eloquent::unguard();
        $path = storage_path('master/db_prov_kab.sql');
        DB::unprepared(file_get_contents($path));
        $this->command->info('Table Provinsi & Kabupaten/Kota seeded!');

        // $this->call(SubyekTableSeeder::class);
        // $this->call(KategoriSeederTable::class);
    }
}
