<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // === ALL PERMISSIONS ===
        $permissions = [
            // USER
            'view dashboard',
            'view available cars',
            'create booking',
            'view own bookings',
            'view booking status',
            'view booking history',
            'edit own profile',

            // ADMIN
            'manage all cars',
            'manage all bookings',
            'approve booking',
            'reject booking',
            'monitor cars',
            'view all booking history',

            // CRUD USER (hanya admin)
            'view users',
            'create users',
            'edit users',
            'delete users',

            // OPERATOR
            'manage bookings',
            'monitor ongoing cars',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission, 'guard_name' => 'web']);
        }

        // === ROLES ===

        // USER
        $userRole = Role::firstOrCreate(['name' => 'user', 'guard_name' => 'web']);
        $userRole->syncPermissions([
            'view dashboard',
            'view available cars',
            'create booking',
            'view own bookings',
            'view booking status',
            'view booking history',
            'edit own profile',
        ]);

        // ADMIN
        $adminRole = Role::firstOrCreate(['name' => 'admin', 'guard_name' => 'web']);
        $adminRole->syncPermissions([
            'view dashboard',
            'manage all cars',
            'manage all bookings',
            'approve booking',
            'reject booking',
            'monitor cars',
            'view all booking history',
            'view users',
            'create users',
            'edit users',
            'delete users',
            'edit own profile',
        ]);

        // OPERATOR
        $operatorRole = Role::firstOrCreate(['name' => 'operator', 'guard_name' => 'web']);
        $operatorRole->syncPermissions([
            'view dashboard',
            'manage bookings',
            'approve booking',
            'reject booking',
            'monitor ongoing cars',
            'edit own profile',
        ]);
    }
}
