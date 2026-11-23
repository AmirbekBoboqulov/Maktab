<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role; // ✅ MUHIM!
use Spatie\Permission\Models\Permission; // ✅ MUHIM!

class RolePermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Rollar
        $roles = ['Oddiy foydalanuvchi', 'Admin', 'Super Admin', 'Ota-ona'];

        foreach ($roles as $role) {
            Role::firstOrCreate(['name' => $role, 'guard_name' => 'web']);
        }

        // Ruxsatlar
        $permissions = [
            'manage content',
            'manage users',
            'manage roles',
            'view parent panel',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission, 'guard_name' => 'web']);
        }

        Role::findByName('Super Admin')->syncPermissions($permissions);
        Role::findByName('Admin')->syncPermissions(['manage content', 'view parent panel']);
        Role::findByName('Ota-ona')->givePermissionTo('view parent panel');
    }
}
