<?php

namespace App\Http\Controllers\Frontend;


use App\Http\Controllers\Controller;
use App\Models\Ad;
use App\Models\Authors;
use App\Models\AuthorsPost;
use App\Models\Comments;
use App\Models\District;
use App\Models\FixedPage;
use App\Models\Photo;
use App\Models\Photocategory;
use App\Models\Post;
use App\Models\PostTag;
use App\Models\Sehirler;
use App\Models\Seos;
use App\Models\Subcategory;
use App\Models\Subdistrict;
use App\Models\Tag;
use App\Models\Theme;
use App\Models\User;
use App\Models\Vakitler;
use App\Models\WebsiteSetting;
use Carbon\Carbon;
use GuzzleHttp\ClientInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Session;
use App\Models\Category;
use Illuminate\Support\Facades\Cache;

//use PublicApi;
class ExtraController extends Controller
{
//    public function GetSubDistrict($district_id)
//    {
//        $districts = Subdistrict::where('district_id',$district_id)->get();
//
//        return response()->json($districts);
//    }

public function redirect($slug){

    $r = $_SERVER['REQUEST_URI'];
    $r = explode('?', $r);
    $r = array_filter($r);
    $r = array_merge($r, array());
    $id = $r[0];
    $id = explode('-', $id);
    $id = array_filter($id);
    $id = array_merge($id, array());
    $idCount = count($id)-1;
    $alinanID=$id[$idCount];
    $replaced = Str::of($r[0])->replace('-'.$alinanID, '/'.$alinanID)->replace('/haber-', '');
    return Redirect::to($replaced.'/haberi');

}

    public function DBTrans()
    {


        ini_set('max_execution_time', 0);
        $habereski = DB::table('haber')->get();//eklenecek eski haber tablosu
        $yeniData = array();
        DB::beginTransaction();
        $savedcount = 0;
        $unsavedcount = 0;

        for ($i = 1; $i <= count($habereski) - 1; $i++) {
            if ($habereski[$i]->kategori_id == 9) {
                $newCategoryId = 2;
            } elseif (substr($habereski[$i]->kategori_id,0,2) == 10) {
                $newCategoryId = 6;
            } elseif (substr($habereski[$i]->kategori_id,0,2) == 11) {
                $newCategoryId = 2;
            } elseif (substr($habereski[$i]->kategori_id,0,2) == 13) {
                $newCategoryId = 5;
            } elseif (substr($habereski[$i]->kategori_id,0,2) == 36) {
                $newCategoryId = 11;
            } elseif (substr($habereski[$i]->kategori_id,0,2) == 38) {
                $newCategoryId = 3;
            } elseif (substr($habereski[$i]->kategori_id,0,2) == 39) {
                $newCategoryId = 7;
            } elseif (substr($habereski[$i]->kategori_id,0,2) == 49) {
                $newCategoryId = 9;
            } elseif (substr($habereski[$i]->kategori_id,0,2) == 51) {
                $newCategoryId = 4;
            } elseif (substr($habereski[$i]->kategori_id,0,2) == 52) {
                $newCategoryId = 8;
            } elseif (substr($habereski[$i]->kategori_id,0,2) == 64) {
                $newCategoryId = 10;
            }elseif (substr($habereski[$i]->kategori_id,0,2) == 66) {
                $newCategoryId = 1;
            }elseif (substr($habereski[$i]->kategori_id,0,2) == 67) {
                $newCategoryId = 2;
            }

            $newImagesroute = "storage/postimg/" . $habereski[$i]->haberfoto_resimyol;

            $yeniposts = Post::insert([
                "id" => $habereski[$i]->haber_id,
                "created_at" => $habereski[$i]->haber_zaman,
                "title_tr" => $habereski[$i]->haber_ad,
                "slug_tr" => $habereski[$i]->haber_seourl,
                "details_tr" => $habereski[$i]->haber_detay,
                "subtitle_tr" => $habereski[$i]->haber_spot,
                "title_en" => $habereski[$i]->haber_ad,
                "slug_en" => $habereski[$i]->haber_seourl,
                "details_en" => $habereski[$i]->haber_detay,
                "subtitle_en" => $habereski[$i]->haber_spot,
                "featured" => 1,
                "status" => 1,
                "posts_video" => $habereski[$i]->haber_video,
                "keywords_tr" => $habereski[$i]->haber_keyword,
                "keywords_en" => $habereski[$i]->haber_keyword,
                "image" => $newImagesroute,
                "manset" => 1,
                "surmanset" => $habereski[$i]->haber_surmanset,
                "description_tr" => $habereski[$i]->haber_description,
                "description_en" => $habereski[$i]->haber_description,
                "headline" => $habereski[$i]->haber_sondakika,
                "category_id" => $newCategoryId,
                "district_id" => 71,

            ]);
            if ($yeniposts > 0) {
                $savedcount++;
            } else {
                $unsavedcount++;
            }

        }
        if ($unsavedcount > 0) {
            DB::rollBack();
        } else {
            DB::commit();
        }
       // return $this->OldDBkoseyazisi();

    }

