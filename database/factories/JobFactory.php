<?php

namespace Database\Factories;

use App\Models\Employers;
use Illuminate\Database\Eloquent\Factories\Factory;


class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->jobTitle(),
            'employer_id' => Employers::factory(),
            'salary' => '50,000 USD'
        ];
    }
}
