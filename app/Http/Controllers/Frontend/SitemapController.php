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
        $sitemaphome = App::make('sitemap');//home
        $sitemapcategories = App::make('sitemap');//categories
        $sitemapdistricts = App::make('sitemap');//districts
        $sitemapimages = App::make('sitemap');//images
        $sitemapfotogaleri = App::make('sitemap');//fotogaleri
        $sitemapvideogaleri = App::make('sitemap');//videogaleri
        $posts = Post::orderByDesc('id')->orderByDesc('id')->get();
        $postsvideo = Post::where('posts_video', '!=', "")->orderByDesc('id')->get();
        $photos =Photo::orderByDesc('id')->get();
        $categories = Category::get();
        $districts = District::get();
        $counter = 0;
        $sitemapCounter = 0;
        $sitemapCounters = 0;
        $sitemapCounterAllPage = 0;
        $sitemapCounterImages = 0;
        $host = request()->getHttpHost();
dd($host);

//all page
        foreach ($posts as $p) {



            if ($counter == 1000) {
                $sitemapCounterAllPage++;
                $sitemaphome->store('xml', 'sitemap-page-' . $sitemapCounterAllPage);
                $sitemaphome->addSitemap(secure_url('sitemap-page-' . $sitemapCounterAllPage . '.xml'), Carbon::today());
                $sitemaphome->model->resetItems();

                $counter = 0;

            }
            $sitemaphome->add("https://" . $host . "/" . str_slug($p->title_tr) . "/" . $p->id . "/haberi", $p->created_at, 0.8, "daily");
            $counter++;

        }
//Kategori
        foreach ($categories as $c) {
            if ($counter == 100) {
                $sitemapcategories->store('xml', 'sitemap-categories');
                $sitemapcategories->addSitemap(secure_url('sitemap-categories' . '.xml'));
                $sitemapcategories->model->resetItems();
                $counter = 0;
                $sitemapCounter++;
            }
            $sitemapcategories->add("https://" . $host . "/" . str_slug($c->category_tr) . "/" . $c->id, $c->created_at, 0.4, "daily");
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
                $sitemapimages->store('xml', 'sitemap-images-' . $sitemapCounterImages);
                $sitemapimages->addSitemap(secure_url('sitemap-images-' . $sitemapCounterImages . '.xml'));
                $sitemapimages->model->resetItems();
                $counter = 0;
                $sitemapCounterImages++;
            }
            $sitemapimages->add("https://" . $host . "/" . $p->image, $p->created_at, 0.8, "daily");
            $counter++;
        }
//fotoğraf galerisi
        foreach ($photos as $p) {
            if ($counter == 1000) {
                $sitemapfotogaleri->store('xml', 'sitemap-fotogaleri');
                $sitemapfotogaleri->addSitemap(secure_url('sitemap-fotogaleri' . '.xml'));
                $sitemapfotogaleri->model->resetItems();
                $counter = 0;
                $sitemapCounter++;
            }
            $sitemapfotogaleri->add("https://" . $host . "/" . $p->photo, $p->created_at, 0.8, "daily");
            $counter++;
        }
//video galerisi
        foreach ($postsvideo as $v) {
            if ($counter == 1000) {
                $sitemapvideogaleri->store('xml', 'sitemap-videogaleri');
                $sitemapvideogaleri->addSitemap(secure_url('sitemap-videogaleri' . '.xml'));
                $sitemapvideogaleri->model->resetItems();
                $counter = 0;
                $sitemapCounter++;
            }
            $sitemapvideogaleri->add("https://" . $host . "/" . str_slug($v->title_tr)."/".$v->id."/haberi", $v->created_at, 0.8, "daily");
            $counter++;
        }
        if (!empty($sitemaphome->model->getItems())) {
            $sitemaphome->store('xml', 'sitemap-page-' . $sitemapCounter);
            $sitemaphome->addSitemap(secure_url('sitemap-page-' . $sitemapCounter . '.xml'), Carbon::today());
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
            $sitemapimages->store('xml', 'sitemap-images-' . $sitemapCounterImages);
            $sitemapimages->addSitemap(secure_url('sitemap-images-' . $sitemapCounterImages . '.xml'));
            $sitemapimages->model->resetItems();
            for ($Images = 0; $Images <= $sitemapCounter+1; $Images++) {
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
}
