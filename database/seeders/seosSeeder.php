<?php

namespace Database\Seeders;

use App\Models\Seos;
use Illuminate\Database\Seeder;

class seosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Seos::create([



            'meta_author' => 'Admin',
            'meta_title' => 'admin@gmail.com',
            'meta_keyword' => 'Admin',
            'meta_description' => 'admin@gmail.com',
            'google_analytics' => 'Admin',
            'google_analytics' => 'admin@gmail.com',
            'google_verification' => 'Admin',
            'google_verification' => 'admin@gmail.com',

        ]);
    }
}
