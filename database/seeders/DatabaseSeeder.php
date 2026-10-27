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
        // User::factory(10)->create();
        $this->call([
            UsersTableSeeder::class,
            CampusTableSeeder::class,
            LanguageTableSeeder::class,
            NationalityTableSeeder::class,
            SliderTableSeeder::class,
            BannerTableSeeder::class,
            AnnouncementTableSeeder::class,
            GenerateRouteTableSeeder::class,
            TestimonialTableSeeder::class,
            TranslatedTestimonialTableSeeder::class,
        ]);
    }
}
