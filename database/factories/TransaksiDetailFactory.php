<?php

namespace Database\Factories;

use App\Models\TransaksiDetail;
use App\Models\TransaksiHeader;
use App\Models\Stok;
use Illuminate\Database\Eloquent\Factories\Factory;

class TransaksiDetailFactory extends Factory
{
    protected $model = TransaksiDetail::class;

    public function definition()
    {
        return [
            'id_transaksi_header' => TransaksiHeader::factory(), // Hubungkan ke factory TransaksiHeader
            'id_stok' => Stok::factory(), // Hubungkan ke factory Stok
            'jumlah' => $this->faker->numberBetween(1, 10),
            'sub_total' => $this->faker->numberBetween(10000, 50000),
        ];
    }
}
