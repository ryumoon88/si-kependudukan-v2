<?php

namespace Database\Seeders;

use App\Models\ServiceCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ServiceCategory::factory()->create([
            "name" => "KTP-Elektronik",
            "slug" => 'ktp-elektronik'
        ]);
        ServiceCategory::factory()->create([
            "name" => "Layanan Anak",
            "slug" => 'layanan-anak'
        ]);
        ServiceCategory::factory()->create([
            "name" => "Kartu Keluarga",
            "slug" => 'kartu-keluarga'
        ]);
        ServiceCategory::factory()->create([
            "name" => "Surat Keterangan",
            "slug" => 'surat-keterangan'
        ]);
    }
}