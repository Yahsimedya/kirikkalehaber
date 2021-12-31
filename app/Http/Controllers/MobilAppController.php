<?php

namespace App\Http\Controllers;


use App\Models\Authors;
use App\Models\AuthorsPost;
use App\Models\Comments;
use App\Models\District;
use App\Models\Photo;
use App\Models\Photocategory;
use App\Models\Post;
use Carbon\Carbon;

use Composer\Semver\Interval;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function MongoDB\BSON\toJSON;


class MobilAppController extends Controller
{
    public function manset()
    {
        $stmt = Post::where('status', '=', 1)->where('manset', '=', 1)->orderByDesc('created_at')->limit(10)->get();
        $json = $stmt;
        return $this->change($json);
    }

    public function commentsCount($id)
    {
        $stmt = Comments::where('posts_id', '=', $id)->where('status', '=', 1)->get();
        $json = $stmt;

        return count($json);
    }

    public function AllPost()
    {
        $stmt = Post::where('status', '=', 1)->orderByDesc('created_at')->get();
        $json = $stmt;
        return $this->change($json);
    }

    public function categoryPost($id)
    {
        if ($id == 999) {
            $stmt = Post::where('status', '=', 1)->where('district_id', '=', 71)->where('subdistrict_id', '=', ['583', '584', '585', '586', '587', '588', '590', '591',])->orderByDesc('created_at')->limit(10)->get();
            $json = $stmt;
            return $this->change($json);
        } else {
            $stmt = Post::where('status', '=', 1)->where('category_id', '=', $id)->orderByDesc('created_at')->limit(10)->get();
            $json = $stmt;
            return $this->change($json);
        }

    }

    public function benzerHaberler($id)
    {
        $category_ids = Post::where('status', '=', 1)->where('id', '=', $id)->orderByDesc('created_at')->limit(10)->get();
        $ids = $category_ids[0]->category_id;
        $stmt = Post::where('status', '=', 1)->where('category_id', '=', $ids)->orderByDesc('created_at')->limit(10)->get();
        $json = $stmt;
        return $this->change($json);
    }

    public function mansetalti()
    {
        $stmt = Post::where('status', '=', 1)->where('manset', '=', 1)->orderByDesc('created_at')->limit(50)->get();
        $json = $stmt;
        return $this->change($json);
    }

    public function surmanset()
    {
        $stmt = Post::where('status', '=', 1)->where('surmanset', '=', 1)->orderByDesc('created_at')->limit(4)->get();
        $json = $stmt;
        return $this->change($json);
    }

    public function world()
    {
        $stmt = Post::where('status', '=', 1)->where('category_id', '=', 11)->orderByDesc('created_at')->get();
        $json = $stmt;
        return $this->change($json);
    }

    public function kirmiziMikrafon()
    {
        $stmt = Post::where('status', '=', 1)->where('category_id', '=', 12)->orderByDesc('created_at')->get();
        $json = $stmt;
        return $this->change($json);
    }

    public function ozelhaber()
    {
        $stmt = Post::where('status', '=', 1)->where('category_id', '=', 10)->orderByDesc('created_at')->get();
        $json = $stmt;
        return $this->change($json);
    }

    public function tech()
    {
        $stmt = Post::where('status', '=', 1)->where('category_id', '=', 9)->orderByDesc('created_at')->get();
        $json = $stmt;
        return $this->change($json);
    }

    public function artsandculture()
    {
        $stmt = Post::where('status', '=', 1)->where('category_id', '=', 8)->orderByDesc('created_at')->get();
        $json = $stmt;
        return $this->change($json);
    }

    public function health()
    {
        $stmt = Post::where('status', '=', 1)->where('category_id', '=', 7)->orderByDesc('created_at')->get();
        $json = $stmt;
        return $this->change($json);
    }

    public function sport()
    {
        $stmt = Post::where('status', '=', 1)->where('category_id', '=', 6)->orderByDesc('created_at')->get();
        $json = $stmt;
        return $this->change($json);
    }

    public function economy()
    {
        $stmt = Post::where('status', '=', 1)->where('category_id', '=', 5)->orderByDesc('created_at')->get();
        $json = $stmt;
        return $this->change($json);
    }

    public function education()
    {
        $stmt = Post::where('status', '=', 1)->where('category_id', '=', 4)->orderByDesc('created_at')->get();
        $json = $stmt;
        return $this->change($json);
    }

    public function politics()
    {
        $stmt = Post::where('status', '=', 1)->where('category_id', '=', 3)->orderByDesc('created_at')->get();
        $json = $stmt;
        return $this->change($json);
    }

