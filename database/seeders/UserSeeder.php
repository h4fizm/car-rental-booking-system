<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User; // pastikan model User sesuai namespace
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Admin
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password'), // ganti dengan yang lebih aman
        ]);
        $admin->assignRole('admin');

        // Operator
        $operator = User::create([
            'name' => 'Operator',
            'email' => 'operator@operator.com',
            'password' => Hash::make('password'),
        ]);
        $operator->assignRole('operator');

        // User (Staff)
        $user = User::create([
            'name' => 'User',
            'email' => 'user@user.com',
            'password' => Hash::make('password'),
        ]);
        $user->assignRole('user');
    }
}
