<?php

namespace Database\Seeders;

use App\Models\WebsiteSetting;
use Illuminate\Database\Seeder;

class websiteSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        WebsiteSetting::create([
            'logo' => 'Admin',
            'favicon' => 'Admin',
            'adress' => 'admin@gmail.com',
            'phone' => 'Admin',
            'email' => 'Admin',
            'about' => 'Admin',
            'defaultImage' => 'defaultImage',
        ]);
    }
}
