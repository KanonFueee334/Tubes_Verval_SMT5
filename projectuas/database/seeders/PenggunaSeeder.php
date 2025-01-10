<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PenggunaSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['id_pengguna' => 1, 'nama_pengguna' => 'superadmin', 'password' => Hash::make('superadmin123'), 'saldo' => 500000000, 'role' => 'superadmin'],
            ['id_pengguna' => 2, 'nama_pengguna' => 'admin', 'password' => Hash::make('admin123'), 'saldo' => 500000000, 'role' => 'admin'],
            ['id_pengguna' => 3, 'nama_pengguna' => 'gudang', 'password' => Hash::make('gudang123'), 'saldo' => 500000000, 'role' => 'gudang'],
        ];

        DB::table('pengguna')->insert($data);
    }
}