    public function OldDBkoseyazisi()
    {
        ini_set('max_execution_time', 0);
        $koseyazisieski = DB::table('kose_yazilari')->get();//eklenecek eski köşe yazıları tablosu
        $yeniData = array();
        DB::beginTransaction();
        $savedcount = 0;
        $unsavedcount = 0;

        for ($i = 1; $i <= count($koseyazisieski) - 1; $i++) {
            $yenikoseyazisi = AuthorsPost::insert([
                "id" => $koseyazisieski[$i]->koseyazisi_id,
                "authors_id" => 1,
                "text" => $koseyazisieski[$i]->koseyazisi_detay,
                "title" => $koseyazisieski[$i]->koseyazisi_baslik,
                "created_at" => $koseyazisieski[$i]->koseyazisi_zaman,
                "created_at" => $koseyazisieski[$i]->koseyazisi_zaman,
                "status" => $koseyazisieski[$i]->koseyazisi_durum == null ? 1 : $koseyazisieski[$i]->koseyazisi_durum,
                "image" => "",
                "keywords" => $koseyazisieski[$i]->koseyazisi_keyword,
                "description" => $koseyazisieski[$i]->koseyazisi_description,
            ]);
            if ($yenikoseyazisi > 0) {
                $savedcount++;
            } else {
                $unsavedcount++;
            }

        }
        if ($unsavedcount > 0) {
            DB::rollBack();
        } else {
            DB::commit();
        }
        return "Veri taşıma başarılı";

    }


    public function PhotoGalleryDetail($photogalery)
    {
        $category = Photo::leftjoin('photocategories', 'photos.photocategory_id', '=', 'photocategories.id')
            ->select(['photos.*', 'photocategories.id', 'photocategories.category_title'])
            ->where('photos.photocategory_id', $photogalery)
            ->first();
        $photos = Photo::leftjoin('photocategories', 'photos.photocategory_id', '=', 'photocategories.id')
            ->select(['photos.*', 'photocategories.id', 'photocategories.category_title'])
            ->where('photos.photocategory_id', $photogalery)
            ->get();
        $relatedgalery = Photo::where('status', 1)->skip(1)->take(10)->groupBy('photocategory_id')->latest()->get();

//    $relatedgalery =Photo::leftjoin('photocategories','photos.photocategory_id','=','photocategories.id')
//        ->select(['photos.*','photocategories.id','photocategories.category_title'])
//        ->where('photos.photocategory_id',$photogalery)->where('photos.photocategory_id','!=',$photos->photocategory_id)->groupBy('photocategory_id')
//        ->get();

        return view('main.body.foto_galery', compact('photos', 'category', 'relatedgalery'));
    }

    public function Etiket($name, $id)
    {

        $tagPosts = Post::leftjoin('post_tags', 'posts.id', 'post_tags.post_id')
            ->leftjoin('tags', 'tags.id', 'post_tags.tag_id')
            ->leftjoin('categories', 'posts.category_id', '=', 'categories.id')
            ->select(['posts.*', 'post_tags.post_id', 'tags.id', 'tags.name', 'categories.id'])
            ->groupBy('post_tags.post_id')
            ->where('post_tags.tag_id', $id)->where('status', 1)->latest()
            ->get();
//       echo $category = $tagPosts->category_id;
//        foreach ($category as $object){
//         $object->title;
//        }
        $nextnews = Post::leftjoin('post_tags', 'posts.id', 'post_tags.post_id')
            ->leftjoin('tags', 'tags.id', 'post_tags.tag_id')
            ->leftjoin('categories', 'posts.category_id', '=', 'categories.id')
            ->select(['posts.*', 'post_tags.post_id', 'tags.id', 'tags.name', 'categories.id'])
            ->groupBy('posts.id')
            ->where('post_tags.tag_id', $id)->where('status', 1)->whereDate('posts.created_at', '>', \Carbon\Carbon::parse()->now()->subYear())
            ->inRandomOrder()
            ->get();
        $count = Post::leftjoin('post_tags', 'posts.id', 'post_tags.post_id')
            ->leftjoin('tags', 'tags.id', 'post_tags.tag_id')
            ->select(['posts.*', 'post_tags.post_id', 'tags.id', 'tags.name'])
            ->where('post_tags.tag_id', $id)->latest()
            ->count();
        $ads = Ad::leftjoin('ad_categories', 'ads.category_id', '=', 'ad_categories.id')
//            ->join('ads','ad_categories.id','ads.category_id')
            ->select(['ads.*', 'ad_categories.id'])
            ->where('status', 1)
            ->whereIN('ad_categories.id', [1, 2, 3, 12]) // ad_categories tablosunda bulunan ve haber detayda görünmesi gereken id'ler
            ->get();
        return view('main.body.tags', compact('tagPosts', 'count', 'nextnews', 'ads'));
    }

