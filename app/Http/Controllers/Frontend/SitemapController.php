<?php

namespace App\Http\Controllers\Frontend;

use App;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\District;
use App\Models\Photo;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;


class SitemapController extends Controller
{
    public function sitemap()
    {
        ini_set('memory_limit', '-1');
        $sitemaphome = App::make('sitemap'); //home
        $sitemapcategories = App::make('sitemap'); //categories
        $sitemapdistricts = App::make('sitemap'); //districts
        $sitemapimages = App::make('sitemap'); //images
        $sitemapfotogaleri = App::make('sitemap'); //fotogaleri
        $sitemapvideogaleri = App::make('sitemap'); //videogaleri
        $posts = Post::orderBy('updated_at', 'asc')->where('status', 1)->get();
        $postsvideo = Post::where('posts_video', '!=', NULL)->orderByDesc('updated_at')->where('status', 1)->get();
        $photos = Photo::orderByDesc('updated_at')->get();
        $categories = Category::where('category_status', 1)->get();
        $districts = District::get();
        $counter = 0;
        $sitemapCounter = 0;
        $sitemapCounters = 0;
        $sitemapCounterAllPage = 0;
        $sitemapCounterAllImage = 0;
        $sitemapCounterImages = 0;
        $host = request()->getHost();
        $counter = 0;
        $lastModifiedSitemap = null; // Sitemap dizininin güncelleme tarihini sıfırlayın

        foreach ($posts as $p) {
            if ($counter == 1500) {
                $sitemapCounterAllPage++;
                // Sitemap dizini içindeki dosyaların güncelleme tarihini sıfırlayın
                if ($sitemaphome->store('xml', 'sitemap-page-' . $sitemapCounterAllPage)) {
                    $lastModifiedSitemap = $p->updated_at; // Bu sitemap dosyasının güncelleme tarihini ayarlayın
                }
                $sitemaphome->addSitemap(secure_url('sitemap-page-' . $sitemapCounterAllPage . '.xml'), $lastModifiedSitemap);
                $sitemaphome->model->resetItems();
                $counter = 0;
            }
            $sitemaphome->add("https://" . $host . "/" . str_slug($p->title_tr) . "/" . $p->id . "/" . "haberi" . $p->created_at, 0.8, "daily");
            $counter++;

            // Her sayfa eklemesinde güncelleme tarihini sıfırlayın
            $lastModifiedSitemap = $p->updated_at;
        }
        // //all page
        // foreach ($posts as $p) {
        //     if ($counter == 1000) {
        //         $sitemapCounterAllPage++;
        //         $sitemaphome->store('xml', 'sitemap-page-' . $sitemapCounterAllPage);
        //         $sitemaphome->addSitemap(secure_url('sitemap-page-' . $sitemapCounterAllPage . '.xml'), Carbon::today());
        //         $sitemaphome->model->resetItems();
        //         $counter = 0;
        //     }
        //     $sitemaphome->add("https://" . $host . "/" . "haber-" . str_slug($p->title_tr) . "-" . $p->id, $p->created_at, 0.8, "daily");
        //     $counter++;
        // }
        //Kategori
        foreach ($categories as $c) {
            if ($counter == 100) {
                $sitemapcategories->store('xml', 'sitemap-categories');
                $sitemapcategories->addSitemap(secure_url('sitemap-categories' . '.xml'));
                $sitemapcategories->model->resetItems();
                $counter = 0;
                $sitemapCounter++;
            }
            $sitemapcategories->add("https://" . $host . "/category/" . str_slug($c->category_tr) . "/" . $c->id, $c->created_at, 0.4, "daily");
            $counter++;
        }
        //districts
        foreach ($districts as $d) {
            if ($counter == 100) {
                $sitemapdistricts->store('xml', 'sitemap-districts');
                $sitemapdistricts->addSitemap(secure_url('sitemap-districts' . '.xml'));
                $sitemapdistricts->model->resetItems();
                $counter = 0;
                $sitemapCounter++;
            }
            $sitemapdistricts->add("https://" . $host . "/" . str_slug($d->district_tr), $d->created_at, 0.4, "daily");
            $counter++;
        }
        //İmages
        foreach ($posts as $p) {
            if ($counter == 1000) {
                $sitemapCounterAllImage++;
                $sitemapimages->store('xml', 'sitemap-images-' . $sitemapCounterAllImage);
                $sitemapimages->addSitemap(secure_url('sitemap-images-' . $sitemapCounterAllImage . '.xml'), Carbon::today());
                $sitemapimages->model->resetItems();
                $counter = 0;
            }
            $sitemapimages->add("https://" . $host . "/" . str_slug($p->title_tr) . "/" . $p->id . "/" . "haberi", 0.8, "daily");
            $counter++;
        }

        //   foreach ($posts as $p) {
        //       if ($counter == 1000) {
        //           $sitemapimages->store('xml', 'sitemap-images-' . $sitemapCounterImages);
        //           $sitemapimages->addSitemap(secure_url('sitemap-images-' . $sitemapCounterImages . '.xml'));
        //           $sitemapimages->model->resetItems();
        //           $counter = 0;
        //           $sitemapCounterImages++;
        //       }
        //       $sitemapimages->add("https://" . $host . "/". "haber-" . str_slug($p->title_tr) . "-" . $p->id , $p->created_at, 0.8, "daily");
        //       $counter++;
        //   }


        //fotoğraf galerisi
        foreach ($photos as $p) {

            if ($counter == 1000) {
                $sitemapCounter++;
                $sitemapfotogaleri->store('xml', 'sitemap-fotogaleri-' . $sitemapCounter);
                $sitemapfotogaleri->addSitemap(secure_url('sitemap-fotogaleri-' . $sitemapCounter . '.xml'));
                $sitemapfotogaleri->model->resetItems();
                $counter = 0;
            }
            $sitemapfotogaleri->add("https://" . $host . "/" . $p->photo, $p->created_at, 0.8, "daily");
            $counter++;
        }
        //video galerisi
        foreach ($postsvideo as $v) {

            if ($counter == 1000) {
                $sitemapCounter++;
                $sitemapvideogaleri->store('xml', 'sitemap-videogaleri-' .  $sitemapCounter);
                $sitemapvideogaleri->addSitemap(secure_url('sitemap-videogaleri-' .  $sitemapCounter . '.xml'));
                $sitemapvideogaleri->model->resetItems();
                $counter = 0;
            }
            $sitemapvideogaleri->add("https://" . $host . "/" . str_slug($v->title_tr) . "/" . $v->id . "/" . "haberi", $v->created_at, 0.8, "daily");
            $counter++;
        }
        // if (!empty($sitemaphome->model->getItems())) {
        //     $sitemaphome->store('xml', 'sitemap-page-' . $sitemapCounter);
        //     $sitemaphome->addSitemap(secure_url('sitemap-page-' . $sitemapCounter . '.xml'), Carbon::today());
        //     $sitemaphome->model->resetItems();
        // }
        // Sitemap.xml dosyasının güncelleme tarihini, en son oluşturulan sitemap dosyasının güncelleme tarihine ayarlayın
        // $lastModifiedSitemap = $sitemaphome->model->getItems()->max('lastmod');
        // Sitemap.xml dosyasının güncelleme tarihini, en son eklenen sayfanın tarihine ayarlayın
        if ($counter > 0) {
            $sitemapCounterAllPage++;
            $isLastPage = ($counter < 1500) || ($sitemapCounterAllPage * 1500 >= count($posts));

            // Sitemap dizini içindeki dosyaların güncelleme tarihini sıfırlayın
            $lastModifiedSitemap = $isLastPage ? now() : $p->updated_at;

            $sitemaphome->store('xml', 'sitemap-page-' . $sitemapCounterAllPage);
            $sitemaphome->addSitemap(secure_url('sitemap-page-' . $sitemapCounterAllPage . '.xml'), $lastModifiedSitemap);
            $sitemaphome->model->resetItems();
        }
        if (!empty($sitemapcategories->model->getItems())) {
            $sitemapcategories->store('xml', 'sitemap-categories');
            $sitemapcategories->addSitemap(secure_url('sitemap-categories' . '.xml'));
            $sitemapcategories->model->resetItems();
        }
        if (!empty($sitemapdistricts->model->getItems())) {
            $sitemapdistricts->store('xml', 'sitemap-districts');
            $sitemapdistricts->addSitemap(secure_url('sitemap-districts' . '.xml'));
            $sitemapdistricts->model->resetItems();
        }

        if (!empty($sitemapimages->model->getItems())) {
            $sitemapimages->store('xml', 'sitemap-images-' . $sitemapCounter);
            $sitemapimages->addSitemap(secure_url('sitemap-images-' . $sitemapCounter . '.xml'), Carbon::today());
            $sitemapimages->model->resetItems();
            for ($Images = 0; $Images <= $sitemapCounter; $Images++) {
                $sitemaphome->addSitemap(URL::to('sitemap-images-' . $Images . '.xml'), Carbon::today());
            }
        }

        if (!empty($sitemapfotogaleri->model->getItems())) {
            $sitemapfotogaleri->store('xml', 'sitemap-fotogaleri');
            $sitemapfotogaleri->addSitemap(secure_url('sitemap-fotogaleri' . '.xml'));
            $sitemapfotogaleri->model->resetItems();
        }
        if (!empty($sitemapvideogaleri->model->getItems())) {
            $sitemapvideogaleri->store('xml', 'sitemap-videogaleri');
            $sitemapvideogaleri->addSitemap(secure_url('sitemap-videogaleri' . '.xml'));
            $sitemapvideogaleri->model->resetItems();
        }
        $sitemaphome->addSitemap(URL::to('sitemap-categories.xml'), Carbon::today());
        $sitemaphome->addSitemap(URL::to('sitemap-districts.xml'), Carbon::today());
        $sitemaphome->addSitemap(URL::to('sitemap-fotogaleri' . '.xml'), Carbon::today());
        $sitemaphome->addSitemap(URL::to('sitemap-videogaleri' . '.xml'), Carbon::today());
        $sitemaphome->addSitemap(URL::to("https://" . $host), Carbon::today());
        $sitemaphome->store('sitemapindex', 'sitemap');
        return redirect('/sitemap.xml');
    }
    public function googleNewsSitemap()
    {
        $twoDaysAgo = Carbon::now()->subDays(2);
        $recentPosts = Post::where('created_at', '>=', $twoDaysAgo)->where('status', 1)->orderByDesc('id')->get();

        return $this->generateGoogleNewsSitemapXML($recentPosts);
    }

