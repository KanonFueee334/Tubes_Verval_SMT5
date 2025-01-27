<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['id_barang' => 1, 'id_kategori' => 1, 'id_supplier' => 1, 'nama_barang' => 'Azuvi Brown 40x40', 'status' => 1, 'deleted_at' => null, 'created_at' => null, 'updated_at' => null],
            ['id_barang' => 2, 'id_kategori' => 1, 'id_supplier' => 1, 'nama_barang' => 'Azuvi Grey 40x40', 'status' => 1, 'deleted_at' => null, 'created_at' => null, 'updated_at' => null],
            ['id_barang' => 3, 'id_kategori' => 1, 'id_supplier' => 1, 'nama_barang' => 'Angelo Grey 40x40', 'status' => 1, 'deleted_at' => null, 'created_at' => null, 'updated_at' => null],
            ['id_barang' => 4, 'id_kategori' => 1, 'id_supplier' => 1, 'nama_barang' => 'Dexter Brown 50x50', 'status' => 1, 'deleted_at' => null, 'created_at' => null, 'updated_at' => null],
            ['id_barang' => 5, 'id_kategori' => 1, 'id_supplier' => 1, 'nama_barang' => 'Angelo Bone 40x40', 'status' => 1, 'deleted_at' => null, 'created_at' => null, 'updated_at' => null],
            ['id_barang' => 6, 'id_kategori' => 1, 'id_supplier' => 1, 'nama_barang' => 'Brighton Basic 40x40', 'status' => 1, 'deleted_at' => null, 'created_at' => null, 'updated_at' => null],
            ['id_barang' => 7, 'id_kategori' => 1, 'id_supplier' => 1, 'nama_barang' => 'Juliet Cream 60x60', 'status' => 1, 'deleted_at' => null, 'created_at' => null, 'updated_at' => null],
            ['id_barang' => 8, 'id_kategori' => 1, 'id_supplier' => 1, 'nama_barang' => 'Alexis Brown 40x40', 'status' => 1, 'deleted_at' => null, 'created_at' => null, 'updated_at' => null],
            ['id_barang' => 9, 'id_kategori' => 1, 'id_supplier' => 1, 'nama_barang' => 'Ancona Brown 40x40', 'status' => 1, 'deleted_at' => null, 'created_at' => null, 'updated_at' => null],
            ['id_barang' => 10, 'id_kategori' => 1, 'id_supplier' => 1, 'nama_barang' => 'Ancona Grey 40x40', 'status' => 1, 'deleted_at' => null, 'created_at' => null, 'updated_at' => null],
            ['id_barang' => 11, 'id_kategori' => 2, 'id_supplier' => 1, 'nama_barang' => 'Adore Grey Decor Embossed 25x40', 'status' => 1, 'deleted_at' => null, 'created_at' => null, 'updated_at' => null],
            ['id_barang' => 12, 'id_kategori' => 2, 'id_supplier' => 1, 'nama_barang' => 'Balkan Grey Decor Embossed 25x40', 'status' => 1, 'deleted_at' => null, 'created_at' => null, 'updated_at' => null],
            ['id_barang' => 13, 'id_kategori' => 2, 'id_supplier' => 1, 'nama_barang' => 'Baxter Brown 25x40', 'status' => 1, 'deleted_at' => null, 'created_at' => null, 'updated_at' => null],
            ['id_barang' => 14, 'id_kategori' => 2, 'id_supplier' => 1, 'nama_barang' => 'Baxter Grey 25x40', 'status' => 1, 'deleted_at' => null, 'created_at' => null, 'updated_at' => null],
            ['id_barang' => 15, 'id_kategori' => 2, 'id_supplier' => 1, 'nama_barang' => 'Beatrix Blue 25x40', 'status' => 1, 'deleted_at' => null, 'created_at' => null, 'updated_at' => null],
            ['id_barang' => 16, 'id_kategori' => 2, 'id_supplier' => 1, 'nama_barang' => 'Benson Decor Embossed 25x40', 'status' => 1, 'deleted_at' => null, 'created_at' => null, 'updated_at' => null],
            ['id_barang' => 17, 'id_kategori' => 2, 'id_supplier' => 1, 'nama_barang' => 'Blacius Grey 25x40', 'status' => 1, 'deleted_at' => null, 'created_at' => null, 'updated_at' => null],
            ['id_barang' => 18, 'id_kategori' => 2, 'id_supplier' => 1, 'nama_barang' => 'Bohemia Brown 25x40', 'status' => 1, 'deleted_at' => null, 'created_at' => null, 'updated_at' => null],
            ['id_barang' => 19, 'id_kategori' => 2, 'id_supplier' => 1, 'nama_barang' => 'Cardova Brown Embossed 25x50', 'status' => 1, 'deleted_at' => null, 'created_at' => null, 'updated_at' => null],
            ['id_barang' => 20, 'id_kategori' => 2, 'id_supplier' => 1, 'nama_barang' => 'Cardova Dark Grey Embossed 25x50', 'status' => 1, 'deleted_at' => null, 'created_at' => null, 'updated_at' => null],
            ['id_barang' => 21, 'id_kategori' => 1, 'id_supplier' => 2, 'nama_barang' => 'Barcelona Beige 40x40', 'status' => 1, 'deleted_at' => null, 'created_at' => null, 'updated_at' => null],
            ['id_barang' => 22, 'id_kategori' => 1, 'id_supplier' => 2, 'nama_barang' => 'Borneo Brown 40x40', 'status' => 1, 'deleted_at' => null, 'created_at' => null, 'updated_at' => null],
            ['id_barang' => 23, 'id_kategori' => 1, 'id_supplier' => 2, 'nama_barang' => 'Caracas Beige 40x40', 'status' => 1, 'deleted_at' => null, 'created_at' => null, 'updated_at' => null],
            ['id_barang' => 24, 'id_kategori' => 1, 'id_supplier' => 2, 'nama_barang' => 'Harbor Grey 40x40', 'status' => 1, 'deleted_at' => null, 'created_at' => null, 'updated_at' => null],
            ['id_barang' => 25, 'id_kategori' => 1, 'id_supplier' => 2, 'nama_barang' => 'Jasper Zebra 40x40', 'status' => 1, 'deleted_at' => null, 'created_at' => null, 'updated_at' => null],
            ['id_barang' => 26, 'id_kategori' => 1, 'id_supplier' => 2, 'nama_barang' => 'Linewood Beige 40x40', 'status' => 1, 'deleted_at' => null, 'created_at' => null, 'updated_at' => null],
            ['id_barang' => 27, 'id_kategori' => 1, 'id_supplier' => 2, 'nama_barang' => 'Louismilan Brown 40x40', 'status' => 1, 'deleted_at' => null, 'created_at' => null, 'updated_at' => null],
            ['id_barang' => 28, 'id_kategori' => 1, 'id_supplier' => 2, 'nama_barang' => 'Mahoni Brown 40x40', 'status' => 1, 'deleted_at' => null, 'created_at' => null, 'updated_at' => null],
            ['id_barang' => 29, 'id_kategori' => 1, 'id_supplier' => 2, 'nama_barang' => 'Mansonia Brown 40x40', 'status' => 1, 'deleted_at' => null, 'created_at' => null, 'updated_at' => null],
            ['id_barang' => 30, 'id_kategori' => 1, 'id_supplier' => 2, 'nama_barang' => 'Maroco Deco Beige 40x40', 'status' => 1, 'deleted_at' => null, 'created_at' => null, 'updated_at' => null],
            ['id_barang' => 31, 'id_kategori' => 2, 'id_supplier' => 2, 'nama_barang' => 'Candra Grey 25x40', 'status' => 1, 'deleted_at' => null, 'created_at' => null, 'updated_at' => null],
            ['id_barang' => 32, 'id_kategori' => 2, 'id_supplier' => 2, 'nama_barang' => 'Cendana Brown 25x40', 'status' => 1, 'deleted_at' => null, 'created_at' => null, 'updated_at' => null],
            ['id_barang' => 33, 'id_kategori' => 2, 'id_supplier' => 2, 'nama_barang' => 'Chess Black 25x40', 'status' => 1, 'deleted_at' => null, 'created_at' => null, 'updated_at' => null],
            ['id_barang' => 34, 'id_kategori' => 2, 'id_supplier' => 2, 'nama_barang' => 'Cherrybloom Pink 25x40', 'status' => 1, 'deleted_at' => null, 'created_at' => null, 'updated_at' => null],
            ['id_barang' => 35, 'id_kategori' => 2, 'id_supplier' => 2, 'nama_barang' => 'Everton Blue 25x40', 'status' => 1, 'deleted_at' => null, 'created_at' => null, 'updated_at' => null],
            ['id_barang' => 36, 'id_kategori' => 2, 'id_supplier' => 2, 'nama_barang' => 'Ivy White 25x40', 'status' => 1, 'deleted_at' => null, 'created_at' => null, 'updated_at' => null],
            ['id_barang' => 37, 'id_kategori' => 2, 'id_supplier' => 2, 'nama_barang' => 'Liverpool Blue 25x40', 'status' => 1, 'deleted_at' => null, 'created_at' => null, 'updated_at' => null],
            ['id_barang' => 38, 'id_kategori' => 2, 'id_supplier' => 2, 'nama_barang' => 'Lyon Brown 25x40', 'status' => 1, 'deleted_at' => null, 'created_at' => null, 'updated_at' => null],
            ['id_barang' => 39, 'id_kategori' => 2, 'id_supplier' => 2, 'nama_barang' => 'Rona Shuffle Grey 25x40', 'status' => 1, 'deleted_at' => null, 'created_at' => null, 'updated_at' => null],
            ['id_barang' => 40, 'id_kategori' => 2, 'id_supplier' => 2, 'nama_barang' => 'Starlight White 25x40', 'status' => 1, 'deleted_at' => null, 'created_at' => null, 'updated_at' => null],
            ['id_barang' => 41, 'id_kategori' => 3, 'id_supplier' => 2, 'nama_barang' => 'KIA Maxx One Piece', 'status' => 1, 'deleted_at' => null, 'created_at' => null, 'updated_at' => null],
            ['id_barang' => 42, 'id_kategori' => 3, 'id_supplier' => 2, 'nama_barang' => 'KIA Base', 'status' => 1, 'deleted_at' => null, 'created_at' => null, 'updated_at' => null],
            ['id_barang' => 43, 'id_kategori' => 3, 'id_supplier' => 2, 'nama_barang' => 'KIA Moon', 'status' => 1, 'deleted_at' => null, 'created_at' => null, 'updated_at' => null],
            ['id_barang' => 44, 'id_kategori' => 4, 'id_supplier' => 2, 'nama_barang' => 'KIA Karin', 'status' => 1, 'deleted_at' => null, 'created_at' => null, 'updated_at' => null],
            ['id_barang' => 45, 'id_kategori' => 4, 'id_supplier' => 2, 'nama_barang' => 'KIA Jenna', 'status' => 1, 'deleted_at' => null, 'created_at' => null, 'updated_at' => null],
            ['id_barang' => 46, 'id_kategori' => 6, 'id_supplier' => 2, 'nama_barang' => 'Napoli', 'status' => 1, 'deleted_at' => null, 'created_at' => null, 'updated_at' => null],
            ['id_barang' => 47, 'id_kategori' => 6, 'id_supplier' => 2, 'nama_barang' => 'Amanda', 'status' => 1, 'deleted_at' => null, 'created_at' => null, 'updated_at' => null],
            ['id_barang' => 48, 'id_kategori' => 5, 'id_supplier' => 2, 'nama_barang' => 'Como', 'status' => 1, 'deleted_at' => null, 'created_at' => null, 'updated_at' => null],
            ['id_barang' => 49, 'id_kategori' => 5, 'id_supplier' => 2, 'nama_barang' => 'Oliver', 'status' => 1, 'deleted_at' => null, 'created_at' => null, 'updated_at' => null],
            ['id_barang' => 50, 'id_kategori' => 7, 'id_supplier' => 2, 'nama_barang' => 'Dave', 'status' => 1, 'deleted_at' => null, 'created_at' => null, 'updated_at' => null],
            ['id_barang' => 51, 'id_kategori' => 7, 'id_supplier' => 2, 'nama_barang' => 'Prince', 'status' => 1, 'deleted_at' => null, 'created_at' => null, 'updated_at' => null],
            ['id_barang' => 52, 'id_kategori' => 7, 'id_supplier' => 2, 'nama_barang' => 'Queen', 'status' => 1, 'deleted_at' => null, 'created_at' => null, 'updated_at' => null],
            ['id_barang' => 53, 'id_kategori' => 8, 'id_supplier' => 2, 'nama_barang' => 'Lecce', 'status' => 1, 'deleted_at' => null, 'created_at' => null, 'updated_at' => null],
            ['id_barang' => 54, 'id_kategori' => 8, 'id_supplier' => 2, 'nama_barang' => 'Cross', 'status' => 1, 'deleted_at' => null, 'created_at' => null, 'updated_at' => null],
            ['id_barang' => 55, 'id_kategori' => 8, 'id_supplier' => 2, 'nama_barang' => 'Nique', 'status' => 1, 'deleted_at' => null, 'created_at' => null, 'updated_at' => null],
            ['id_barang' => 56, 'id_kategori' => 1, 'id_supplier' => 3, 'nama_barang' => 'Adelaide 40x40', 'status' => 1, 'deleted_at' => null, 'created_at' => null, 'updated_at' => null],
            ['id_barang' => 57, 'id_kategori' => 1, 'id_supplier' => 3, 'nama_barang' => 'Austin 50x50', 'status' => 1, 'deleted_at' => null, 'created_at' => null, 'updated_at' => null],
            ['id_barang' => 58, 'id_kategori' => 1, 'id_supplier' => 3, 'nama_barang' => 'Chrysant 40x40', 'status' => 1, 'deleted_at' => null, 'created_at' => null, 'updated_at' => null],
            ['id_barang' => 59, 'id_kategori' => 1, 'id_supplier' => 3, 'nama_barang' => 'Crystallin 50x50', 'status' => 1, 'deleted_at' => null, 'created_at' => null, 'updated_at' => null],
            ['id_barang' => 60, 'id_kategori' => 2, 'id_supplier' => 3, 'nama_barang' => 'dCanyon 30x60', 'status' => 1, 'deleted_at' => null, 'created_at' => null, 'updated_at' => null],
            ['id_barang' => 61, 'id_kategori' => 2, 'id_supplier' => 3, 'nama_barang' => 'dCharlotte 30x60', 'status' => 1, 'deleted_at' => null, 'created_at' => null, 'updated_at' => null],
            ['id_barang' => 62, 'id_kategori' => 2, 'id_supplier' => 3, 'nama_barang' => 'dChestnut 30x60', 'status' => 1, 'deleted_at' => null, 'created_at' => null, 'updated_at' => null],
            ['id_barang' => 63, 'id_kategori' => 2, 'id_supplier' => 3, 'nama_barang' => 'dFest 30x60', 'status' => 1, 'deleted_at' => null, 'created_at' => null, 'updated_at' => null],
            ['id_barang' => 64, 'id_kategori' => 2, 'id_supplier' => 3, 'nama_barang' => 'dSedra 30x60', 'status' => 1, 'deleted_at' => null, 'created_at' => null, 'updated_at' => null],
            ['id_barang' => 65, 'id_kategori' => 2, 'id_supplier' => 3, 'nama_barang' => 'dStrena 25x50', 'status' => 1, 'deleted_at' => null, 'created_at' => null, 'updated_at' => null],
            ['id_barang' => 66, 'id_kategori' => 1, 'id_supplier' => 3, 'nama_barang' => 'Rocktile 30x30', 'status' => 1, 'deleted_at' => null, 'created_at' => null, 'updated_at' => null],
            ['id_barang' => 67, 'id_kategori' => 1, 'id_supplier' => 3, 'nama_barang' => 'dRegato 40x40', 'status' => 1, 'deleted_at' => null, 'created_at' => null, 'updated_at' => null],
            ['id_barang' => 68, 'id_kategori' => 1, 'id_supplier' => 3, 'nama_barang' => 'dBatur 30x30', 'status' => 1, 'deleted_at' => null, 'created_at' => null, 'updated_at' => null],
            ['id_barang' => 69, 'id_kategori' => 1, 'id_supplier' => 3, 'nama_barang' => 'dCopertino 40x40', 'status' => 1, 'deleted_at' => null, 'created_at' => null, 'updated_at' => null],
            ['id_barang' => 70, 'id_kategori' => 1, 'id_supplier' => 3, 'nama_barang' => 'Sandstone 40x40', 'status' => 1, 'deleted_at' => null, 'created_at' => null, 'updated_at' => null],
            ['id_barang' => 71, 'id_kategori' => 1, 'id_supplier' => 4, 'nama_barang' => 'SL Minimalist Series 40x40', 'status' => 1, 'deleted_at' => null, 'created_at' => null, 'updated_at' => null],
            ['id_barang' => 72, 'id_kategori' => 1, 'id_supplier' => 4, 'nama_barang' => 'Ge Marble Series 30x30', 'status' => 1, 'deleted_at' => null, 'created_at' => null, 'updated_at' => null],
            ['id_barang' => 73, 'id_kategori' => 1, 'id_supplier' => 4, 'nama_barang' => 'Ge Retro Series 30x30', 'status' => 1, 'deleted_at' => null, 'created_at' => null, 'updated_at' => null],
            ['id_barang' => 74, 'id_kategori' => 1, 'id_supplier' => 4, 'nama_barang' => 'SX Minimalist Series 40x40', 'status' => 1, 'deleted_at' => null, 'created_at' => null, 'updated_at' => null],
            ['id_barang' => 75, 'id_kategori' => 1, 'id_supplier' => 4, 'nama_barang' => 'SX Marble Series 40x40', 'status' => 1, 'deleted_at' => null, 'created_at' => null, 'updated_at' => null],
            ['id_barang' => 76, 'id_kategori' => 1, 'id_supplier' => 4, 'nama_barang' => 'SZ Mozaic Series 50x50', 'status' => 1, 'deleted_at' => null, 'created_at' => null, 'updated_at' => null],
            ['id_barang' => 77, 'id_kategori' => 1, 'id_supplier' => 4, 'nama_barang' => 'SZ Retro Series 50x50', 'status' => 1, 'deleted_at' => null, 'created_at' => null, 'updated_at' => null],
            ['id_barang' => 78, 'id_kategori' => 1, 'id_supplier' => 4, 'nama_barang' => 'SXL Stone Naturo Series 40x40', 'status' => 1, 'deleted_at' => null, 'created_at' => null, 'updated_at' => null],
            ['id_barang' => 79, 'id_kategori' => 1, 'id_supplier' => 4, 'nama_barang' => 'ST Marble Series 60x60', 'status' => 1, 'deleted_at' => null, 'created_at' => null, 'updated_at' => null],
            ['id_barang' => 80, 'id_kategori' => 1, 'id_supplier' => 4, 'nama_barang' => 'XSL Stone Naturo 40x40', 'status' => 1, 'deleted_at' => null, 'created_at' => null, 'updated_at' => null],
            ['id_barang' => 81, 'id_kategori' => 2, 'id_supplier' => 4, 'nama_barang' => 'DL Marble Series 20x25', 'status' => 1, 'deleted_at' => null, 'created_at' => null, 'updated_at' => null],
            ['id_barang' => 82, 'id_kategori' => 2, 'id_supplier' => 4, 'nama_barang' => 'DX Minimalist Series 25x40', 'status' => 1, 'deleted_at' => null, 'created_at' => null, 'updated_at' => null],
            ['id_barang' => 83, 'id_kategori' => 2, 'id_supplier' => 4, 'nama_barang' => 'DX Mozaic Series 25x40', 'status' => 1, 'deleted_at' => null, 'created_at' => null, 'updated_at' => null],
            ['id_barang' => 84, 'id_kategori' => 2, 'id_supplier' => 4, 'nama_barang' => 'DZ Marble Series 25x50', 'status' => 1, 'deleted_at' => null, 'created_at' => null, 'updated_at' => null],
            ['id_barang' => 85, 'id_kategori' => 2, 'id_supplier' => 4, 'nama_barang' => 'DX Marble Series 25x40', 'status' => 1, 'deleted_at' => null, 'created_at' => null, 'updated_at' => null],
            ['id_barang' => 86, 'id_kategori' => 2, 'id_supplier' => 4, 'nama_barang' => 'DT Minimalist Series 30x60', 'status' => 1, 'deleted_at' => null, 'created_at' => null, 'updated_at' => null],
            ['id_barang' => 87, 'id_kategori' => 2, 'id_supplier' => 4, 'nama_barang' => 'DT Marble Series 30x60', 'status' => 1, 'deleted_at' => null, 'created_at' => null, 'updated_at' => null],
            ['id_barang' => 88, 'id_kategori' => 2, 'id_supplier' => 4, 'nama_barang' => 'PXD Mozaic Series 25x40', 'status' => 1, 'deleted_at' => null, 'created_at' => null, 'updated_at' => null],
            ['id_barang' => 89, 'id_kategori' => 2, 'id_supplier' => 4, 'nama_barang' => 'PXD Marble Series 25x40', 'status' => 1, 'deleted_at' => null, 'created_at' => null, 'updated_at' => null],
            ['id_barang' => 90, 'id_kategori' => 2, 'id_supplier' => 4, 'nama_barang' => 'PTD Marble Series 30x60', 'status' => 1, 'deleted_at' => null, 'created_at' => null, 'updated_at' => null],
            ['id_barang' => 91, 'id_kategori' => 9, 'id_supplier' => 5, 'nama_barang' => 'Vintage YG 853', 'status' => 1, 'deleted_at' => null, 'created_at' => null, 'updated_at' => null],
            ['id_barang' => 92, 'id_kategori' => 9, 'id_supplier' => 5, 'nama_barang' => 'Vintage YG 898', 'status' => 1, 'deleted_at' => null, 'created_at' => null, 'updated_at' => null],
            ['id_barang' => 93, 'id_kategori' => 9, 'id_supplier' => 5, 'nama_barang' => 'Vintage YG 700', 'status' => 1, 'deleted_at' => null, 'created_at' => null, 'updated_at' => null],
            ['id_barang' => 94, 'id_kategori' => 9, 'id_supplier' => 5, 'nama_barang' => 'Vintage YG 8101', 'status' => 1, 'deleted_at' => null, 'created_at' => null, 'updated_at' => null],
            ['id_barang' => 95, 'id_kategori' => 9, 'id_supplier' => 5, 'nama_barang' => 'Vintage YG 899', 'status' => 1, 'deleted_at' => null, 'created_at' => null, 'updated_at' => null],
            ['id_barang' => 96, 'id_kategori' => 9, 'id_supplier' => 5, 'nama_barang' => 'Vintage Venus', 'status' => 1, 'deleted_at' => null, 'created_at' => null, 'updated_at' => null],
            ['id_barang' => 97, 'id_kategori' => 9, 'id_supplier' => 5, 'nama_barang' => 'Vintage Pluto', 'status' => 1, 'deleted_at' => null, 'created_at' => null, 'updated_at' => null],
            ['id_barang' => 98, 'id_kategori' => 9, 'id_supplier' => 5, 'nama_barang' => 'Vintage Mars', 'status' => 1, 'deleted_at' => null, 'created_at' => null, 'updated_at' => null],
            ['id_barang' => 99, 'id_kategori' => 9, 'id_supplier' => 5, 'nama_barang' => 'Vintage Nicholas', 'status' => 1, 'deleted_at' => null, 'created_at' => null, 'updated_at' => null],
            ['id_barang' => 100, 'id_kategori' => 9, 'id_supplier' => 5, 'nama_barang' => 'Vintage Richard', 'status' => 1, 'deleted_at' => null, 'created_at' => null, 'updated_at' => null],
            ['id_barang' => 101, 'id_kategori' => 9, 'id_supplier' => 5, 'nama_barang' => 'Vintage Malaga', 'status' => 1, 'deleted_at' => null, 'created_at' => null, 'updated_at' => null],
            ['id_barang' => 102, 'id_kategori' => 9, 'id_supplier' => 5, 'nama_barang' => 'Vintage Palma', 'status' => 1, 'deleted_at' => null, 'created_at' => null, 'updated_at' => null],
            ['id_barang' => 103, 'id_kategori' => 9, 'id_supplier' => 5, 'nama_barang' => 'Vintage Santacruz', 'status' => 1, 'deleted_at' => null, 'created_at' => null, 'updated_at' => null],
            ['id_barang' => 104, 'id_kategori' => 10, 'id_supplier' => 5, 'nama_barang' => 'Engsel Pintu Gold 3 inch', 'status' => 1, 'deleted_at' => null, 'created_at' => null, 'updated_at' => null],
            ['id_barang' => 105, 'id_kategori' => 10, 'id_supplier' => 5, 'nama_barang' => 'Engsel Pintu Silver 3 inch', 'status' => 1, 'deleted_at' => null, 'created_at' => null, 'updated_at' => null],
            ['id_barang' => 106, 'id_kategori' => 10, 'id_supplier' => 5, 'nama_barang' => 'Engsel Pintu Gold 4 inch', 'status' => 1, 'deleted_at' => null, 'created_at' => null, 'updated_at' => null],
            ['id_barang' => 107, 'id_kategori' => 10, 'id_supplier' => 5, 'nama_barang' => 'Engsel Pintu Silver 4 inch', 'status' => 1, 'deleted_at' => null, 'created_at' => null, 'updated_at' => null],
            ['id_barang' => 108, 'id_kategori' => 10, 'id_supplier' => 5, 'nama_barang' => 'Engsel Pintu Gold 5 inch', 'status' => 1, 'deleted_at' => null, 'created_at' => null, 'updated_at' => null],
            ['id_barang' => 109, 'id_kategori' => 10, 'id_supplier' => 5, 'nama_barang' => 'Engsel Pintu Silver 5 inch', 'status' => 1, 'deleted_at' => null, 'created_at' => null, 'updated_at' => null],
            ['id_barang' => 110, 'id_kategori' => 10, 'id_supplier' => 5, 'nama_barang' => 'Engsel Pintu Brown 5 inch', 'status' => 1, 'deleted_at' => null, 'created_at' => null, 'updated_at' => null],
            ['id_barang' => 111, 'id_kategori' => 5, 'id_supplier' => 6, 'nama_barang' => 'VT 01 C', 'status' => 1, 'deleted_at' => null, 'created_at' => null, 'updated_at' => null],
            ['id_barang' => 112, 'id_kategori' => 5, 'id_supplier' => 6, 'nama_barang' => 'SAS KX 2C', 'status' => 1, 'deleted_at' => null, 'created_at' => null, 'updated_at' => null],
            ['id_barang' => 113, 'id_kategori' => 5, 'id_supplier' => 6, 'nama_barang' => 'HOV 03B', 'status' => 1, 'deleted_at' => null, 'created_at' => null, 'updated_at' => null],
            ['id_barang' => 114, 'id_kategori' => 5, 'id_supplier' => 6, 'nama_barang' => 'ACR 03C', 'status' => 1, 'deleted_at' => null, 'created_at' => null, 'updated_at' => null],
            ['id_barang' => 115, 'id_kategori' => 11, 'id_supplier' => 6, 'nama_barang' => 'KS1 - 02', 'status' => 1, 'deleted_at' => null, 'created_at' => null, 'updated_at' => null],
            ['id_barang' => 116, 'id_kategori' => 11, 'id_supplier' => 6, 'nama_barang' => 'KS2 - 20', 'status' => 1, 'deleted_at' => null, 'created_at' => null, 'updated_at' => null],
            ['id_barang' => 117, 'id_kategori' => 11, 'id_supplier' => 6, 'nama_barang' => 'KS2 - 14', 'status' => 1, 'deleted_at' => null, 'created_at' => null, 'updated_at' => null],
            ['id_barang' => 118, 'id_kategori' => 11, 'id_supplier' => 6, 'nama_barang' => 'KS1 - 26', 'status' => 1, 'deleted_at' => null, 'created_at' => null, 'updated_at' => null],
            ['id_barang' => 119, 'id_kategori' => 11, 'id_supplier' => 6, 'nama_barang' => 'KS1 - 24', 'status' => 1, 'deleted_at' => null, 'created_at' => null, 'updated_at' => null],
            ['id_barang' => 120, 'id_kategori' => 11, 'id_supplier' => 6, 'nama_barang' => 'KS1 - 19', 'status' => 1, 'deleted_at' => null, 'created_at' => null, 'updated_at' => null],
            ['id_barang' => 121, 'id_kategori' => 3, 'id_supplier' => 7, 'nama_barang' => 'C - 09', 'status' => 1, 'deleted_at' => null, 'created_at' => null, 'updated_at' => null],
            ['id_barang' => 122, 'id_kategori' => 12, 'id_supplier' => 7, 'nama_barang' => 'SC - 01', 'status' => 1, 'deleted_at' => null, 'created_at' => null, 'updated_at' => null],
            ['id_barang' => 123, 'id_kategori' => 12, 'id_supplier' => 7, 'nama_barang' => 'SC - 02', 'status' => 1, 'deleted_at' => null, 'created_at' => null, 'updated_at' => null],
            ['id_barang' => 124, 'id_kategori' => 4, 'id_supplier' => 7, 'nama_barang' => 'L - 03', 'status' => 1, 'deleted_at' => null, 'created_at' => null, 'updated_at' => null],
            ['id_barang' => 125, 'id_kategori' => 4, 'id_supplier' => 7, 'nama_barang' => 'L - 12', 'status' => 1, 'deleted_at' => null, 'created_at' => null, 'updated_at' => null],
        ];

        DB::table('barang')->insert($data);
    }
}
