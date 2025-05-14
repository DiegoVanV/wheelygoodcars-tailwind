<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Car;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => \App\Models\User::inRandomOrder()->first()?->id ?? \App\Models\User::factory()->create()->id,

            'license_plate' => strtoupper(fake()->bothify('??-###-??')), // Voorbeeld: AB-123-CD
            'brand' => fake()->company(),
            'model' => fake()->word(),
            'price' => rand(5000, 100000),
            'mileage' => rand(0, 150000),
            'seats' => fake()->randomElement([2, 5, 7]),
            'doors' => fake()->randomElement([3, 5]),
            'production_year' => rand(1980, 2025),
            'weight' => rand(850, 4000),
            'color' => fake()->randomElement(['red', 'blue', 'green', 'yellow', 'purple', 'black', 'white']),
            
            // image kan hier later worden toegevoegd
            'sold_at' => fake()->dateTime(),
            'views' => rand(0, 10000),
        ];
    }
}
