<?php

namespace Database\Seeders;

use App\Models\StudyModel;
use Illuminate\Database\Seeder;

class StudyModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        StudyModel::create(['name' => '6 month semester', 'description' => '6 month program',]);
        StudyModel::create(['name' => '4 month semester', 'description' => '4 month program',]);
        StudyModel::create(['name' => '3 month course', 'description' => 'short course',]);
    }
}
