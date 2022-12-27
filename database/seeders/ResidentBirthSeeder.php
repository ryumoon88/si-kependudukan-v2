<?php

namespace Database\Seeders;

use App\Models\ResidentBirth;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ResidentBirthSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ResidentBirth::factory()->create([
            'father_id' => null,
            'mother_id' => null,
            'name' => "Naufal Hady",
            'gender' => 'Male',
            'birth_place' => 'Padang',
            'birth_date' => '2003-01-01'
        ]);

        ResidentBirth::factory()->create([
            'father_id' => null,
            'mother_id' => null,
            'name' => "Tsalsabilla Jilhan Haura",
            'gender' => 'Female',
            'birth_place' => 'Padang'
        ]);



        for ($i = 3; $i <= 100; $i += 2) {
            ResidentBirth::factory()->create([
                'father_id' => $i,
                'mother_id' => $i + 1
            ]);
        }
    }
}