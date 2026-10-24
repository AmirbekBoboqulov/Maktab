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
        Role::firstOrCreate(['name' => "Super Admin"]);
        Role::firstOrCreate(['name' => "Admin"]);
        Role::firstOrCreate(['name' => "Creator"]);

        // Ruxsatlar
        Permission::firstOrCreate(['name' => "Create category"]);
        Permission::firstOrCreate(['name' => "Edit category"]);
        Permission::firstOrCreate(['name' => "Delete category"]);
    }
}
