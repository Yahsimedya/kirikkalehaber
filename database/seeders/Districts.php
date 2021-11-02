<?php

namespace Database\Seeders;

use App\Models\District;
use Illuminate\Database\Seeder;
//use Illuminate\Support\Facades\DB;

class Districts extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        DB::table('districts')->delete();

        District::insert([
            0 => [

                'id' => 1,
                'district_tr' => 'Adana',
                'district_en' => 'Adana',
                'slug'=> 'adana',

            ],
            1 => [

                'id' => 2,
                'district_tr' => 'Adıyaman',
                'district_en' => 'Adıyaman',
                'slug'=> 'adiyaman',


            ],
            2 => [

                'id' => 3,
                'district_tr' => 'Afyonkarahisar',
                'district_en' => 'Afyonkarahisar',
                'slug'=> 'afyonkarahisar',


            ],
            3 => [

                'id' => 4,
                'district_tr' => 'Ağrı',
                'district_en' => 'Ağrı',
                'slug'=> 'agri',


            ],
            4 => [

                'id' => 5,
                'district_tr' => 'Amasya',
                'district_en' => 'Amasya',
                'slug'=> 'amasya',


            ],
            5 => [

                'id' => 6,
                'district_tr' => 'Ankara',
                'district_en' => 'Ankara',
                'slug'=> 'ankara',


            ],
            6 => [

                'id' => 7,
                'district_tr' => 'Antalya',
                'district_en' => 'Antalya',
                'slug'=> 'antalya',


            ],
            7 => [

                'id' => 8,
                'district_tr' => 'Artvin',
                'district_en' => 'Artvin',
                'slug'=> 'artvin',


            ],
            8 => [

                'id' => 9,
                'district_tr' => 'Aydın',
                'district_en' => 'Aydın',
                'slug'=> 'aydin',


            ],
            9 => [

                'id' => 10,
                'district_tr' => 'Balıkesir',
                'district_en' => 'Balıkesir',
                'slug'=> 'balikesir',


            ],
            10 => [

                'id' => 11,
                'district_tr' => 'Bilecik',
                'district_en' => 'Bilecik',
                'slug'=> 'bilecik',


            ],
            11 => [

                'id' => 12,
                'district_tr' => 'Bingöl',
                'district_en' => 'Bingöl',
                'slug'=> 'bingol',


            ],
            12 => [

                'id' => 13,
                'district_tr' => 'Bitlis',
                'district_en' => 'Bitlis',
                'slug'=> 'bitlis',


            ],
            13 => [

                'id' => 14,
                'district_tr' => 'Bolu',
                'district_en' => 'Bolu',
                'slug'=> 'bolu',


            ],
            14 => [

                'id' => 15,
                'district_tr' => 'Burdur',
                'district_en' => 'Burdur',
                'slug'=> 'burdur',


            ],
            15 => [

                'id' => 16,
                'district_tr' => 'Bursa',
                'district_en' => 'Bursa',
                'slug'=> 'bursa',


            ],
            16 => [

                'id' => 17,
                'district_tr' => 'Çanakkale',
                'district_en' => 'Çanakkale',
                'slug'=> 'canakkale',

            ],
            17 => [

                'id' => 18,
                'district_tr' => 'Çankırı',
                'district_en' => 'Çankırı',
                'slug'=> 'cankiri',
            ],
            18 => [

                'id' => 19,
                'district_tr' => 'Çorum',
                'district_en' => 'Çorum',
                'slug'=> 'corum',


            ],
            19 => [

                'id' => 20,
                'district_tr' => 'Denizli',
                'district_en' => 'Denizli',
                'slug'=> 'denizli',


            ],
            20 => [

                'id' => 21,
                'district_tr' => 'Diyarbakır',
                'district_en' => 'Diyarbakır',
                'slug'=> 'diyarbakir',


            ],
            21 => [

                'id' => 22,
                'district_tr' => 'Edirne',
                'district_en' => 'Edirne',
                'slug'=> 'edirne',


            ],
            22 => [

                'id' => 23,
                'district_tr' => 'Elazığ',
                'district_en' => 'Elazığ',
                'slug'=> 'elazig',

            ],
            23 => [

                'id' => 24,
                'district_tr' => 'Erzincan',
                'district_en' => 'Erzincan',
                'slug'=> 'erzincan',


            ],
            24 => [

                'id' => 25,
                'district_tr' => 'Erzurum',
                'district_en' => 'Erzurum',
                'slug'=> 'erzurum',


            ],
            25 => [

                'id' => 26,
                'district_tr' => 'Eskişehir',
                'district_en' => 'Eskişehir',
                'slug'=> 'eskisehir',


            ],
            26 => [

                'id' => 27,
                'district_tr' => 'Gaziantep',
                'district_en' => 'Gaziantep',
                'slug'=> 'gaziantep',


            ],
            27 => [

                'id' => 28,
                'district_tr' => 'Giresun',
                'district_en' => 'Giresun',
                'slug'=> 'giresun',


            ],
            28 => [

                'id' => 29,
                'district_tr' => 'Gümüşhane',
                'district_en' => 'Gümüşhane',
                'slug'=> 'gumushane',


            ],
            29 => [

                'id' => 30,
                'district_tr' => 'Hakkari',
                'district_en' => 'Hakkari',
                'slug'=> 'hakkari',


            ],
            30 => [

                'id' => 31,
                'district_tr' => 'Hatay',
                'district_en' => 'Hatay',
                'slug'=> 'hatay',


            ],
            31 => [

                'id' => 32,
                'district_tr' => 'Isparta',
                'district_en' => 'Isparta',
                'slug'=> 'isparta',


            ],
            32 => [

                'id' => 33,
                'district_tr' => 'Mersin',
                'district_en' => 'Mersin',
                'slug'=> 'mersin',

            ],
            33 => [

                'id' => 34,
                'district_tr' => 'İstanbul',
                'district_en' => 'İstanbul',
                'slug'=> 'istanbul',

            ],
            34 => [

                'id' => 35,
                'district_tr' => 'İzmir',
                'district_en' => 'İzmir',
                'slug'=> 'izmir',

            ],
            35 => [

                'id' => 36,
                'district_tr' => 'Kars',
                'district_en' => 'Kars',
                'slug'=> 'kars',

            ],
            36 => [

                'id' => 37,
                'district_tr' => 'Kastamonu',
                'district_en' => 'Kastamonu',
                'slug'=> 'kastamonu',

            ],
            37 => [

                'id' => 38,
                'district_tr' => 'Kayseri',
                'district_en' => 'Kayseri',
                'slug'=> 'kayseri',

            ],
            38 => [

                'id' => 39,
                'district_tr' => 'Kırklareli',
                'district_en' => 'Kırklareli',
                'slug'=> 'kirklareli',

            ],
            39 => [

                'id' => 40,
                'district_tr' => 'Kırşehir',
                'district_en' => 'Kırşehir',
                'slug'=> 'kirsehir',

            ],
            40 => [

                'id' => 41,
                'district_tr' => 'Kocaeli',
                'district_en' => 'Kocaeli',
                'slug'=> 'kocaeli',

            ],
            41 => [

                'id' => 42,
                'district_tr' => 'Konya',
                'district_en' => 'Konya',
                'slug'=> 'konya',

            ],
            42 => [

                'id' => 43,
                'district_tr' => 'Kütahya',
                'district_en' => 'Kütahya',
                'slug'=> 'kutahya',

            ],
            43 => [

                'id' => 44,
                'district_tr' => 'Malatya',
                'district_en' => 'Malatya',
                'slug'=> 'malatya',

            ],
            44 => [

                'id' => 45,
                'district_tr' => 'Manisa',
                'district_en' => 'Manisa',
                'slug'=> 'manisa',

            ],
            45 => [

                'id' => 46,
                'district_tr' => 'Kahramanmaraş',
                'district_en' => 'Kahramanmaraş',
                'slug'=> 'Kahramanmaras',

            ],
            46 => [

                'id' => 47,
                'district_tr' => 'Mardin',
                'district_en' => 'Mardin',
                'slug'=> 'mardin',

            ],
            47 => [

                'id' => 48,
                'district_tr' => 'Muğla',
                'district_en' => 'Muğla',
                'slug'=> 'mugla',


            ],
            48 => [

                'id' => 49,
                'district_tr' => 'Muş',
                'district_en' => 'Muş',
                'slug'=> 'muş',

            ],
            49 => [

                'id' => 50,
                'district_tr' => 'Nevşehir',
                'district_en' => 'Nevşehir',
                'slug'=> 'nevsehir',


            ],
            50 => [

                'id' => 51,
                'district_tr' => 'Niğde',
                'district_en' => 'Niğde',
                'slug'=> 'nigde',


            ],
            51 => [

                'id' => 52,
                'district_tr' => 'Ordu',
                'district_en' => 'Ordu',
                'slug'=> 'ordu',

            ],
            52 => [

                'id' => 53,
                'district_tr' => 'Rize',
                'district_en' => 'Rize',
                'slug'=> 'rize',


            ],
            53 => [

                'id' => 54,
                'district_tr' => 'Sakarya',
                'district_en' => 'Sakarya',
                'slug'=> 'sakarya',


            ],
            54 => [

                'id' => 55,
                'district_tr' => 'Samsun',
                'district_en' => 'Samsun',
                'slug'=> 'samsun',


            ],
            55 => [

                'id' => 56,
                'district_tr' => 'Siirt',
                'district_en' => 'Siirt',
                'slug'=> 'siirt',


            ],
            56 => [

                'id' => 57,
                'district_tr' => 'Sinop',
                'district_en' => 'Sinop',
                'slug'=> 'sinop',


            ],
            57 => [

                'id' => 58,
                'district_tr' => 'Sivas',
                'district_en' => 'Sivas',
                'slug'=> 'sivas',


            ],
            58 => [

                'id' => 59,
                'district_tr' => 'Tekirdağ',
                'district_en' => 'Tekirdağ',
                'slug'=> 'tekirdag',


            ],
            59 => [

                'id' => 60,
                'district_tr' => 'Tokat',
                'district_en' => 'Tokat',
                'slug'=> 'tokat',


            ],
            60 => [

                'id' => 61,
                'district_tr' => 'Trabzon',
                'district_en' => 'Trabzon',
                'slug'=> 'trabzon',


            ],
            61 => [

                'id' => 62,
                'district_tr' => 'Tunceli',
                'district_en' => 'Tunceli',
                'slug'=> 'tunceli',


            ],
            62 => [

                'id' => 63,
                'district_tr' => 'Şanlıurfa',
                'district_en' => 'Şanlıurfa',
                'slug'=> 'sanliurfa',

            ],
            63 => [

                'id' => 64,
                'district_tr' => 'Uşak',
                'district_en' => 'Uşak',
                'slug'=> 'usak',


            ],
            64 => [

                'id' => 65,
                'district_tr' => 'Van',
                'district_en' => 'Van',
                'slug'=> 'van',


            ],
            65 => [

                'id' => 66,
                'district_tr' => 'Yozgat',
                'district_en' => 'Yozgat',
                'slug'=> 'yozgat',


            ],
            66 => [

                'id' => 67,
                'district_tr' => 'Zonguldak',
                'district_en' => 'Zonguldak',
                'slug'=> 'zonguldak',


            ],
            67 => [

                'id' => 68,
                'district_tr' => 'Aksaray',
                'district_en' => 'Aksaray',
                'slug'=> 'aksaray',


            ],
            68 => [

                'id' => 69,
                'district_tr' => 'Bayburt',
                'district_en' => 'Bayburt',
                'slug'=> 'bayburt',


            ],
            69 => [

                'id' => 70,
                'district_tr' => 'Karaman',
                'district_en' => 'Karaman',
                'slug'=> 'karaman',


            ],
            70 => [

                'id' => 71,
                'district_tr' => 'Kırıkkale',
                'district_en' => 'Kırıkkale',
                'slug'=> 'kirikkale',


            ],
            71 => [

                'id' => 72,
                'district_tr' => 'Batman',
                'district_en' => 'Batman',
                'slug'=> 'batman',


            ],
            72 => [

                'id' => 73,
                'district_tr' => 'Şırnak',
                'district_en' => 'Şırnak',
                'slug'=> 'sirnak',


            ],
            73 => [

                'id' => 74,
                'district_tr' => 'Bartın',
                'district_en' => 'Bartın',
                'slug'=> 'bartin',


            ],
            74 => [

                'id' => 75,
                'district_tr' => 'Ardahan',
                'district_en' => 'Ardahan',
                'slug'=> 'ardahan',


            ],
            75 => [

                'id' => 76,
                'district_tr' => 'Iğdır',
                'district_en' => 'Iğdır',
                'slug'=> 'igdir',


            ],
            76 => [

                'id' => 77,
                'district_tr' => 'Yalova',
                'district_en' => 'Yalova',
                'slug'=> 'yalova',


            ],
            77 => [

                'id' => 78,
                'district_tr' => 'Karabük',
                'district_en' => 'Karabük',
                'slug'=> 'karabuk',

            ],
            78 => [

                'id' => 79,
                'district_tr' => 'Kilis',
                'district_en' => 'Kilis',
                'slug'=> 'kilis',

            ],
            79 => [

                'id' => 80,
                'district_tr' => 'Osmaniye',
                'district_en' => 'Osmaniye',
                'slug'=> 'osmaniye',

            ],
            80 => [

                'id' => 81,
                'district_tr' => 'Düzce',
                'district_en' => 'Düzce',
                'slug'=> 'duzce',


            ],
        ]);
    }
}
