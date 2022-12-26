<?php

namespace Database\Seeders;

use App\Models\ServiceRequirement;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceRequirementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ServiceRequirement::factory()->create([
            'name' => "Foto Kartu Keluarga (KK)",
            'need_file' => true
        ]);
        ServiceRequirement::factory()->create([
            'name' => "Foto Selfie",
            'need_file' => true
        ]);
        ServiceRequirement::factory()->create([
            'name' => "Foto KTP",
            'need_file' => true
        ]);
        ServiceRequirement::factory()->create([
            'name' => "Surat Keterangan Hilang (dari kepolisian)",
            'need_file' => true
        ]);
    }
}