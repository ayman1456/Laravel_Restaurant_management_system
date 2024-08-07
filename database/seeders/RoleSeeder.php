<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            'admin',
            'pos-manager',

        ];

        foreach ($roles as $role) {
            Role::create(['name' => $role]);
        }
        Role::create(['name' => 'delivery','guard_name'=> 'customer']);
    }
}
