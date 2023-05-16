<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'user-list',
            'user-create',
            'user-edit',
            'user-delete',
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'product-list',
            'product-create',
            'product-edit',
            'product-delete',
            'order-list',
            'order-create',
            'order-edit',
            'order-delete',
            'production-list',
            'production-create',
            'production-edit',
            'production-delete',
            'structure-list',
            'structure-create',
            'structure-edit',
            'structure-delete',
            'line-list',
            'line-create',
            'line-edit',
            'line-delete',
            'customer-list',
            'customer-create',
            'customer-edit',
            'customer-delete',
         ];

         foreach ($permissions as $permission) {
              Permission::create(['name' => $permission]);
         }
    }
}
