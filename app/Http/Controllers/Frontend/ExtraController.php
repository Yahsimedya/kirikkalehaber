<?php

namespace App\Http\Controllers\Frontend;


use App\Http\Controllers\AuthorsPostController;
use App\Http\Controllers\Controller;
use App\Models\Ad;
use App\Models\Authors;
use App\Models\AuthorsPost;
use App\Models\Comments;
use App\Models\authorscommentsModel;
use App\Models\District;
use App\Models\FixedPage;
use App\Models\Photo;
use App\Models\Photocategory;
use App\Models\Post;
use App\Models\Gazetesayis;
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
use Google\Service\ShoppingContent\Resource\Pos;
use GuzzleHttp\ClientInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Session;
use App\Models\Category;
use Illuminate\Support\Facades\Cache;
use Analytics;
use Spatie\Analytics\Period;

//use PublicApi;
class ExtraController extends Controller
{
    //    public function GetSubDistrict($district_id)
    //    {
    //        $districts = Subdistrict::where('district_id',$district_id)->get();
    //
    //        return response()->json($districts);
    //    }

    public function redirect($slug)
    {

        $r = $_SERVER['REQUEST_URI'];
        $r = explode('?', $r);
        $r = array_filter($r);
        $r = array_merge($r, array());
        $id = $r[0];
        $id = explode('-', $id);
        $id = array_filter($id);
        $id = array_merge($id, array());
        $idCount = count($id) - 1;
        $alinanID = $id[$idCount];
        $replaced = Str::of($r[0])->replace('-' . $alinanID, '/' . $alinanID)->replace('/haber-', '');
        return Redirect::to($replaced . '/haberi');
    }

    // public function DBTrans()
    // {


    //     ini_set('max_execution_time', 0);
    //     $habereski = DB::table('haber')->get(); //eklenecek eski haber tablosu
    //     $yeniData = array();
    //     DB::beginTransaction();
    //     $savedcount = 0;
    //     $unsavedcount = 0;

    //     for ($i = 1; $i <= count($habereski) - 1; $i++) {
    //         if ($habereski[$i]->kategori_id == 9) {
    //             $newCategoryId = 2;
    //         } elseif (substr($habereski[$i]->kategori_id, 0, 2) == 10) {
    //             $newCategoryId = 6;
    //         } elseif (substr($habereski[$i]->kategori_id, 0, 2) == 11) {
    //             $newCategoryId = 2;
    //         } elseif (substr($habereski[$i]->kategori_id, 0, 2) == 13) {
    //             $newCategoryId = 5;
    //         } elseif (substr($habereski[$i]->kategori_id, 0, 2) == 36) {
    //             $newCategoryId = 11;
    //         } elseif (substr($habereski[$i]->kategori_id, 0, 2) == 38) {
    //             $newCategoryId = 3;
    //         } elseif (substr($habereski[$i]->kategori_id, 0, 2) == 39) {
    //             $newCategoryId = 7;
    //         } elseif (substr($habereski[$i]->kategori_id, 0, 2) == 49) {
    //             $newCategoryId = 9;
    //         } elseif (substr($habereski[$i]->kategori_id, 0, 2) == 51) {
    //             $newCategoryId = 4;
    //         } elseif (substr($habereski[$i]->kategori_id, 0, 2) == 52) {
    //             $newCategoryId = 8;
    //         } elseif (substr($habereski[$i]->kategori_id, 0, 2) == 64) {
    //             $newCategoryId = 10;
    //         } elseif (substr($habereski[$i]->kategori_id, 0, 2) == 66) {
    //             $newCategoryId = 1;
    //         } elseif (substr($habereski[$i]->kategori_id, 0, 2) == 67) {
    //             $newCategoryId = 2;
    //         }

    //         $newImagesroute = "storage/postimg/" . $habereski[$i]->haberfoto_resimyol;

    //         $yeniposts = Post::insert([
    //             "id" => $habereski[$i]->haber_id,
    //             "created_at" => $habereski[$i]->haber_zaman,
    //             "title_tr" => $habereski[$i]->haber_ad,
    //             "slug_tr" => $habereski[$i]->haber_seourl,
    //             "details_tr" => $habereski[$i]->haber_detay,
    //             "subtitle_tr" => $habereski[$i]->haber_spot,
    //             "title_en" => $habereski[$i]->haber_ad,
    //             "slug_en" => $habereski[$i]->haber_seourl,
    //             "details_en" => $habereski[$i]->haber_detay,
    //             "subtitle_en" => $habereski[$i]->haber_spot,
    //             "featured" => 1,
    //             "status" => 1,
    //             "posts_video" => $habereski[$i]->haber_video,
    //             "keywords_tr" => $habereski[$i]->haber_keyword,
    //             "keywords_en" => $habereski[$i]->haber_keyword,
    //             "image" => $newImagesroute,
    //             "manset" => 1,
    //             "surmanset" => $habereski[$i]->haber_surmanset,
    //             "description_tr" => $habereski[$i]->haber_description,
    //             "description_en" => $habereski[$i]->haber_description,
    //             "headline" => $habereski[$i]->haber_sondakika,
    //             "category_id" => $newCategoryId,
    //             "district_id" => 71,

    //         ]);
    //         if ($yeniposts > 0) {
    //             $savedcount++;
    //         } else {
    //             $unsavedcount++;
    //         }
    //     }
    //     if ($unsavedcount > 0) {
    //         DB::rollBack();
    //     } else {
    //         DB::commit();
    //     }
    //     // return $this->OldDBkoseyazisi();

