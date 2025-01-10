<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SupplierSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id_supplier' => 1,
                'nama_supplier' => 'PT. Platinum Ceramics Industry',
                'alamat_supplier' => 'Jl. Panglima Sudirman',
                'email_supplier' => null,
                'telp_supplier' => '0315312358',
                'status_supplier' => 1,
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null,
            ],
            [
                'id_supplier' => 2,
                'nama_supplier' => 'PT. Keramika Indonesia Assosiasi',
                'alamat_supplier' => 'Jl. Warung Buncit Raya',
                'email_supplier' => 'mkt@kiacreamics.com',
                'telp_supplier' => '0213506227',
                'status_supplier' => 1,
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null,
            ],
            [
                'id_supplier' => 3,
                'nama_supplier' => 'PT. Satya Langgeng Sentosa',
                'alamat_supplier' => 'Jl. Darmo Permai Selatan',
                'email_supplier' => 'marketing@romanceramics.com',
                'telp_supplier' => '02125684900',
                'status_supplier' => 1,
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null,
            ],
            [
                'id_supplier' => 4,
                'nama_supplier' => 'PT. Angsa Daya',
                'alamat_supplier' => 'Jl. Mangga Dua Raya',
                'email_supplier' => null,
                'telp_supplier' => '0216011606',
                'status_supplier' => 1,
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null,
            ],
            [
                'id_supplier' => 5,
                'nama_supplier' => 'PT. Vinindo Inti Pratama',
                'alamat_supplier' => 'Jl. Teuku Umar',
                'email_supplier' => 'ptvinindointipratama@gmail.com',
                'telp_supplier' => '081331644850',
                'status_supplier' => 1,
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null,
            ],
            [
                'id_supplier' => 6,
                'nama_supplier' => 'PT. Anugrah Ekstravisi Raya',
                'alamat_supplier' => 'Jl. Tanjungsari',
                'email_supplier' => null,
                'telp_supplier' => '08113548096',
                'status_supplier' => 1,
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null,
            ],
            [
                'id_supplier' => 7,
                'nama_supplier' => 'PT. Makmur Sehati',
                'alamat_supplier' => 'Jl. Talun',
                'email_supplier' => 'info@closetduty.com',
                'telp_supplier' => '081251058711',
                'status_supplier' => 1,
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null,
            ],
        ];

        DB::table('supplier')->insert($data);
    }
}