    public function feed()
    {


        $seoset = Seos::first();

        $posts = Post::leftjoin('categories', 'posts.category_id', '=', 'categories.id')
            ->leftjoin('subcategories', 'posts.subcategory_id', '=', 'subcategories.id')
            ->leftjoin('districts', 'posts.district_id', '=', 'districts.id')
            ->leftjoin('subdistricts', 'posts.subdistrict_id', 'subdistricts.id')
            ->select(['posts.*', 'categories.category_tr', 'districts.district_tr', 'subdistricts.subdistrict_tr'])
            ->latest('created_at')->where('status', 1)->limit(50)
            ->get();
        return response()->view('main.body.feed', compact('posts', 'seoset'))->header('Content-Type', 'application/xml');

    }

    public function GetAllDistrict()
    {
     $siteSetting=Theme::latest('id')->get();

        return view('main.body.turkey_map',compact('siteSetting'));
    }

    public function GetDistrict($id) // türkiye haritasında illere tıkladığında il detay sayfasına gider
    {


        $sehirsay = Post::leftjoin('categories', 'posts.category_id', '=', 'categories.id')
            ->leftjoin('subcategories', 'posts.subcategory_id', '=', 'subcategories.id')
            ->leftjoin('districts', 'posts.district_id', '=', 'districts.id')
            ->leftjoin('subdistricts', 'posts.subdistrict_id', 'subdistricts.id')
            ->where('districts.slug', $id)
            ->select(['posts.*', 'categories.category_tr', 'districts.district_tr', 'subdistricts.subdistrict_tr'])
            ->latest('created_at')
            ->count();

        $sehir = District::where('slug', $id)
            ->first();


        $districts = Post::leftjoin('categories', 'posts.category_id', '=', 'categories.id')
            ->leftjoin('subcategories', 'posts.subcategory_id', '=', 'subcategories.id')
            ->leftjoin('districts', 'posts.district_id', '=', 'districts.id')
            ->leftjoin('subdistricts', 'posts.subdistrict_id', 'subdistricts.id')
            ->where('districts.slug', $id)
            ->select(['posts.*', 'categories.category_tr', 'districts.district_tr', 'districts.district_keywords', 'districts.district_description', 'subdistricts.subdistrict_tr'])
            ->latest('created_at')->limit(50)
            ->get();

        $subdistricts = Subdistrict::leftjoin('districts', 'districts.id', '=', 'subdistricts.district_id')
            ->where('districts.slug', $id)
            ->get();
        $alldistrict = District::get();

        return view('main.body.district', compact('districts', 'sehir', 'sehirsay', 'subdistricts', 'alldistrict'));
    }

    //
    /*   public function English()
       {
           Session::get('lang');
           Session()->forget('lang');
           Session()->put('lang', 'english');
           return Redirect()->back();
       }

       public function Turkish()
       {
           Session::get('lang');
           Session()->forget('lang');
           Session()->put('lang', 'turkish');
           return Redirect()->back();
       }
   */

//    public function Categories()
//    {
//        $data = Category::latest()->get();
//        $websetting =WebsiteSetting::first();
//
////        View::composer('main.body.header', function ($view) {
////            //
////            $view->with('websetting');
////        });
//        return view('main.body.header',compact('data','websetting'));
//
//    }

    public function Home()
    {


        $sondakika = Cache::remember("headline", Carbon::now()->addYear(), function () {
            if (Cache::has('headline')) return Cache::has('headline');
            return Post::where('posts.headline', 1)
                ->where('created_at', '>', Carbon::now()->subDay(1))
                ->where('status', 1)
                ->limit(5)
                ->get();
        });

        $ch = curl_init();
        curl_setopt_array($ch, [
            CURLOPT_URL => 'https://finans.truncgil.com/today.json',
            CURLOPT_RETURNTRANSFER => true,
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false),

        ]);
        $output = curl_exec($ch);
        curl_close($ch);

        $result = json_decode($output, true);


        function degistir($string)
        {
            $string = str_replace('%', '', $string);

            return $string;
        }

