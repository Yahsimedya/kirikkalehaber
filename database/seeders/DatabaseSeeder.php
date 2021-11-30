<?php

namespace Database\Seeders;

use Database\Seeders\GeozoneCitiesTableSeeder;
use Epigra\TrGeoZones\Nova\City;
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
        // TRgeozones paketi ülke il ve ilçeler içindir
        $this->call([
            Districts::class,
        ]);
        $this->call([
            UserSeeder::class,
        ]);
        $this->call([
            CategorySeeder::class,
        ]);
        $this->call([
            ad_category_Seeder::class,
        ]);

        $this->call([
            SubDistricts::class,
        ]);
        $this->call([
            websiteSettingSeeder::class,
        ]);
        $this->call([
            seosSeeder::class,
        ]);
        $this->call([
            SocialSeeder::class,
        ]); $this->call([
        Sehirlers::class,
    ]);$this->call([
        themeSeeder::class,
    ]);


    }
}
