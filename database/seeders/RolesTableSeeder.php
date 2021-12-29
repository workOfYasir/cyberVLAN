<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            ['name' => 'Client', 'guard_name' => 'web'],
            ['name' => 'Freelancer', 'guard_name' => 'web'],
        ];
        foreach ($roles as $role) {
            Role::create($role);
        }
    }
}
