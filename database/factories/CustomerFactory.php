<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

class CustomerFactory extends Factory
{
    protected $model = Customer::class;

    public function definition()
    {
        return [
            'nama_customer' => $this->faker->name(),
            'alamat_customer' => $this->faker->address(),
            'email_customer' => $this->faker->unique()->safeEmail(),
            'telp_customer' => $this->faker->phoneNumber(),
            'status_customer' => 1,
        ];
    }
}
