<?php

namespace Database\Seeders;

use App\Models\SubscriptionPackage;
use Illuminate\Database\Seeder;

class SubscriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SubscriptionPackage::create([
            'name' => 'silver', 'description' => 'this is a solver package',
            'price' => 50, 'coaching' => 0, 'program_no' => 3, 'status' => 1,
        ]);
        SubscriptionPackage::create([
            'name' => 'gold', 'description' => 'this is a gold package',
            'price' => 150, 'coaching' => 0, 'program_no' => 6, 'status' => 1,
        ]);
        SubscriptionPackage::create([
            'name' => 'plattinium', 'description' => 'this is a platinium package',
            'price' => 300, 'coaching' => 1, 'program_no' => 10, 'status' => 1,
        ]);
    }
}
