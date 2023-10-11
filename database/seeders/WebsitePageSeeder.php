<?php

namespace Database\Seeders;

use App\Models\WebsitePage;
use Illuminate\Database\Seeder;

class WebsitePageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        WebsitePage::create(['name' => 'home',]);
        WebsitePage::create(['name' => 'privacy',]);
        WebsitePage::create(['name' => 'about',]);
        WebsitePage::create(['name' => 'all_courses',]);
        WebsitePage::create(['name' => 'programs',]);
        WebsitePage::create(['name' => 'blogs',]);
        WebsitePage::create(['name' => 'universities',]);
        WebsitePage::create(['name' => 'footer',]);
        WebsitePage::create(['name' => 'subscription',]);
        WebsitePage::create(['name' => 'logo',]);
    }
}
