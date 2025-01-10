<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['id_kategori' => 1, 'nama_kategori' => 'Keramik Lantai', 'status' => 1, 'created_at' => null, 'updated_at' => null, 'deleted_at' => null],
            ['id_kategori' => 2, 'nama_kategori' => 'Keramik Dinding', 'status' => 1, 'created_at' => null, 'updated_at' => null, 'deleted_at' => null],
            ['id_kategori' => 3, 'nama_kategori' => 'Toilet Duduk', 'status' => 1, 'created_at' => null, 'updated_at' => null, 'deleted_at' => null],
            ['id_kategori' => 4, 'nama_kategori' => 'Wastafel', 'status' => 1, 'created_at' => null, 'updated_at' => null, 'deleted_at' => null],
            ['id_kategori' => 5, 'nama_kategori' => 'Keran Dapur', 'status' => 1, 'created_at' => null, 'updated_at' => null, 'deleted_at' => null],
            ['id_kategori' => 6, 'nama_kategori' => 'Keran Kamar Mandi', 'status' => 1, 'created_at' => null, 'updated_at' => null, 'deleted_at' => null],
            ['id_kategori' => 7, 'nama_kategori' => 'Shower', 'status' => 1, 'created_at' => null, 'updated_at' => null, 'deleted_at' => null],
            ['id_kategori' => 8, 'nama_kategori' => 'Keran Wastafel', 'status' => 1, 'created_at' => null, 'updated_at' => null, 'deleted_at' => null],
            ['id_kategori' => 9, 'nama_kategori' => 'Gagang Pintu', 'status' => 1, 'created_at' => null, 'updated_at' => null, 'deleted_at' => null],
            ['id_kategori' => 10, 'nama_kategori' => 'Engsel Pintu', 'status' => 1, 'created_at' => null, 'updated_at' => null, 'deleted_at' => null],
            ['id_kategori' => 11, 'nama_kategori' => 'Wastafel Dapur', 'status' => 1, 'created_at' => null, 'updated_at' => null, 'deleted_at' => null],
            ['id_kategori' => 12, 'nama_kategori' => 'Toilet Jongkok', 'status' => 1, 'created_at' => null, 'updated_at' => null, 'deleted_at' => null],
        ];

        DB::table('kategori')->insert($data);
    }
}