    // }

    // public function OldDBkoseyazisi()
    // {
    //     ini_set('max_execution_time', 0);
    //     $koseyazisieski = DB::table('kose_yazilari')->get(); //eklenecek eski köşe yazıları tablosu
    //     $yeniData = array();
    //     DB::beginTransaction();
    //     $savedcount = 0;
    //     $unsavedcount = 0;

    //     for ($i = 1; $i <= count($koseyazisieski) - 1; $i++) {
    //         $yenikoseyazisi = AuthorsPost::insert([
    //             "id" => $koseyazisieski[$i]->koseyazisi_id,
    //             "authors_id" => 1,
    //             "text" => $koseyazisieski[$i]->koseyazisi_detay,
    //             "title" => $koseyazisieski[$i]->koseyazisi_baslik,
    //             "created_at" => $koseyazisieski[$i]->koseyazisi_zaman,
    //             "updated_at" => $koseyazisieski[$i]->koseyazisi_zaman,
    //             "status" => $koseyazisieski[$i]->koseyazisi_durum == null ? 1 : $koseyazisieski[$i]->koseyazisi_durum,
    //             "image" => "",
    //             "keywords" => $koseyazisieski[$i]->koseyazisi_keyword,
    //             "description" => $koseyazisieski[$i]->koseyazisi_description,
    //         ]);
    //         if ($yenikoseyazisi > 0) {
    //             $savedcount++;
    //         } else {
    //             $unsavedcount++;
    //         }
    //     }
    //     if ($unsavedcount > 0) {
    //         DB::rollBack();
    //     } else {
    //         DB::commit();
    //     }
    //     return "Veri taşıma başarılı";
    // }


    public function PhotoGalleryDetail($photogalery)
    {
        $category = Photo::leftjoin('photocategories', 'photos.photocategory_id', '=', 'photocategories.id')
            ->select(['photos.*', 'photocategories.id', 'photocategories.category_title'])
            ->where('photos.photocategory_id', $photogalery)
            ->first();
        $photos = Photo::leftjoin('photocategories', 'photos.photocategory_id', '=', 'photocategories.id')
            ->where('photos.photocategory_id', $photogalery)
            ->get();
        $relatedgalery = Photo::status()->take(10)->groupBy('photocategory_id')->latest()->get();
        $webSiteSetting = WebsiteSetting::first();
        //    $relatedgalery =Photo::leftjoin('photocategories','photos.photocategory_id','=','photocategories.id')
        //        ->select(['photos.*','photocategories.id','photocategories.category_title'])
        //        ->where('photos.photocategory_id',$photogalery)->where('photos.photocategory_id','!=',$photos->photocategory_id)->groupBy('photocategory_id')
        //        ->get();
        $themeSetting = Theme::get();
        return view('main.body.foto_galery', compact('photos', 'category', 'webSiteSetting', 'relatedgalery', 'themeSetting'));
    }

    public function Etiket($name, $id)
    {

        $tagPosts = Post::leftjoin('post_tags', 'posts.id', 'post_tags.post_id')
            ->leftjoin('tags', 'tags.id', 'post_tags.tag_id')
            ->leftjoin('categories', 'posts.category_id', '=', 'categories.id')
            ->select(['posts.*', 'post_tags.post_id', 'tags.id', 'tags.name', 'categories.id'])
            ->groupBy('post_tags.post_id')
            ->where('post_tags.tag_id', $id)->where('posts.featured', 1)->status()->limit(24)->latest()
            ->get();
        $tagPostsSlideralti = Post::leftjoin('post_tags', 'posts.id', 'post_tags.post_id')
            ->leftjoin('tags', 'tags.id', 'post_tags.tag_id')
            ->leftjoin('categories', 'posts.category_id', '=', 'categories.id')
            ->select(['posts.*', 'post_tags.post_id', 'tags.id', 'tags.name', 'categories.id'])
            ->groupBy('post_tags.post_id')
            ->where('post_tags.tag_id', $id)->status()->limit(30)->latest()
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
            ->where('post_tags.tag_id', $id)->status()->whereDate('posts.created_at', '>', \Carbon\Carbon::parse()->now()->subYear())
            ->inRandomOrder()->limit(10)
            ->get();
        $nextnewsyan = Post::leftjoin('post_tags', 'posts.id', 'post_tags.post_id')
            ->leftjoin('tags', 'tags.id', 'post_tags.tag_id')
            ->leftjoin('categories', 'posts.category_id', '=', 'categories.id')
            ->select(['posts.*', 'post_tags.post_id', 'tags.id', 'tags.name', 'categories.id'])
            ->groupBy('posts.id')
            ->where('post_tags.tag_id', $id)->status()->whereDate('posts.created_at', '>', \Carbon\Carbon::parse()->now()->subYear())
            ->inRandomOrder()->limit(5)
            ->get();
        $count = Post::leftjoin('post_tags', 'posts.id', 'post_tags.post_id')
            ->leftjoin('tags', 'tags.id', 'post_tags.tag_id')
            ->select(['posts.*', 'post_tags.post_id', 'tags.id', 'tags.name'])
            ->where('post_tags.tag_id', $id)->latest()
            ->count();
        $ads = Ad::leftjoin('ad_categories', 'ads.category_id', '=', 'ad_categories.id')
            //            ->join('ads','ad_categories.id','ads.category_id')
            ->select(['ads.*', 'ad_categories.id'])
            ->status()
            ->whereIN('ad_categories.id', [1, 2, 3, 12]) // ad_categories tablosunda bulunan ve haber detayda görünmesi gereken id'ler
            ->get();
        $webSiteSetting = WebsiteSetting::get();
        $themeSetting = Theme::get();
        return view('main.body.tags', compact('tagPosts', 'count', 'themeSetting', 'webSiteSetting', 'nextnews', 'ads', 'tagPostsSlideralti', 'nextnewsyan'));
        $webSiteSetting = WebsiteSetting::get();
        $themeSetting = Theme::get();
        return view('main.body.tags', compact('tagPosts', 'count', 'nextnewsyan', 'themeSetting', 'webSiteSetting', 'nextnews', 'ads', 'tagPostsSlideralti'));
    }

