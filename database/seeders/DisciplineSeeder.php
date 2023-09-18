<?php

namespace Database\Seeders;

use App\Models\Discipline;
use Illuminate\Database\Seeder;

class DisciplineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Discipline::create(['name' => 'IT', 'description' => 'Information Technology',]);
        Discipline::create(['name' => 'Commerse', 'description' => 'business',]);
        Discipline::create(['name' => 'Arts', 'description' => 'arts and languages',]);
    }
}
