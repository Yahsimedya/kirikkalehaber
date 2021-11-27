<?php

namespace Database\Seeders;

use App\Models\Theme;
use Illuminate\Database\Seeder;

class themeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Theme::create([
            'id' => 0,
            'header' => 0,
            'slider_title' => 0,
            'siteColorTheme' => '#ff0000',
            'economy' => "#4d9cbc",
            'agenda' => "#fd7e14",
            'politics' => "#fcd90f",
            'sport' => "#66a030",
        ]);
    }
}