        $kurlar = [
            'DOLAR' => [
                'oran' => $result['USD']['Değişim'],
                'oranyonu' => str_replace(',', '.', degistir($result['USD']['Değişim'])),
//                    'alis' => $usd['Buy'],
                'satis' => str_replace(',', '.', $result['USD']['Satış'])

            ],
            'EURO' => [
                'oran' => $result['EUR']['Değişim'],
                'oranyonu' => str_replace(',', '.', degistir($result['EUR']['Değişim'])),
//                    'alis' => $usd['Buy'],
                'satis' => str_replace(',', '.', degistir($result['EUR']['Satış']))
            ],
            'ALTIN' => [
                'oran' => $result['gram-altin']['Değişim'],
                'oranyonu' => $result['gram-altin']['Değişim'],
//                    'alis' => $usd['Buy'],
                'satis' => str_replace(',', '.', degistir($result['gram-altin']['Satış']))

            ],
            'ceyrekaltin' => [
                'oran' => $result['ceyrek-altin']['Değişim'],
                'oranyonu' => $result['ceyrek-altin']['Değişim'],
//                    'alis' => $usd['Buy'],
                'satis' => str_replace(',', '.', degistir($result['ceyrek-altin']['Satış']))
            ]
        ];

        $date = Carbon::now()->format('d.m.Y');

        $vakit=Vakitler::where('date',$date)->get();

        $vakitler = array(
            "imsak" => $vakit[0]['imsak'],
            "gunes" => $vakit[0]['gunes'],
            "ogle" => $vakit[0]['ogle'],
            "ikindi" => $vakit[0]['ikindi'],
            "aksam" => $vakit[0]['aksam'],
            "yatsi" => $vakit[0]['yatsi'],
        );
        Session::put('vakitler', $vakitler);


//dd($kurlar);
        Session::put('kurlar', $kurlar);

        $video_gallary = Post::where('posts_video', '!=', NULL)->latest('created_at')->limit(5)->get();

//        $home =
////            Cache::remember("home", Carbon::now()->addYear(), function () {
////            if (Cache::has('home')) return Cache::has('home');
//            Post::leftjoin('categories', 'posts.category_id', '=', 'categories.id')
//                ->leftjoin('subcategories', 'posts.subcategory_id', '=', 'subcategories.id')
//                ->leftjoin('districts', 'posts.district_id', '=', 'districts.id')
//                ->leftjoin('subdistricts', 'posts.subdistrict_id', 'subdistricts.id')
//                ->select(['posts.*', 'categories.category_tr', 'districts.district_tr', 'subdistricts.subdistrict_tr'])
//                ->where('status', 1)->latest('created_at')
//                ->get();
////            });

        $home = Cache::remember("home", Carbon::now()->addYear(), function () {
            if (Cache::has('home')) return Cache::has('home');
            return Post::where('status', 1)
                ->latest('created_at')
                ->get();
        });

//        $surmanset =
////            Cache::remember("surmanset", Carbon::now()->addYear(), function () {
////            if (Cache::has('surmanset')) return Cache::has('surmanset');
//            Post::leftjoin('categories', 'posts.category_id', '=', 'categories.id')
//                ->leftjoin('subcategories', 'posts.subcategory_id', '=', 'subcategories.id')
//                ->leftjoin('districts', 'posts.district_id', '=', 'districts.id')
//                ->leftjoin('subdistricts', 'posts.subdistrict_id', 'subdistricts.id')
//                ->select(['posts.*', 'categories.category_tr', 'districts.district_tr', 'subdistricts.subdistrict_tr'])
//                ->where('status', 1)->latest('created_at')->limit(4)
//                ->get();
////            });

        $surmanset = Cache::remember("surmanset", Carbon::now()->addYear(), function () {
            if (Cache::has('surmanset')) return Cache::has('surmanset');
            return Post::where('status', 1)
                ->where('surmanset', 1)
                ->with('category')
                ->limit(4)
                ->latest('created_at')
                ->get();
        });

        $sagmanset = Cache::remember("sagmanset", Carbon::now()->addYear(), function () {
            if (Cache::has('sagmanset')) return Cache::has('sagmanset'); //here am simply trying Laravel Collection method -find

            return Post::whereIn('category_id', [1, 2, 3])->where('status', 1)->latest('created_at')->limit(15)->get();
        });