    public function generateGoogleNewsSitemapXML($recentPosts)
    {
        $host = request()->getHost();
        $xmlOutput = '<?xml version="1.0" encoding="UTF-8"?>';
        $xmlOutput .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:news="http://www.google.com/schemas/sitemap-news/0.9">';

        foreach ($recentPosts as $p) {
            $slug = Str::slug($p->title_tr);  // Laravel 6+ için Str::slug kullanılır
            $url = "https://{$host}/{$slug}/{$p->id}/haberi";

            $xmlOutput .= '<url>';
            $xmlOutput .= "<loc>{$url}</loc>";
            $xmlOutput .= '<news:news>';
            $xmlOutput .= '<news:publication>';
            $xmlOutput .= '<news:name>Gazete Kale</news:name>';  // Yayın adınızı buraya yazın
            $xmlOutput .= '<news:language>tr</news:language>';
            $xmlOutput .= '</news:publication>';
            $xmlOutput .= "<news:publication_date>{$p->created_at->toW3cString()}</news:publication_date>";
            $xmlOutput .= "<news:title><![CDATA[{$p->title_tr}]]></news:title>";

            // if (!empty($p->image)) {
            //     $xmlOutput .= '<news:image>';
            //     $xmlOutput .= "<news:loc>https://{$host}/{$p->image}</news:loc>";

            //     // Görsel açıklaması (caption)
            //     $xmlOutput .= "<news:caption><![CDATA[{$p->title_tr}]]></news:caption>";

            //     // Görsel başlığı (title)
            //     $xmlOutput .= "<news:title><![CDATA[{$p->title_tr}]]></news:title>";

            //     $xmlOutput .= '</news:image>';
            // }

            $xmlOutput .= '</news:news>';
            $xmlOutput .= '</url>';
        }

        $xmlOutput .= '</urlset>';

        return response($xmlOutput)->header('Content-Type', 'text/xml');
    }
    public function sitemapLatest()
    {
        $twoDaysAgo = Carbon::now()->subDays(2);
        $recentPosts = Post::where('created_at', '>=', $twoDaysAgo)->where('status', 1)->orderByDesc('id')->get();

        return $this->sitemapLatestXml($recentPosts);
    }
    public function sitemapLatestXml($recentPosts)
    {
        $xmlOutput = '<?xml version="1.0" encoding="UTF-8"?>';
        $xmlOutput .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
        $host = request()->getHost();

        foreach ($recentPosts as $post) {
            $slug = Str::slug($post->title_tr);  // Laravel 6+ için Str::slug kullanılır

            $url = "https://{$host}/$slug}/{$post->id}/haberi";
            $lastmod = $post->created_at->toW3cString();

            $xmlOutput .= '<url>';
            $xmlOutput .= "<loc>{$url}</loc>";
            $xmlOutput .= "<lastmod>{$lastmod}</lastmod>";
            $xmlOutput .= '<changefreq>daily</changefreq>';
            $xmlOutput .= '<priority>0.9</priority>';
            $xmlOutput .= '</url>';
        }

        $xmlOutput .= '</urlset>';

        return response($xmlOutput)->header('Content-Type', 'text/xml');
    }
}
