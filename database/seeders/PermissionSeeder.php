<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // roles
        $permission = Permission::create(['name' => 'list-role', 'display_name' => 'list Role', 'module_name' => 'Role']);
        $permission = Permission::create(['name' => 'create-role', 'display_name' => 'Create Role', 'module_name' => 'Role']);
        $permission = Permission::create(['name' => 'update-role', 'display_name' => 'Edit Role', 'module_name' => 'Role']);
        $permission = Permission::create(['name' => 'delete-role', 'display_name' => 'Delete Role', 'module_name' => 'Role']);
        $permission = Permission::create(['name' => 'attach-permissions', 'display_name' => 'Attach Premissions', 'module_name' => 'Role']);
        $permission = Permission::create(['name' => 'role-permissions', 'display_name' => 'Role Permission', 'module_name' => 'Role']);
        $permission = Permission::create(['name' => 'revoke-permission', 'display_name' => 'Revoke Permission', 'module_name' => 'Role']);
        // permissions
        $permission = Permission::create(['name' => 'list-permission', 'display_name' => 'list Permission', 'module_name' => 'Permission']);
        $permission = Permission::create(['name' => 'create-permission', 'display_name' => 'Create Permission', 'module_name' => 'Permission']);
        $permission = Permission::create(['name' => 'update-permission', 'display_name' => 'Edit Permission', 'module_name' => 'Permission']);
        $permission = Permission::create(['name' => 'delete-permission', 'display_name' => 'Delete Permission', 'module_name' => 'Permission']);
        $permission = Permission::create(['name' => 'attach-role', 'display_name' => 'Attach Role', 'module_name' => 'Permission']);
        $permission = Permission::create(['name' => 'permission-roles', 'display_name' => 'Permission Role', 'module_name' => 'Permission']);
        $permission = Permission::create(['name' => 'revoke-role', 'display_name' => 'Revoke Role', 'module_name' => 'Permission']);
        // users
        $permission = Permission::create(['name' => 'view-user', 'display_name' => 'View User', 'module_name' => 'User']);
        $permission = Permission::create(['name' => 'list-user', 'display_name' => 'list User', 'module_name' => 'User']);
        $permission = Permission::create(['name' => 'create-user', 'display_name' => 'Create User', 'module_name' => 'User']);
        $permission = Permission::create(['name' => 'update-user', 'display_name' => 'Edit User', 'module_name' => 'User']);
        $permission = Permission::create(['name' => 'delete-user', 'display_name' => 'Delete User', 'module_name' => 'User']);
        $permission = Permission::create(['name' => 'user-role-permission', 'display_name' => 'User Role Permission List', 'module_name' => 'User']);
        $permission = Permission::create(['name' => 'assign-user-role', 'display_name' => 'Assign Role', 'module_name' => 'User']);
        $permission = Permission::create(['name' => 'revoke-user-role', 'display_name' => 'Revoke Role', 'module_name' => 'User']);
        $permission = Permission::create(['name' => 'assign-user-permisison', 'display_name' => 'Assign Permission', 'module_name' => 'User']);
        $permission = Permission::create(['name' => 'revoke-user-permisison', 'display_name' => 'REvoke Permission', 'module_name' => 'User']);
        // degrees
        $permission = Permission::create(['name' => 'list-degree', 'display_name' => 'list Degree', 'module_name' => 'Degree']);
        $permission = Permission::create(['name' => 'create-degree', 'display_name' => 'Create Degree', 'module_name' => 'Degree']);
        $permission = Permission::create(['name' => 'update-degree', 'display_name' => 'Edit Degree', 'module_name' => 'Degree']);
        $permission = Permission::create(['name' => 'delete-degree', 'display_name' => 'Delete Degree', 'module_name' => 'Degree']);
        // disciplines
        $permission = Permission::create(['name' => 'list-discipline', 'display_name' => 'list Discipline', 'module_name' => 'Discipline']);
        $permission = Permission::create(['name' => 'create-discipline', 'display_name' => 'Create Discipline', 'module_name' => 'Discipline']);
        $permission = Permission::create(['name' => 'update-discipline', 'display_name' => 'Edit Discipline', 'module_name' => 'Discipline']);
        $permission = Permission::create(['name' => 'delete-discipline', 'display_name' => 'Delete Discipline', 'module_name' => 'Discipline']);
        // study-models
        $permission = Permission::create(['name' => 'list-study-model', 'display_name' => 'list Study Model', 'module_name' => 'Study Model']);
        $permission = Permission::create(['name' => 'create-study-model', 'display_name' => 'Create Study Model', 'module_name' => 'Study Model']);
        $permission = Permission::create(['name' => 'update-study-model', 'display_name' => 'Edit Study Model', 'module_name' => 'Study Model']);
        $permission = Permission::create(['name' => 'delete-study-model', 'display_name' => 'Delete Study Model', 'module_name' => 'Study Model']);
        // univerisity
        $permission = Permission::create(['name' => 'list-university', 'display_name' => 'list University', 'module_name' => 'University']);
        $permission = Permission::create(['name' => 'create-university', 'display_name' => 'Create University', 'module_name' => 'University']);
        $permission = Permission::create(['name' => 'update-university', 'display_name' => 'Edit University', 'module_name' => 'University']);
        $permission = Permission::create(['name' => 'delete-university', 'display_name' => 'Delete University', 'module_name' => 'University']);
    }
}
