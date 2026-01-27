<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call(RolePermissionSeeder::class);
        // Admin User
        // password  == password
        $admin = User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
        ]);

        $admin->assignRole('admin');

        // Editor User
        $admin = User::factory()->create([
            'name' => 'Editor',
            'email' => 'editor@example.com',
        ]);

        $admin->assignRole('editor');

        // Courier User
        $admin = User::factory()->create([
            'name' => 'Courier',
            'email' => 'courier@example.com',
        ]);

        $admin->assignRole('courier');

        // Customer User
        $admin = User::factory()->create([
            'name' => 'Customer',
            'email' => 'customer@example.com',
        ]);

        $admin->assignRole('customer');
    }
}
