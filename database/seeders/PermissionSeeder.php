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
        // courses
        $permission = Permission::create(['name' => 'view-course', 'display_name' => 'View Course', 'module_name' => 'Course']);
        $permission = Permission::create(['name' => 'list-course', 'display_name' => 'list Course', 'module_name' => 'Course']);
        $permission = Permission::create(['name' => 'create-course', 'display_name' => 'Create Course', 'module_name' => 'Course']);
        $permission = Permission::create(['name' => 'update-course', 'display_name' => 'Edit Course', 'module_name' => 'Course']);
        $permission = Permission::create(['name' => 'delete-course', 'display_name' => 'Delete Course', 'module_name' => 'Course']);
        // subscription packages
        $permission = Permission::create(['name' => 'view-subscription', 'display_name' => 'View Subscription Package', 'module_name' => 'Subscription Package']);
        $permission = Permission::create(['name' => 'list-subscription', 'display_name' => 'list Subscription Package', 'module_name' => 'Subscription Package']);
        $permission = Permission::create(['name' => 'create-subscription', 'display_name' => 'Create Subscription Package', 'module_name' => 'Subscription Package']);
        $permission = Permission::create(['name' => 'update-subscription', 'display_name' => 'Edit Subscription Package', 'module_name' => 'Subscription Package']);
        $permission = Permission::create(['name' => 'delete-subscription', 'display_name' => 'Delete Subscription Package', 'module_name' => 'Subscription Package']);
        // student
        $permission = Permission::create(['name' => 'list-student', 'display_name' => 'list Student', 'module_name' => 'Student']);
        $permission = Permission::create(['name' => 'create-student', 'display_name' => 'Create Student', 'module_name' => 'Student']);
        $permission = Permission::create(['name' => 'update-student', 'display_name' => 'Edit Student', 'module_name' => 'Student']);
        $permission = Permission::create(['name' => 'delete-student', 'display_name' => 'Delete Student', 'module_name' => 'Student']);


        //website Dashboard
        $permission = Permission::create(['name' => 'website-dashboard', 'display_name' => 'Website Dashboard', 'module_name' => 'Website Dashbaord']);

        //website uni profile
        $permission = Permission::create(['name' => 'my-uni-app', 'display_name' => 'Profile View', 'module_name' => 'My Uni Profile']);
        $permission = Permission::create(['name' => 'personal-info', 'display_name' => 'Personal Information', 'module_name' => 'My Uni Profile']);
        $permission = Permission::create(['name' => 'professional-exp', 'display_name' => 'Professional Experience', 'module_name' => 'My Uni Profile']);
        $permission = Permission::create(['name' => 'test-language', 'display_name' => 'Test Language', 'module_name' => 'My Uni Profile']);
        $permission = Permission::create(['name' => 'store-documents', 'display_name' => 'Store Documents', 'module_name' => 'My Uni Profile']);
        // website my appications
        $permission = Permission::create(['name' => 'my-appications', 'display_name' => 'My Applications', 'module_name' => 'My Applications']);
    }
}
