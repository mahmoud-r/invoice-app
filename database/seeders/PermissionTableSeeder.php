<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{

    public function run()
    {
        $permissions = [
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'show-Categories',
            'add-Categories',
            'edit-Categories',
            'delete-Categories',
            'show-products',
            'add-products',
            'edit-products',
            'delete-products',
            'show-invoices',
            'add-invoices',
            'Payment-invoices',
            'edit-invoices',
            'delete-invoices',
            'show-users',
            'create-users',
            'edit-users',
            'delete-users',

        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
