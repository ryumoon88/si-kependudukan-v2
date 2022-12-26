<?php

namespace Database\Factories;

use App\Models\ResidentBirth;
use Illuminate\Database\Eloquent\Factories\Factory;
use Laravolt\Indonesia\Models\Province;
use Symfony\Component\Uid\Ulid;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Resident>
 */
class ResidentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'id_card_number' => fake()->bothify('#############'),
            'resident_birth_id' => ResidentBirth::all()->random(1)->first()->id,
            'phone_number' => fake()->phoneNumber(),
            'religion' => ['Islam', 'Protestan', 'Khatolik', 'Hindu', 'Buddha', 'Khonghucu'][rand(0, 5)],
            'blood_type' => ['A', 'B', 'AB', 'O'][rand(0, 3)],
            'address' => fake()->address(),
            'province_id' => Province::all()->random(1)->first()->id,
            'city_id' => Province::all()->random(1)->first()->id,
            'district_id' => Province::all()->random(1)->first()->id,
            'village_id' => Province::all()->random(1)->first()->id,

            'email' => fake()->email(),
            'ulid' => Ulid::generate(now())
        ];
    }
}