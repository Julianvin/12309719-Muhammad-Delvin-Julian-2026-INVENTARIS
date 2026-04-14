<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class ItemFactory extends Factory
{
    public function definition(): array
    {
        return [
            'category_id' => Category::query()->inRandomOrder()->first()?->id ?? Category::factory(),
            'name' => $this->faker->words(2, true),
            'total' => $this->faker->numberBetween(10, 100),
            'repair' => $this->faker->numberBetween(0, 5),
        ];
    }
}