    public function feed()
    {


        $seoset = Seos::first();

        $posts = Post::leftjoin('categories', 'posts.category_id', '=', 'categories.id')
            ->leftjoin('subcategories', 'posts.subcategory_id', '=', 'subcategories.id')
            ->leftjoin('districts', 'posts.district_id', '=', 'districts.id')
            ->leftjoin('subdistricts', 'posts.subdistrict_id', 'subdistricts.id')
            ->select(['posts.*', 'categories.category_tr', 'districts.district_tr', 'subdistricts.subdistrict_tr'])
            ->latest('updated_at')->status()->limit(50)
            ->get();
        return response()->view('main.body.feed', compact('posts', 'seoset'))->header('Content-Type', 'application/xml');
    }

    public function GetAllDistrict()
    {
        $siteSetting = Theme::latest('id')->get();
        $themeSetting = Theme::get();

        return view('main.body.turkey_map', compact('siteSetting', 'themeSetting'));
    }

    public function GetDistrict($id) // türkiye haritasında illere tıkladığında il detay sayfasına gider
    {


        $sehirsay = Post::leftjoin('categories', 'posts.category_id', '=', 'categories.id')
            ->leftjoin('subcategories', 'posts.subcategory_id', '=', 'subcategories.id')
            ->leftjoin('districts', 'posts.district_id', '=', 'districts.id')
            ->leftjoin('subdistricts', 'posts.subdistrict_id', 'subdistricts.id')
            ->where('districts.slug', $id)
            ->select(['posts.*', 'categories.category_tr', 'districts.district_tr', 'subdistricts.subdistrict_tr'])
            ->latest('updated_at')
            ->count();

        $sehir = District::where('slug', $id)
            ->firstOrFail();
        //dd($sehir);
        $districts = Post::leftjoin('categories', 'posts.category_id', '=', 'categories.id')
            ->leftjoin('subcategories', 'posts.subcategory_id', '=', 'subcategories.id')
            ->leftjoin('districts', 'posts.district_id', '=', 'districts.id')
            ->leftjoin('subdistricts', 'posts.subdistrict_id', 'subdistricts.id')
            ->where('districts.slug', $id)
            ->select(['posts.*', 'categories.category_tr', 'districts.district_tr', 'districts.district_keywords', 'districts.district_description', 'subdistricts.subdistrict_tr'])
            ->latest('updated_at')->limit(50)
            ->get();

        $subdistricts = Subdistrict::leftjoin('districts', 'districts.id', '=', 'subdistricts.district_id')
            ->where('districts.slug', $id)
            ->get();
        $alldistrict = District::get();
        $webSiteSetting = WebsiteSetting::first();
        $themeSetting = Theme::get();

        return view('main.body.district', compact('districts', 'sehir', 'themeSetting', 'webSiteSetting', 'sehirsay', 'subdistricts', 'alldistrict'));
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
        // $news = Analytics::fetchMostVisitedPages(Period::days(1));
        $endNewss = [];
        //        dd($news);

        // foreach ($news as $news) {
        //     $r = $news['url'];
        //     $r = explode('?', $r);
        //     $r = array_filter($r);
        //     $r = array_merge($r, array());
        //     $id = $r[0];
        //     // $id = str_replace('/haberi', '', $id);
        //     $id = explode('-', $id);
        //     $id = array_filter($id);
        //     $id = array_merge($id, array());
        //     $idCount = count($id) - 1;
        //     $alinanID = $id[$idCount];
        //     $alinanIDs = explode('/', $alinanID);
        //     $endNewss[] = $alinanIDs[1];
        // }
        //        foreach ($news as $news) {
        //            $r = $news['url'];
        //            $r = explode('?', $r);
        //            $r = array_filter($r);
        //            $r = array_merge($r, array());
        //            $id = $r[0];
        //            $id = str_replace('/haberi', '', $id);
        //            $id = explode('-', $id);
        //            $id = array_filter($id);
        //           $id = array_merge($id, array());
        //                        $idCount = count($id) - 1;
        //
        //        }
        //
        $endNews = Post::whereIn('id', $endNewss)->limit(6)->get();



        $sondakika = Cache::remember("headline", Carbon::now()->addYear(), function () {
            if (Cache::has('headline')) return Cache::has('headline');
            return Post::where('posts.headline', 1)
                ->where('created_at', '>', Carbon::now()->subDay(1))
                ->status()
                ->limit(5)
                ->get();
        });

        $ch = curl_init();
        $kurlar = Cache::remember('kurlar', 300, function () {
            $ch = curl_init();
            curl_setopt_array($ch, [
                CURLOPT_URL => 'https://finans.truncgil.com/today.json',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_SSL_VERIFYPEER => false,
                CURLOPT_CONNECTTIMEOUT => 3, // ❗ 3 saniyede bağlanamazsa bırak
                // CURLOPT_TIMEOUT kaldırıldı, yok!
            ]);

            $output = curl_exec($ch);
            $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            curl_close($ch);

            if ($output && $httpCode == 200) {
                return json_decode($output, true);
            } else {
                return []; // Bağlantı sorunu olursa boş array
            }
        });




        function degistir($string)
        {
            $string = str_replace('%', '', $string);

            return $string;
        }

        $kurlar = [
            'DOLAR' => [
                'oran' => !empty($result['USD']['Değişim']) ? degistir($result['USD']['Değişim']) : '0',
                'satis' => !empty($result['USD']['Satış']) ? str_replace(',', '.', $result['USD']['Satış']) : '0'
            ],
            'EURO' => [
                'oran' => !empty($result['EUR']['Değişim']) ? degistir($result['EUR']['Değişim']) : '0',
                'satis' => !empty($result['EUR']['Satış']) ? str_replace(',', '.', $result['EUR']['Satış']) : '0'
            ],
            'ALTIN' => [
                'oran' => !empty($result['gram-altin']['Değişim']) ? $result['gram-altin']['Değişim'] : '0',
                'satis' => !empty($result['gram-altin']['Satış']) ? str_replace(',', '.', degistir($result['gram-altin']['Satış'])) : '0'
            ],
            'ceyrekaltin' => [
                'oran' => !empty($result['ceyrek-altin']['Değişim']) ? $result['ceyrek-altin']['Değişim'] : '0',
                'satis' => !empty($result['ceyrek-altin']['Satış']) ? str_replace(',', '.', degistir($result['ceyrek-altin']['Satış'])) : '0'
            ]
        ];


        $date = Carbon::now()->format('d.m.Y');

        $vakit = Vakitler::where('date', $date)->get();

        $vakitler = array(
            "imsak" => $vakit[0]['imsak'] ?? '',
            "gunes" => $vakit[0]['gunes'] ?? '',
            "ogle" => $vakit[0]['ogle'] ?? '',
            "ikindi" => $vakit[0]['ikindi'] ?? '',
            "aksam" => $vakit[0]['aksam'] ?? '',
            "yatsi" => $vakit[0]['yatsi'] ?? '',
        );
        Session::put('vakitler', $vakitler);


        //dd($kurlar);
        Session::put('kurlar', $kurlar);

        $video_gallarySliderAlti = Cache::remember("video_gallarySliderAlti", Carbon::now()->addYear(), function () {
            if (Cache::has('video_gallarySliderAlti')) return Cache::has('video_gallarySliderAlti');
            return Post::status()->where('posts_video', '!=', NULL)->orderByDesc('updated_at')->limit(5)->get();
        });
        $video_gallary = Cache::remember("video_gallary", Carbon::now()->addYear(), function () {
            if (Cache::has('video_gallary')) return Cache::has('video_gallary');
            return Post::status()->where('posts_video', '!=', NULL)->orderByDesc('updated_at')->limit(10)->get();
        });
        //        $home =
        ////            Cache::remember("home", Carbon::now()->addYear(), function () {
        ////            if (Cache::has('home')) return Cache::has('home');
        //            Post::leftjoin('categories', 'posts.category_id', '=', 'categories.id')
        //                ->leftjoin('subcategories', 'posts.subcategory_id', '=', 'subcategories.id')
        //                ->leftjoin('districts', 'posts.district_id', '=', 'districts.id')
        //                ->leftjoin('subdistricts', 'posts.subdistrict_id', 'subdistricts.id')
        //                ->select(['posts.*', 'categories.category_tr', 'districts.district_tr', 'subdistricts.subdistrict_tr'])
        //                ->status()->latest('updated_at')
        //                ->get();
        ////            });

        $home = Cache::remember("home", Carbon::now()->addYear(), function () {
            if (Cache::has('home')) return Cache::has('home');
            return Post::status()->where('manset', 1)
                ->latest('created_at')
                ->get();
        });
        $ads = Cache::remember("ads", Carbon::now()->addYear(), function () {
            if (Cache::has('ads')) return Cache::has('ads');
            return Ad::leftjoin('ad_categories', 'ads.category_id', '=', 'ad_categories.id')
                //            ->join('ads','ad_categories.id','ads.category_id')
                ->select(['ads.*', 'ad_categories.id'])
                ->status()
                // ad_categories tablosunda bulunan ve haber detayda görünmesi gereken id'ler
                ->get();
        });
        foreach ($ads as $ad) {
            $home = $home; //collect([1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11,12,13,14,15,16,17,18,19]);
            if ($ad->category_id == 28) {
                $adsSlider = 1;
                $home = $home->chunk(4)->each->push($adsSlider)->collapse();
            }
        }

        //        $home = $home->chunk(4)->each->push($ads)->collapse();
        //        dd($home);
        //        $surmanset =
        ////            Cache::remember("surmanset", Carbon::now()->addYear(), function () {
        ////            if (Cache::has('surmanset')) return Cache::has('surmanset');
        //            Post::leftjoin('categories', 'posts.category_id', '=', 'categories.id')
        //                ->leftjoin('subcategories', 'posts.subcategory_id', '=', 'subcategories.id')
        //                ->leftjoin('districts', 'posts.district_id', '=', 'districts.id')
        //                ->leftjoin('subdistricts', 'posts.subdistrict_id', 'subdistricts.id')
        //                ->select(['posts.*', 'categories.category_tr', 'districts.district_tr', 'subdistricts.subdistrict_tr'])
        //                ->status()->latest('updated_at')->limit(4)
        //                ->get();
        ////            });

        $themeSettings = Theme::latest()->get();
        $category1 = $themeSettings[0]->category1;
        $category2 = $themeSettings[0]->category2;
        $category3 = $themeSettings[0]->category3;
        $category4 = $themeSettings[0]->category4;
        $surmanset = Cache::remember("surmanset", Carbon::now()->addYear(), function () {
            if (Cache::has('surmanset')) return Cache::has('surmanset');
            return Post::status()
                ->where('surmanset', 1)
                ->with('category')
                ->limit(4)
                ->latest('created_at')
                ->get();
        });

        $sagmanset = Cache::remember("sagmanset", Carbon::now()->addYear(), function () {
            if (Cache::has('sagmanset')) return Cache::has('sagmanset'); //here am simply trying Laravel Collection method -find
            $themeSettings = Theme::latest()->get();
            foreach ($themeSettings as $row) {
                $multiple_category = $row->multiple_category;
                $explode_id = json_decode($multiple_category, true);
            }
            return Post::with(['category:id'])->whereIn('category_id', $explode_id)->status()->latest('updated_at')->limit(15)->get();
            //            return Post::with(['category' => function($query){
            //                $query->whereIn('category_id', $explode_id)->status()->latest('updated_at')->limit(15);
            //            }])->get();

        });


        $sehir = Cache::remember("sehir", Carbon::now()->addYear(), function () {
            if (Cache::has('sehir')) return Cache::has('sehir');
            return Sehirler::orderByRaw('sehir_ad')->get();
        });


        $ekonomi = Cache::remember("ekeonomi", Carbon::now()->addYear(), function () use ($category1) {
            if (Cache::has('ekeonomi')) return Cache::has('ekeonomi');
            return Post::with(['category:id,category_tr'])->where('category_id', $category1)->status()
                ->Where(function ($query) {
                    $query->orWhere('featured', 0)
                        ->orWhere('featured', null);
                })
                ->limit(9)->latest('created_at')->get();
        });

        $gundem = Cache::remember("gundem", Carbon::now()->addYear(), function () use ($category2) {
            if (Cache::has('gundem')) return Cache::has('gundem');
            return Post::with(['category:id,category_tr'])->where('category_id', '=', $category2)->status()->Where(function ($query) {
                $query->orWhere('featured', 0)
                    ->orWhere('featured', null);
            })
                ->limit(9)->latest('created_at')->get();
        });

        $siyaset = Cache::remember("siyaset", Carbon::now()->addYear(), function () use ($category3) {
            if (Cache::has('siyaset')) return Cache::has('siyaset');
            return Post::with(['category:id,category_tr'])->where('category_id', '=', $category3)->status()->Where(function ($query) {
                $query->orWhere('featured', 0)
                    ->orWhere('featured', null);
            })
                ->limit(9)->latest('created_at')->get();
        });

        $spor = Cache::remember("spor", Carbon::now()->addYear(), function () use ($category4) {
            if (Cache::has('spor')) return Cache::has('spor');
            return Post::with(['category:id,category_tr'])->where('category_id', '=', $category4)->status()->Where(function ($query) {
                $query->orWhere('featured', 0)
                    ->orWhere('featured', null);
            })
                ->limit(6)->latest('created_at')->get();
        });


        $ekonomimanset = Cache::remember("ekeonomimanset", Carbon::now()->addYear(), function () use ($category1) {
            if (Cache::has('ekeonomimanset')) return Cache::has('ekeonomimanset');
            return Post::with(['category:id,category_tr'])->where('category_id', $category1)->status()->where('featured', 1)->limit(9)->latest('created_at')->get();
        });

        $gundemmanset = Cache::remember("gundemmanset", Carbon::now()->addYear(), function () use ($category2) {
            if (Cache::has('gundemmanset')) return Cache::has('gundemmanset');
            return Post::with(['category:id,category_tr'])->where('category_id', '=', $category2)->status()->where('featured', 1)->limit(9)->latest('created_at')->get();
        });

        $siyasetmanset = Cache::remember("siyasetmanset", Carbon::now()->addYear(), function () use ($category3) {
            if (Cache::has('siyasetmanset')) return Cache::has('siyasetmanset');
            return Post::with(['category:id,category_tr'])->where('category_id', '=', $category3)->status()->where('featured', 1)->limit(9)->latest('created_at')->get();
        });

        $spormanset = Cache::remember("spormanset", Carbon::now()->addYear(), function () use ($category4) {
            if (Cache::has('spormanset')) return Cache::has('spormanset');
            return Post::with(['category:id,category_tr'])->where('category_id', '=', $category4)->status()->where('featured', 1)->limit(9)->latest('created_at')->get();
        });


        $themeSetting = Cache::remember("themeSetting", Carbon::now()->addYear(), function () {
            if (Cache::has('themeSetting')) return Cache::has('themeSetting');
            return Theme::get();
        });


        //       $authors = Authors::leftjoin('authors_posts', 'authors.id', '=', 'authors_posts.authors_id')
        //           ->select(['authors.id','authors.name', 'authors_posts.*'])
        //           ->where('authors.status', 1)->where('authors_posts.status', 1)->groupBy("authors.id")
        //           ->orderBy('authors_posts.updated_at','ASC')
        //           ->get();
        $authors = Authors::leftjoin('authors_posts', 'authors.id', '=', 'authors_posts.authors_id')
            ->where('authors.status', 1)->where('authors_posts.status', 1)
            //            ->select(['authors_posts.*', 'authors.id','authors.image'])
            ->whereRaw('authors_posts.id in (select max(id) from authors_posts group by (authors_posts.authors_id))')
            ->latest("authors_posts.created_at")->limit(8)
            ->get();
        //        dd($authors);
        //        $authors = AuthorsPost::leftjoin('authors', 'authors_posts.id', '=', 'authors.id')
        //            ->select(['authors_posts.*', 'authors.id',])
        //            ->where('authors.status', 1)->where('authors_posts.status', 1)
        //            ->groupBy("authors_posts.authors_id")->orderBy("authors_posts.id",'desc')
        //            ->get();

        //        $authors= AuthorsPost::latest('id')->groupBy('authors_id')->get();
        //        $authors=AuthorsPost::whereAuthorsId($Authorid)->first(); // done bope



        $seoset = Cache::remember("seoset", Carbon::now()->addYear(), function () {
            if (Cache::has('seoset')) return Cache::has('seoset');
            return Seos::first();
        });
        $mgmData = Cache::remember('hava_durumu_mgm', 300, function () {
            $ch = curl_init();
            curl_setopt_array($ch, [
                CURLOPT_URL => 'https://www.mgm.gov.tr/FTPDATA/analiz/GunlukTahmin.xml',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_SSL_VERIFYPEER => false,
                CURLOPT_CONNECTTIMEOUT => 3, // Bağlantı için 3 saniye bekle
                // CURLOPT_TIMEOUT kaldırıldı, sadece connect timeout var
            ]);
            $output = curl_exec($ch);
            $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            curl_close($ch);

            if ($output && $httpCode == 200) {
                return $output;
            } else {
                return null; // MGM yanıt vermezse null dön
            }
        });

        // Sonrasında kullanırken:
        if ($mgmData) {
            $veri = simplexml_load_string($mgmData);
            $json = json_encode($veri);
            $array = json_decode($json, TRUE);
        } else {
            $array = null;
        }


        // XML verisini JSON'a çevir ve diziye dönüştür
        $json = json_encode($veri);
        $array = json_decode($json, TRUE);

        $gelenil = "KIRIKKALE";

        // Şehir ismindeki Türkçe karakterleri dönüştür
        function turkceKarakterleriDonustur($kelime)
        {
            $bulunacak = array('ç', 'Ç', 'ı', 'ğ', 'Ğ', 'ü', 'İ', 'ö', 'Ş', 'ş', 'Ö', 'Ü', ',', ' ', '(', ')', '[', ']');
            $degistir = array('c', 'C', 'i', 'g', 'G', 'u', 'I', 'o', 'S', 's', 'O', 'U', '', '_', '', '', '', '');
            return str_replace($bulunacak, $degistir, $kelime);
        }

        $sonuc = turkceKarakterleriDonustur($gelenil);

        // Hava durumu kodlarını açıklamaya dönüştür
        function havaDurumuAciklamasi($kod)
        {
            $kodlar = [
                "SCK" => "Sıcak",
                "AB" => "Az Bulutlu",
                "HSY" => "Hafif Sağnak Yağış",
                "PB" => "Parçalı Bulutlu",
                "GSY" => "Gökgürltülü Sağnak Yağışlı",
                "KGY" => "Kuvvetli Gökgürltülü Sağnak Yağışlı",
                "MSY" => "Mevzi Sağnak Yağışlı"
            ];

            return $kodlar[$kod] ?? $kod;
        }

        // İkonu belirle
        function havaDurumuIkon($kod)
        {
            $ikonlar = [
                "GSY" => '<i style="font-size: 20px;" class="wi wi-night-thunderstorm"></i>',
                "SCK" => '<i style="font-size: 20px;" class="wi wi-day-sunny"></i>',
                "KGY" => '<i style="font-size: 20px;" class="wi wi-night-thunderstorm"></i>',
                "AB" => '<i style="font-size: 20px;" class="wi wi-night-partly-cloudy"></i>',
                "PB" => '<i style="font-size: 20px;" class="wi wi-day-cloudy-windy"></i>',
                "HSY" => '<i style="font-size: 20px;" class="wi wi-day-rain"></i>',
                "MSY" => '<i style="font-size: 20px;" class="wi wi-day-showers"></i>',
                "A"   => '<i style="font-size: 20px;" class="wi wi-day-sunny"></i>',
                "CB"  => '<i style="font-size: 20px;" class="wi wi-cloudy"></i>',
                "SIS" => '<i style="font-size: 20px;" class="wi wi-fog"></i>',
                "R"   => '<i style="font-size: 20px;" class="wi wi-fog"></i>'
            ];

            return $ikonlar[$kod] ?? '<i style="font-size: 20px;" class="wi wi-strong-wind"></i>';
        }

        // İlgili şehir için hava durumunu bul
        $day1 = null;
        $icon = null;

        foreach ($array['Merkez'] as $data) {
            if ($data['ilEn'] == $sonuc) {
                $day1 = $data['makk1'];  // 1. günün sıcaklığı
                $icon = havaDurumuIkon($data['d1']);  // Hava durumu ikonu
                break;
            }
        }

        // Eğer şehir verisi bulunamadıysa hata göster
        if ($day1 === null) {
            die("Şehir bulunamadı.");
        }

        // Hava durumu verisini session'a kaydet
        $veri = [
            'gelenil' => $gelenil,
            'sicaklik' => $day1,
        ];

        Session::put('icon', $icon);
        Session::put('gelenil', $gelenil);
        Session::put('havadurumu', $veri['sicaklik']);
        $webSiteSetting = WebsiteSetting::first();

        //$fotogaleri=Photo::where('status',1)->groupBY('photocategory_id')->get();
        $fotogaleri = Photo::leftjoin('photocategories', 'photos.photocategory_id', '=', 'photocategories.id')
            ->where('photocategories.status', 1)->where('photos.status', 1)->groupBY('photocategories.id')
            ->latest("photocategories.updated_at")
            ->get();
        $egazete = Cache()->remember("home-egazete", Carbon::now()->addYear(), function () {
            return Gazetesayis::latest()->where('status', 1)->limit(9)->get();
        });
        return view('main.home', compact('home', 'fotogaleri', 'egazete', 'ekonomi', 'endNews', 'ekonomimanset', 'webSiteSetting', 'surmanset', 'gundem', 'gundemmanset', 'spor', 'siyaset', 'spormanset', 'siyasetmanset', 'sagmanset', 'themeSetting', 'sondakika', 'sehir', 'authors', 'ads', 'seoset', 'video_gallary', 'video_gallarySliderAlti'));
        //        return view('main.home_master', compact('seoset'))
        //        return view('main.body.header', compact('vakitler'));

    }
    //    public function setCookie(Request $request) {
    //
    //        Cookie::queue('name', $request->test, 10);
    //        $cookie = Cookie::make('testcookie','5', 120);
    //        return response()
    ////            ->view('tests.'.$page,['page' => $page])
    //            ->withCookie($cookie);
    //
    ////        return view('home');
    //    }
    public function SinglePost($slug, $id)
    {
        $post = Post::with(['category:id,category_tr'])->status()->find($id);

        $comments = Comments::where('posts_id', $id)->status()->get();

        $slider = Post::latest('updated_at')
            ->with('category:id,category_tr')->where('manset', 1)
            ->status()->limit(10)
            ->get();

        $ads = Ad::latest('updated_at')
            ->status()
            ->with('adcategory')
            ->get();

        $tag_ids = $post->tag()->get();
        $tagCount = $tag_ids->count();
        $ids = array();
        foreach ($tag_ids as $tags) {
            $ids[] = $tags->id;
        }

        $maybeRelated = [];
        if (!empty($ids)) {
            $maybeRelated = Post::leftjoin('post_tags', 'posts.id', 'post_tags.post_id')
                ->leftjoin('tags', 'post_tags.tag_id', 'tags.id')
                ->select([
                    'posts.*',
                    'post_tags.post_id',
                    'tags.id',
                    'tags.name'
                ])
                ->orWhereIn('post_tags.tag_id', $ids)
                ->skip(1)->limit(3)->inRandomOrder()
                ->groupBy('posts.id')->latest()
                ->get();
        }

        $tagName = Post::leftjoin('post_tags', 'posts.id', 'post_tags.post_id')
            ->leftjoin('tags', 'post_tags.tag_id', 'tags.id')
            ->select(['posts.*', 'post_tags.post_id', 'tags.id', 'tags.name'])
            ->where('posts.id', $id)
            ->where('posts.status', 1)
            ->limit(10)
            ->get();

        $random = Post::limit(3)->get();

        $nextrelated = Post::latest('updated_at')
            ->where('id', $post->id)
            ->status()
            ->with(['tag' => function ($query) {
                $query->select('name');
            }])
            ->get();

        $seoset = Seos::first();
        $webSiteSetting = WebsiteSetting::first();

        // Session işlemleri kaldırıldı çünkü dış API'ler yok artık.

        return view('main.body.single_post', compact(
            'post',
            'ads',
            'webSiteSetting',
            'random',
            'slider',
            'tagName',
            'nextrelated',
            'comments',
            'seoset',
            'maybeRelated',
            'tagCount'
        ));
    }


