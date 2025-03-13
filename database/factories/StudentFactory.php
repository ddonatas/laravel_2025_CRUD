<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\City;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->firstName,
            'surname' => $this->faker->lastName,
            'address' => $this->faker->address,
            'phone' => $this->faker->phoneNumber,
            'city_id' => City::inRandomOrder()->first()->id ?? 1, // Priskiria atsitiktinį miestą
        ];

    }

}