        $sehir = Cache::remember("sehir", Carbon::now()->addYear(), function () {
            if (Cache::has('sehir')) return Cache::has('sehir');
            return Sehirler::orderByRaw('sehir_ad')->get();
        });
//        $category = Category::latest()->get();
//        dd($category->id);
//        foreach ($category as $cat) {
//            $economy = Post::get();
//        }
        $ekonomi = Cache::remember("ekeonomi", Carbon::now()->addYear(), function () {
            if (Cache::has('ekeonomi')) return Cache::has('ekeonomi');
            return Post::where('category_id', 5)->where('status', 1)->limit(9)->latest('created_at')->get();

        });

        $gundem = Cache::remember("gundem", Carbon::now()->addYear(), function () {
            if (Cache::has('gundem')) return Cache::has('gundem');
            return Post::where('category_id', '=', 2)->where('status', 1)->limit(9)->latest('created_at')->get();
        });

        $siyaset = Cache::remember("siyaset", Carbon::now()->addYear(), function () {
            if (Cache::has('siyaset')) return Cache::has('siyaset');
            return Post::where('category_id', '=', 3)->where('status', 1)->limit(9)->latest('created_at')->get();
        });

        $spor = Cache::remember("spor", Carbon::now()->addYear(), function () {
            if (Cache::has('spor')) return Cache::has('spor');
            return Post::where('category_id', '=', 6)->where('status', 1)->limit(6)->latest('created_at')->get();
        });
        $themeSetting = Cache::remember("themeSetting", Carbon::now()->addYear(), function () {
            if (Cache::has('themeSetting')) return Cache::has('themeSetting');
            return Theme::get();
        });
        $authors = Cache::remember("authors", Carbon::now()->addYear(), function () {
            if (Cache::has('authors')) return Cache::has('authors');
            return Authors::leftjoin('authors_posts', 'authors.id', '=', 'authors_posts.authors_id')
                ->select(['authors.*', 'authors_posts.title'])
                ->latest('created_at')->where('authors.status', 1)->where('authors_posts.status', 1)
                ->groupBy("authors.id")->latest("authors_posts.id")
                ->get();
        });
        $ads = Cache::remember("ads", Carbon::now()->addYear(), function () {
            if (Cache::has('ads')) return Cache::has('ads');
            return Ad::leftjoin('ad_categories', 'ads.category_id', '=', 'ad_categories.id')
//            ->join('ads','ad_categories.id','ads.category_id')
                ->select(['ads.*', 'ad_categories.id'])
                ->where('status', 1)
                ->whereIN('ad_categories.id', [9, 15, 16, 17, 18, 19, 20, 21, 22, 23]) // ad_categories tablosunda bulunan ve haber detayda görünmesi gereken id'ler
                ->get();

        });

        $seoset = Cache::remember("seoset", Carbon::now()->addYear(), function () {
            if (Cache::has('seoset')) return Cache::has('seoset');
            return Seos::first();
        });
        $mgm = file_get_contents("https://www.mgm.gov.tr/FTPDATA/analiz/GunlukTahmin.xml");
        $veri = simplexml_load_string($mgm);
        $json = json_encode($veri);
        $array = json_decode($json, TRUE);
        $gelenil = "KIRIKKALE";
        $bul = $gelenil;
        $bulunacak = array('ç', 'Ç', 'ı', 'ğ', 'Ğ', 'ü', 'İ', 'ö', 'Ş', 'ş', 'Ö', 'Ü', ',', ' ', '(', ')', '[', ']');
        $degistir = array('c', 'C', 'i', 'g', 'G', 'u', 'I', 'o', 'S', 's', 'O', 'U', '', '_', '', '', '', '');
        $sonuc = str_replace($bulunacak, $degistir, $bul);
        $sonuc;
        function cevir($string)
        {

            $string = str_replace("SCK", "Sıcak", $string);
            $string = str_replace("AB", "Az Bulutlu", $string);
            $string = str_replace("HSY", "Hafif Sağnak Yağış", $string);
            $string = str_replace("PB", "Parçalı Bulutlu", $string);
            $string = str_replace("GSY", "Gökgürltülü Sağnak Yağışlı", $string);
            $string = str_replace("KGY", "Kuvvetli Gökgürltülü Sağnak Yağışlı", $string);
            $string = str_replace("MSY", "Mevzi Sağnak Yağışlı", $string);

            return $string;
        }

//        dd($array);

