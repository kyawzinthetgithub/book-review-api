<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Books>
 */
class BooksFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => rand(1,10),
            'author' => $this->faker->unique()->name(),
            'book_name' => $this->faker->sentence($nbWords = 4, $variableNbWords = true),
            'description' => $this->faker->paragraph(),
        ];
    }
}
