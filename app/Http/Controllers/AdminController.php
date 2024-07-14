<?php

namespace App\Http\Controllers;
//namespace App\Http\Controllers\Backend;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Models\AuthorsPost;
//use CyrildeWit\EloquentViewable\View;
use CyrildeWit\EloquentViewable\Visitor;
use Analytics;
use Spatie\Analytics\Period;
//use Spatie\Analytics\AnalyticsClient;

class AdminController extends Controller
{
    public function Logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Çıkış Yapıldı');
    }
    // public function Login()
    // {
    //     Auth::login();
    //     return Redirect()->route('admin.index')->with('success' ,'Giriş Yapıldı');

    // }



    public function index()
    {
        $news = DB::table('posts')->get('id');
        //        $endNews=Post::limit(10)->latest()->get();
        //        $endNewsCount=Post::orderByUniqueViews()->latest()->get();
        $endComments = DB::table('comments')->limit(10)->latest('id')->get();
        $endAuthors_posts = AuthorsPost::leftjoin('authors', 'authors.id', '=', 'authors_posts.authors_id')
            ->select(['authors_posts.*', 'authors.name'])
            ->latest()
            ->paginate(10);
        $newsCount = count($news);
        $comments = DB::table('comments')->get('id');
        $commentsCount = $comments->count();
        $authors_posts = DB::table('authors_posts')->get('id');

        // //        $analyticsData=Analytics::fetchMostVisitedPages(Period::days(7));
        // $endNews = Analytics::fetchMostVisitedPages(Period::days(1)); //son 24 saatte ençok ziyaret edilen sayfalar
        // // dd($endNews);
        // $topReferrers = Analytics::fetchTopReferrers(Period::days(1)); //Yönlendirme yapan yerler ve sayfa gösterimleri
        // $userTypes = Analytics::fetchUserTypes(Period::days(1)); //Geri dönen ve Yeni gelen ziyaretçiler
        // $userTypesWeek = Analytics::fetchUserTypes(Period::days(7)); //Geri dönen ve Yeni gelen ziyaretçiler
        $endNews = [];
        $topReferrers = [];
        $userTypes = [];
        $userTypesWeek = [];

        // $analyticsData = Analytics::performQuery(
        //     Period::days(1),
        //     'ga:sessions',
        //     [
        //         'metrics' => 'ga:sessions, ga:pageviews',
        //         'dimensions' => 'ga:yearMonth'
        //     ]
        // ); // günlük toplam oturum ve sayfa görüntüleme oranı
        $analyticsData = [];

        $analyticsDataMonth = [];
        // $analyticsDataMonth = Analytics::performQuery(
        //     Period::days(30),
        //     'ga:sessions',
        //     [
        //         'metrics' => 'ga:users, ga:pageviews',
        //         'dimensions' => 'ga:yearMonth'
        //     ]
        // ); // günlük toplam oturum ve sayfa görüntüleme oranı
        // $mostVisitedPages = Analytics::fetchMostVisitedPages(Period::days(1)); //çok görüntülenen haberler
        $mostVisitedPages = [];
        //        $analyticsDataDays = Analytics::performQuery(
        //            Period::days(1),
        //            'ga:sessions',
        //            [
        //                'metrics' => 'ga:sessions, ga:pageviews',
        //                'dimensions' => 'ga:yearMonth'
        //            ]
        //        );
        //        echo $endNews[0]['pageTitle'];
        //        dd($topReferrers);

        //        echo $analyticsData['totalsForAllResults']['ga:sessions'];
        //        dd($analyticsData);
        //        $peryot=Views::forViewable(Post::class)->countAndRemember();

        //        dd($newVisitor);
        $authors_postsCount = $authors_posts->count();
        return view('admin.index', compact('newsCount', 'commentsCount', 'endNews', 'endComments', 'endAuthors_posts', 'authors_postsCount', 'analyticsData', 'analyticsDataMonth', 'topReferrers', 'userTypes', 'userTypesWeek'));
    }
}
