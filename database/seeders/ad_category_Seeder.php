<?php

namespace Database\Seeders;

use App\Models\AdCategory;
use Illuminate\Database\Seeder;

class ad_category_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AdCategory::insert([

            0 =>    ['id' => 1,

                'title' => '[Haber Detay ] İçerik Kare Reklam 250x250'],

            1 =>   ['id' => 2,

                'title' => '[Haber Detay] Kare Reklam Sağ Sütun sayfası 336x280'],

            2 =>  ['id' => 3,
                'title' => '[Haber Detay] Kare Reklam Sağ Sütun sayfası 336x280'],

            3 =>  ['id' => 4,
                'title' => 'Dikey Reklam 300x600'],

            4 =>  ['id' => 5,
                'title' => 'Dikey Reklam 120x600'],

            5 =>  ['id' => 6,
                'title' => 'Dikey Reklam 120x240'],

            6 =>  ['id' => 7,
                'title' => 'Dikey Reklam 160x600'],

            7 =>  ['id' => 8,
                'title' => 'Yatay Reklam 970x90	'],

            8 =>  ['id' => 9,
                'title' => '[Ana Sayfa]-Üst Blok Yatay Reklam 970x250'],

            9 =>  ['id' => 10,
                'title' => 'Kategori - Kare Reklam Kategori listeleme alanı 250x250'],

            10 =>  ['id' => 11,
                'title' => 'Kategori - Kare Reklam 200x200'],

            11 =>    ['id' => 12,
                'title' => '[Haber Detay] İçerik Altı 728x90'],

            12 =>   ['id' => 13,
                'title' => 'Kategori - Kare Reklam kategoriler sayfası 336x280'],

            13 =>  ['id' => 14,
                'title' => 'Kategori - slider altı Yatay reklam alanı (728x90 - 970x90 )'],

            14 =>  ['id' => 15,
                'title' => '[Ana Sayfa] Video Galeri Üstü 1140x90'],

            15 =>  ['id' => 16,
                'title' => '[Ana Sayfa] Yazarlar Üstü 1140x90'],

            16 =>  ['id' => 17,
                'title' => '[Ana Sayfa]- Sağ manşet Altı 336x280'],

            17 =>  ['id' => 18,
                'title' => '[Ana Sayfa] Yazarlar Altı 1140x90'],

            18 =>  ['id' => 19,
                'title' => '[Ana Sayfa] Ekonomi Haberleri Altı 1140x90'],

            19 =>  ['id' => 20,
                'title' => '[Ana Sayfa] Gündem Haberleri Altı 1140x90'],

            20 =>  ['id' => 21,
                'title' => '[Ana Sayfa] Siyaset Haberleri Altı 1140x90'],

            21 =>  ['id' => 22,
                'title' => '[Ana Sayfa] Spor Haberleri Slider Üstü 1140x90'],

            22 =>  ['id' => 23,
                'title' => '[Ana Sayfa] Spor Haberleri Slider Altı 830x90'],

            23 =>  ['id' => 24,
                'title' => '[Mobil Uygulama] Ana Sayfa En Üst 1140x90'],
            24 =>  ['id' => 25,
                'title' => '[Mobil Uygulama] Ana Sayfa Slider Alt 1140x90'],

            25 =>  ['id' => 26,
                'title' => '[Mobil Uygulama] Haber Detay Üst 1024x1024'],

            26 =>  ['id' => 27,
                'title' => '[Mobil Uygulama] Haber Detay Alt 1024x1024'],
        ]);
    }
}
