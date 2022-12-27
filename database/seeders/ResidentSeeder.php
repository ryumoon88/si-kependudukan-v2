<?php

namespace Database\Seeders;

use App\Models\Resident;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ResidentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Resident::factory()->create([
            'resident_birth_id' => 1,
            'id_card_number' => '1370000000000008',
            'email' => 'ryumoon.light@mail.com',
            'phone_number' => '0987656378123',
            'religion' => 'Islam',
            'blood_type' => 'A',
        ]);

        Resident::factory()->create([
            'resident_birth_id' => 2,
            'id_card_number' => '1370000000000002',
            'email' => 'jilhanhaura@mail.com',
            'religion' => 'Islam',
            'blood_type' => 'AB',
        ]);

        Resident::factory(98)->create([]);
    }
}