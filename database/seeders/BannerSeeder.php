<?php

namespace Database\Seeders;

use App\Models\Banner;
use Illuminate\Database\Seeder;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Banner::create(['page_name' => 'home', 'image_url' => 'http://127.0.0.1:8000/public/website/assets/images/banner/b-1.jpg', 'image_folder' => 'banner', 'image_name' => 'banner']);
        Banner::create(['page_name' => 'home', 'image_url' => 'http://127.0.0.1:8000/public/website/assets/images/banner/b-1.jpg', 'image_folder' => 'banner', 'image_name' => 'banner']);
        Banner::create(['page_name' => 'home', 'image_url' => 'http://127.0.0.1:8000/public/website/assets/images/banner/b-1.jpg', 'image_folder' => 'banner', 'image_name' => 'banner']);

        Banner::create(['page_name' => 'privacy', 'image_url' => 'http://127.0.0.1:8000/public/website/assets/images/banner/b-1.jpg', 'image_folder' => 'banner', 'image_name' => 'banner']);
        Banner::create(['page_name' => 'about', 'image_url' => 'http://127.0.0.1:8000/public/website/assets/images/banner/b-1.jpg', 'image_folder' => 'banner', 'image_name' => 'banner']);
        Banner::create(['page_name' => 'all_courses', 'image_url' => 'http://127.0.0.1:8000/public/website/assets/images/banner/b-1.jpg', 'image_folder' => 'banner', 'image_name' => 'banner']);
        Banner::create(['page_name' => 'programs', 'image_url' => 'http://127.0.0.1:8000/public/website/assets/images/banner/b-1.jpg', 'image_folder' => 'banner', 'image_name' => 'banner']);
        Banner::create(['page_name' => 'blogs', 'image_url' => 'http://127.0.0.1:8000/public/website/assets/images/banner/b-1.jpg', 'image_folder' => 'banner', 'image_name' => 'banner']);
        Banner::create(['page_name' => 'universities', 'image_url' => 'http://127.0.0.1:8000/public/website/assets/images/banner/b-1.jpg', 'image_folder' => 'banner', 'image_name' => 'banner']);
        Banner::create(['page_name' => 'footer', 'image_url' => 'http://127.0.0.1:8000/public/website/assets/images/banner/b-1.jpg', 'image_folder' => 'banner', 'image_name' => 'banner']);
        Banner::create(['page_name' => 'logo', 'image_url' => 'http://127.0.0.1:8000/public/website/assets/images/banner/b-1.jpg', 'image_folder' => 'banner', 'image_name' => 'banner']);
        Banner::create(['page_name' => 'subscription', 'image_url' => 'http://127.0.0.1:8000/public/website/assets/images/banner/b-1.jpg', 'image_folder' => 'banner', 'image_name' => 'banner']);
    }
}
