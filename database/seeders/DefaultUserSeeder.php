<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
        User::create([
            'name' => 'super',
            'type' => 'super-admin',
            'email' => 'superAdmin@gmail.com',
            'password' => Hash::make(12345678)
        ])->assignRole('superAdmin');
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
