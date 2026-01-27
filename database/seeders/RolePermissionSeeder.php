<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;




class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
        // Create permissions
        $permissions = [
            'view users',
            'create users',
            'edit users',
            'delete users',
            'view categories',
            'create categories',
            'edit categories',
            'delete categories',
            // Add more permissions as needed
        ];
        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Create roles and assign  permissions
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $adminRole->givePermissionTo(Permission::all());
        $editorRole = Role::firstOrCreate(['name' => 'editor']);
        $editorRole->givePermissionTo([
            'view users',
            'view categories',
        ]);

        // $editorRole->givePermissionTo([
        //     'view users',
        //     'view categories',
        //     'create categories',
        //     'edit all categories',
        //     'delete all categories',
        // ]);
        $courierRole = Role::firstOrCreate(['name' => 'courier']);
        // courier have no permissions,they  can just read
        $customerRole = Role::firstOrCreate(['name' => 'customer']);
        // customer have no permissions, they can just read
    }
}
