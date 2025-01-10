<?php

namespace Database\Factories;

use App\Models\Stok;
use Illuminate\Database\Eloquent\Factories\Factory;

class StokFactory extends Factory
{
    protected $model = Stok::class;

    public function definition()
    {
        return [
            'id_barang' => $this->faker->randomDigitNotNull(),
            'harga_barang_jual' => $this->faker->numberBetween(100000, 500000),
            'status' => 1,
        ];
    }
}
