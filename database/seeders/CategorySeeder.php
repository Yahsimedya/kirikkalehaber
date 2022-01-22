<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::insert([

            0 =>    ['id' => 1,
                'category_en' => '3. Page',
                'category_tr' => '3. Sayfa',
                'category_keywords' => '3. Sayfa',
                'category_description' => '3. Sayfa',
                'category_icon' => '',
                'category_status' => '1',
                'category_menu' => '1',
                'category_order' => '0'],

            1 =>   ['id' => 2,
                'category_en' => 'Agenda',
                'category_tr' => 'Gündem',
                'category_keywords' => 'Gündem',
                'category_description' => 'Gündem',
                'category_icon' => '',
                'category_status' => '1',
                'category_menu' => '1',
                'category_order' => '0'],

            2 =>  ['id' => 3,
                'category_en' => 'Politics',
                'category_tr' => 'Siyaset',
                'category_keywords' => 'Siyaset',
                'category_description' => 'Siyaset',
                'category_icon' => '',
                'category_status' => '1',
                'category_menu' => '1',
                'category_order' => '0'],

            3 =>  ['id' => 4,
                'category_en' => 'Education',
                'category_tr' => 'Eğitim',
                'category_keywords' => 'Eğitim',
                'category_description' => 'Eğitim',
                'category_icon' => '',
                'category_status' => '1',
                'category_menu' => '1',
                'category_order' => '0'],
            4 =>  ['id' => 5,
                'category_en' => 'Economy',
                'category_tr' => 'Ekonomi',
                'category_keywords' => 'Ekonomi',
                'category_description' => 'Ekonomi',
                'category_icon' => '',
                'category_status' => '1',
                'category_menu' => '1',
                'category_order' => '0'],
            5 =>  ['id' => 6,
                'category_en' => 'Sport',
                'category_tr' => 'Spor',
                'category_keywords' => 'Spor',
                'category_description' => 'Spor',
                'category_icon' => '',
                'category_status' => '1',
                'category_menu' => '1',
                'category_order' => '0'],
            6 =>  ['id' => 7,
                'category_en' => 'Health',
                'category_tr' => 'Sağlık',
                'category_keywords' => 'Sağlık',
                'category_description' => 'Sağlık',
                'category_icon' => '',
                'category_status' => '1',
                'category_menu' => '1',
                'category_order' => '0'],
            7 =>  ['id' => 8,
                'category_en' => 'Arts and Culture',
                'category_tr' => 'Kültür Sanat',
                'category_keywords' => 'Kültür Sanat',
                'category_description' => 'Kültür Sanat',
                'category_icon' => '',
                'category_status' => '1',
                'category_menu' => '1',
                'category_order' => '0'],
            8 =>  ['id' => 9,
                'category_en' => 'Technology',
                'category_tr' => 'Teknoloji',
                'category_keywords' => 'Teknoloji',
                'category_description' => 'Teknoloji',
                'category_icon' => '',
                'category_status' => '1',
                'category_menu' => '1',
                'category_order' => '0'],
            9 =>  ['id' => 10,
                'category_en' => 'Special News',
                'category_tr' => 'Özel Haber',
                'category_keywords' => 'Özel Haber',
                'category_description' => 'Özel Haber',
                'category_icon' => '',
                'category_status' => '1',
                'category_menu' => '1',
                'category_order' => '0'],
            10 =>  ['id' => 11,
                'category_en' => 'World',
                'category_tr' => 'Dünya',
                'category_keywords' => 'Dünya',
                'category_description' => 'Dünya',
                'category_icon' => '',
                'category_status' => '1',
                'category_menu' => '1',
                'category_order' => '0'],

        ]);
    }
}
