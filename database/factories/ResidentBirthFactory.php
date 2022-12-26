<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Symfony\Component\Uid\Ulid;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ResidentBirth>
 */
class ResidentBirthFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $gender = ['Male', 'Female'][rand(0, 1)];
        return [
            'name' => fake()->name($gender),
            'gender' => $gender,
            'birth_place' => fake()->city(),
            'birth_date' => fake()->dateTimeBetween(),
            'ulid' => Ulid::generate(now())
        ];
    }
}