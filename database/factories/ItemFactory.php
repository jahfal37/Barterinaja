<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ItemFactory extends Factory
{
    protected $model = \App\Models\Item::class;

    public function definition()
    {
        return [
            'product_name' => $this->faker->word(),
            'category' => $this->faker->randomElement(['elektronik', 'fashion', 'perabot', 'lainnya']),
            'tags' => implode(', ', $this->faker->words(3)),
            'description' => $this->faker->sentence(),
            'city' => $this->faker->city(),
            'condition' => $this->faker->randomElement(['baru', 'bekas']),
            'latitude' => $this->faker->latitude(-90, 90),
            'longitude' => $this->faker->longitude(-180, 180),
            'user_id' => $this->faker->numberBetween(1, 10),
        ];
    }
}
