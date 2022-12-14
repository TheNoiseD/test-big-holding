<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaction>
 */
class TransactionFactory extends Factory
{
    public function definition():array
    {
//        [client_id, amount, details, mount, year, transaction_status_id]

        return [
            'client_id' => $this->faker->numberBetween(1, 10),
            'amount' => $this->faker->randomFloat(2, 0, 1000),
            'details' => $this->faker->sentence,
            'mount' => $this->faker->month('now'),
            'year' => $this->faker->year('now'),
            'transaction_status' => $this->faker->boolean,
            'created_at' => $this->faker->dateTimeBetween('-30 days', 'now'),
            'updated_at' => $this->faker->dateTimeBetween('-10 days', 'now'),
        ];
    }
}
