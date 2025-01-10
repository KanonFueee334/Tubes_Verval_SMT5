<?php

namespace Database\Factories;

use App\Models\TempTransaksiHeader;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

class TempTransaksiHeaderFactory extends Factory
{
    protected $model = TempTransaksiHeader::class;

    public function definition()
    {
        return [
            'id_customer' => Customer::factory(), // Hubungkan ke factory Customer
            'tanggal_transaksi' => $this->faker->dateTime(),
            'total_transaksi' => $this->faker->numberBetween(100000, 500000),
        ];
    }
}
