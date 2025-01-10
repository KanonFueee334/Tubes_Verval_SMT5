<?php

namespace Database\Factories;

use App\Models\TransaksiHeader;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

class TransaksiHeaderFactory extends Factory
{
    protected $model = TransaksiHeader::class;

    public function definition()
    {
        return [
            'id_customer' => Customer::factory(), // Hubungkan ke factory Customer
            'tanggal_transaksi' => $this->faker->dateTime(),
            'total_transaksi' => $this->faker->numberBetween(100000, 500000),
            'status_transaksi' => 1, // Status default "Menunggu Konfirmasi"
        ];
    }
}
