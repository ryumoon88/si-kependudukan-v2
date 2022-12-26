<?php

namespace Database\Seeders;

use App\Models\ServiceHasRequirement;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceHasRequirementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ServiceHasRequirement::factory()->create([
            'service_id' => 1,
            'service_requirement_id' => 1
        ]);
        ServiceHasRequirement::factory()->create([
            'service_id' => 1,
            'service_requirement_id' => 2
        ]);
    }
}