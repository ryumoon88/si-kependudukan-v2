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
        ServiceHasRequirement::factory()->create([
            'service_id' => 2,
            'service_requirement_id' => 1
        ]);
        ServiceHasRequirement::factory()->create([
            'service_id' => 2,
            'service_requirement_id' => 2
        ]);
        ServiceHasRequirement::factory()->create([
            'service_id' => 3,
            'service_requirement_id' => 1
        ]);
        ServiceHasRequirement::factory()->create([
            'service_id' => 3,
            'service_requirement_id' => 2
        ]);
        ServiceHasRequirement::factory()->create([
            'service_id' => 3,
            'service_requirement_id' => 3
        ]);
        ServiceHasRequirement::factory()->create([
            'service_id' => 4,
            'service_requirement_id' => 1
        ]);
        ServiceHasRequirement::factory()->create([
            'service_id' => 4,
            'service_requirement_id' => 3
        ]);
        ServiceHasRequirement::factory()->create([
            'service_id' => 5,
            'service_requirement_id' => 1
        ]);
        ServiceHasRequirement::factory()->create([
            'service_id' => 5,
            'service_requirement_id' => 5
        ]);
        ServiceHasRequirement::factory()->create([
            'service_id' => 6,
            'service_requirement_id' => 1
        ]);
        ServiceHasRequirement::factory()->create([
            'service_id' => 8,
            'service_requirement_id' => 1
        ]);
        ServiceHasRequirement::factory()->create([
            'service_id' => 8,
            'service_requirement_id' => 3
        ]);
        ServiceHasRequirement::factory()->create([
            'service_id' => 8,
            'service_requirement_id' => 6
        ]);
    }
}