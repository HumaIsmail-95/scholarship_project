<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DefaultUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $super_admin = User::create([
            'name' => 'super',
            'type' => 'super-admin',
            'email' => 'superAdmin@gmail.com',
            'password' => Hash::make(12345678)
        ]);
        $admin_role = Role::create(['name' => 'superAdmin']);
        $super_admin->assignRole($admin_role);
        $admin_role->givePermissionTo(Permission::all());
        User::create([
            'name' => 'admin',
            'type' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make(12345678)
        ])->assignRole('admin');
        User::create([
            'name' => 'student',
            'type' => 'student',
            'email' => 'student@gmail.com',
            'password' => Hash::make(12345678)
        ])->assignRole('student');
    }
}