        foreach ($array['Merkez'] as $data) {
            if ($data['ilEn'] == $sonuc) {
                if ($data['d1'] == "GSY") {
                    $icon = '<i  style="font-size: 20px;" class="wi wi-night-thunderstorm"></i>';
                } elseif ($data['d1'] == "SCK") {
                    $icon = '<i  style="font-size: 20px;" class="wi wi-day-sunny"></i>';
                } elseif ($data['d1'] == "KGY") {
                    $icon = '<i  style="font-size: 20px;" class="wi wi-night-thunderstorm"></i>';
                } elseif ($data['d1'] == "AB") {
                    $icon = '<i  style="font-size: 20px;" class="wi wi-night-partly-cloudy"></i>';
                } elseif ($data['d1'] == "PB") {
                    $icon = '<i  style="font-size: 20px;" class="wi wi-day-cloudy-windy"></i>';
                } elseif ($data['d1'] == "HSY") {
                    $icon = '<i  style="font-size: 20px;" class="wi wi-day-rain"></i>';
                } elseif ($data['d1'] == "MSY") {
                    $icon = '<i  style="font-size: 20px;" class="wi wi-day-showers"></i>';
                } elseif ($data['d1'] == "A") {
                    $icon = '<i  style="font-size: 20px;" class="wi wi-day-sunny"></i>';
                } elseif ($data['d1'] == "CB") {
                    $icon = '<i  style="font-size: 20px;" class="wi wi-cloudy"></i>';
                } elseif ($data['d1'] == "SIS") {
                    $icon = '<i  style="font-size: 20px;" class="wi wi-fog"></i>';
                }elseif ($data['d1'] == "R") {
                    $icon = '<i  style="font-size: 20px;" class="wi wi-fog"></i>';
                } else {
                     $icon = '<i  style="font-size: 20px;" class="wi wi-strong-wind"></i>';
                }


                $day1 = $data['makk1'];


            }
        }

        $veri = array(
            'gelenil' => $gelenil,
            'sicaklik' => $day1,
//            'icon' =>$icon,
        );

        Session::put('icon', $icon);
        Session::put('gelenil', $gelenil);

        Session::put('havadurumu', $veri['sicaklik']);

