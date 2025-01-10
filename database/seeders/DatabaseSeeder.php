<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Memanggil semua seeder yang telah Anda buat
        $this->call([
            // BarangSeeder::class,
            // KategoriSeeder::class,
            // PenggunaSeeder::class,
            // SessionsSeeder::class,
            // SupplierSeeder::class,
            KategoriSeeder::class,
            SupplierSeeder::class,
            BarangSeeder::class,
            SessionsSeeder::class,
            PenggunaSeeder::class,
        ]);
    }
}