    //Fixed Page Open
    public function Sayfa($id)
    {
        $fixedPage = DB::table('fixedpage')->where('id', '=', $id)->get();
        $themeSetting = Theme::get();
        return view('main.body.fixedpapers', compact('fixedPage', 'themeSetting'));
    }


    public function CategoryPost($slug, $id)
    {
        $category = Category::latest()->where('id', $id)->where('category_status', 1)->orderBy('id', 'desc')->first();


        $manset =
            Post::join('categories', 'posts.category_id', 'categories.id')
            ->select('posts.*', 'categories.category_tr', 'categories.category_en')
            ->where('posts.category_id', $id)->where('posts.manset', 1)
            ->where('posts.status', 1)
            ->orderBy('created_at', 'desc')
            ->limit(25)->get();


        $count = Post::join('categories', 'posts.category_id', 'categories.id')
            ->select('posts.*', 'categories.category_tr', 'categories.category_en')
            ->where('posts.category_id', $id)
            ->where('posts.status', 1)
            ->count();
        $dataToEliminate = $manset->pluck('id');

        //dd($dataToEliminate);

        $catpost = Post::with(['category:id,category_tr'])->whereNotIn('id', $dataToEliminate)->where('category_id', $id)->latest()->paginate(20);
        //        $catpost = Post::join('categories', 'posts.category_id', 'categories.id')
        //            ->select('posts.*', 'categories.category_tr', 'categories.category_en')
        //            ->where('posts.category_id', $id)
        //            ->where('posts.status', 1)
        //            ->orWhere('posts.manset', NULL)->latest()->skip(25)
        //            ->paginate(20);


        //        if ($catpost->count() == 0) {
        //            return redirect('/');
        //        }
        $webSiteSetting = WebsiteSetting::first();

        $nextnews = Post::join('categories', 'posts.category_id', 'categories.id')
            ->select('posts.*', 'categories.category_tr', 'categories.category_en')
            ->where('posts.status', 1)
            ->where('posts.category_id', $id)->whereDate('posts.created_at', '>', \Carbon\Carbon::parse()->now()->subYear())
            ->inRandomOrder()->limit(10)
            ->get();
        $ads = Ad::leftjoin('ad_categories', 'ads.category_id', '=', 'ad_categories.id')
            //            ->join('ads','ad_categories.id','ads.category_id')
            ->select(['ads.*', 'ad_categories.id'])
            ->status()
            ->get();

        return view('main.body.category_post', compact('manset', 'webSiteSetting', 'category', 'catpost', 'ads', 'nextnews', 'count'));
    }

