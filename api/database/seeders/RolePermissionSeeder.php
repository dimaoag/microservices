<?php

namespace Database\Seeders;

use App\Models\User\Role;
use App\Models\User\Permission;
use Illuminate\Database\Seeder;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        $permissions = Permission::all();

        $admin = Role::findOrFail(Role::ADMIN);
        $moderator = Role::findOrFail(Role::MODERATOR);
        $user = Role::findOrFail(Role::USER);

        foreach ($permissions as $permission) {
            $admin->permissions()->attach([
                'permission_id' => $permission->id,
            ]);

            if ($permission->name !== 'edit_roles') {
                $moderator->permissions()->attach([
                    'permission_id' => $permission->id,
                ]);
            }

            if (str_starts_with($permission->name, 'view')) {
                $user->permissions()->attach([
                    'permission_id' => $permission->id,
                ]);
            }
        }
    }
}
