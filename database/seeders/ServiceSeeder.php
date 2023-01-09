<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Service::factory()->create([
            "service_category_id" => 1,
            "name" => "Perekaman Data",
            "slug" => "perekaman-data"
        ]);
        Service::factory()->create([
            "service_category_id" => 1,
            "name" => "Pembuatan Baru",
            "slug" => "pembuatan-baru"
        ]);
        Service::factory()->create([
            "service_category_id" => 1,
            "name" => "Perubahan Data",
            "slug" => "perubahan-data"
        ]);

        Service::factory()->create([
            "service_category_id" => 2,
            "name" => "Penerbitan Akta Kelahiran",
            "slug" => "penerbitan-akta-kelahiran"
        ]);
        Service::factory()->create([
            "service_category_id" => 2,
            "name" => "Penerbitan KIA",
            "slug" => "penerbitan-kia"
        ]);

        Service::factory()->create([
            "service_category_id" => 3,
            "name" => "Kartu Keluarga Baru",
            "slug" => "kartu-keluarga-baru"
        ]);

        Service::factory()->create([
            "service_category_id" => 4,
            "name" => "Kematian",
            "slug" => "kematian"
        ]);
        Service::factory()->create([
            "service_category_id" => 4,
            "name" => "Pindah Datang",
            "slug" => "pindah-datang"
        ]);
        // Service::factory()->create([
        //     "service_category_id" => 4,
        //     "name" => "Pindah WNA",
        //     "slug" => "pindah-wna"
        // ]);

        // Service::factory()->create([
        //     "service_category_id" => 5,
        //     "name" => "Update Data",
        //     "slug" => "update-data"
        // ]);
    }
}