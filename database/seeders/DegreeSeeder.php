<?php

namespace Database\Seeders;

use App\Models\Degree;

use Illuminate\Database\Seeder;

class DegreeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Degree::create(['name' => 'BSCS', 'description' => 'bachleor in computer science', 'discipline_id' => 1]);
        Degree::create(['name' => 'BBA', 'description' => 'bachleor in business', 'discipline_id' => 2]);
        Degree::create(['name' => 'MSC', 'description' => 'Master in Computer Science', 'discipline_id' => 1]);
    }
}
