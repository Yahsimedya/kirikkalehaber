<?php

namespace Database\Seeders;

use App\Models\Socials;
use Illuminate\Database\Seeder;

class SocialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Socials::create([
                'facebook'=>"",
                'twitter'=>"",
                'youtube'=>"",
                'linkedin'=>"",
                'instagram'=>"",
            ]

        );
    }
}
