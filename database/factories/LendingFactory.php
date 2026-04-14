<?php

namespace Database\Factories;

use App\Models\Item;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lending>
 */
class LendingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'item_id' => Item::inRandomOrder()->first()?->id ?? Item::factory(),
            'name' => $this->faker->name(),
            'ket' => $this->faker->sentence(),
            'total' => $this->faker->numberBetween(1, 10),
            'user_id' => User::inRandomOrder()->first()?->id ?? User::factory(),
            // 'returned_at' => $this->faker->optional(0.3)->dateTimeBetween('-1 month', 'now'),
        ];
    }
}