    public function search(Request $request)
    {


        $searchText = $request['searchtext'];
        $json = Post::orWhere('title_tr', 'LIKE', '%' . $searchText . '%')->orWhere('title_en', 'LIKE', '%' . $searchText . '%')->orWhere('subtitle_tr', 'LIKE', '%' . $searchText . '%')->orWhere('subtitle_en', 'LIKE', '%' . $searchText . '%')->whereStatus('1')->get();
        $searchNews = $this->change($json);
        $webSiteSetting = WebsiteSetting::first();

        return \view('main.body.search', compact('searchNews', 'webSiteSetting',));
    }

    public function darkMode(Request $request, $themeChange)
    {
        if ($themeChange == 0) {
            Session::put('theme', 1);
        } else {
            Session::put('theme', 0);
        }
        return redirect()->back();
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
        $allcategories = Category::status()->get();
        $themeSetting = Theme::get();
        return view('main.body.allcategories', compact('allcategories', 'themeSetting'));
    }


    //    public function yazilar($id)
    //    {
    //
    //        $yazi = AuthorsPost::where('authors_id', '=', $id)->limit(10)->get();
    //        $yazar = Authors::where('id', '=', $id)->get();
    //        $nextauthors_posts = DB::table('authors_posts')
    //            ->latest('updated_at')->status()->where('authors_id', '=', $id)->limit(10)
    //            ->get();
    //        return view('main.body.authors_writes', compact('yazi', 'yazar', 'nextauthors_posts'));
    //    }
    public function yazilars($slug_name, $Authorid)
    {
        $expiresAt = now()->addHours(24);

        $webSiteSetting = WebsiteSetting::first();
        $yaziPost = AuthorsPost::whereId($Authorid)->firstOrFail(); // <- değişiklik burada

        $yazarID = $yaziPost->authors_id;

        $nextauthors_posts = AuthorsPost::status()->where('authors_id', $yazarID)->latest()->limit(8)->get();
        $OtherAuthors = AuthorsPost::whereId($Authorid)->limit(10)->orderBy('id', 'desc')->get();
        $seoset = Seos::first();
        $comments = DB::table('authorscomments')->where('authors_posts_id', $yaziPost->id)->where('status', 1)->get();
        $themeSetting = Theme::get();
        $yazardes = DB::table('authors')->where('id', '=', $yaziPost->authors_id)->first();

        return view('main.body.authors_writes', compact('yaziPost', 'webSiteSetting', 'nextauthors_posts', 'OtherAuthors', 'seoset', 'yazardes', 'themeSetting', 'comments'));
    }



