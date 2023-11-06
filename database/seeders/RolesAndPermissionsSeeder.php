<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Check if the 'admin' role already exists for the 'web' guard
        if (!Role::where('name', 'admin')->where('guard_name', 'web')->exists()) {
            // The 'admin' role does not exist, so create it
            $adminRole = Role::create(['name' => 'admin', 'guard_name' => 'web']);

            // Example: Create a permission 'manage-users' and assign it to the 'admin' role
            $manageUsersPermission = Permission::create(['name' => 'manage-users']);
            $adminRole->givePermissionTo($manageUsersPermission);

            // You can create more permissions and assign them to the 'admin' role as needed
        }

        // Check if the 'user' role already exists for the 'web' guard
        if (!Role::where('name', 'user')->where('guard_name', 'web')->exists()) {
            // The 'user' role does not exist, so create it
            $userRole = Role::create(['name' => 'user', 'guard_name' => 'web']);

            // Example: Create a permission 'create-posts' and assign it to the 'user' role
            $createPostsPermission = Permission::create(['name' => 'create-posts']);
            $userRole->givePermissionTo($createPostsPermission);

            // You can create more permissions and assign them to the 'user' role as needed
        }

        // Create other roles and assign permissions as needed
        // Example: Create a 'moderator' role and assign a 'delete-posts' permission
        // $moderatorRole = Role::create(['name' => 'moderator', 'guard_name' => 'web']);
        // $deletePostsPermission = Permission::create(['name' => 'delete-posts']);
        // $moderatorRole->givePermissionTo($deletePostsPermission);
    }
}
