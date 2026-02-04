<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            'user',
            'manager',
            'admin',
        ];

        $guards = ['web', 'admin'];

        foreach ($guards as $guard) {
            foreach ($roles as $role) {
                \Spatie\Permission\Models\Role::firstOrCreate([
                    'name' => $role,
                    'guard_name' => $guard,
                ]);
            }
        }

        // Assign all permissions to admin role for admin guard
        $adminRole = \Spatie\Permission\Models\Role::where('name', 'admin')->where('guard_name', 'admin')->first();
        if ($adminRole) {
            $permissions = \Spatie\Permission\Models\Permission::where('guard_name', 'admin')->get();
            $adminRole->syncPermissions($permissions);
        }
    }
}
