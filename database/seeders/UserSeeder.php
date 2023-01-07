<?php

namespace Database\Seeders;

use App\Models\Resident;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $superAdmin = Role::create(['name' => 'super-admin']);
        $admin = Role::create(['name' => 'admin']);

        Permission::create(['name' => 'view.admin.dashboard']);

        $superAdmin->givePermissionTo('view.admin.dashboard');

        $user = User::factory()->create([
            'id_card_number' => '1370000000000008',
            'resident_id' => 1,
            'username' => 'ryumoon',
            'email' => 'ryumoon.light@mail.com'
        ]);
        $user->assignRole($superAdmin);
        $user = User::factory()->create([
            'id_card_number' => '1370000000000002',
            'resident_id' => 2,
            'username' => 'JilhanHaura',
            'email' => 'jilhanhaura@gmail.com'
        ]);

        $user->assignRole($superAdmin);

        // $user = User::factory()->create([
        //     'id_card_number' => '1370000000000002',
        //     'resident_id' => 2,
        //     'username' => 'jilhanhaura',
        //     'email' => 'jilhanhaura@mail.com'
        // ]);

        // $user->assignRole($superAdmin);

        for ($i = 3; $i <= 98; $i++) {
            $resident = Resident::find($i);

            User::factory()->create([
                'id_card_number' => $resident->id_card_number,
                'resident_id' => $resident->id
            ]);
        }
    }
}