        return view('main.home', compact('home', 'ekonomi', 'surmanset', 'gundem', 'spor', 'siyaset', 'sagmanset', 'themeSetting', 'sondakika', 'sehir', 'authors', 'ads', 'seoset', 'video_gallary'));
//        return view('main.home_master', compact('seoset'))
//        return view('main.body.header', compact('vakitler'));

    }

    public function SinglePost($slug, $id)
    {

//        $post = Cache::remember("post.{$id}", Carbon::now()->addYear(), function () use ($id) {
//             if (Cache::has('post')) return Cache::has('post')->find($id); //here am simply trying Laravel Collection method -find
//             return Post::leftjoin('categories', 'posts.category_id', '=', 'categories.id')
//                 ->leftjoin('subcategories', 'posts.subcategory_id', '=', 'subcategories.id')
//                 ->leftjoin('districts', 'posts.district_id', '=', 'districts.id')
//                 ->leftjoin('subdistricts', 'posts.subdistrict_id', '=','subdistricts.id')
////                 ->join('users', 'posts.user_id','=', 'users.id')
//                 ->select(['posts.*', 'categories.category_tr', 'categories.category_en','categories.id', 'subcategories.subcategory_tr', 'subcategories.subcategory_en'
//                     ])
//                 ->latest('created_at')->where('status','=', 1)
//                 ->where('posts.id','=', $id)->first();
//         });

//        $post = Post::latest('created_at')->where('status', '=', 1)
//                ->where('id', '=', $id)->first();
        $post = Post::find($id);
        $comments = Comments::where('posts_id', $id)->where('status', 1)->get();

//dd($comments);
//        $slider =  Post::latest('created_at')
//            ->where('status', 1)->where('category_id', $post->category_id)
//            ->offset(1)->limit(10)
//            ->get();
        $slider = Post::latest('created_at')
            ->with('category')
            ->limit(10)
            ->get();

        $ads =
//            Ad::leftjoin('ad_categories', 'ads.category_id', '=', 'ad_categories.id')
////            ->join('ads','ad_categories.id','ads.category_id')
//            ->select(['ads.*', 'ad_categories.id'])
//            ->where('status', 1)
//            ->whereIN('ad_categories.id', [1, 2, 3, 12]) // ad_categories tablosunda bulunan ve haber detayda görünmesi gereken id'ler
//            ->get();
            Ad::latest('created_at')
                ->where('status', 1)
                ->whereIn('id', [1, 2, 3, 12])
                ->with('adcategory')
                ->get();
        $related =
            Post::leftjoin('post_tags', 'posts.id', 'post_tags.post_id')
                ->leftjoin('tags', 'post_tags.tag_id', 'tags.id')
                ->select(['posts.*', 'post_tags.post_id', 'tags.id', 'tags.name'])
                ->where('posts.id', $id)->latest()
                ->limit(10)
                ->get();
//            Post::
//                with('tags')
//                ->find($id)
//                ->latest()
//                ->limit(10)
//                ->get();
//        dd($related);
        $random = Post::inRandomOrder()->limit(3)->get();

//        $tag = Tag::get();
//        foreach ($tag as $item) {
        $nextrelated =
//                Post::leftjoin('post_tags', 'posts.id', 'post_tags.post_id')
//                    ->leftjoin('tags', 'tags.id', 'post_tags.tag_id')
//                    ->select(['posts.*', 'post_tags.post_id', 'tags.id', 'tags.name'])
//                    ->where('post_tags.tag_id', $item->id)->latest()
//                    ->get();
            Post::latest('created_at')
                ->where('id', $id)
                ->with(['tag' => function ($query) {
                    // $query->sum('quantity');
                    $query->select('name'); // without `order_id`
                }
                ])
                ->get();

//            $nextrelated = Post::leftjoin('post_tags','posts.id','post_tags.post_id')
//                ->leftjoin('tags','tags.id','post_tags.tag_id')
//                ->select(['posts.*','post_tags.post_id','tags.name'])
//                ->get();
//        }

//        $related= $post->posttags()->post_id;
//        $related=$this->belongsToMany(Post::class, 'post_tags', 'tags');
        $seoset = Seos::first();
        return view('main.body.single_post', compact('post', 'ads', 'random', 'slider', 'related', 'nextrelated', 'comments', 'id','seoset'));


    }

    //Fixed Page Open
    public function Sayfa($id)
    {
        $fixedPage = DB::table('fixedpage')->where('id', '=', $id)->get();

        return view('main.body.fixedpapers', compact('fixedPage'));
    }


    public function CategoryPost($slug,$id)
    {
        $category = Category::latest()->where('id', $id)->orderBy('id', 'desc')->first();


        $manset =
            Post::join('categories', 'posts.category_id', 'categories.id')
                ->select('posts.*', 'categories.category_tr', 'categories.category_en')
                ->where('posts.category_id', $id)->where('posts.manset', 1)
                ->orderBy('created_at', 'desc')
                ->limit(25)->get();


        $count = Post::join('categories', 'posts.category_id', 'categories.id')
            ->select('posts.*', 'categories.category_tr', 'categories.category_en')
            ->where('posts.category_id', $id)
            ->count();


        $catpost = Post::join('categories', 'posts.category_id', 'categories.id')
            ->select('posts.*', 'categories.category_tr', 'categories.category_en')
            ->where('posts.category_id', $id)->orWhere('posts.manset', NULL)->offset(1)
            ->paginate(20);


//        if ($catpost->count() == 0) {
//            return redirect('/');
//        }
        $nextnews = Post::join('categories', 'posts.category_id', 'categories.id')
            ->select('posts.*', 'categories.category_tr', 'categories.category_en')
            ->where('posts.category_id', $id)->whereDate('posts.created_at', '>', \Carbon\Carbon::parse()->now()->subYear())
            ->inRandomOrder()->limit(10)
            ->get();

        return view('main.body.category_post', compact('manset', 'category', 'catpost', 'nextnews', 'count'));


    }

    public function search(Request $request)
    {


        $searchText = $request['searchtext'];
        $json = Post::orWhere('title_tr', 'LIKE', '%' . $searchText . '%')->orWhere('title_en', 'LIKE', '%' . $searchText . '%')->orWhere('subtitle_tr', 'LIKE', '%' . $searchText . '%')->orWhere('subtitle_en', 'LIKE', '%' . $searchText . '%')->get();
        $searchNews = $this->change($json);

        return \view('main.body.search', compact('searchNews'));
    }


    function change($json)
    {
        $json = json_decode(str_replace("&ccedil;", 'ç', json_encode($json)));
        $json = json_decode(str_replace("&ccedil;", 'ç', json_encode($json)));
        $json = json_decode(str_replace("&yacute;", "ı", json_encode($json)));
        $json = json_decode(str_replace("&Ccedil;", "Ç", json_encode($json)));
        $json = json_decode(str_replace("&Ouml;", "Ö", json_encode($json)));
        $json = json_decode(str_replace("&Yacute;", "Ü", json_encode($json)));
        $json = json_decode(str_replace("&ETH;", "Ğ", json_encode($json)));
        $json = json_decode(str_replace("&THORN;", "Ş", json_encode($json)));
        $json = json_decode(str_replace("&Yacute;", "İ", json_encode($json)));
        $json = json_decode(str_replace("&ouml;", "ö", json_encode($json)));
        $json = json_decode(str_replace("&thorn;", "ş", json_encode($json)));
        $json = json_decode(str_replace("&eth;", "ğ", json_encode($json)));
        $json = json_decode(str_replace("&uuml;", "ü", json_encode($json)));
        $json = json_decode(str_replace("&Uuml;", "Ü", json_encode($json)));
        $json = json_decode(str_replace("&rsquo;", "’", json_encode($json)));
        $json = json_decode(str_replace("&yacute;", "ı", json_encode($json)));
        $json = json_decode(str_replace("&amp;", "&", json_encode($json)));
        $json = json_decode(str_replace("&nbsp;", "", json_encode($json)));
        $json = json_decode(str_replace("&ldquo;", "“", json_encode($json)));
        $json = json_decode(str_replace("&rdquo;", "”", json_encode($json)));
        $json = json_decode(str_replace("&#65279", "", json_encode($json)));
        $json = json_decode(str_replace("&#39;", "'", json_encode($json)));
        $json = json_decode(str_replace("&quot;", "“", json_encode($json)));
        return $json;
    }

    public function TumKategoriler()
    {
        $allcategories =  Category::get();

        return view('main.body.allcategories', compact('allcategories'));
    }


