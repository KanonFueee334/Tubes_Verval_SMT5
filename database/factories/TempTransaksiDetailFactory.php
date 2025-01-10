<?php

namespace Database\Factories;

use App\Models\TempTransaksiDetail;
use App\Models\Stok;
use Illuminate\Database\Eloquent\Factories\Factory;

class TempTransaksiDetailFactory extends Factory
{
    protected $model = TempTransaksiDetail::class;

    public function definition()
    {
        return [
            'id_transaksi_header' => null, // Diisi secara manual saat create()
            'id_stok' => Stok::factory(), // Hubungkan ke factory Stok
            'jumlah' => $this->faker->numberBetween(1, 10),
            'sub_total' => $this->faker->numberBetween(10000, 50000),
        ];
    }
}