    public function Author_post($slug_name, $Authorid)
    {

        $expiresAt = now()->addHours(24);

        $webSiteSetting = WebsiteSetting::first();

        $yazarID = $Authorid;
        $yaziPost = AuthorsPost::whereId($Authorid)->first(); // done bope

        $nextauthors_posts = AuthorsPost::status()->where('authors_id', $yazarID)->paginate(10);
        $OtherAuthors = AuthorsPost::whereId($Authorid)->limit(10)->orderBy('id', 'desc')->get(); //
        $seoset = Seos::first();

        $themeSetting = Theme::get();
        $yazardes = DB::table('authors')->where('id', '=', $yazarID)->first();
        return view('main.body.allAuthorsPost', compact('webSiteSetting', 'nextauthors_posts', 'OtherAuthors', 'seoset', 'yazardes', 'themeSetting', 'yaziPost'));
    }

    public function breakingnews()
    {
        $webSiteSetting = WebsiteSetting::first();
        $themeSetting = Theme::get();

        $sondakika = Post::status()->where('updated_at', '>', Carbon::now()->subDay(1))->latest()
            ->get();

        return view('main.body.breakingnews', compact('sondakika', 'webSiteSetting', 'themeSetting'));
    }


    public function fetchLike(Request $request)
    {
        $blog = Post::find($request->blog);
        return response()->json([
            'blog' => $blog,
        ]);
    }

    public function handleLike(Request $request)
    {
        $blog = Post::find($request->blog);
        $value = $blog->like;
        $blog->like = $value + 1;
        $blog->save();
        return response()->json([
            'message' => 'Liked',
        ]);
    }

    public function fetchDislike(Request $request)
    {
        $blog = Post::find($request->blog);
        return response()->json([
            'blog' => $blog,
        ]);
    }

    public function handleDislike(Request $request)
    {
        $blog = Post::find($request->blog);
        $value = $blog->dislike;
        $blog->dislike = $value + 1;
        $blog->save();
        return response()->json([
            'message' => 'Disliked',
        ]);
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
