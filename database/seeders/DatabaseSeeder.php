<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            PermissionSeeder::class,
            RoleSeeder::class,
            CitySeeder::class,
            CountrySeeder::class,
            DefaultUserSeeder::class,
            DisciplineSeeder::class,
            DegreeSeeder::class,
            StudyModelSeeder::class,
            SettingsSeeder::class,
            SubscriptionSeeder::class,
            WebsitePageSeeder::class,
            BannerSeeder::class,
        ]);
    }
}
