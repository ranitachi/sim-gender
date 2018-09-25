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
        // $this->call(UsersTableSeeder::class);
        Eloquent::unguard();
        $path = storage_path('master/kecamatan.sql');
        DB::unprepared(file_get_contents($path));
        $this->command->info('Table Kecamatan seeded!');
    }
}