    public function agenda()
    {
        $stmt = Post::where('status', '=', 1)->where('category_id', '=', 2)->orderByDesc('created_at')->get();
        $json = $stmt;
        return $this->change($json);
    }

    public function threepage()
    {
        $stmt = Post::where('status', '=', 1)->where('category_id', '=', 1)->orderByDesc('created_at')->get();
        $json = $stmt;
        return $this->change($json);
    }

    public function comments($id)
    {
        $stmt = Comments::where('posts_id', '=', $id)->where('status', '=', 1)->get();
        $json = $stmt;
        return $this->change($json);
    }

    public function photogallery($id)
    {
        $stmt = Photo::where('id', '=', $id)->where('status', '=', 1)->get();


        $json = $stmt;
        return $this->change($json);
    }

    public function photocategories()
    {
        $stmt = Photocategory::where('status', '=', 1)->get();

        $json = $stmt;
        return $this->change($json);
    }

    public function newsDetail($id)
    {
        $stmt = Post::where('id', '=', $id)->get();
        $json = $stmt;
        return $this->change($json);
    }

    public function authorspost()
    {
        $stmt = AuthorsPost::where('status', '=', 1)->get();
        $json = $stmt;
        return $this->change($json);
    }

    public function authors()
    {
        $stmt = Authors::where('status', '=', 1)->get();
        $json = $stmt;
        return $this->change($json);
    }

    public function story()
    {
        $stmt = DB::table('posts')->where('status', '=', 1)
            ->where('story', '=', 1)
            ->where('created_at', '>=', DB::raw('DATE_SUB(NOW(), INTERVAL 1 DAY)'))
            ->orderByDesc('id')->get();

        $json = $stmt;


        return $this->change($json);
    }


    public function authorspostDetail($id)
    {
        $stmt = AuthorsPost::where('id', '=', $id)->get();
        $json = $stmt;
        return $this->change($json);
    }
    public function authorsposts($id)
    {
        $stmt = AuthorsPost::where('authors_id', '=', $id)->orderByDesc('created_at')->get();
        $json = $stmt;
        return $this->change($json);
    }


    public function commentposts($id, $ad, $detay)
    {


        $haber_id = $id;
        $postcommends = array();
        $postcommends['posts_id'] = $id;
        $postcommends['name'] = $ad;
        $postcommends['details'] = $detay;
        $postcommends['created_at'] = Carbon::now();


        Comments::where('post_id', '=', $haber_id)->insert($postcommends);
        return true;


    }

    public function categories($id)
    {
        $stmt = Post::where('status', '=', 1)->where('manset', '=', 1)->where('category_id', '=', $id)->orderByDesc('created_at')->limit(30)->get();
        $json = $stmt;
        return $this->change($json);
    }

    public function fotogaleri()
    {
        $stmt = DB::table('photocategories')->
        leftjoin('photos', 'photocategories.id', '=', 'photos.photocategory_id')
            ->latest('photocategories.id')
            ->groupBy('photocategories.id')->get();
        $json = $stmt;
        return $this->change($json);
    }

    public function fotogaleriDetail()
    {
        $stmt = DB::table('photocategories')->
        leftjoin('photos', 'photocategories.id', '=', 'photos.photocategory_id')
            ->latest('photocategories.id')->get();
        $json = $stmt;
        return $this->change($json);
    }


    public function searchPost($ad)
    {
        $searchText = $ad;
        $stmt = Post::Where('title_tr', 'LIKE', '%' . $searchText . '%')->Where("status", "=", 1)->get();
        $json = $stmt;
        return $this->change($json);
    }

    public function countrynews($id)
    {
        $stmt = Post::where('district_id', '=', $id)->limit(50)->orderByDesc('created_at')->get();
        $json = $stmt;
        return $this->change($json);
    }

    public function allyazar()
    {
        $stmt = AuthorsPost::join('authors', 'authors_posts.authors_id', '=', 'authors.id')
            ->where("authors_posts.status", 1)->where("authors.status",1)
            ->select('authors_posts.id','authors_posts.authors_id','authors_posts.title','authors.name','authors.image')
            ->groupBy('authors.id')->orderByDesc('authors_posts.created_at')
            ->get();
        $json = $stmt;
        return $this->change($json);

    }
    public function sondakika()
    {
        $stmt = Post::where('updated_at', '>', Carbon::now()->subDay(1))->latest()
            ->get();
        $json = $stmt;
        return $this->change($json);
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

}
