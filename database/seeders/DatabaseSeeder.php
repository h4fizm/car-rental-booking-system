<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\CarsTypesSeeder;
use Database\Seeders\CarsSeeder;
use Database\Seeders\OrdersSeeder;
use Database\Seeders\RolePermissionSeeder;
use Database\Seeders\UserSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            CarsTypesSeeder::class,
            CarsSeeder::class,
            OrdersSeeder::class,
            RolePermissionSeeder::class,
            UserSeeder::class,
        ]);
    }
}
