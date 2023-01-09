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
            'type' => 'file'
        ]);
        ServiceRequirement::factory()->create([
            'name' => "Foto Selfie",
            'type' => 'file'
        ]);
        ServiceRequirement::factory()->create([
            'name' => "Foto KTP",
            'type' => 'file'
        ]);
        ServiceRequirement::factory()->create([
            'name' => "Surat Keterangan Hilang (dari kepolisian)",
            'type' => 'file'
        ]);
        // ServiceRequirement::factory()->create([
        //     'name' => 'Umur diatas 18 tahun',
        //     'need_file' => false
        // ]);
    }
}