//    public function yazilar($id)
//    {
//
//        $yazi = AuthorsPost::where('authors_id', '=', $id)->limit(10)->get();
//        $yazar = Authors::where('id', '=', $id)->get();
//        $nextauthors_posts = DB::table('authors_posts')
//            ->latest('created_at')->where('status', 1)->where('authors_id', '=', $id)->limit(10)
//            ->get();
//        return view('main.body.authors_writes', compact('yazi', 'yazar', 'nextauthors_posts'));
//    }

    public function yazilars($slug_name,$Authorid)
    {

        $yaziPost=AuthorsPost::whereAuthorsId($Authorid)->latest(); // done bope
//        $yaziPost=AuthorsPost::find($Authorid); // done bope

//dd($yaziPost);
        $nextauthors_posts=AuthorsPost::where('status',1)->where('authors_id',$Authorid)->limit(10)->get();
        $OtherAuthors=Authors::limit(10)->get();
        $seoset = Seos::first();

//        $nextauthorCount=$nextauthors_posts->count();

//        $nextauthors_posts = DB::table('authors_posts')
//            ->latest('created_at')->where('status', 1)->where('authors_id', '=', $Authorid)->limit(10)
//            ->get();

//        $yazi = AuthorsPost::where('id', '=', $Authorid)->limit(10)->get();
//        $nextauthors_posts = DB::table('authors_posts')
//            ->latest('created_at')->where('status', 1)->where('authors_id', '=', $Authorid)->limit(10)
//            ->get();
//        $yazar = Authors::where('id', '=', $Authorid)->get();
//$yazi= AuthorsPost::where($slug_name)->where($Authorid);
//dd($yazi);
        return view('main.body.authors_writes', compact('yaziPost','nextauthors_posts','OtherAuthors','seoset'));
    }







//    public function akbankkur()
//    {
//        $ch = curl_init();
//        curl_setopt_array($ch, [
//            CURLOPT_URL => 'https://www.akbank.com/_vti_bin/AkbankServicesSecure/FrontEndServiceSecure.svc/GetExchangeData?_=' . time(),
//            CURLOPT_RETURNTRANSFER => true,
//            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false),
//
//        ]);
//        $output = curl_exec($ch);
//        curl_close($ch);
//
//
//        $output = json_decode($output, true);
//        $results = json_decode($output['GetExchangeDataResult'], true);
//
//// print_r($results);
//        $usd = $results['Currencies'][16];
//        $euro = $results['Currencies'][6];
//        $altin = $results['Currencies'][17];
//        $imkb = $results['BIST'];
//
//        $kurlar= [
//            'DOLAR' => [
//                'oran' => $usd['Rate'],
//                'oranyonu' => $usd['RateDiretion'],
//                'alis' => $usd['Buy'],
//                'satis' => str_replace (',', '.' ,$usd['Sell'])
//
//            ],
//            'EURO' => [
//                'oran' => $euro['Rate'],
//                'oranyonu' => $euro['RateDiretion'],
//                'alis' => $euro['Buy'],
//                'satis' => str_replace (',', '.' ,$euro['Sell'])
//
//            ],
//            'ALTIN' => [
//                'oran' => $altin['Rate'],
//                'oranyonu' => $altin['RateDiretion'],
//                'alis' => $altin['Buy'],
//                'satis' => str_replace (',', '.' ,$altin['Sell'])
//
//            ],
//            'imkb' => [
//                'oran' => $imkb['Rate'],
//                'oranyonu' => $imkb['RateDirection'],
//                'deger' => str_replace (',', '.' ,$imkb['Index'])
//            ]
//        ];
//
//        return view('main.home',compact('kurlar'));
//    }


}

